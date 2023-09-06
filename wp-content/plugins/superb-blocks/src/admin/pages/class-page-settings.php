<?php

namespace SuperbAddons\Admin\Pages;

defined('ABSPATH') || exit();

use SuperbAddons\Admin\Controllers\DashboardController;
use SuperbAddons\Admin\Controllers\SettingsController;
use SuperbAddons\Components\Admin\InputCheckbox;
use SuperbAddons\Components\Admin\Modal;
use SuperbAddons\Components\Admin\PremiumBoxLarge;
use SuperbAddons\Data\Controllers\KeyController;

use SuperbAddons\Components\Admin\ReviewBox;
use SuperbAddons\Components\Admin\SupportLinkBoxes;
use SuperbAddons\Data\Controllers\CompatibilitySettingsOptionKey;
use SuperbAddons\Data\Controllers\SettingsOptionKey;

class SettingsPage
{
    private $HasRegisteredKey = false;
    private $KeyTypeLabel = false;
    private $KeyStatus = false;
    private $Settings = false;
    private $Incompatibilities = false;
    private $CompatibilitySettings = false;

    public function __construct()
    {
        $this->HasRegisteredKey = KeyController::HasRegisteredKey();
        if ($this->HasRegisteredKey) {
            $this->KeyTypeLabel = KeyController::GetCurrentKeyTypeLabel();
            $this->KeyStatus = KeyController::GetKeyStatus();
        }

        $this->Settings = SettingsController::GetSettings();

        $this->Incompatibilities = SettingsController::GetRelevantCompatibilitySettings();
        if (count($this->Incompatibilities) > 0) {
            $this->CompatibilitySettings = SettingsController::GetCompatibilitySettings();
        }

        $this->Render();
    }

