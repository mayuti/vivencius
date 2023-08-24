<?php

namespace SuperbAddons\Components\Admin;

defined('ABSPATH') || exit();

use SuperbAddons\Components\Admin\LinkBox;
use SuperbAddons\Data\Controllers\KeyController;

class SupportLinkBoxes
{
    public function __construct()
    {
        new LinkBox(
            array(
                "icon" => "purple-help.svg",
                "title" => __("Customer support", "superbaddons"),
                "description" => __("We prioritize top-notch support to our customers. If you have any questions or need assistance with our plugin, don't hesitate to reach out. ", "superbaddons"),
                "cta" => __("Contact support", "superbaddons"),
                "link" => "https://superbthemes.com/customer-support/",
            )
        );
        if (KeyController::HasPremiumKey()) {
            new LinkBox(
                array(
                    "icon" => "purple-crown.svg",
                    "title" => __("Thank you!", "superbaddons"),
                    "description" => __("We want to extend a heartfelt thank you for choosing to support Superb Addons. Your decision plays a significant role in helping us grow and improve. We're committed to providing you with the best experience possible and are excited to have you on board. If you ever have any questions or suggestions, feel free to reach out!", "superbaddons"),
                    "pro" => true
                )
            );
        } else {
            new LinkBox(
                array(
                    "icon" => "purple-chat.svg",
                    "title" => __("Premium support", "superbaddons"),
                    "description" => __("Unlock expert assistance for any question through our premium support package. Enjoy one-on-one help from the creators of Superb Addons.", "superbaddons"),
                    "cta" => __("Get Premium Support", "superbaddons"),
                    "link" => "https://superbthemes.com/extended-premium-support/",
                    "pro" => true,
                )
            );
        }
    }
}
