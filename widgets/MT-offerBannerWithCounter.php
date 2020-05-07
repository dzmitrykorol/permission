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
class MT_offerBannerWithCounter extends Widget_Base
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
        return __('[Master Template] Offer Banner With Counter ', 'elementor-header-bullet');
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
                'label' => 'Choose Your Image For Background',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ]
            ]
        );

        $this->add_control(
            'clinic_name',
            [
                'label' => 'Clinic name',
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'Enter Clinic name',
                'default' => get_bloginfo('name'),
            ]
        );

        $this->end_controls_section();

        // repeater for footer starts
        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __('Tab navs', 'elementor'),
            ]
        );

        // repeater for clinic name and phones starts
        $repeater = new Repeater();

        $repeater->add_control(
            'nav_one',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'nav_full',
            [
                'label' => __('Why choose section', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'nav_one' => __('Why choose 1..', 'elementor'),
                    ],
                    [
                        'nav_one' => __('Why choose 2..', 'elementor'),
                    ],
                ],
                'title_field' => 'Why choose section',
            ]
        );
        $this->end_controls_section();
        // repeater for clinic name and phones ends


        $this->start_controls_section(
            'offer_section',
            [
                'label' => __('Offer title', 'elementor-header-bullet'),
            ]
        );

        $this->add_control(
            'offer_title',
            [
                'label' => 'Enter offer title',
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'offer_price',
            [
                'label' => 'Enter price',
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'Enter from price',
            ]
        );

        $this->add_control(
            'show_offer',
            [
                'label' => __('Show Offer Expires?', 'elementor-hello-world'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementor-hello-world'),
                'label_off' => __('Hide', 'elementor-hello-world'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        // repeater for offer description starts
        $repeater = new Repeater();

        $repeater->add_control(
            'offer_one',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'offer_full',
            [
                'label' => __('Pluses section', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'offer_one' => __('Item 1..', 'elementor'),
                    ],
                    [
                        'offer_one' => __('Item 2..', 'elementor'),
                    ],
                ],
                'title_field' => 'Pluses section',
            ]
        );

        $this->add_control(
            'offer_link',
            [
                'label' => 'Provide link to offer',
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->end_controls_section();

        // repeater for offer description ends
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
        $whyChooses = $this->get_settings_for_display('nav_full');
        $offerProps = $this->get_settings_for_display('offer_full');
        ?>
        <section class="why-choose-main" style="background: url('<?php echo $settings['logo']['url']; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-items-center">
                    </div>
                    <div class="col-md-7 align-items-center">
                        <div class="why-choose-section">
                            <a href="#">
                                <h3 class="why-choose-title">Why choose <?php echo $settings['clinic_name'] ?></h3>
                            </a>
                            <ul class="why-choose-description">
                                <?php foreach ($whyChooses as $whyChoose) { ?>
                                    <li><?php echo $whyChoose['nav_one']; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 align-items-center">
                        <div class="get-offer-section">
                            <div class="main-offer-section">
                                <div class="offer-title"><?php echo $settings['offer_title']; ?></div>
                                <div class="offer-price">From <span><?php echo $settings['offer_price']; ?></span></div>
                                <div class="offer-info">
                                    <ul>
                                        <?php
                                        foreach ($offerProps as $offerProp) { ?>
                                            <li><?php echo $offerProp['offer_one']; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php
                                if ($settings['show_offer'] === 'yes') { ?>
                                    <div class="offer-counter">
                                        <div id="timer" class="clocktimer">
                                            <div class="offer-expires"><h5>Offer Expires</h5></div>
                                            <div class="offer-digits">
                                                <div class="timepointer" id="time"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="offer-button">
                                <a href="<?php echo $settings['offer_link']['url']; ?>" class="btn" data-toggle="modal" data-target="#modalOffer">Get this Offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        view.addInlineEditingAttributes( 'offer_price', 'none' );
        view.addInlineEditingAttributes( 'offer_link', 'none' );
        console.log(settings);
        #>
        <section class="why-choose-main" style="background: url('{{{ settings.logo.url }}}') no-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-items-center">
                    </div>
                    <div class="col-md-7 align-items-center">
                        <div class="why-choose-section">
                            <a href="#">
                                <h3 class="why-choose-title">Why choose {{{ settings.clinic_name }}}?</h3>
                            </a>
                            <ul class="why-choose-description">
                                <# _.each( settings.nav_full, function( item ) { #>
                                <li>{{{ item.nav_one }}}</li>
                                <# }); #>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 align-items-center">
                        <div class="get-offer-section">
                            <div class="main-offer-section">
                                <div class="offer-title">{{{ settings.offer_title }}}</div>
                                <div class="offer-price">From <span>{{{ settings.offer_price }}}</span></div>
                                <div class="offer-info">
                                    <ul>
                                        <# _.each( settings.offer_full, function( item ) { #>
                                        <li>{{{ item.offer_one }}}</li>
                                        <# }); #>
                                    </ul>
                                </div>
                                <# if (settings.show_offer === 'yes') { #>
                                <div class="offer-counter">
                                    <div id="timer" class="clocktimer">
                                        <div class="offer-expires"><h5>Offer Expires</h5></div>
                                        <div class="offer-digits">
                                            <div class="timepointer" id="time"></div>
                                        </div>
                                    </div>
                                </div>
                                <# } #>
                            </div>
                            <div class="offer-button">
                                <a href="{{{ settings.offer_link.url }}}" class="btn" data-toggle="modal" data-target="#modalOffer">Get this Offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

?>