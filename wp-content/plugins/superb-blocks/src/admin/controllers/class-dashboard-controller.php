<?php

namespace SuperbAddons\Admin\Controllers;

defined('ABSPATH') || exit();

use SuperbAddons\Admin\Pages\DashboardPage;
use SuperbAddons\Admin\Pages\ElementorDashboardPage;
use SuperbAddons\Admin\Pages\GutenbergDashboardPage;
use SuperbAddons\Admin\Pages\SettingsPage;
use SuperbAddons\Admin\Pages\SupportPage;
use SuperbAddons\Components\Admin\FeedbackModal;
use SuperbAddons\Config\Capabilities;
use SuperbAddons\Data\Controllers\RestController;

use SuperbAddons\Components\Admin\Navigation;
use SuperbAddons\Data\Controllers\KeyController;
use SuperbAddons\Elementor\Controllers\ElementorController;
use SuperbAddons\Gutenberg\Controllers\GutenbergController;

class DashboardController
{
    const MENU_SLUG = 'superbaddons';
    const DASHBOARD = 'dashboard';
    const ELEMENTOR_DASHBOARD = 'superbaddons-element-dashboard';
    const GUTENBERG_DASHBOARD = 'superbaddons-gutenberg-dashboard';
    const SETTINGS = 'superbaddons-settings';
    const SUPPORT = 'superbaddons-support';

    const PREMIUM_CLASS = 'superbaddons-get-premium';

    private $hooks;

    public function __construct()
    {
        new SettingsController();
        new TroubleshootingController();
        $this->hooks = array();
        add_action("admin_menu", array($this, 'SuperbAddonsAdminMenu'));
        add_filter('plugin_action_links_' . SUPERBADDONS_BASE, array($this, 'PluginActions'));
        add_action('admin_enqueue_scripts', array($this, 'AdminMenuEnqueues'), 1000);
        if (!KeyController::HasPremiumKey()) {
            add_action("admin_head", array($this, 'AdminMenuHighlightScripts'));
        }
    }


    public function PluginActions($actions)
    {
        $added_actions = array(
            "<a href='" . esc_url(admin_url("admin.php?page=" . self::MENU_SLUG)) . "'>" . esc_html__('Dashboard', 'superbaddons') . "</a>",
            "<a href='" . esc_url(admin_url("admin.php?page=" . self::SETTINGS)) . "'>" . esc_html__('Settings', 'superbaddons') . "</a>",
            "<a href='" . esc_url(admin_url("admin.php?page=" . self::SUPPORT)) . "'>" . esc_html__('Support', 'superbaddons') . "</a>"
        );
        $actions = array_merge($added_actions, $actions);
        if (!KeyController::HasPremiumKey()) {
            $actions[] = "<a href='" . esc_url("https://superbthemes.com/superb-addons/") . "' class='" . self::PREMIUM_CLASS . "' target='_blank'>" . esc_html__('Get Premium', 'superbaddons') . "</a>";
        }
        return $actions;
    }

    public function SuperbAddonsAdminMenu()
    {
        add_menu_page(esc_html__('Superb Addons', 'superbaddons'), esc_html__('Superb Addons', 'superbaddons') . $this->GetAdminMenuNotification(), Capabilities::CONTRIBUTOR, self::MENU_SLUG, array($this, 'SuperbDashboard'), SUPERBADDONS_ASSETS_PATH . '/img/icon-superb-dashboard-menu.png', '58.6');
        $this->hooks[self::DASHBOARD] = add_submenu_page(self::MENU_SLUG, esc_html__('Superb Addons - Dashboard', 'superbaddons'), esc_html__('Dashboard', 'superbaddons'), Capabilities::CONTRIBUTOR, self::MENU_SLUG);
        $this->hooks[self::ELEMENTOR_DASHBOARD] = add_submenu_page(self::MENU_SLUG, esc_html__('Superb Addons - Elementor', 'superbaddons'), esc_html__('Elementor Addons', 'superbaddons'), Capabilities::CONTRIBUTOR, self::ELEMENTOR_DASHBOARD, array($this, 'ElementorDashboard'));
        $this->hooks[self::GUTENBERG_DASHBOARD] = add_submenu_page(self::MENU_SLUG, esc_html__('Superb Addons - Gutenberg', 'superbaddons'), esc_html__('Gutenberg Addons', 'superbaddons'), Capabilities::CONTRIBUTOR, self::GUTENBERG_DASHBOARD, array($this, 'GutenbergDashboard'));
        $this->hooks[self::SETTINGS] = add_submenu_page(self::MENU_SLUG, esc_html__('Superb Addons - Settings', 'superbaddons'), esc_html__('Settings', 'superbaddons') . $this->GetAdminMenuNotification(), Capabilities::ADMIN, self::SETTINGS, array($this, 'Settings'));
        $this->hooks[self::SUPPORT] = add_submenu_page(self::MENU_SLUG, esc_html__('Superb Addons - Get Help', 'superbaddons'), esc_html__('Get Help', 'superbaddons'), Capabilities::CONTRIBUTOR, self::SUPPORT, array($this, 'Support'));
    }

