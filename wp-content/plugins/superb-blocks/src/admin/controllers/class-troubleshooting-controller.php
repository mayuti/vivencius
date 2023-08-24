<?php

namespace SuperbAddons\Admin\Controllers;

use SuperbAddons\Config\Capabilities;
use SuperbAddons\Data\Controllers\CacheController;
use SuperbAddons\Data\Controllers\DomainShiftController;
use SuperbAddons\Data\Controllers\KeyController;
use SuperbAddons\Data\Controllers\RestController;
use SuperbAddons\Data\Utils\CacheOptions;
use SuperbAddons\Data\Utils\ElementorCache;
use SuperbAddons\Data\Utils\KeyException;
use SuperbAddons\Elementor\Controllers\ElementorController;
use SuperbAddons\Gutenberg\Controllers\GutenbergController;

defined('ABSPATH') || exit();

class TroubleshootingController
{
    const TROUBLESHOOTING_ROUTE = '/troubleshooting';

    const ENDPOINT_BASE = 'addons-status/';

    public function __construct()
    {
        RestController::AddRoute(self::TROUBLESHOOTING_ROUTE, array(
            'methods' => 'POST',
            'permission_callback' => array($this, 'TroubleshootingCallbackPermissionCheck'),
            'callback' => array($this, 'TroubleshootingRouteCallback'),
        ));
    }

    public function TroubleshootingCallbackPermissionCheck()
    {
        // Restrict endpoint to only users who have the proper capability.
        if (!current_user_can(Capabilities::ADMIN)) {
            return new WP_Error('rest_forbidden', esc_html__('Unauthorized. Please check user permissions.', 'superbaddons'), array('status' => 401));
        }

        return true;
    }

    public function TroubleshootingRouteCallback($request)
    {
        if (!isset($request['action'])) {
            return new \WP_Error('bad_request_plugin', 'Bad Plugin Request', array('status' => 400));
        }
        switch ($request['action']) {
            case 'wordpressversion':
                return $this->WordPressVersionCallback();
            case 'elementorversion':
                return $this->ElementorVersionCallback();
            case 'connection':
                return $this->ConnectionCheckCallback();
            case 'domainshift':
                return $this->DomainShiftCallback();
            case 'service':
                return $this->ServiceCheckCallback();
            case 'keycheck':
                return $this->KeyCheckCallback();
            case 'keyverify':
                return $this->KeyVerifyCallback();
            case 'cacheclear':
                return $this->CacheClearCallback();
            default:
                return new \WP_Error('bad_request_plugin', 'Bad Plugin Request', array('status' => 400));
        }
    }

    private function WordPressVersionCallback()
    {
        try {
            $is_compatible = GutenbergController::is_compatible();

            return rest_ensure_response(['success' => $is_compatible]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function ElementorVersionCallback()
    {
        try {
            $is_compatible = ElementorController::is_compatible();

            return rest_ensure_response(['success' => $is_compatible]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function ConnectionCheckCallback()
    {
        try {
            $is_connected = DomainShiftController::GetCurrentConnectionSuccess();

            return rest_ensure_response(['success' => $is_connected]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function DomainShiftCallback()
    {
        try {
            $successful_shift = DomainShiftController::FindPreferredAPIDomain();

            return rest_ensure_response(['success' => $successful_shift]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function ServiceCheckCallback()
    {
        try {
            $status_arr = DomainShiftController::GetServiceStatus();
            if ($status_arr['online']) {
                return rest_ensure_response(['success' => true]);
            }

            return rest_ensure_response(['success' => false, "text" => esc_html($status_arr['message'])]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function KeyCheckCallback()
    {
        try {
            $keyinfo = KeyController::GetKeyStatus();

            if ($keyinfo['expired']) {
                return rest_ensure_response(['success' => false, "ignoreResolver" => false, "text" => esc_html__('License Key Expired', 'superbaddons')]);
            }

            if (!$keyinfo['active']) {
                return rest_ensure_response(['success' => false, "ignoreResolver" => false, "text" => esc_html__('License Key Disabled. Please contact our support team for assistance.', 'superbaddons')]);
            }

            if (!$keyinfo['verified']) {
                return rest_ensure_response(['success' => false, "text" => esc_html__('License Key Verification Invalid', 'superbaddons')]);
            }

            $keytype_label = KeyController::GetCurrentKeyTypeLabel();
            return rest_ensure_response(['success' => true, "text" => esc_html($keytype_label)]);
        } catch (KeyException $k_ex) {
            return rest_ensure_response(['success' => false, "text" => esc_html($k_ex->getMessage())]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }


    private function KeyVerifyCallback()
    {
        try {
            $keyinfo = KeyController::GetUpdatedLicenseKeyInformation();

            if ($keyinfo['expired'] || !$keyinfo['active'] || !$keyinfo['verified']) {
                return rest_ensure_response(['success' => false]);
            }
            $keytype_label = KeyController::GetKeyTypeLabel($keyinfo['type']);
            return rest_ensure_response(['success' => true, "text" => esc_html($keytype_label . ' ' . __('Verified', 'superbaddons'))]);
        } catch (KeyException $k_ex) {
            return rest_ensure_response(['success' => false, "text" => esc_html($k_ex->getMessage())]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }

    private function CacheClearCallback()
    {
        try {
            $cleared = CacheController::ClearCache(CacheOptions::SERVICE_VERSION) && CacheController::ClearCache(ElementorCache::SECTIONS);

            return rest_ensure_response(['success' => $cleared]);
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return new \WP_Error('internal_error_plugin', 'Internal Plugin Error', array('status' => 500));
        }
    }
}
