<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class BlogTotallyAllArticlesPage extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'blog-totally-all-articles-page';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('[D.Korol] Blog Totally All Articles Page Widget', 'elementor-header-bullet');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-posts-ticker';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
//    public function get_script_depends() {
//        return [ 'elementor-hello-world' ];
//    }


    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {

        // repeater for footer starts
        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __('Tab categories', 'elementor'),
            ]
        );

        // repeater for clinic name and phones ends
        $repeater = new Repeater();

        $repeater->add_control(
            'cat_name',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'cat_url',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::URL,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'cat_all',
            [
                'label' => __('Nav Menu tabs', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'cat_name' => __('Category 1', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                    [
                        'cat_name' => __('Category 2', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                    [
                        'cat_name' => __('Category 3', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                ],
                'title_field' => 'Location section',
            ]
        );
        $this->end_controls_section();
        // repeater for clinic name and phones ends

        $this->end_controls_section();
    }


    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */

    protected function render()
    {
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('background_image', 'none');
        $this->add_inline_editing_attributes('background_video', 'none');
        $this->add_inline_editing_attributes('leadText', 'none');
        ?>

        <div class="secondary-nav">
            <nav>
                <div class="secondary-hamburger" data-formenu="secondary">
                    <svg class="icon-large-close" width="29px" height="29px" viewBox="0 0 29 29" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g class="fill-group" transform="translate(-756.000000, -951.000000)" fill-rule="nonzero">
                                <g transform="translate(756.000000, 951.000000)">
                                    <polygon
                                            points="28.8 1.836 26.964 0 14.4 12.564 1.836 0 0 1.836 12.564 14.4 0 26.964 1.836 28.8 14.4 16.236 26.964 28.8 28.8 26.964 16.236 14.4"></polygon>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <svg class="icon-secondary-hamburger" width="34px" height="21px" viewBox="0 0 34 21">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-638.000000, -953.000000)" fill="#0C0C0C">
                                <g transform="translate(638.000000, 953.000000)">
                                    <g>
                                        <rect x="0" y="2.84217094e-14" width="34" height="3" rx="1"></rect>
                                        <rect x="0" y="9" width="25" height="3" rx="1"></rect>
                                        <rect x="0" y="18" width="31" height="3" rx="1"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <ul class="secondary-nav-blog" data-menu="secondary" data-for-tabs="secondary">
                    <?php
                    $pageCategories = get_pages([
                        'parent' => 5690,
                        'exclude' => [5922, 5928, 5931, 5947],
                    ]);

                    foreach ($pageCategories as $key => $value) { ?>
                        <li><a href="#category-<?php echo $key+1 ?>" class="tab-selector"
                               data-tab-selector="category-<?php echo $key+1 ?>"><?php echo $value->post_title; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

        <div class="tabs" data-tabs="secondary">
            <div data-tab="blog" class="blog active" id="blog">
                <div class="hero">
                    <div class="columnar">
                        <div class="breadcrumbs columns-twelve">
                            <a href="/">Home</a>
                            /
                            <a href="/blog"><span>Blog</span></a>
                            /
                            <span>All Articles</span>
                        </div>
                        <div class="columns-twelve">
                            <h1>All Articles</h1>
                        </div>

                    </div>
                </div>
                <div class="columnar category-item first">

                    <div class="blog-col-wrap columns-twelve">

                        <?php
                        $pages = get_pages([
                            'sort_order' => 'ASC',
                            'sort_column' => 'date',
                            'hierarchical' => 0,
                            'parent' => [5782, 5699, 5785, 5786, 5787, 5788, 5789],
//                            'number' => 3,
                            'post_type' => 'page',
                            'post_status' => 'publish',
                        ]);

                        foreach ($pages as $page) {
                            $parts = parse_url($page->guid);
                            parse_str($parts['query'], $query);
                            $id = $query['page_id'];
                            ?>
                            <div class="columns-blog">
                                <div class="blog-card card">
                                    <div class="blog-card-thumb"><img
                                                src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                    </div>
                                    <div class="blog-card-desc">
                                        <div class="blog-card-cat">
                                            <?php echo get_the_title($page->post_parent); ?>
                                        </div>
                                        <div class="blog-card-excerpt">
                                            <?php echo $page->post_title; ?>
                                        </div>
                                        <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                            Read More
                                            <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <?php
            foreach ($pageCategories as $key => $pageCategory) {
                $categoryPages = get_pages(
                    [
                        'child_of' => $pageCategory->ID,
                    ]
                );
                ?>
                <div data-tab="category-<?php echo $key+1 ?>" class="category">
                    <div class="hero">
                        <div class="columnar">
                            <div class="breadcrumbs columns-twelve">
                                <a href="/">Home</a>
                                /
                                <a href="/blog">Blog</a>
                                /
                                <span><?php echo $pageCategory->post_title; ?></span>
                            </div>
                            <div class="columns-twelve">
                                <h1><?php echo $pageCategory->post_title; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="columnar category-item first">
                        <div class="blog-col-wrap columns-twelve">
                            <?php
                            // get pages of category
                            foreach ($categoryPages as $categoryPage) {
                                $pageId = $categoryPage->ID;
                                ?>
                                <div class="columns-blog">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb">
                                            <img src="<?php echo get_the_post_thumbnail_url($categoryPage->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($categoryPage->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $categoryPage->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($pageId); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    // hide temporarily by check on no-existing var
                    $empty = '';

                    if ($empty) { ?>
                        <div class="columnar">
                            <div class="card blog-newsletter columns-twelve">
                                <div class="">
                                    <h2 class="centered-text">
                                        Get our newsletter in your inbox Monday through Friday.
                                    </h2>
                                </div>
                                <div class="blog-newsletter-email">
                                    <div class="text-input marketing with-button">
                                        <input type="text" class="small-copy" placeholder="Email Address">
                                        <label>Email Address</label>
                                        <button class="salmon marketing">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columnar">
                            <div class="columns-twelve">
                                <div class="pagination">
                                    <a href="#" class="active">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">
                                        <img src="<?php echo $path; ?>/assets/icons/chevron-down.svg" alt="chevron">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>

        <?php
    }

    /**
     * Render the widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _content_template()
    {
        ?>

        <#
        view.addInlineEditingAttributes( 'promopart', 'none' );
        view.addInlineEditingAttributes( 'form_id', 'none' );
        view.addInlineEditingAttributes( 'use_video', 'none' );
        view.addInlineEditingAttributes( 'background_image', 'none' );
        view.addInlineEditingAttributes( 'background_video', 'none' );
        view.addInlineEditingAttributes( 'leadText', 'none' );
        view.addInlineEditingAttributes( 'paragraphtext', 'none' );
        view.addInlineEditingAttributes( 'leadbutton', 'none' );
        #>

        <section class="sec-home-img <# if (settings.use_video === 'yes') { #>style=height:unset<# } #>">
            <# if (settings.use_video === 'yes') { #>
            <div class="fullscreen-bg">
                <video loop muted autoplay poster="{{{ settings.background_image.url }}}" class="fullscreen-bg__video">
                    <source src="{{{ settings.background_video }}}" type="video/mp4">
                </video>
            </div>
            <div class="container hide">
                <div class="row wrapper">
                    <div class="row wrapper">
                        <div class="col-6 promopart">
                            {{{ settings.promopart }}}
                        </div>
                        <div class="col-6 leadform">
                            Here will be placed your form after save and refresh the page
                        </div>
                    </div>
                </div>
            </div>
            <# } else { #>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-home">
                            <h1 class="title"><span {{{ view.getRenderAttributeString('leadText') }}}>{{{
                                settings.leadText }}}</span></h1>
                            <h2 class="sub-title"><span {{{ view.getRenderAttributeString('paragraphtext') }}}>{{{
                                settings.paragraphtext }}}</span></h2>
                            <button {{{ view.getRenderAttributeString(
                            'leadbutton') }}}>{{{ settings.leadbutton }}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <# }#>
        </section>
        <?php
    }
}
