<?php

namespace SuperbAddons\Data\Controllers;

defined('ABSPATH') || exit();

use Exception;
use SuperbAddons\Config\Config;
use SuperbAddons\Data\Controllers\OptionController;
use SuperbAddons\Data\Utils\CacheTypes;

class DomainShiftController
{
    const STATUS_ENDPOINT = 'addons-status/status';

    public static function FindPreferredAPIDomain()
    {
        try {
            $options_controller = new OptionController();
            $idx = 0;
            $success = false;
            foreach (Config::API_DOMAINS as $available_domain) {
                $response = wp_remote_get($available_domain, array('method' => 'HEAD'));
                if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                    $success = $options_controller->UpdateAPIDomain($idx);
                    break;
                }
                $idx++;
            }

            return $success;
        } catch (Exception $ex) {
            LogController::HandleException($ex);
            return false;
        }
    }

    public static function GetCurrentConnectionSuccess()
    {
        $options_controller = new OptionController();
        $preferred_domain = $options_controller->GetPreferredDomain();
        $response = wp_remote_get($preferred_domain, array('method' => 'HEAD'));
        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            return true;
        }
        return false;
    }

    public static function GetServiceStatus()
    {
        $options_controller = new OptionController();
        $preferred_domain = $options_controller->GetPreferredDomain();

        $response = wp_remote_get($preferred_domain . self::STATUS_ENDPOINT, RestController::GetArgsHeadersArray());
        ///
        $status_code = wp_remote_retrieve_response_code($response);
        if (!is_array($response) || is_wp_error($response) || $status_code !== 200) {
            if ($status_code === 401) {
                return array("online" => false, "message" => __("Unauthorized. Please make sure that you are using the latest version of this plugin.", "superbaddons"));
            }
            return array("online" => false, "message" => __("Service Unavailable. Please contact our support team.", "superbaddons"));
        }

        $data = json_decode($response['body']);
        if (!isset($data->elementor) || !isset($data->gutenberg)) {
            return array("online" => false, "message" => __("Service Data Unavailable. Please contact our support team.", "superbaddons"));
        }


        return array("online" => true, CacheTypes::ELEMENTOR => $data->elementor, CacheTypes::GUTENBERG => $data->gutenberg);
    }
}
