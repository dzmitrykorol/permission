<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
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
class MT_Footer extends Widget_Base
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
    return 'mt-footer';
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
    return __('[Master Template] Footer ', 'elementor-header-bullet');
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

    // image in footer starts
    $this->start_controls_section(
        'section_content',
        [
            'label' => __('Logo', 'elementor-header-bullet'),
        ]
    );

    $this->add_control(
        'locationimage',
        [
            'label' => 'Choose Location Image',
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
        ]
    );

    $this->end_controls_section();
    // image in footer ends


    // styles starts
    $this->start_controls_section(
        'section_style',
        [
            'label' => __('Content Style', 'elementor-hello-world'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'label' => 'Location Header Typography',
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} h2.title',
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => __('Location Header Color', 'elementor'),
            'type' => Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} h2.title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'label' => 'Location Description Typography',
            'name' => 'description_typography',
            'selector' => '{{WRAPPER}} .description',
        ]
    );

    $this->add_control(
        'description_color',
        [
            'label' => __('Location Description Color', 'elementor'),
            'type' => Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .description' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();
    // styles ends

    // repeater for footer starts
    $this->start_controls_section(
        'section_tabs',
        [
            'label' => __('Tab navs', 'elementor'),
        ]
    );

    $repeater = new Repeater();

    // left part of bottom nav starts
    $repeater->add_control(
        'nav_one',
        [
            'label' => __('Enter text..', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
        ]
    );

    $this->add_control(
        'nav_one_full',
        [
            'label' => __('Nav Menu Items', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'nav_one' => __('Item #1', 'elementor')
                ],
                [
                    'nav_one' => __('Item #2', 'elementor')
                ],
            ],
            'title_field' => '{{{ nav_one }}}',
        ]
    );
    $this->end_controls_section();
    // left part of bottom nav ends


    //////////////////////////////////////////////////////////////////////////////////////////

    // company title starts
    $this->start_controls_section(
        'company_name_section',
        [
            'label' => __('Company Name', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'nav_company_name',
        [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Default title', 'elementor'),
            'placeholder' => __('Type your title here', 'elementor'),
        ]
    );

    $this->end_controls_section();
    // company title ends

    //////////////////////////////////////////////////////////////////////////////////////////

    // repeater for address starts
    $this->start_controls_section(
        'address_section',
        [
            'label' => __('Address list', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'address_list', [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('List Title', 'elementor'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'address_lists',
        [
            'label' => __('Repeater List', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'address_list' => __('Title #1', 'elementor')
                ]
            ],
            'title_field' => '{{{ address_list }}}'
        ]
    );

    $this->end_controls_section();
    // repeater for address ends


    //////////////////////////////////////////////////////////////////////////////////////////

    // repeater for phone number starts
    $this->start_controls_section(
        'phone_section',
        [
            'label' => __('Phone numbers list', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'phone_number_list', [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('List Title', 'elementor'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'phone_number_lists',
        [
            'label' => __('Repeater List', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'phone_number_list' => __('Title #1', 'elementor')
                ]
            ],
            'title_field' => '{{{ phone_number_list }}}'
        ]
    );

    $this->end_controls_section();
    // repeater for phone number ends

    //////////////////////////////////////////////////////////////////////////////////////////

    // repeater for schedule starts
    $this->start_controls_section(
        'schedule_section',
        [
            'label' => __('Working hours', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'schedule_list', [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('List Title', 'elementor'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'schedule_lists',
        [
            'label' => __('Repeater List', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'schedule_list' => __('Title #1', 'elementor')
                ]
            ],
            'title_field' => '{{{ schedule_list }}}'
        ]
    );

    $this->end_controls_section();
    // repeater for schedule ends


    //////////////////////////////////////////////////////////////////////////////////////////

    // repeater for terms starts
    $this->start_controls_section(
        'terms_section',
        [
            'label' => __('Terms and ect', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'terms_list', [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('List Title', 'elementor'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'terms_lists',
        [
            'label' => __('Repeater List', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'terms_list' => __('Title #1', 'elementor')
                ]
            ],
            'title_field' => '{{{ terms_list }}}'
        ]
    );

    $this->end_controls_section();
    // repeater for terms ends


    //////////////////////////////////////////////////////////////////////////////////////////

    // repeater for appointment starts
    $this->start_controls_section(
        'set_appointment_section',
        [
            'label' => __('Appointment section', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'set_appointment_list', [
            'label' => __('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => __('List Title', 'elementor'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'set_appointment_lists',
        [
            'label' => __('Repeater List', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'set_appointment_list' => __('Title #1', 'elementor')
                ]
            ],
            'title_field' => '{{{ set_appointment_list }}}'
        ]
    );

    $this->end_controls_section();
    // repeater for appointment ends


    //////////////////////////////////////////////////////////////////////////////////////////

    // company Copyright starts
    $this->start_controls_section(
        'copyright_section',
        [
            'label' => __('Copyright', 'elementor'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'copyright_name',
        [
            'label' => __('Copyright title', 'elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('Copyright© 2019 Web Marketing for Dentists', 'elementor'),
            'placeholder' => __('Type your copyright here', 'elementor'),
        ]
    );

    $this->end_controls_section();
    // company Copyright ends

    // custom js starts
    $this->start_controls_section(
        'section_custom_js',
        [
            'label' => __('Place here your custom JS', 'elementor-header-bullet'),
        ]
    );

    $this->add_control(
        'custom_js',
        [
            'label' => __('Header Address', 'elementor-header-bullet'),
            'type' => Controls_Manager::TEXTAREA,
            'placeholder' => __('Enter your custom code here', 'elementor'),
        ]
    );

    $this->end_controls_section();
    // custom js ends
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
    $this->add_inline_editing_attributes('custom_js', 'none');
    $this->add_inline_editing_attributes('locationimage', 'none');
    $tabs = $this->get_settings_for_display('nav_one_full');
    $nav_company_addresses = $this->get_settings_for_display('address_lists');
    $phones = $this->get_settings_for_display('phone_number_lists');
    $schedule_lists = $this->get_settings_for_display('schedule_lists');
    $terms_lists = $this->get_settings_for_display('terms_lists');
    $set_appointment_lists = $this->get_settings_for_display('set_appointment_lists');
    ?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="sm-padding col-md-2">
                    <div class="logo-footer">
                        <a href="/"><img src="<?php echo $settings['locationimage']['url'] ?>" alt="Logo"></a>
                    </div>
                    <nav class="footer-nav">
                        <ul>
                            <?php
                            foreach ($tabs as $tab) { ?>
                                <li><a href="#"><?php echo $tab['nav_one']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="sm-padding col-md-4">
                    <div class="footer-company-description">
                        <div class="title" itemscope itemtype="https://schema.org/Organization">
                            <span itemprop="legalName"><?php echo $settings['nav_company_name']; ?></span>
                        </div>
                        <div class="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <?php
                            foreach ($nav_company_addresses as $nav_company_address) { ?>
                                <span itemprop="streetAddress">
                                        <a target="_blank" href="https://maps.google.com/maps?q=<?php echo $nav_company_address['address_list']; ?>"
                                           title="See on Google Maps">
                                            <?php echo $nav_company_address['address_list'] . "<br>"; ?>
                                        </a>
                                    </span>
                            <?php }; ?>
                        </div>
                        <div class="phone" itemscope itemtype="https://schema.org/Place">
                            <?php foreach ($phones as $phone) { ?>
                                <span itemprop="telephone">
                                        <a href="tel:<?php echo $phone['phone_number_list']; ?>">
                                            <?php echo $phone['phone_number_list'] . "<br>"; ?>
                                        </a>
                                    </span>
                            <?php }; ?>
                        </div>
                        <div class="operating-time" itemscope itemtype="https://schema.org/CivicStructure">
                            <?php foreach ($schedule_lists as $schedule_list) { ?>
                                <span itemprop="openingHours"
                                      content="<?php echo $schedule_list['schedule_list']; ?>">
                                    <?php echo $schedule_list['schedule_list'] . "<br>"; ?>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="sm-padding col-md-3">
                    <nav class="footer-nav-second">
                        <ul>
                            <?php foreach ($terms_lists as $terms_list) { ?>
                                <li><a href="#"><?php echo $terms_list['terms_list'] . "<br>"; ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="sm-padding col-md-3">
                    <nav class="footer-nav-third">
                        <ul>
                            <?php
                            foreach ($set_appointment_lists as $set_appointment_list) { ?>
                                <li>
                                    <a href="#"><?php echo $set_appointment_list['set_appointment_list'] . "<br>"; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <!--                        Uncomment when functionality will be done STARTs-->
                    <!--                        <div class="footer-form">-->
                    <!--                            <form action="">-->
                    <!--                                <label for="email">Sign up for future promotions</label>-->
                    <!--                                <div class="button-flex">-->
                    <!--                                    <input placeholder="Enter your email" id="email" name="Email" type="email">-->
                    <!--                                    <button type="submit">submit</button>-->
                    <!--                                </div>-->
                    <!--                            </form>-->
                    <!--                        </div>-->
                    <!--Uncomment when functionality will be done ENDs-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p><?php echo $settings['copyright_name']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // on hover show submenu in nav-menu

        $(document).ready(function () {
            updateContainer();
            $(window).resize(function () {
                updateContainer();
            });
        });

        function updateContainer() {
            let $containerWidth = $(window).width();
            if ($containerWidth <= 1263) {
                $('.menu-item-has-children').on('click', function (e) {
                    e.preventDefault();
                    if (!$(this).find('.sub-menu:first').hasClass('active')) {
                        $(this).find('.sub-menu:first').addClass('active');
                    } else {
                        $(this).find('.sub-menu:first').removeClass('active');
                    }
                    if ($(this).find("a:first-child").hasClass('snippet-toggle')) {
                        $(this).find("a:first-child").removeClass('snippet-toggle');
                    } else {
                        $(this).find("a:first-child").addClass('snippet-toggle');
                    }
                    $(this).find(".sub-menu").on('click', ".menu-item", function () {
                        window.location = $(this).find('a:first').attr('href');
                        return false;
                    })
                });
            } else if ($containerWidth > 1263) {
                $('.menu-item-has-children').hover(function () {
                    if ($(this).find('.sub-menu:first').hasClass('active')) {
                        $(this).find('.sub-menu:first').removeClass('active');
                    } else {
                        $(this).find('.sub-menu:first').addClass('active');
                    }
                })
            }
        }

        // offerBannerWithCounter section
        function startTimer(duration, display) {
            let timer = duration, hours, minutes, seconds, textContent;
            setInterval(function () {

                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer - hours * 3600) / 60, 10);
                seconds = parseInt(timer - hours * 3600 - minutes * 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;
                document.cookie = "offerExpires=" + timer;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        window.onload = function () {

            let display = document.querySelector('#time');

            if (display) {
                // rand time to get offer time left from 7 to 10 hours
                let intervalInSeconds = getRandomInt(25200, 36000);

                if (document.cookie.indexOf("offerExpires=") < 0) {
                    // set a new cookie
                    let date = new Date();
                    date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
                    let expireDate = "; expires=" + date.toGMTString();
                    document.cookie = "offerExpires=" + intervalInSeconds + expireDate;
                }

                let cookieValue = getCookie("offerExpires");
                startTimer(cookieValue, display);
            }
        };

        <?php echo $settings['custom_js'];?>
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
view.addInlineEditingAttributes( 'description', 'none' );
view.addInlineEditingAttributes( 'locationimage', 'none' );
#>

<footer class="sm-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo-footer">
                    <img src="{{{ settings.locationimage.url }}}" alt="Logo">
                </div>
                <nav class="footer-nav">
                    <ul>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Refer a friend</a></li>
                        <li><a href="#">Updates</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <div class="footer-company-description">
                    <div class="title" itemscope itemtype="https://schema.org/Organization">
                        <span itemprop="legalName">COMPANY TITLE</span>
                    </div>
                    <div class="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress">1111 Dental str., Palatine, IL, 60074</span>
                    </div>
                    <div class="phone" itemscope itemtype="https://schema.org/Place">
                        <span itemprop="telephone">(123) 123-4567</span>
                    </div>
                    <div class="operating-time" itemscope itemtype="https://schema.org/CivicStructure">
                        <span itemprop="openingHours"
                              content="Mon,Tue,Wed 9:00 -19:00">Mon - Wed: 9:00 AM - 7:00 PM</span>
                        <span itemprop="openingHours"
                              content="Thu,Fri,Sat 9:00 -19:00">Thu - Sat: 9:00 AM - 10:00 PM</span>
                        <span itemprop="openingHours" content="Sun 10:00 -19:00">Sun: 10:00 AM - 10:00 PM</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav-second">
                    <ul>
                        <li><a href="#">Terms &amp; conditions</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav-third">
                    <ul>
                        <li><a href="#">Set an Appointment</a></li>
                        <li><a href="#">Get Directions</a></li>
                    </ul>
                </nav>
                <div class="footer-form">

                    <?php
                    }
}
?>
