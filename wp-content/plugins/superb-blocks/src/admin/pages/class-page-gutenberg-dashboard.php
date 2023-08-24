<?php

namespace SuperbAddons\Admin\Pages;

defined('ABSPATH') || exit();

use SuperbAddons\Components\Admin\ContentBoxLarge;
use SuperbAddons\Components\Admin\PremiumBox;
use SuperbAddons\Components\Admin\ReviewBox;
use SuperbAddons\Components\Admin\SupportLinkBoxes;
use SuperbAddons\Gutenberg\Controllers\GutenbergController;
use SuperbAddons\Library\Controllers\LibraryController;

class GutenbergDashboardPage
{
    private $IsWordPressCompatible;

    public function __construct()
    {
        add_action('admin_footer', array($this, 'LibraryTemplate'));
        $this->IsWordPressCompatible = GutenbergController::is_compatible();
        $this->Render();
    }

    public function LibraryTemplate()
    {
        LibraryController::InsertTemplates();
    }

    private function Render()
    {
        if (!$this->IsWordPressCompatible) {
            new ContentBoxLarge(
                array(
                    "title" => __("We're sorry, but it looks like your WordPress version is outdated.", "superbaddons"),
                    "description" => __("Superb Addons requires a newer version of WordPress to provide all of its features. We recommend updating WordPress to the latest version to take advantage of the latest security patches, bug fixes, and improvements. Once your WordPress version is up-to-date, you'll be able to use Superb Addons to its full potential and create stunning pages with ease.", "superbaddons"),
                    "image" => "asset-medium-gutenberg.jpg",
                    "icon" => "logo-gutenberg.svg",
                    "cta" => __("Update WordPress", "superbaddons"),
                    "link" => admin_url("update-core.php"),
                    "class" => 'superbaddons-admindashboard-gutenberg-image-box-large'
                )
            );
            return;
        }
?>
        <div id="superbaddons-gutenberg-is-active-wrapper">
            <!-- Gutenberg Addons -->
            <?php new ContentBoxLarge(
                array(
                    "title" => __("Gutenberg Addons", "superbaddons"),
                    "description" => __("Unlock the true power of the WordPress editor with Superb Addons. Get access to over 500 patterns, blocks, sections and search engine optimized themes for every type of website.", "superbaddons"),
                    "image" => "asset-medium-gutenberg.jpg",
                    "icon" => "logo-gutenberg.svg",
                    "class" => 'superbaddons-admindashboard-gutenberg-image-box-large'
                )
            );
            ?>
        </div>
        <div id="spbaddons-admindashboard-library-wrapper" class="spbaddons-admindashboard-library-wrapper">
        </div>
        <div class="superbaddons-admindashboard-sidebarlayout">
            <div class="superbaddons-admindashboard-sidebarlayout-left">
                <!-- Rating Block -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("Rating Block", "superbaddons"),
                        "description" => __("With this easy-to-use block, you can easily add your own ratings with bars and stars to your posts and pages. Simple to customize and style to match your website's look and feel.", "superbaddons"),
                        "image" => "asset-medium-review.jpg",
                        "icon" => "purple-star.svg",
                        "cta" => __("Go to Posts", "superbaddons"),
                        "link" => admin_url("edit.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box'
                    )
                );
                ?>
                <!-- About the Author Block -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("About the Author Block", "superbaddons"),
                        "description" => __("Whether you're a blogger, journalist, or content creator, the Superb About the Author block is an essential tool for establishing your online presence and building a connection with your audience. Try it out and make your author bio stand out today!", "superbaddons"),
                        "image" => "asset-medium-authorbox.jpg",
                        "icon" => "purple-identification-badge.svg",
                        "cta" => __("Go to Posts", "superbaddons"),
                        "link" => admin_url("edit.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box'
                    )
                );
                ?>
                <!-- Table of Contents Block -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("Table of Contents Block", "superbaddons"),
                        "description" => __("Automatically generates a list of headings and subheadings and makes it easy for your readers to navigate your content. Try it out and make your long-form content more accessible!", "superbaddons"),
                        "image" => "asset-medium-tableofcontent.jpg",
                        "icon" => "purple-list-bullets.svg",
                        "cta" => __("Go to Posts", "superbaddons"),
                        "link" => admin_url("edit.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box'
                    )
                );
                ?>
                <!-- Recent Posts Block -->
                <?php
                $is_using_block_theme = function_exists("wp_is_block_theme") && wp_is_block_theme();
                new ContentBoxLarge(
                    array(
                        "title" => __("Recent Posts Block", "superbaddons"),
                        "description" => __("Quickly add a customizable list of your latest posts to any page, post or widget space. The Superb Recent Posts block is a great tool for keeping your readers up-to-date with your latest content and driving traffic to your website.", "superbaddons"),
                        "image" => "asset-medium-recentposts.jpg",
                        "icon" => "purple-note.svg",
                        "cta" =>  $is_using_block_theme ? __("Go to Editor", "superbaddons") : __("Go to Widgets", "superbaddons"),
                        "link" => $is_using_block_theme ? admin_url("site-editor.php") : admin_url("widgets.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box superbaddons-admindashboard-gutenberg-block-box-recent-posts'
                    )
                );
                ?>
                <!-- Google Maps Block -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("Google Maps Block", "superbaddons"),
                        "description" => __("Easily integrate interactive Google Maps into any page, post, or widget space. Showcase your business location and beyond with this powerful and user-friendly tool.", "superbaddons"),
                        "image" => "asset-large-superbmaps.jpg",
                        "icon" => "purple-pin.svg",
                        "cta" => __("Go to Posts", "superbaddons"),
                        "link" => admin_url("edit.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box superbaddons-admindashboard-gutenberg-block-box-maps'
                    )
                );
                ?>
                <!-- Cover Image Block -->
                <?php new ContentBoxLarge(
                    array(
                        "title" => __("Cover Image Block", "superbaddons"),
                        "description" => __("Create striking headers and hero sections effortlessly with this user-friendly block. Add captivating cover images to your pages and posts, grabbing your audience's attention from the get-go.", "superbaddons"),
                        "image" => "asset-large-superbcover.jpg",
                        "icon" => "purple-image.svg",
                        "cta" => __("Go to Posts", "superbaddons"),
                        "link" => admin_url("edit.php"),
                        "class" => 'superbaddons-admindashboard-gutenberg-block-box superbaddons-admindashboard-gutenberg-block-box-cover'
                    )
                );
                ?>
                <!-- Link Boxes -->
                <div class="superbaddons-admindashboard-linkbox-wrapper">
                    <?php
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
