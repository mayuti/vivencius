<?php

namespace SuperbAddons\Components\Admin;

defined('ABSPATH') || exit();

class PremiumFeatureList
{
    private $Features;

    public function __construct()
    {
        $this->Features = array(
            __("1-Click Designs", "superbaddons"),
            __("Elementor Elements", "superbaddons"),
            __("250+ Elementor Sections", "superbaddons"),
            __("WordPress Sections", "superbaddons"),
            __("30+ WordPress Patterns", "superbaddons"),
            __("40+ WordPress Themes", "superbaddons"),
            __("6+ WordPress Blocks", "superbaddons"),
            __("Search Engine Optimized", "superbaddons"),
            __("Fully Responsive Designs", "superbaddons"),
            __("Ever-expanding Library", "superbaddons")
        );
        $this->Render();
    }

    private function Render()
    {
?>
        <ul class="superbaddons-admindashboard-feature-list">
            <?php foreach ($this->Features as $feature) : ?>
                <li class="superbaddons-element-text-xs superbaddons-element-text-gray"><img class="superbaddons-admindashboard-feature-list-checkmark" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/checkmark.svg'); ?>" /><?= esc_html($feature); ?></li>
            <?php endforeach; ?>
        </ul>
<?php
    }
}
