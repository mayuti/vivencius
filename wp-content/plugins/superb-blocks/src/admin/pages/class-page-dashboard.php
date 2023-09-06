<?php

namespace SuperbAddons\Admin\Pages;

defined('ABSPATH') || exit();

use SuperbAddons\Components\Admin\LinkBox;
use SuperbAddons\Components\Admin\ReviewBox;
use SuperbAddons\Admin\Controllers\DashboardController;
use SuperbAddons\Components\Admin\ContentBoxLarge;
use SuperbAddons\Components\Admin\PremiumBox;
use SuperbAddons\Components\Admin\SupportLinkBoxes;

class DashboardPage
{
    public function __construct()
    {
        $this->Render();
    }

    private function Render()
    {
?>
        <!-- Welcome Box -->
        <div class="superbaddons-admindashboard-content-box-large superbaddons-admindashboard-general-intro" style="background-image:url(<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/asset-medium-dashboardheader.jpg'); ?>);">
            <div class="superbaddons-admindashboard-content-box-large-inner">
                <span class="superbaddons-element-text-sm superbaddons-element-text-800 superbaddons-element-text-dark">Hello, <?= esc_html(wp_get_current_user()->display_name); ?> 👋</span>
                <h2 class="superbaddons-element-text-lg superbaddons-element-text-800 superbaddons-element-text-dark"><?= esc_html__("Building Beautiful Websites Made Easy", "superbaddons"); ?></h2>
                <p class="superbaddons-element-text-xxs superbaddons-element-text-gray">
                    <?= esc_html__("Say goodbye to countless hours lost on trial and error. No design or coding skills required. Unlock more than 500 sections, themes and blocks with one click.", "superbaddons"); ?>
                </p>
            </div>
        </div>

        <div class="superbaddons-admindashboard-sidebarlayout">
            <div class="superbaddons-admindashboard-sidebarlayout-left">
                <!-- Elementor Addons -->
                <?php
                new ContentBoxLarge(
                    array(
                        "title" => __("Elementor Addons", "superbaddons"),
                        "description" => __("Unleash the full potential of Elementor with Superb Addons. Create pixel-perfect designs and take your website-building skills to the next level with our seamless integration that gives you access to 250 Elementor sections and elements.", "superbaddons"),
                        "image" => "elementor-illustration-cards-medium.jpg",
                        "icon" => "logo-elementor.svg",
                        "cta" => __("View Elementor Library", "superbaddons"),
                        "link" => admin_url('admin.php?page=' . DashboardController::ELEMENTOR_DASHBOARD),
                        "class" => 'superbaddons-admindashboard-dashboard-elementor-intro'
                    )
                );
                ?>
                <!-- Gutenberg Addons -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("WordPress Addons", "superbaddons"),
                        "description" => __("Unlock the true power of the WordPress editor with Superb Addons. Get access to over 500 patterns, blocks, sections and search engine optimized themes for every type of website.", "superbaddons"),
                        "image" => "illustration-cards-medium.jpg",
                        "icon" => "logo-gutenberg.svg",
                        "cta" => __("View WordPress Library", "superbaddons"),
                        "link" => admin_url('admin.php?page=' . DashboardController::GUTENBERG_DASHBOARD),
                        "class" => 'superbaddons-admindashboard-dashboard-gutenberg-intro'
                    )
                );
                ?>
                <!-- Link Boxes -->
                <div class="superbaddons-admindashboard-linkbox-wrapper">
                    <?php
                    new LinkBox(
                        array(
                            "icon" => "question.svg",
                            "title" => __("Help & Tutorials", "superbaddons"),
                            "description" => __("We have put together detailed documentation that walks you through every step of the process, from installation to customization.", "superbaddons"),
                            "cta" => __("View tutorials", "superbaddons"),
                            "link" => admin_url('admin.php?page=' . DashboardController::SUPPORT),
                            "same_window" => true,
                        )
                    );
                    new LinkBox(
                        array(
                            "icon" => "purple-bulb.svg",
                            "title" => __("Request a feature", "superbaddons"),
                            "description" => __("We're always looking for ways to improve Superb Addons. If you have a feature request or suggestion, we'd love to hear from you.", "superbaddons"),
                            "cta" => __("Request feature", "superbaddons"),
                            "link" => "https://superbthemes.com/feature-request/",
                        )
                    );
                    new SupportLinkBoxes();
                    ?>
                </div>
            </div>
            <div class="superbaddons-admindashboard-sidebarlayout-right">
                <?php
                new PremiumBox();
                new ReviewBox();
                ?>
            </div>
        </div>
<?php
    }
}
