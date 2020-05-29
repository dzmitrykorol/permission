<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class BlogFooter extends Widget_Base {

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
        return 'blog-footer';
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
        return __( '[D.Korol] Blog Footer Widget', 'elementor-header-bullet' );
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
        ?>
        <footer>
            <div class="columnar">
                <div class="columns-twelve">
                    <img src="<?php echo $path; ?>/assets/logo-permission.svg" class="permission-logo">
                </div>
            </div>
            <div class="columnar no-collapse">
                <div class="columns-three">
                    <h2>Product</h2>
                    <ul>
                        <li><a href="https://shopping.permission.io" target="_blank">Marketplace BETA</a></li>
                        <li><a href="https://permission.io/shop-with-ask" target="_blank">Shop With ASK</a></li>
                        <li><a href="https://permission.io/privacy-policy" target="_blank">Privacy Policy</a></li>
                        <li><a href="https://permission.io/tos" target="_blank">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="columns-four-three">
                    <h2>Resources</h2>
                    <ul>
                        <li><a href="https://cdn.permission.io/about/Permission-Foundation-Technical-Whitepaper.pdf" target="_blank">Whitepaper</a></li>
                        <li><a href="https://permission.io/technology" target="_blank">Technology</a></li>
                        <li><a href="https://permission.io/team" target="_blank">An Exceptional Team</a></li>
                        <li><a href="https://permission.io/careers" target="_blank">Careers</a></li>
                        <li><a href="https://permission.io/news" target="_blank">In The News</a></li>
                        <li><a href="https://permission.io/faqs" target="_blank">FAQs</a></li>
                        <li><a href="https://support.permission.io" target="_blank">Support</a></li>
                    </ul>
                </div>
                <?php
                // hide temporarily by check on no-existing var
                $empty = '' ?>


                <div class="columns-eight-five news-updates">
                    <?php
                    if ($empty) { ?>
                        <h2>Get News and Updates</h2>
                        <div class="text-input marketing with-button">
                            <input type="text" class="small-copy" placeholder="Email Address">
                            <label>Email Address</label>
                            <button class="bright-blue marketing">Submit</button>
                        </div>
                    <?php } ?>
                    <h2>Connect</h2>
                    <div class="social-icons">
                        <a href="https://twitter.com/permissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/twitter.svg"></a>
                        <a href="https://www.facebook.com/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/facebook.svg"></a>
                        <a href="https://medium.com/permissionio" class="medium" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/medium.svg"></a>
                        <a href="https://www.reddit.com/r/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/telegram.svg"></a>
                        <a href="https://www.reddit.com/r/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/reddit.svg"></a>
                        <a href="https://www.linkedin.com/company/permission-io/" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/linkedin.svg"></a>
                        <a href="https://permission.gitlab.io/" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/gitlab.svg"></a>
                    </div>
                </div>


            </div>
            <div class="columnar">
                <div class="columns-twelve copyright" style="text-align: center;font-size: 14px;">
                    Copyright Ⓒ <?php echo date('Y'); ?> Permission.io <span class="divider">| </span><span class="trademark">Permission® is a registered trademark of Permission.io</span>
                </div>
            </div>
        </footer>
        <script src="<?php echo $path; ?>/assets/js/permissionbase.js" type="text/javascript"></script>
        </body>
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
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        ?>

        <#
        #>
        <footer>
            <div class="columnar">
                <div class="columns-twelve">
                    <img src="<?php echo $path; ?>/assets/logo-permission.svg" class="permission-logo">
                </div>
            </div>
            <div class="columnar no-collapse">
                <div class="columns-three">
                    <h2>Product</h2>
                    <ul>
                        <li><a href="https://shopping.permission.io" target="_blank">Marketplace BETA</a></li>
                        <li><a href="https://permission.io/shop-with-ask" target="_blank">Shop With ASK</a></li>
                        <li><a href="https://permission.io/privacy-policy" target="_blank">Privacy Policy</a></li>
                        <li><a href="https://permission.io/tos" target="_blank">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="columns-four-three">
                    <h2>Resources</h2>
                    <ul>
                        <li><a href="https://cdn.permission.io/about/Permission-Foundation-Technical-Whitepaper.pdf" target="_blank">Whitepaper</a></li>
                        <li><a href="https://permission.io/technology" target="_blank">Technology</a></li>
                        <li><a href="https://permission.io/team" target="_blank">An Exceptional Team</a></li>
                        <li><a href="https://permission.io/careers" target="_blank">Careers</a></li>
                        <li><a href="https://permission.io/news" target="_blank">In The News</a></li>
                        <li><a href="https://permission.io/faqs" target="_blank">FAQs</a></li>
                        <li><a href="https://support.permission.io" target="_blank">Support</a></li>
                    </ul>
                </div>
                <?php
                // hide temporarily by check on no-existing var
                $empty = '' ?>


                <div class="columns-eight-five news-updates">
                    <?php
                    if ($empty) { ?>
                        <h2>Get News and Updates</h2>
                        <div class="text-input marketing with-button">
                            <input type="text" class="small-copy" placeholder="Email Address">
                            <label>Email Address</label>
                            <button class="bright-blue marketing">Submit</button>
                        </div>
                    <?php } ?>
                    <h2>Connect</h2>
                    <div class="social-icons">
                        <a href="https://twitter.com/permissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/twitter.svg"></a>
                        <a href="https://www.facebook.com/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/facebook.svg"></a>
                        <a href="https://medium.com/permissionio" class="medium" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/medium.svg"></a>
                        <a href="https://www.reddit.com/r/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/telegram.svg"></a>
                        <a href="https://www.reddit.com/r/PermissionIO" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/reddit.svg"></a>
                        <a href="https://www.linkedin.com/company/permission-io/" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/linkedin.svg"></a>
                        <a href="https://permission.gitlab.io/" target="_blank"><img
                                    src="https://cdn.permission.io/apps/permissionbase/assets/logos/gitlab.svg"></a>
                    </div>
                </div>


            </div>
            <div class="columnar">
                <div class="columns-twelve copyright" style="text-align: center;font-size: 14px;">
                    Copyright Ⓒ <?php echo date('Y'); ?> Permission.io <span class="divider">| </span><span class="trademark">Permission® is a registered trademark of Permission.io</span>
                </div>
            </div>
        </footer>
        <script src="<?php echo $path; ?>/assets/js/permissionbase.js" type="text/javascript"></script>
        </body>
        <?php
    }
}
