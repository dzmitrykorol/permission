<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class MT_header extends Widget_Base
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
        return 'mt-header';
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
        return __('[Master Template] Header ', 'elementor-header-bullet');
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


        // repeater for contacts starts
        $this->start_controls_section(
            'contacts_section',
            [
                'label' => __('Contacts list', 'elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'contacts_address',
            [
                'label' => __( 'Enter your address and phone', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Your address..', 'elementor' ),
                'placeholder' => __( 'Your address', 'elementor' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'contacts_phone',
            [
                'label' => __( 'Content', 'elementor' ),
                'default' => __( '(123)456-7890', 'elementor' ),
                'placeholder' => __( 'Your phone number', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'contacts_list',
            [
                'label' => __('Contacts Repeater', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'contacts_address' => __('Address #1', 'elementor'),
                        'contacts_phone' => __('Phone #1', 'elementor')
                    ],
                    [
                        'contacts_address' => __('Address #2', 'elementor'),
                        'contacts_phone' => __('Phone #2', 'elementor')
                    ]
                ],
                'title_field' => '{{{ contacts_address }}}'
            ]
        );

        $this->end_controls_section();
        // repeater for contacts ends


        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Content Style', 'elementor-hello-world'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => 'Header Address Typography',
                'name' => 'header_address_typography',
                'selector' => '{{WRAPPER}} .address span',
            ]
        );

        $this->add_control(
            'haddress_color',
            [
                'label' => __('Header Address Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .address span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => 'Header Phone Typography',
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .phone-number span',
            ]
        );

        $this->add_control(
            'hphone_color',
            [
                'label' => __('Header Phone Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .phone-number span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => 'Header Menu Typography',
                'name' => 'headermenu_typography',
                'selector' => '{{WRAPPER}} .header-menu nav ul li a',
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => __('Header Menu Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-menu nav ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label' => __('Header Line Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-menu nav ul li a:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

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

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('logo_link', 'none');
        $company_contacts = $this->get_settings_for_display('contacts_list');
        $main_menu = $this->get_menu();
        // TODO: move css and js file below to functions.php
        ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/owl/assets/owl.carousel.min.css">
        <link rel="stylesheet"
              href="<?php echo get_template_directory_uri(); ?>/libs/owl/assets/owl.theme.default.min.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-header">
                            <div class="logo">
                                <a href="/"><img
                                            src="<?php echo $settings['logo']['url']; ?>" alt="Logo" title="logo"></a>
                            </div>
                            <?php
                            foreach ($company_contacts as $company_contact) { ?>
                                <div class="header-contacts">
                                    <div class="address">
                                        <a target="_blank" href="https://maps.google.com/maps?q=<?php echo $company_contact['contacts_address']; ?>" title="See on Google Maps">
                                    <span>
                                        <?php echo $company_contact['contacts_address']; ?>
                                    </span>
                                        </a>
                                    </div>
                                    <div class="phone-number">
                                        <a href="tel:<?php echo $company_contact['contacts_phone']; ?>" class="call-icon">
                                            <span><?php echo $company_contact['contacts_phone']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
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
                            <nav class="main-menu" <?php echo $this->get_render_attribute_string('main-menu'); ?>>
                                <?php echo $main_menu ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="sec-contacts">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        foreach ($company_contacts as $company_contact) { ?>
                            <div class="header-contacts-mobile">
                                <div class="address-mobile">
                                    <a href="https://maps.google.com/maps?q=<?php echo $company_contact['contacts_address']; ?>" title="See on Google Maps">
                                    <span>
                                        <?php echo $company_contact['contacts_address']; ?>
                                    </span>
                                    </a>
                                </div>
                                <div class="phone-number-mobile">
                                    <a href="tel:<?php echo $company_contact['contacts_phone']; ?>" class="call-icon">
                                        <span><?php echo $company_contact['contacts_phone']; ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
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

}
