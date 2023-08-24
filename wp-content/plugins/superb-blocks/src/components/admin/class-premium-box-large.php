<?php

namespace SuperbAddons\Components\Admin;

defined('ABSPATH') || exit();

use SuperbAddons\Data\Controllers\KeyController;

class PremiumBoxLarge
{
    public function __construct()
    {
        if (KeyController::HasPremiumKey()) {
            $this->RenderHasPremium();
            return;
        }

        $this->Render();
    }

    private function Render()
    {
?>
        <div class="superbaddons-admindashboard-content-box-large superbaddons-admindashboard-settings-premium-image-box-large superbaddons-admindashboard-content-box-large-connected-bottom" style="background-image:url(<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/asset-medium-pro.jpg'); ?>);">
            <div class="superbaddons-admindashboard-content-box-large-inner">
                <h3 class="superbaddons-element-text-md superbaddons-element-text-800 superbaddons-element-text-dark"><?= esc_html__("Premium Subscription", "superbaddons"); ?></h3>
                <p class="superbaddons-element-text-xs superbaddons-element-text-gray">
                    <?= esc_html__("You're currently on our free plan. Upgrade to premium and access all of the benefits for building top class websites.", "superbaddons"); ?>
                </p>
                <span class="superbaddons-element-text-xs superbaddons-element-text-800 superbaddons-element-text-dark"><?= esc_html__("All this included", "superbaddons"); ?><img src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/pointing_arrow.png'); ?>" /></span>
                <?php new PremiumFeatureList(); ?>
                <a class="superbaddons-element-button-pro" target="_blank" href="https://superbthemes.com/superb-addons/"><?= esc_html__("Upgrade to Premium", "superbaddons"); ?></a>
            </div>
        </div>
<?php
    }

    private function RenderHasPremium()
    {
        new ContentBoxLarge(
            array(
                "title" => __("Superb Addons Premium", "superbaddons"),
                "description" => __("You're currently on our premium plan. Please contact us if you're in need of assistance. Thank you for your support!", "superbaddons"),
                "image" => "asset-medium-pro.jpg",
                "connected_bottom" => true,
                "class" => 'superbaddons-admindashboard-settings-premium-image-box-large'
            )
        );
    }
}
