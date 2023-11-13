<?php

namespace SuperbAddons\Admin\Pages;

defined('ABSPATH') || exit();

use SuperbAddons\Components\Admin\ContentBoxLarge;
use SuperbAddons\Components\Admin\LinkBox;
use SuperbAddons\Components\Admin\Modal;
use SuperbAddons\Components\Admin\PremiumBox;
use SuperbAddons\Components\Admin\ReviewBox;
use SuperbAddons\Components\Admin\SupportBox;
use SuperbAddons\Elementor\Controllers\ElementorController;
use SuperbAddons\Tours\Controllers\TourController;

class SupportPage
{
    public function __construct()
    {

        $this->Render();
    }

    private function Render()
    {
?>
        <div class="superbaddons-admindashboard-sidebarlayout">
            <div class="superbaddons-admindashboard-sidebarlayout-left">
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("Troubleshooting", "superbaddons"),
                        "description" => __("Experiencing technical difficulties with Superb Addons? We recommend running the troubleshooting process to scan for and identify common issues.", "superbaddons"),
                        "image" => "asset-medium-troubleshooting.jpg",
                        "connected_bottom" => true,
                        "class" => 'superbaddons-admindashboard-troubleshooting-image-box-large'
                    )
                );
                ?>
                <div class="spbaddons-troubleshooting-wrapper">
                    <div class="spbaddons-troubleshooting-steps">
                        <!-- Handled by JS -->
                    </div>
                    <button id="spbaddons-troubleshooting-submit-btn" class="superbaddons-element-button superbaddons-element-m0" type="button"><?= esc_html__('Start Troubleshooting Process', 'superbaddons'); ?></button>
                    <div class="spbaddons-troubleshooting-result-wrapper" style="display:none;">
                        <?php
                        $this->AddResultBox(
                            "error",
                            "color-warning-octagon.svg",
                            __('Troubleshooting failed', 'superbaddons'),
                            array(
                                __('The troubleshooting process was able to identify errors, but was unable to resolve them.', 'superbaddons'),
                                __('If the errors can not be resolved manually, please contact our support team for further assistance.', 'superbaddons')
                            )
                        );

                        $this->AddResultBox(
                            "success",
                            "checkmark.svg",
                            __('No issues found', 'superbaddons'),
                            array(
                                __('All troubleshooting steps completed succesfully and no issues were found.', 'superbaddons'),
                                __('If you\'re still experiencing issues, please contact our support team for further assistance.', 'superbaddons')
                            )
                        );

                        $this->AddResultBox(
                            "resolved",
                            "checkmark.svg",
                            __('Issues resolved', 'superbaddons'),
                            array(
                                __('All found issues have been successfully resolved in the troubleshooting process.', 'superbaddons'),
                                __('If you\'re still experiencing issues, please contact our support team for further assistance.', 'superbaddons')
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="superbaddons-additional-content-wrapper">
                    <h4 class="superbaddons-element-text-sm superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-m0"><?= esc_html__("Guided Tutorials", "superbaddons"); ?></h4>
                    <p class="superbaddons-element-text-xs superbaddons-element-text-gray "><?= esc_html__("Get started with our guided tutorials of Superb Addons features.", "superbaddons"); ?></p>
                    <div class="superbaddons-admindashboard-linkbox-wrapper">
                        <?php
                        new LinkBox(
                            array(
                                "id" => "superbaddons-tour-gutenberg-patterns",
                                "icon" => "purple-subtract-square.svg",
                                "title" => __("Gutenberg Patterns", "superbaddons"),
                                "description" => __("Let's show you where and how to use our library of Gutenberg patterns!", "superbaddons"),
                                "cta" => __("Start Tutorial", "superbaddons"),
                                "link" => esc_url(admin_url("post-new.php?" . TourController::TOUR_GUTENBERG . "=" . TourController::GUTENBERG_TOUR_PATTERNS)),
                                "classes" => 'superbaddons-start-tutorial-link-gutenberg'
                            )
                        );
                        new LinkBox(
                            array(
                                "id" => "superbaddons-tour-gutenberg-blocks",
                                "icon" => "purple-cube.svg",
                                "title" => __("Gutenberg Blocks", "superbaddons"),
                                "description" => __("How do you insert the included blocks? This tutorial will show you.", "superbaddons"),
                                "cta" => __("Start Tutorial", "superbaddons"),
                                "link" => esc_url(admin_url("post-new.php?" . TourController::TOUR_GUTENBERG . "=" . TourController::GUTENBERG_TOUR_BLOCKS)),
                                "classes" => 'superbaddons-start-tutorial-link-gutenberg'
                            )
                        );
                        if (ElementorController::is_compatible()) {
                            new LinkBox(
                                array(
                                    "id" => "superbaddons-tour-elementor",
                                    "icon" => "logo-elementor.svg",
                                    "title" => __("Elementor Addons", "superbaddons"),
                                    "description" => __("Love using Elementor? Start the tutorial and see how you can use our Elementor addons.", "superbaddons"),
                                    "cta" => __("Start Tutorial", "superbaddons"),
                                    "link" => esc_url('#' . TourController::TOUR_ELEMENTOR),
                                    "classes" => 'superbaddons-start-tutorial-link-elementor superbaddons-flex-basis-100'
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="superbaddons-additional-content-wrapper">
                    <h4 class="superbaddons-element-text-sm superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-m0"><?= esc_html__("Knowledge Base", "superbaddons"); ?></h4>
                    <p class="superbaddons-element-text-xs superbaddons-element-text-gray "><?= esc_html__("Looking for answers? Our knowledge base may have what you're looking for.", "superbaddons"); ?></p>
                    <div class="superbaddons-admindashboard-linkbox-wrapper">
                        <?php
                        new LinkBox(
                            array(
                                "icon" => "purple-gear.svg",
                                "title" => __("Installation", "superbaddons"),
                                "description" => __("If you're having trouble with installating plugins, themes, creating a child theme, or need help finding your license key.", "superbaddons"),
                                "cta" => __("View tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/installation/",
                            )
                        );
                        new LinkBox(
                            array(
                                "icon" => "purple-rocket-launch.svg",
                                "title" => __("Getting started", "superbaddons"),
                                "description" => __("A good start is important. Get step by step guides to creating child themes, customizing designs, adding menus and widgets etc.", "superbaddons"),
                                "cta" => __("View tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/getting-started/",
                            )
                        );
                        new LinkBox(
                            array(
                                "icon" => "purple-paint-brush.svg",
                                "title" => __("Design", "superbaddons"),
                                "description" => __("Get a better looking site by learning how to design it properly. Learn how to change colors, fonts, header image and a lot more.", "superbaddons"),
                                "cta" => __("View tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/design/",
                            )
                        );
                        new LinkBox(
                            array(
                                "icon" => "purple-article-medium.svg",
                                "title" => __("Content", "superbaddons"),
                                "description" => __("Your content is your sites personality. Learn how to create pages, posts, menus and how to edit them afterwards.", "superbaddons"),
                                "cta" => __("View tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/content/",
                            )
                        );
                        new LinkBox(
                            array(
                                "icon" => "purple-plugs.svg",
                                "title" => __("Plugins", "superbaddons"),
                                "description" => __("Expand your websites functionality. Learn how to install WooCommerce, live chat and how to optimize your site through a SEO plugin.", "superbaddons"),
                                "cta" => __("View tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/plugins/",
                            )
                        );
                        new LinkBox(
                            array(
                                "icon" => "purple-files.svg",
                                "title" => __("All tutorials", "superbaddons"),
                                "description" => __("We have a library of step by step tutorials which make it easy for you to create the best possible website.", "superbaddons"),
                                "cta" => __("View all tutorials", "superbaddons"),
                                "link" => "https://superbthemes.com/documentation/category/all-tutorials/",
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>

            <div class="superbaddons-admindashboard-sidebarlayout-right">
                <?php
                new PremiumBox();
                new SupportBox();
                new ReviewBox();
                ?>
            </div>
        </div>
    <?php
        new Modal();
    }


    private function AddResultBox($identity, $icon, $title, $text_arr)
    {
    ?>
        <div class="spbaddons-troubleshooting-result-item spbaddons-troubleshooting-result-<?= esc_attr($identity); ?>" style="display:none;">
            <div class="spbaddons-troubleshooting-result-item-header">
                <img class="spbaddons-troubleshooting-result-icon" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/' . $icon); ?>" />
                <h5>
                    <?= esc_html($title); ?>
                </h5>
            </div>
            <div class="spbaddons-troubleshooting-result-item-body">
                <?php
                foreach ($text_arr as $text) {
                ?>
                    <p>
                        <?= esc_html($text); ?>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>
<?php
    }
}
