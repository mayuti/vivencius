<?php

namespace SuperbAddons\Components\Admin;

defined('ABSPATH') || exit();

use SuperbAddons\Data\Controllers\KeyController;

class PremiumBox
{
    public function __construct()
    {
        if (KeyController::HasPremiumKey()) {
            return;
        }
        $this->Render();
    }

    private function Render()
    {
?>
        <!-- Premium Box -->
        <div class="superbaddons-admindashboard-content-box">
            <img class="superbaddons-admindashboard-content-image" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/asset-small-pro.jpg'); ?>" />
            <div class="superbaddons-admindashboard-content-box-inner">
                <div class="superbaddons-element-text-center">
                    <span class="superbaddons-element-text-md superbaddons-element-text-800 superbaddons-element-text-dark"><?= esc_html__("Unlock All Features", "superbaddons"); ?></span>
                    <p class="superbaddons-element-text-xxs superbaddons-element-text-gray">
                        <?= esc_html__("No Hidden Fees • Money Back Guarantee", "superbaddons"); ?>
                    </p>
                    <a class="superbaddons-element-button-pro" target="_blank" href="https://superbthemes.com/superb-addons/"><?= esc_html__("Get Premium for $29", "superbaddons"); ?></a>
                </div>
                <span class="superbaddons-element-text-xs superbaddons-element-text-800 superbaddons-element-text-dark"><?= esc_html__("All this included", "superbaddons"); ?><img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/pointing_arrow.png'); ?>" /></span>
                <?php new PremiumFeatureList(); ?>
            </div>
        </div>
<?php
    }
}
