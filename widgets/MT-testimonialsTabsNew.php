<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor tabs widget.
 *
 * Elementor widget that displays vertical or horizontal tabs with different
 * pieces of content.
 *
 * @since 1.0.0
 */
class MT_testinonialsTabsNew extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve tabs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tabsMTnew';
    }

    /**
     * Get widget title.
     *
     * Retrieve tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('[Master Template] Testimonials Tabs New', 'elementor');
    }

    /**
     * Get widget icon.
     *
     * Retrieve tabs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-tabs';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['tabs', 'accordion', 'toggle'];
    }

    /**
     * Register tabs widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __('Testimonials items', 'elementor'),
            ]
        );

        $testimonialsRepeater = new Repeater();

        $testimonialsRepeater->add_control(
            'testimonial_content',
            [
                'label' => __('Content', 'elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('New testimonial', 'elementor'),
                'placeholder' => __('Enter testimonial content', 'elementor'),
                'label_block' => true,
            ]
        );

        $testimonialsRepeater->add_control(
            'testimonial_author',
            [
                'label' => __('Author Name', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Author name', 'elementor'),
                'placeholder' => __('Author name', 'elementor'),
                'label_block' => true,
            ]
        );

        $testimonialsRepeater->add_control(
            'testimonial_photo',
            [
                'label' => 'Choose Author Photo',
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $testimonialsRepeater->add_control(
            'testimonial_type',
            [
                'label' => __('Testimonial Type', 'plugin-domain'),
                'type' => Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text' => __('Text', 'plugin-domain'),
                    'video' => __('Video', 'plugin-domain'),
                ],
            ]
        );
        $testimonialsRepeater->add_control(
            'testimonial_source',
            [
                'label' => __('Testimonial Source', 'plugin-domain'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/wp-content/themes/elementor-theme/img/logo-testimonials.png',
                ],
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __('Contact Us Items', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $testimonialsRepeater->get_controls(),
                'default' => [
                    [
                        'testimonial_content' => __('Testimonial content', 'elementor'),
                        'testimonial_author' => __('Author name', 'elementor'),
                        'testimonial_photo' => __('', 'elementor'),
                        'testimonial_type' => __('Text', 'elementor'),
                        'testimonial_source' => __('/wp-content/themes/elementor-theme/img/logo-testimonials.png',
                            'elementor'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render tabs widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $tabs = $this->get_settings_for_display('testimonials');
        $testimonialsTypes = [];
        foreach ($tabs as $tab) {
            $testimonialsTypes[] = $tab['testimonial_type'];
        }
        $testimonialsTypes = array_values(array_unique($testimonialsTypes));
        ?>
        <div class="testimonials-tabs">
            <div class="elementor-tabs" role="tablist">
                <div class="elementor-tabs-wrapper">
                    <?php foreach ($testimonialsTypes as $testimonialsType) { ?>
                        <a href="#" class="<?php echo $testimonialsType; ?>" id="<?php echo $testimonialsType; ?>">
                            <div class="elementor-tab-title">
                                <?php echo strtoupper($testimonialsType); ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="elementor-tabs-content-wrapper">
                    <div class="elementor-tab-content">
                        <?php foreach ($tabs as $tab) { ?>
                            <div class="item <?php echo $tab['testimonial_type']; if ($tab['testimonial_type'] === 'text')
                            { echo ' show';} ?>">
                                <div class="text-testimonials">
                                    <p><?php echo $tab['testimonial_content']; ?></p>
                                </div>
                                <div class="footer-testimonials-new">
                                    <div class="photo-name-new">
                                        <div class="photo-new"><img
                                                    src="<?php echo $tab['testimonial_photo']['url']; ?>" alt="">
                                        </div>
                                        <div class="name-new"><?php echo $tab['testimonial_author']; ?></div>
                                    </div>
                                    <div class="stars-logo-new">
                                        <div class="stars-new"><img
                                                    src="/wp-content/themes/elementor-theme/img/stars.svg"
                                                    alt=""></div>
                                        <div class="logo-new">via <img
                                                    src="<?php echo $tab['testimonial_source']['url']; ?>"
                                                    alt=""></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

?>
