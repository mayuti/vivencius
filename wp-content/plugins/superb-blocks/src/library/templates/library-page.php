<?php
defined('ABSPATH') || exit();

use SuperbAddons\Components\Badges\AvailableBadge;
use SuperbAddons\Components\Badges\PremiumBadge;
use SuperbAddons\Components\Buttons\InsertButton;
use SuperbAddons\Components\Buttons\PremiumButton;
use SuperbAddons\Components\Buttons\PreviewButton;
?>

<div class="superb-addons-template-library-wrapper-overlay"></div>
<div class="superb-addons-template-library-page-frame">
    <div class="superb-addons-template-library-page-header">
        <div class="superb-addons-template-library-page-header-logo-area">
            <div class="superb-addons-template-library-page-header-logo">
                <img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/icon-superb.svg'); ?>" />
                <span class="superbaddons-element-text-md superbaddons-element-text-800 superbaddons-element-text-dark">Superb Addons</span>
            </div>
        </div>
        <div class="superb-addons-template-library-page-header-items-area">
            <div class="superb-addons-template-library-close-btn"><img src="<?= SUPERBADDONS_ASSETS_PATH . "/img/x.svg"; ?>" alt="<?= esc_attr__("Close", "superbaddons"); ?>" /></div>
        </div>
    </div>
    <div class="superb-addons-template-library-page-content">
        <div class="superb-addons-template-library-page-content-inner" style="display:none;">
            <div id="superb-addons-template-library-header-menu">
                <div class="superb-addons-template-library-header-menu-item"><?= esc_html__('Menu Item', 'superbaddons'); ?></div>
            </div>
            <div class="superb-addons-template-library-page-content-inner-menu">
                <div class="superb-addons-template-library-page-content-inner-menu-left">
                    <div id="superb-addons-template-library-page-search-wrapper">
                        <label for="superb-addons-template-library-page-search-input"><img src="<?= SUPERBADDONS_ASSETS_PATH . "/img/magnifying-glass.svg"; ?>" /></label>
                        <input id="superb-addons-template-library-page-search-input" type="text" placeholder="<?= esc_attr__('Search', 'superbaddons'); ?>" />
                    </div>
                </div>
                <div class="superb-addons-template-library-page-content-inner-menu-right">
                    <div class="superb-addons-template-library-page-select-wrapper">
                        <select id="superb-addons-template-library-page-category-select">
                        </select>
                    </div>
                    <div class="superb-addons-template-library-page-select-wrapper">
                        <select id="superb-addons-template-library-page-style-select">
                        </select>
                    </div>
                </div>
            </div>
            <div class="superb-addons-template-library-page-content-list">
                <div class="superb-addons-template-library-page-content-inner-list">
                    <!-- JS -->
                </div>
                <div class="superb-addons-template-library-page-content-inner-list-footer">
                    <img src="<?= SUPERBADDONS_ASSETS_PATH . "/img/icon-superb.svg"; ?>" />
                    <div class="superb-addons-template-library-footer-excerpt">
                        <?= sprintf(esc_html__('Stay tuned! More awesome %s coming real soon ✌️', 'superbaddons'), '<span></span>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="superb-addons-loading">
            <div class="superb-addons-loader-wrapper">
                <div class="superbaddons-spinner-wrapper">
                    <img class="spbaddons-spinner" src="<?= SUPERBADDONS_ASSETS_PATH ?>/img/blocks-spinner.svg" />
                </div>
                <div class="superbaddons-loading-title superbaddons-element-text-dark superbaddons-element-text-800 superbaddons-element-text-md"><?= esc_html__("Loading", 'superbaddons'); ?></div>
            </div>
        </div>
    </div>
    <div class="superb-addons-template-library-preview-wrapper" style="display:none;">
        <div class="superb-addons-template-library-preview-overlay"></div>
        <div class="superb-addons-template-library-preview-modal">
            <div class="superb-addons-template-library-preview-header">
                <span class="superb-addons-template-library-preview-title superbaddons-element-text-lg superbaddons-element-text-dark superbaddons-element-text-800"></span>
                <?php new PremiumBadge(); ?>
                <div id="superb-addons-template-library-preview-close-button" class="superb-addons-template-library-button superb-addons-template-library-button-secondary"><img src="<?= SUPERBADDONS_ASSETS_PATH . "/img/x.svg"; ?>" alt="<?= esc_attr__("Close", "superbaddons"); ?>" /></div>
            </div>
            <div class="superb-addons-template-library-preview-modal-content">
                <div class="superb-addons-template-library-preview-top">
                    <div class="superb-addons-template-library-preview-left">
                        <p><?= esc_html__('This preview is an image.', 'superbaddons'); ?> <span clsas="superb-addons-template-library-preview-left-livepreview-explain" style="display:none;"><?= esc_html__('To see the element live, click the "Live Preview" button.', 'superbaddons'); ?></span></p>
                        <span class="superbaddons-element-text-xxs superbaddons-element-text-gray"><?= esc_html__("Please note that colors and other aspects may vary slightly depending on your current theme.") ?></span>
                    </div>
                    <div class="superb-addons-template-library-preview-right">
                        <?php
                        new PreviewButton(__("Live Preview", "superbaddons"), '_blank');
                        new AvailableBadge();
                        new PremiumButton();
                        new InsertButton();
                        ?>
                    </div>
                </div>
            </div>
            <div class="superb-addons-template-library-preview-image-wrapper">
                <img id="superb-addons-template-library-preview" />
                <div class="superbaddons-spinner-wrapper" style="display:none;">
                    <img class="spbaddons-spinner" src="<?= SUPERBADDONS_ASSETS_PATH ?>/img/blocks-spinner.svg" />
                </div>
            </div>
        </div>
    </div>
</div>