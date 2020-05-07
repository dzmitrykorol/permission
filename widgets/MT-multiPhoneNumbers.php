<?php
/**
 * Created by PhpStorm.
 * User: dmitry.korol
 * Date: 10-Jun-19
 * Time: 13:33
 */

namespace ElementorWidgetExtender\Widgets;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class MT_multiPhoneNumbers extends Widget_Base
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
        return 'mt-multi-phone-numbers';
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
        return __('[Master Template] Multi Phone Numbers ', 'elementor-header-bullet');
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
    public function get_script_depends()
    {
        return ['elementor-hello-world'];
    }

    private function get_available_menus()
    {
        $menus = wp_get_nav_menus();

        $options = [];

        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }

        return $options;
    }


    public function handle_sub_menu_classes($classes)
    {
        $classes[] = 'elementor-nav-menu--dropdown';

        return $classes;
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
    public $theme_path = '';

    public function get_menu()
    {
        $settings = $this->get_settings_for_display();
        $available_menus = $this->get_available_menus();

        if (!$available_menus) {
            return;
        }

        $args = [
            'echo' => false,
            'menu' => $settings['menu'],
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => '',
            'container' => '',
        ];

        // Add custom filter to handle Nav Menu HTML output.
        add_filter('nav_menu_submenu_css_class', [$this, 'handle_sub_menu_classes']);
        add_filter('nav_menu_item_id', '__return_empty_string');

        // General Menu.
        $menu_html = wp_nav_menu($args);
        // Remove all our custom filters.
        remove_filter('nav_menu_submenu_css_class', [$this, 'handle_sub_menu_classes']);
        remove_filter('nav_menu_item_id', '__return_empty_string');

        if (empty($menu_html)) {
            return;
        } else {
            return $menu_html;
        }
    }

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
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Logo', 'elementor-header-bullet'),
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => 'Choose Your Logo',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ]
            ]
        );

        $menus = $this->get_available_menus();

        if (!empty($menus)) {
            $this->add_control(
                'menu',
                [
                    'label' => __('Menu', 'elementor-pro'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $menus,
                    'default' => array_keys($menus)[0],
                    'save_default' => true,
                    'separator' => 'after',
                    'description' => sprintf(__('Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'elementor-pro'), admin_url('nav-menus.php')),
                ]
            );
        } else {
            $this->add_control(
                'menu',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(__('<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'elementor-pro'), admin_url('nav-menus.php?action=edit&menu=0')),
                    'separator' => 'after',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        $this->end_controls_section();

        // repeater for footer starts
        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __('Tab navs', 'elementor'),
            ]
        );

        // repeater for clinic name and phones ends
        $repeater = new Repeater();

        $repeater->add_control(
            'nav_one',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'nav_two',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'nav_full',
            [
                'label' => __('Nav Menu tabs', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'nav_one' => __('Clinic name #1', 'elementor'),
                        'nav_two' => __('(123) 456-7890', 'elementor')
                    ],
                    [
                        'nav_one' => __('Clinic name #2', 'elementor'),
                        'nav_two' => __('(123) 456-7890', 'elementor')
                    ],
                ],
                'title_field' => 'Location section',
            ]
        );
        $this->end_controls_section();
        // repeater for clinic name and phones ends

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
        $settings = $this->get_settings_for_display();
        $tabs = $this->get_settings_for_display('nav_full');
        $main_menu = $this->get_menu();
//        dd($tabs);
        ?>
        <header class="multi-phones-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clinic-main-section">
                            <div class="clinic-contact-us-sec">
                                <span>Contact Us</span>
                                <span><i class="fa fa-angle-down"></i></span>
                            </div>
                            <div class="clinic-phones">
                                <?php
                                foreach ($tabs as $tab) {
                                    $phoneNumber = $tab['nav_two'];
                                    $clearPhoneNumner = preg_replace('/[^0-9]/', '', $tab['nav_two']);
                                    if ($tab['nav_one'] || $tab['nav_two']) { ?>
                                        <div class="clinic-section">
                                            <span class="clinic-name"><?php echo $tab['nav_one'] ?></span>
                                            <span class="clinic-phone"><a
                                                        href="tel:<?php echo $clearPhoneNumner ?>"><?php echo $phoneNumber ?></a></span>
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="top-header">
                            <div class="logo">
                                <a href="/"><img
                                            src="<?php echo $settings['logo']['url']; ?>" alt="Logo" title="logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-menu">
                            <input type="checkbox" id="check-menu">
                            <label for="check-menu"></label>
                            <div class="burger-line first"></div>
                            <div class="burger-line second"></div>
                            <div class="burger-line third"></div>
                            <div class="burger-line fourth"></div>
                            <nav class="main-menu contactus-sec" <?php echo $this->get_render_attribute_string('main-menu'); ?>>
                                <?php echo $main_menu ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script
                src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
                crossorigin="anonymous"></script>
        <script>
            let rotation = 0;

            $.fn.rotate = function (degrees) {
                $(this).css({'transform': 'rotate(' + degrees + 'deg)'});
                return $(this);
            };

            $('.clinic-contact-us-sec').click(function () {
                rotation += 180;
                $('.fa-angle-down').rotate(rotation);
            });

            $(document).ready().on('click', '.clinic-contact-us-sec', function () {
                $('.clinic-phones').toggle('show');
            })
        </script>
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
        view.addInlineEditingAttributes( 'logo', 'none' );
        #>

        <header class="multi-phones-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clinic-main-section">
                            <div class="clinic-contact-us-sec">
                                <span>Contact Us</span>
                                <span><i class="fa fa-angle-down"></i></span>
                            </div>
                            <div class="clinic-phones">
                                <# if ( settings.nav_full.length ) { #>
                                <# _.each( settings.nav_full, function( tab ) { #>
                                <div class="clinic-section">
                                    <span class="clinic-name">{{{ tab.nav_one }}}</span>
                                    <span class="clinic-phone"><a
                                                href="tel:{{{ tab.nav_two }}}">{{{ tab.nav_two }}}</a></span>
                                </div>
                                <# }); #>
                                <# } #>
                            </div>
                        </div>
                        <div class="top-header">
                            <div class="logo">
                                <a href="/"><img
                                            src="{{{ view.getRenderAttributeString('logo') }}}" alt="Logo" title="logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-menu">
                            <input type="checkbox" id="check-menu">
                            <label for="check-menu"></label>
                            <div class="burger-line first"></div>
                            <div class="burger-line second"></div>
                            <div class="burger-line third"></div>
                            <div class="burger-line fourth"></div>
                            <nav class="main-menu contactus-sec"
                                 {{{ view.getRenderAttributeString('logo') }}}
<!--                            --><?php //echo $main_menu ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
}