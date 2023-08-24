<?php

namespace SuperbAddons\Components\Admin;

defined('ABSPATH') || exit();

class LinkBox
{
    private $title = false;
    private $description = false;
    private $link = false;
    private $cta = false;
    private $icon = false;
    private $pro = false;

    public function __construct($options)
    {
        $this->title = $options['title'] ?? false;
        $this->description = $options['description'] ?? false;
        $this->link = $options['link'] ?? false;
        $this->cta = $options['cta'] ?? false;
        $this->icon = $options['icon'] ?? false;
        $this->pro = $options['pro'] ?? false;

        $this->Render();
    }

    private function Render()
    {
?>
        <div class="superbaddons-admindashboard-content-box">
            <div class="superbaddons-admindashboard-link-box-inner">
                <?php if ($this->pro) : ?>
                    <span class="superbaddons-element-pro-badge"><?= esc_html__("Premium", "superbaddons"); ?></span>
                <?php endif; ?>
                <img class="superbaddons-admindashboard-content-icon superbaddons-element-mb1" src="<?= esc_url(SUPERBADDONS_ASSETS_PATH . '/img/' . $this->icon); ?>" />
                <h4 class="superbaddons-element-text-md superbaddons-element-text-800 superbaddons-element-text-dark superbaddons-element-m0"><?= esc_html($this->title); ?> </h4>
                <p class="superbaddons-element-text-xxs superbaddons-element-text-gray">
                    <?= esc_html($this->description); ?>
                </p>
                <?php if ($this->cta && $this->link) : ?>
                    <a target="_blank" class="<?= $this->pro ? 'superbaddons-element-button-pro' : 'superbaddons-element-colorlink'; ?> superbaddons-element-text-xs" href="<?= esc_url($this->link); ?>"><?= esc_html($this->cta); ?></a>
                <?php endif; ?>
            </div>
        </div>
<?php
    }
}