    private function Render()
    {
?>
        <div class="superbaddons-admindashboard-sidebarlayout">
            <div class="superbaddons-admindashboard-sidebarlayout-left">
                <?php
                new PremiumBoxLarge();
                ?>
                <div class="superbaddons-license-key-wrapper">
                    <?php if ($this->HasRegisteredKey) : ?>
                        <div class="superbaddons-license-key-body">
                            <?php $this->MaybeDisplayKeyIssue(); ?>
                            <p class="superbaddons-element-text-sm"><?= esc_html__('Current License: ', 'superbaddons'); ?><span class="superbaddons-element-text-md"><?= esc_html($this->KeyTypeLabel); ?></span></p>
                            <button id="spbaddons-license-remove-btn" class="superbaddons-element-button spbaddons-admin-btn-danger" type="button"><!-- JS Overwrites --><?= esc_html__('Remove License Key', 'superbaddons'); ?></button>
                        </div>
                    <?php else : ?>
                        <div class="superbaddons-license-key-body superbaddons-license-key-body-flex">
                            <div class="superbaddons-license-key-input-wrapper">
                                <img class="spbaddons-license-result-icon spbaddons-license-error" src="<?= SUPERBADDONS_ASSETS_PATH ?>/img/color-warning-octagon.svg" style="display:none;" />
                                <input id="superbaddons-license-key-input" type="text" placeholder="XXXXX-XXXXX-XXXXX-XXXXX" maxlength="23" />
                            </div>
                            <button id="spbaddons-license-submit-btn" class="superbaddons-element-button" type="button" disabled><?= esc_html__('Add License Key', 'superbaddons'); ?></button>
                        </div>
                    <?php endif; ?>
                    <div class="superbaddons-spinner-wrapper" style="display:none;">
                        <img class="spbaddons-spinner" src="<?= SUPERBADDONS_ASSETS_PATH ?>/img/blocks-spinner.svg" />
                    </div>
                </div>
                <div class="superbaddons-additional-content-wrapper">
                    <h4 class="superbaddons-element-text-sm superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-m0"><?= esc_html__("Settings", "superbaddons"); ?></h4>
                    <p class="superbaddons-element-text-xs superbaddons-element-text-gray "><?= esc_html__("Manage your settings for Superb Addons.", "superbaddons"); ?></p>

                    <!-- Cache Settings -->
                    <h5 class="superbaddons-element-flex-center superbaddons-element-text-xs superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-m0"><img class="superbaddons-admindashboard-content-icon superbaddons-element-mr1" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/purple-database.svg'); ?>" /><?= esc_html__("Cache", "superbaddons"); ?></h5>
                    <p class="superbaddons-element-text-xxs superbaddons-element-text-gray superbaddons-element-mb1"><?= esc_html__("Superb Addons caches data for faster loading and processing. Clearing the cache will force data and images to be refreshed and reloaded. If you are not experiencing any problems with the plugin, the cache should not be cleared.", "superbaddons"); ?></p>
                    <button type="button" class="superbaddons-element-button spbaddons-admin-btn-danger superbaddons-element-m0 superbaddons-element-mb1" id="superbaddons-clear-cache-btn"><img class="superbaddons-element-button-icon" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/trash-light.svg'); ?>" /><?= esc_html__("Clear Cache", "superbaddons"); ?></button>
                    <div class="superbaddons-element-separator"></div>

                    <!-- Error Logs Settings -->
                    <h5 class="superbaddons-element-flex-center superbaddons-element-text-xs superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-mb1"><img class="superbaddons-admindashboard-content-icon superbaddons-element-mr1" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/purple-bug.svg'); ?>" /><?= esc_html__("Error Logs", "superbaddons"); ?></h5>
                    <?php new InputCheckbox('superbaddons-enable-logs-input', SettingsOptionKey::LOGS_ENABLED, __("Enable Error Logs", "superbaddons"), __("If issues or errors occur in the plugin when this setting is enabled, the error messages will be logged and can be viewed and shared with our support team and developers."), $this->Settings[SettingsOptionKey::LOGS_ENABLED]); ?>
                    <div class="superbaddons-maybe-hide-element" <?= $this->Settings[SettingsOptionKey::LOGS_ENABLED] ? '' : 'style="display:none;"'; ?>>
                        <?php new InputCheckbox('superbaddons-share-logs-input', SettingsOptionKey::LOG_SHARE_ENABLED, __("Share Error Logs", "superbaddons"), __("When this setting is enabled, error logs will be shared anonymously with our support team and developers to help improve the plugin. Only the error messages shown in the error logs will be shared."), $this->Settings[SettingsOptionKey::LOG_SHARE_ENABLED], '/img/cloud-arrow-up.svg'); ?>
                    </div>
                    <button type="button" class="superbaddons-element-button superbaddons-element-mr1" id="superbaddons-view-logs-btn"><img class="superbaddons-element-button-icon" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/list-magnifying-glass.svg'); ?>" /><?= esc_html__("View Logs", "superbaddons"); ?></button>
                    <button type="button" class="superbaddons-element-button spbaddons-admin-btn-danger" id="superbaddons-clear-logs-btn"><img class="superbaddons-element-button-icon" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/trash-light.svg'); ?>" /><?= esc_html__("Clear Logs", "superbaddons"); ?></button>

                    <!-- Compatibility Settings -->
                    <?php if (count($this->Incompatibilities) > 0) : ?>
                        <div class="superbaddons-element-separator"></div>
                        <h5 class="superbaddons-element-flex-center superbaddons-element-text-xs superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-mb1"><img class="superbaddons-admindashboard-content-icon superbaddons-element-mr1" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/purple-plugs.svg'); ?>" /><?= esc_html__("Compatibility", "superbaddons"); ?></h5>
                        <?php if (isset($this->Incompatibilities[CompatibilitySettingsOptionKey::SPECTRA_BLOCK_SPACING])) :
                            new InputCheckbox('superbaddons-spectra-compat', CompatibilitySettingsOptionKey::SPECTRA_BLOCK_SPACING, __("Fix Block Spacing", "superbaddons"), __("The Spectra plugin features an option to apply a fixed block spacing between all blocks while in the editor. Unfortunately this option overrides custom block spacing and can result in blocks and patterns appearing strange in the editor. When this setting is enabled, custom block spacing will appear correctly in the editor."), $this->CompatibilitySettings[CompatibilitySettingsOptionKey::SPECTRA_BLOCK_SPACING]);
                        endif; ?>
                    <?php endif; ?>
                </div>
                <div class="superbaddons-admindashboard-linkbox-wrapper">
                    <?php new SupportLinkBoxes(); ?>
                </div>
            </div>
            <div class="superbaddons-admindashboard-sidebarlayout-right">
                <?php new ReviewBox(); ?>
            </div>
        </div>
        <?php new Modal(); ?>
    <?php
    }

    private function MaybeDisplayKeyIssue()
    {
        if (!$this->KeyStatus['expired'] && $this->KeyStatus['active'] && $this->KeyStatus['verified']) {
            return;
        }
    ?>
        <div class="spbaddons-license-issue-wrapper">
            <?php printf('<img src="%s" alt="%s"/>', esc_url(SUPERBADDONS_ASSETS_PATH . '/img/color-warning-octagon.svg'), esc_attr__("Issue Detected", "superbaddons")); ?>
            <p>
                <?php
                if (
                    $this->KeyStatus['expired']
                ) {
                    esc_html_e('It looks like your subscription has expired. Please renew your subscription or contact support for assistance.', 'superbaddons');
                } elseif (
                    !$this->KeyStatus['active']
                ) {
                    esc_html_e('It looks like your license key has been disabled. Please contact support for assistance.', 'superbaddons');
                } elseif (
                    !$this->KeyStatus['verified']
                ) {
                    esc_html_e('It seems that your license key verification for this website is no longer valid. Please click the button below to head to the support section and get started with the troubleshooting process.', 'superbaddons');
                }
                ?>
            </p>
            <?php
            if (!$this->KeyStatus['verified']) : ?>
                <a href="<?= esc_url(admin_url('admin.php?page=' . DashboardController::SUPPORT)); ?>" class="superbaddons-element-button">
                    <?= esc_html__("Go to Troubleshooting page"); ?>
                </a>
            <?php endif; ?>
        </div>
<?php
    }
}
