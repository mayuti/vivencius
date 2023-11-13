<?php

namespace SuperbAddons\Library\Controllers;

defined('ABSPATH') || exit();

use Exception;
use WP_Error;
use SuperbAddons\Config\Capabilities;
use SuperbAddons\Data\Controllers\CacheController;
use SuperbAddons\Data\Controllers\DomainShiftController;
use SuperbAddons\Data\Controllers\KeyController;
use SuperbAddons\Data\Controllers\OptionController;
use SuperbAddons\Data\Controllers\RestController;
use SuperbAddons\Data\Utils\CacheException;
use SuperbAddons\Data\Utils\CacheTypes;
use SuperbAddons\Data\Utils\ElementorCache;
use SuperbAddons\Data\Utils\GutenbergCache;
use SuperbAddons\Elementor\Controllers\ElementorController;
use SuperbAddons\Gutenberg\Controllers\GutenbergController;

class LibraryRequestController
{
    const ELEMENTOR_LIST_ROUTE = '/elementor-list';
    const ELEMENTOR_INSERT_ROUTE = '/elementor-insert';
    const GUTENBERG_LIST_ROUTE = '/gutenberg-list';
    const GUTENBERG_INSERT_ROUTE = '/gutenberg-insert';

    const ELEMENTOR_ENDPOINT_BASE = 'elementor-library/';
    const GUTENBERG_ENDPOINT_BASE = 'gutenberg-library/';

