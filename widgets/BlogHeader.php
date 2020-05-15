<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class BlogHeader extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'blog-header';
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
    public function get_title() {
        return __( '[D.Korol] Blog Header Widget', 'elementor-header-bullet' );
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
    public function get_icon() {
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
    public function get_categories() {
        return [ 'general' ];
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

    protected function render() {
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'paragraphText', 'none' );
        ?>
        <link href="/wp-content/plugins/elementor-custom-widgets/base.css" rel="stylesheet">
        <body class="body-blog">
        <div class="menu-overlay"></div>
        <header>
            <div class="primary-nav">
                <nav>
                    <div class="logo">
                        <a href="/"><img src="<?php echo $path; ?>/assets/logo-permission.svg"></a>
                    </div>
                    <ul data-menu="primary">
                        <li class="mobile-only"><a href="https://my.permission.io" target="_blank">Log In</a></li>
                        <li class="mobile-only"><a href="https://my.permission.io/signup" target="_blank">Sign Up</a></li>
                        <li><a href="/">Developers</a></li>
                        <li><a href="https://permission.io/shop-with-ask" target="_blank">Shop with ASK</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="https://permission.gitlab.io/blockchain/testnet.html" target="_blank">Docs</a></li>
                        <li class="submenu" data-formenu="about"><div>About<svg width="11px" height="9px" viewBox="0 0 11 9" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g class="fill-group" transform="translate(-684.000000, -355.000000)" fill-rule="nonzero">
                                            <g transform="translate(684.000000, 355.000000)">
                                                <polygon points="5.5 9 0.736861 0.749999 10.2631 0.75"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <ul data-menu="about">
                                <li><a href="https://permission.io/leaders" target="_blank">Team</a></li>
                                <li><a href="https://permission.io/partners" target="_blank">Partners</a></li>
                                <li><a href="https://permission.io/wp-content/uploads/2020/01/Permission-Foundation-Technical-Whitepaper_012920.pdf" target="_blank">Whitepaper</a></li>
                                <li><a href="https://permission.io/technology" target="_blank">Patents</a></li>
                            </ul>
                        </li>
                        <li class="submenu" data-formenu="languages" class="language-selector">
                            <div class="no-desktop">Languages</div>
                            <img src="<?php echo $path; ?>/assets/icons/flag-us.png" class="current-language">
                            <svg width="11px" height="9px" viewBox="0 0 11 9" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g class="fill-group" transform="translate(-684.000000, -355.000000)" fill-rule="nonzero">
                                        <g transform="translate(684.000000, 355.000000)">
                                            <polygon points="5.5 9 0.736861 0.749999 10.2631 0.75"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <ul data-menu="languages">
                                <li><a href="" ><img src="<?php echo $path; ?>/assets/icons/flag-us.png" data-language="cn">English</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="https://my.permission.io/login" class="link-button marketing log-in" target="_blank">Log In</a>
                    <a href="https://my.permission.io/signup" class="link-button knockout marketing sign-up" target="_blank">Sign Up</a>
                    <div class="flex align-items-center hamburger">
                        <svg data-menu-close="primary" class="icon-large-close" width="29px" height="29px" viewBox="0 0 29 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-group" transform="translate(-756.000000, -951.000000)" fill-rule="nonzero">
                                    <g transform="translate(756.000000, 951.000000)" class="fill-group">
                                        <polygon points="28.8 1.836 26.964 0 14.4 12.564 1.836 0 0 1.836 12.564 14.4 0 26.964 1.836 28.8 14.4 16.236 26.964 28.8 28.8 26.964 16.236 14.4"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <svg class="icon-hamburger" width="34px" height="29px" viewBox="0 0 34 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-formenu="primary">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-59.000000, -951.000000)">
                                    <g transform="translate(59.000000, 951.000000)">
                                        <g>
                                            <rect class="hamburger-1" x="0" y="4" width="34" height="3" rx="1"></rect>
                                            <rect class="hamburger-2" x="0" y="13" width="34" height="3" rx="1"></rect>
                                            <rect class="hamburger-3" x="0" y="22" width="34" height="3" rx="1"></rect>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </nav>
            </div>
        </header>
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
    protected function _content_template() {
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
                            <h1 class="title"><span {{{ view.getRenderAttributeString('leadText') }}}>{{{ settings.leadText }}}</span></h1>
                            <h2 class="sub-title"><span {{{ view.getRenderAttributeString('paragraphtext') }}}>{{{ settings.paragraphtext }}}</span></h2>
                            <button {{{ view.getRenderAttributeString('leadbutton') }}}>{{{ settings.leadbutton }}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <# }#>
        </section>
        <?php
    }
}
