<?php

namespace SuperbAddons\Components\Admin;

use SuperbAddons\Admin\Controllers\DashboardController;
use SuperbAddons\Data\Controllers\KeyController;

defined('ABSPATH') || exit();

class Navigation
{
    private $pages;
    private $active_page;
    private $issue_detected = false;
    private $has_premium = false;

    public function __construct()
    {
        $HasRegisteredKey = KeyController::HasRegisteredKey();
        if ($HasRegisteredKey) {
            $this->has_premium = KeyController::HasPremiumKey();
            $KeyStatus = KeyController::GetKeyStatus();
            if (!$KeyStatus['active'] || $KeyStatus['expired'] || !$KeyStatus['verified']) {
                $this->issue_detected = true;
            }
        }

        $this->active_page = isset($_GET['page']) ? $_GET['page'] : DashboardController::DASHBOARD;
        $this->pages = array(
            DashboardController::MENU_SLUG => __("Dashboard", 'superbaddons'),
            DashboardController::ELEMENTOR_DASHBOARD => __("Elementor Addons", 'superbaddons'),
            DashboardController::GUTENBERG_DASHBOARD => __("Gutenberg Addons", 'superbaddons'),
            DashboardController::SETTINGS => __("Settings", 'superbaddons'),
            DashboardController::SUPPORT => __("Support", 'superbaddons'),
        );
        $this->Render();
    }

    private function Render()
    {
?>
        <div class="superbaddons-admindashboard-navigation">
            <div class="superbaddons-admindashboard-navigation-toplevel">
                <a href="<?= esc_url(admin_url('admin.php?page=' . DashboardController::MENU_SLUG)); ?>" class="superbaddons-admindashboard-navigation-logo-wrapper">
                    <img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/icon-superb.svg'); ?>" />
                    <span class="superbaddons-element-text-md superbaddons-element-text-800 superbaddons-element-text-dark">Superb Addons</span>
                </a>
                <div class="superbaddons-admindashboard-navigation-shortcuts">
                    <?php if (!$this->has_premium) : ?>
                        <a class="superbaddons-admindashboard-navigation-shortcuts-item" target="_blank" href="https://superbthemes.com/superb-addons/" title="<?= esc_attr__("Get Premium", "superbaddons"); ?>"><img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/color-crown.svg'); ?>" alt="<?= esc_attr__("Get Premium", "superbaddons"); ?>" /></a>
                    <?php endif; ?>
                    <a class="superbaddons-admindashboard-navigation-shortcuts-item" target="_blank" href="https://superbthemes.com/customer-support/" title="<?= esc_attr__("Contact Support", "superbaddons"); ?>"><img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/help.svg'); ?>" alt="<?= esc_attr__("Contact Support", "superbaddons"); ?>" /></a>
                    <a class="superbaddons-admindashboard-navigation-shortcuts-item" target="_blank" href="https://superbthemes.com/documentation/" title="<?= esc_attr__("View Documentation", "superbaddons"); ?>"><img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/file.svg'); ?>" alt="<?= esc_attr__("View Documentation", "superbaddons"); ?>" /></a>
                    <span class="superbaddons-admindashboard-navigation-shortcuts-item">
                        <?= esc_html(SUPERBADDONS_VERSION); ?>
                        <?php if ($this->has_premium) : ?>
                            <img class="superbaddons-element-ml1" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/purple-crown.svg'); ?>" alt="<?= esc_attr__("Premium License", "superbaddons"); ?>" />
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="superbaddons-admindashboard-navigation-bottomlevel">
                <?php foreach ($this->pages as $pagekey => $pagetitle) : ?>
                    <a href="<?= esc_url(admin_url('admin.php?page=' . $pagekey)); ?>" class="superbaddons-admindashboard-navigation-bottomlevel-item <?= $pagekey == $this->active_page ? 'superbaddons-admindashboard-active' : ''; ?>">
                        <?= esc_html($pagetitle); ?>
                        <?php
                        if ($pagekey == DashboardController::SETTINGS && $this->issue_detected) :
                            printf('<img class="superbaddons-admindashboard-navigation-bottomlevel-item-issue-img" src="%s" alt="%s"/>', esc_url(SUPERBADDONS_ASSETS_PATH . '/img/color-warning-octagon.svg'), esc_attr__("Issue Detected", "superbaddons"));
                        endif;
                        ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }
}