    public function __construct()
    {
        RestController::AddRoute(self::ELEMENTOR_LIST_ROUTE, array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'LibraryCallbackPermissionCheck'),
            'callback' => array($this, 'ElementorListCallback'),
        ));
        RestController::AddRoute(self::ELEMENTOR_INSERT_ROUTE, array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'LibraryCallbackPermissionCheck'),
            'callback' => array($this, 'ElementorInsertCallback'),
        ));
        RestController::AddRoute(self::GUTENBERG_LIST_ROUTE, array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'LibraryCallbackPermissionCheck'),
            'callback' => array($this, 'GutenbergListCallback'),
        ));
        RestController::AddRoute(self::GUTENBERG_INSERT_ROUTE, array(
            'methods' => 'GET',
            'permission_callback' => array($this, 'LibraryCallbackPermissionCheck'),
            'callback' => array($this, 'GutenbergInsertCallback'),
        ));
    }

    public function LibraryCallbackPermissionCheck()
    {
        // Restrict endpoint to only users who have the proper capability.
        if (!current_user_can(Capabilities::CONTRIBUTOR)) {
            return new WP_Error('rest_forbidden', esc_html__('Unauthorized. Please check user permissions.', 'superbaddons'), array('status' => 401));
        }

        return true;
    }

    public function ElementorListCallback()
    {
        try {
            $section_cache = CacheController::GetCache(ElementorCache::SECTIONS, CacheTypes::ELEMENTOR);
            if (!!$section_cache) {
                // Local cache accepted
                $section_cache->premium = KeyController::HasPremiumKey();
                return rest_ensure_response($section_cache);
            }

            return $this->ListHandler(self::ELEMENTOR_ENDPOINT_BASE, 'sections');
        } catch (CacheException $cex) {
            return new \WP_Error('internal_error_cache', 'Internal Cache Error: ' .  esc_html($cex->getMessage()), array('status' => 500));
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    public function GutenbergListCallback()
    {
        try {
            $pattern_cache = CacheController::GetCache(GutenbergCache::PATTERNS, CacheTypes::GUTENBERG);
            if (!!$pattern_cache) {
                // Local cache accepted
                $pattern_cache->premium = KeyController::HasPremiumKey();
                return rest_ensure_response($pattern_cache);
            }

            return $this->ListHandler(self::GUTENBERG_ENDPOINT_BASE, 'patterns');
        } catch (CacheException $cex) {
            return new \WP_Error('internal_error_cache', 'Internal Cache Error: ' .  esc_html($cex->getMessage()), array('status' => 500));
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function ListHandler($endpoint, $item_type)
    {
        // Fetch data cache from service
        $options_controller = new OptionController();
        $license_key = $options_controller->GetKey();

        $response = DomainShiftController::RemoteGet($endpoint . $item_type . '?action=list&key=' . $license_key);
        ///
        if (!is_array($response) || is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return new \WP_Error('service_unavailable', 'Plugin Service Unavailable', array('status' => 503));
        }
        ///
        $data = json_decode($response['body']);
        if (isset($data->code) && isset($data->data) && isset($data->message)) {
            $status = isset($data->data->status) ? $data->data->status : 500;
            return new \WP_Error($data->code, $data->message, array('status' => $status));
        }
        if (isset($data->level)) {
            KeyController::UpdateKeyType($data->level, $data->active, $data->expired);
        }

        switch ($endpoint) {
            case self::ELEMENTOR_ENDPOINT_BASE:
                // Set cache
                CacheController::SetCache(ElementorCache::SECTIONS, $data);
                break;
            case self::GUTENBERG_ENDPOINT_BASE:
                // Set cache
                CacheController::SetCache(GutenbergCache::PATTERNS, $data);
                break;
            default:
                throw new CacheException(__("Invalid endpoint specifier. Unable to set cache.", "superbaddons"));
        }

        $data->premium = KeyController::HasPremiumKey();
        //
        return rest_ensure_response($data);
    }

    public function ElementorInsertCallback($request)
    {
        return $this->InsertHandler($request, self::ELEMENTOR_ENDPOINT_BASE, 'sections');
    }

    public function GutenbergInsertCallback($request)
    {
        return $this->InsertHandler($request, self::GUTENBERG_ENDPOINT_BASE, 'patterns');
    }

    private function InsertHandler($request, $endpoint, $item_type)
    {
        try {
            //
            $options_controller = new OptionController();
            $license_key = $options_controller->GetKey();
            if (!isset($request['id']) || !isset($request['package']) || $request['package'] === "premium" && !$license_key) {
                return new \WP_Error('forbidden', 'Forbidden', array('status' => 403));
            }

            $stamp = $options_controller->GetStamp();
            $collection = $request['package'] === 'premium' ? "premium" : "free";
            $response = DomainShiftController::RemoteGet($endpoint . $item_type . '?action=insert&id=' . $request['id'] . '&collection=' . $collection . '&dm=' . urlencode(\home_url()) . '&key=' . urlencode($license_key) . '&stamp=' . absint($stamp));
            ///
            if (!is_array($response) || is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
                return new \WP_Error('service_unavailable', 'Plugin Service Unavailable', array('status' => 503));
            }
            ///
            $data = json_decode($response['body'], true);
            if (isset($data['code']) && isset($data['data']) && isset($data['message'])) {
                $status = isset($data['data']['status']) ? $data['data']['status'] : 500;
                return new \WP_Error($data['code'], $data['message'], array('status' => $status));
            }
            if (isset($data['level'])) {
                KeyController::UpdateKeyType($data['level'], $data['active'], $data['expired']);
            }
            if (!isset($data['verified']) || !$data['verified']) {
                KeyController::VerificationFailed();
            }

            $data['premium'] = KeyController::HasPremiumKey();

            if (isset($data['access_failed'])) {
                return rest_ensure_response($data);
            }

            switch ($endpoint) {
                case self::ELEMENTOR_ENDPOINT_BASE:
                    $data = ElementorController::ElementorDataImportAction($data);
                    return rest_ensure_response($data['content']);
                case self::GUTENBERG_ENDPOINT_BASE:
                    $data = GutenbergController::GutenbergDataImportAction($data);
                    return rest_ensure_response(["content" => $data['content']]);
                default:
                    throw new Exception(__("Invalid endpoint specifier. Unable to import data.", "superbaddons"));
            }

            return new \WP_Error('internal_error_plugin', 'Unexpected Internal Plugin Error', array('status' => 500));
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }
}