    private function GetAdminMenuNotification()
    {
        $HasRegisteredKey = KeyController::HasRegisteredKey();
        if ($HasRegisteredKey) {
            $KeyStatus = KeyController::GetKeyStatus();
            if (!$KeyStatus['active'] || $KeyStatus['expired'] || !$KeyStatus['verified']) {
                return sprintf('<span class="update-plugins count-1"><span class="plugin-count" aria-hidden="true">1</span><span class="screen-reader-text">%s</span></span>', esc_html__("Issue Detected", "superbaddons"));
            }
        }

        return;
    }

    public function AdminMenuHighlightScripts()
    {
?>
        <style>
            tbody#the-list .<?= self::PREMIUM_CLASS ?> {
                color: #4312E2;
                font-weight: 900;
            }
        </style>
    <?php
    }

    public function AdminMenuEnqueues($page_hook)
    {
        if ($page_hook === 'plugins.php') {
            wp_enqueue_style(
                'superb-addons-elements',
                SUPERBADDONS_ASSETS_PATH . '/css/framework.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
            wp_enqueue_style(
                'superb-addons-font-manrope',
                SUPERBADDONS_ASSETS_PATH . '/fonts/manrope/manrope.css',
                array(),
                SUPERBADDONS_VERSION
            );
            wp_enqueue_style(
                'superb-addons-admin-modal',
                SUPERBADDONS_ASSETS_PATH . '/css/admin-modal.min.css',
                array(),
                SUPERBADDONS_VERSION
            );

            wp_enqueue_script('superb-addons-feedback', SUPERBADDONS_ASSETS_PATH . '/js/admin/deactivate-feedback.js', array('jquery'), SUPERBADDONS_VERSION, true);
            wp_localize_script('superb-addons-feedback', 'superbaddonssettings_g', array(
                "plugin" => plugin_basename(SUPERBADDONS_BASE),
                "rest" => array(
                    "base" => \get_rest_url(),
                    "namespace" => RestController::NAMESPACE,
                    "nonce" => wp_create_nonce("wp_rest"),
                    "routes" => array(
                        "settings" => SettingsController::SETTINGS_ROUTE,
                    )
                )
            ));
            add_action('admin_footer', function () {
                new FeedbackModal();
            });
            return;
        }

        if (!in_array($page_hook, array_values($this->hooks))) {
            return;
        }
        wp_enqueue_style(
            'superb-addons-admin-dashboard',
            SUPERBADDONS_ASSETS_PATH . '/css/admin-dashboard.min.css',
            array(),
            SUPERBADDONS_VERSION
        );
        wp_enqueue_style(
            'superb-addons-elements',
            SUPERBADDONS_ASSETS_PATH . '/css/framework.min.css',
            array(),
            SUPERBADDONS_VERSION
        );
        wp_enqueue_style(
            'superb-addons-font-manrope',
            SUPERBADDONS_ASSETS_PATH . '/fonts/manrope/manrope.css',
            array(),
            SUPERBADDONS_VERSION
        );

        if ($page_hook === $this->hooks[self::SUPPORT]) {
            wp_enqueue_script('superb-addons-troubleshooting', SUPERBADDONS_ASSETS_PATH . '/js/admin/troubleshooting.js', array('jquery', 'wp-i18n'), SUPERBADDONS_VERSION, true);
            wp_localize_script('superb-addons-troubleshooting', 'superbaddonstroubleshooting_g', array(
                "rest" => array(
                    "base" => \get_rest_url(),
                    "namespace" => RestController::NAMESPACE,
                    "nonce" => wp_create_nonce("wp_rest"),
                    "routes" => array(
                        "troubleshooting" => TroubleshootingController::TROUBLESHOOTING_ROUTE,
                        "tutorial" => TroubleshootingController::TUTORIAL_ROUTE,
                    )
                ),
                "steps" => array(
                    "wordpressversion" => array(
                        "title" => esc_html__("WordPress Version", "superbaddons"),
                        "text" => esc_html__("Checking Compatibility", "superbaddons"),
                        "errorText" => esc_html__("Incompatible. Please update WordPress.", "superbaddons"),
                        "successText" => esc_html__("Compatible", "superbaddons"),
                    ),
                    "elementorversion" => array(
                        "title" => esc_html__("Elementor Version", "superbaddons"),
                        "text" => esc_html__("Checking Compatibility", "superbaddons"),
                        "errorText" => esc_html__("Incompatible. Please install or update Elementor.", "superbaddons"),
                        "successText" => esc_html__("Compatible", "superbaddons"),
                    ),
                    "connection" => array(
                        "title" => esc_html__("Connection Status", "superbaddons"),
                        "text" => esc_html__("Checking Connection", "superbaddons"),
                        "errorText" => esc_html__("No Connection", "superbaddons"),
                        "successText" => esc_html__("Connected", "superbaddons"),
                    ),
                    "domainshift" => array(
                        "title" => esc_html__("Connection Update", "superbaddons"),
                        "text" => esc_html__("Trying New Connection", "superbaddons"),
                        "errorText" => esc_html__("Connection Blocked", "superbaddons"),
                        "successText" => esc_html__("Connected", "superbaddons"),
                    ),
                    "service" => array(
                        "title" => esc_html__("Service Status", "superbaddons"),
                        "text" => esc_html__("Checking Service", "superbaddons"),
                        "errorText" => esc_html__("Service Unavailable", "superbaddons"),
                        "successText" => esc_html__("Service Online", "superbaddons"),
                    ),
                    "keycheck" => array(
                        "title" => esc_html__("License Key Status", "superbaddons"),
                        "text" => esc_html__("Checking License Key", "superbaddons"),
                        "errorText" => esc_html__("Invalid License Key", "superbaddons"),
                        "successText" => esc_html__("Valid License Key", "superbaddons"),
                    ),
                    "keyverify" => array(
                        "title" => esc_html__("License Key Verification", "superbaddons"),
                        "text" => esc_html__("Re-verifying License Key", "superbaddons"),
                        "errorText" => esc_html__("License could not be verified", "superbaddons"),
                        "successText" => esc_html__("License Key Verified", "superbaddons"),
                    ),
                    "cacheclear" => array(
                        "title" => esc_html__("Cache Status", "superbaddons"),
                        "text" => esc_html__("Clearing Cache", "superbaddons"),
                        "errorText" => esc_html__("Cache could not be cleared", "superbaddons"),
                        "successText" => esc_html__("Cache Cleared", "superbaddons"),
                    )
                )
            ));
            add_action("admin_footer", array($this, 'TroubleshootingTemplates'));
            wp_enqueue_style(
                'superb-addons-admin-modal',
                SUPERBADDONS_ASSETS_PATH . '/css/admin-modal.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
            wp_enqueue_style(
                'superbaddons-js-snackbar',
                SUPERBADDONS_ASSETS_PATH . '/lib/js-snackbar.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
        } elseif ($page_hook === $this->hooks[self::SETTINGS]) {
            wp_enqueue_style(
                'superb-addons-admin-modal',
                SUPERBADDONS_ASSETS_PATH . '/css/admin-modal.min.css',
                array(),
                SUPERBADDONS_VERSION
            );

            wp_enqueue_script('superb-addons-settings', SUPERBADDONS_ASSETS_PATH . '/js/admin/settings.js', array('jquery'), SUPERBADDONS_VERSION, true);
            wp_localize_script('superb-addons-settings', 'superbaddonssettings_g', array(
                "save_message" => esc_html__("Settings saved successfully.", "superbaddons"),
                "modal" => array(
                    "cache" => array(
                        "title" => esc_html__("Clear Cache", "superbaddons"),
                        "content" => esc_html__("All element- data and images will need to be loaded again if the cache is removed. This should only be done if you are experiencing issues or planning to delete the plugin. Are you sure you want to clear the cache?", "superbaddons"),
                        "success" => esc_html__("Cache cleared successfully.", "superbaddons")
                    ),
                    "view_logs" => array(
                        "title" => esc_html__("Error Log", "superbaddons"),
                        "no_logs" => esc_html__("No errors have been logged.", "superbaddons"),
                        "icon_unshared" => esc_url(SUPERBADDONS_ASSETS_PATH . "/img/cloud-slash.svg"),
                        "unshared_title" => esc_html__("Error Log Not Shared", "superbaddons"),
                        "icon_shared" => esc_url(SUPERBADDONS_ASSETS_PATH . "/img/cloud-check.svg"),
                        "shared_title" => esc_html__("Error Log Shared", "superbaddons"),
                    ),
                    "clear_logs" => array(
                        "title" => esc_html__("Clear Logs", "superbaddons"),
                        "content" => esc_html__("Error Logs are used for debugging purposes and help improve the plugin when shared with our support team and developers. Are you sure you want to clear the error logs?", "superbaddons"),
                        "success" => esc_html__("Error logs cleared successfully.", "superbaddons")
                    ),
                    "remove_key" => array(
                        "title" => esc_html__("Remove License Key", "superbaddons"),
                        "content" => esc_html__("Are you sure you want to remove your license key from this website?", "superbaddons"),
                    )
                ),
                "rest" => array(
                    "base" => \get_rest_url(),
                    "namespace" => RestController::NAMESPACE,
                    "nonce" => wp_create_nonce("wp_rest"),
                    "routes" => array(
                        "settings" => SettingsController::SETTINGS_ROUTE,
                    )
                )
            ));
            wp_enqueue_style(
                'superbaddons-js-snackbar',
                SUPERBADDONS_ASSETS_PATH . '/lib/js-snackbar.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
        } elseif ($page_hook === $this->hooks[self::ELEMENTOR_DASHBOARD] || $page_hook === $this->hooks[self::GUTENBERG_DASHBOARD]) {
            $library_loader_file = $page_hook === $this->hooks[self::ELEMENTOR_DASHBOARD] ? 'elementor' : 'gutenberg';
            $menu_items = $page_hook === $this->hooks[self::ELEMENTOR_DASHBOARD] ? ElementorController::GetElementorLibraryMenuItems() : GutenbergController::GetGutenbergLibraryMenuItems();


            wp_enqueue_script('superb-addons-select2', SUPERBADDONS_ASSETS_PATH . '/lib/select2.min.js', array('jquery'), SUPERBADDONS_VERSION, true);
            wp_enqueue_script('superb-addons-library-dashboard', SUPERBADDONS_ASSETS_PATH . '/js/admin/' . $library_loader_file . '.js', array('jquery'), SUPERBADDONS_VERSION, true);
            wp_localize_script('superb-addons-library-dashboard', 'superblayoutlibrary_g', array(
                "style_placeholder" => esc_html__('All themes', 'superbaddons'),
                "category_placeholder" => esc_html__('All categories', 'superbaddons'),
                "snacks" => array(
                    "list_error" => esc_html__('Something went wrong while attempting to list elements. Please try again or contact support if the problem persists.', 'superbaddons')
                ),
                "menu_items" => $menu_items,
                "rest" => array(
                    "base" => \get_rest_url(),
                    "namespace" => RestController::NAMESPACE,
                    "nonce" => wp_create_nonce("wp_rest"),
                    "routes" => array(
                        "settings" => SettingsController::SETTINGS_ROUTE,
                    )
                )
            ));

            wp_enqueue_style(
                'superb-elementor-editor-layout-library',
                SUPERBADDONS_ASSETS_PATH . '/css/layout-library-editor.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
            wp_enqueue_style(
                'superbaddons-select2',
                SUPERBADDONS_ASSETS_PATH . '/lib/select2.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
            wp_enqueue_style(
                'superbaddons-js-snackbar',
                SUPERBADDONS_ASSETS_PATH . '/lib/js-snackbar.min.css',
                array(),
                SUPERBADDONS_VERSION
            );
        }
    }

    public function TroubleshootingTemplates()
    {
        ob_start();
        include(SUPERBADDONS_PLUGIN_DIR . 'src/admin/templates/troubleshooting-step.php');
        $template = ob_get_clean();
        echo '<script type="text/template" id="tmpl-superb-addons-troubleshooting-step">' . $template . '</script>';
    }

    public function SuperbDashboard()
    {
        $this->DashboardPageSetup(DashboardPage::class);
    }

    public function ElementorDashboard()
    {
        $this->DashboardPageSetup(ElementorDashboardPage::class);
    }

    public function GutenbergDashboard()
    {
        $this->DashboardPageSetup(GutenbergDashboardPage::class);
    }

    public function Support()
    {
        $this->DashboardPageSetup(SupportPage::class);
    }

    public function Settings()
    {
        $this->DashboardPageSetup(SettingsPage::class);
    }

    private function DashboardPageSetup($page_class)
    {
    ?>
        <div class="superbaddons-wrap">
            <?php new Navigation(); ?>
            <div class="superbaddons-wrap-inner">
                <?php new $page_class(); ?>
            </div>
        </div>
<?php
    }
}
