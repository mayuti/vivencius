<?php

namespace SuperbAddons;

defined('ABSPATH') || exit();

use Exception;
use SuperbAddons\Elementor\Controllers\ElementorController;
use SuperbAddons\Admin\Controllers\DashboardController;
use SuperbAddons\Data\Controllers\LogController;
use SuperbAddons\Data\Controllers\RestController;
use SuperbAddons\Gutenberg\Controllers\GutenbergController;
use SuperbAddons\Library\Controllers\LibraryRequestController;
use SuperbAddons\Tours\Controllers\TourController;

class SuperbAddonsPlugin
{
    private static $instance;

    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        register_activation_hook(SUPERBADDONS_BASE_PATH, array($this, 'ActivationHookFunction'));
        register_deactivation_hook(SUPERBADDONS_BASE_PATH, array($this, 'DeactivationHookFunction'));
        new DashboardController();
        new GutenbergController();
        new ElementorController();
        new LibraryRequestController();
        new TourController();
        LogController::AddCronAction();
        RestController::RegisterRoutes();
        add_filter('wp_theme_json_data_default', array($this, 'UpdateThemeJsonDefaults'));
    }

    public function UpdateThemeJsonDefaults($theme_json)
    {
        $defaults = array(
            'version' => '2',
            'settings' => array(
                "appearanceTools" => true,
                "spacing" => [
                    "spacingScale" => [
                        "steps" => 0
                    ],
                    "spacingSizes" => [
                        [
                            "name" => "xxSmall",
                            "size" => "clamp(5px, 1vw, 10px)",
                            "slug" => "superbspacing-xxsmall"
                        ],
                        [
                            "name" => "xSmall",
                            "size" => "clamp(10px, 2vw, 20px)",
                            "slug" => "superbspacing-xsmall"
                        ],
                        [
                            "name" => "Small",
                            "size" => "clamp(20px, 4vw, 40px)",
                            "slug" => "superbspacing-small"
                        ],
                        [
                            "name" => "Medium",
                            "size" => "clamp(30px, 6vw, 60px)",
                            "slug" => "superbspacing-medium"
                        ],
                        [
                            "name" => "Large",
                            "size" => "clamp(40px, 8vw, 80px)",
                            "slug" => "superbspacing-large"
                        ],
                        [
                            "name" => "xLarge",
                            "size" => "clamp(50px, 10vw, 100px)",
                            "slug" => "superbspacing-xlarge"
                        ],
                        [
                            "name" => "xxLarge",
                            "size" => "clamp(60px, 12vw, 120px)",
                            "slug" => "superbspacing-xxlarge"
                        ]
                    ],
                    "units" => [
                        "%",
                        "px",
                        "em",
                        "rem",
                        "vh",
                        "vw"
                    ]
                ],
                "typography" => [
                    "dropCap" => false,
                    "fluid" => true,
                    "fontSizes" => [
                        [
                            "name" => "Tiny",
                            "slug" => "superbfont-tiny",
                            "size" => "0.9rem",
                            "fluid" => [
                                "min" => "0.8rem",
                                "max" => "0.9rem"
                            ]
                        ],
                        [
                            "name" => "xxSmall",
                            "slug" => "superbfont-xxsmall",
                            "size" => "1rem",
                            "fluid" => [
                                "min" => "0.9rem",
                                "max" => "1rem"
                            ]
                        ],
                        [
                            "name" => "xSmall",
                            "slug" => "superbfont-xsmall",
                            "size" => "1.1rem",
                            "fluid" => [
                                "min" => "1rem",
                                "max" => "1.1rem"
                            ]
                        ],
                        [
                            "name" => "Small",
                            "slug" => "superbfont-small",
                            "size" => "1.5rem",
                            "fluid" => [
                                "min" => "1rem",
                                "max" => "1.5rem"
                            ]
                        ],
                        [
                            "name" => "Medium",
                            "slug" => "superbfont-medium",
                            "size" => "2rem",
                            "fluid" => [
                                "min" => "1.2rem",
                                "max" => "2rem"
                            ]
                        ],
                        [
                            "name" => "Large",
                            "slug" => "superbfont-large",
                            "size" => "3rem",
                            "fluid" => [
                                "min" => "1.5rem",
                                "max" => "3rem"
                            ]
                        ],
                        [
                            "name" => "xLarge",
                            "slug" => "superbfont-xlarge",
                            "size" => "4rem",
                            "fluid" => [
                                "min" => "2rem",
                                "max" => "4rem"
                            ]
                        ],
                        [
                            "name" => "xxLarge",
                            "slug" => "superbfont-xxlarge",
                            "size" => "5rem",
                            "fluid" => [
                                "min" => "2.5rem",
                                "max" => "5rem"
                            ]
                        ]
                    ]
                ]
            ),
        );

        return $theme_json->update_with($defaults);
    }

    public function ActivationHookFunction()
    {
        try {
            add_option('superbaddons_pre_activation', time(), false);
        } catch (Exception $e) {
            LogController::HandleException($e);
        }
    }

    public function DeactivationHookFunction()
    {
        LogController::MaybeUnsubscribeCron();
    }
}
