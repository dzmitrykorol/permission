<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class MT_indexTestimonials extends Widget_Base {

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
		return 'mt-indextestimonials';
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
		return __( '[Master Template] Index Testimonials ', 'elementor-header-bullet' );
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
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
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
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Lead Content', 'elementor-header-bullet' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'testimonial_text', [
				'label' => __( 'Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'testimonial_name', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Client Name' , 'plugin-domain' ),
				'show_label' => false,
			]
		);


		$repeater->add_control(
			'testimonial_image',
			[
				'label' => 'Choose Testimonial author phone',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);


        $repeater->add_control(
            'testimonial_resource',
            [
                'label' => 'Choose Testimonial Resource',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ]
            ]
        );

		$this->add_control(
			'testimonials',
			[
				'label' => __( 'testimonials List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'testimonial_text' => __( 'Text one', 'plugin-domain' ),
						'testimonial_name' => __( 'Some Name', 'plugin-domain' ),
					],
					[
						'testimonial_text' => __( 'Text two', 'plugin-domain' ),
						'testimonial_name' => __( 'Some Name #2', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ testimonial_name }}}',
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

	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'procedure_header', 'none' );
		$this->add_inline_editing_attributes( 'procedure_description', 'none' );
		?>
        <section class="sec-testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Testimonials</h2>
                        </div>
                        <div class="owl-carousel testimonials-carousel testimonials-carousel-js testimonials-carousel-home-page">
                            <?php
                            if ( $settings['testimonials'] ) {
                                foreach (  $settings['testimonials'] as $item ){?>
	                                <div class="item">
                                <div class="text-testimonials">
                                    <p><?php echo $item['testimonial_text']?></p>
                                </div>
                                <div class="footer-testimonials">
                                    <div class="photo-name">
                                        <div class="photo">
                                            <img src="<?php echo $item['testimonial_image']['url']; ?>" alt="">
                                        </div>
                                        <div class="name">
                                            <?php echo $item['testimonial_name']?>
                                        </div>
                                    </div>
                                    <div class="stars-logo">
                                        <div class="stars"><img src="<?php echo get_template_directory_uri(); ?>/img/stars.svg" alt=""></div>
                                        <div class="logo"><img src="<?php echo  $item['testimonial_resource']['url'] ?>" alt=""></div>
                                    </div>
                                </div>
                            </div>
                              <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            var owl = $('.testimonials-carousel-home-page');
            owl.owlCarousel({
                loop: true,
                margin: 12,
                nav: true,
                items: 1,
                autoWidth: false,
                dots: true,
                navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"><path fill="#333A62" fill-rule="evenodd" d="M18.748 9.267c.182 0 .352-.032.508-.098.157-.065.287-.15.392-.255a1.2 1.2 0 0 0 .254-.393c.065-.157.098-.327.098-.51 0-.34-.117-.635-.352-.884a1.184 1.184 0 0 0-.9-.373H4.579L9.198 2.16c.234-.262.352-.563.352-.903 0-.34-.124-.635-.372-.884A1.202 1.202 0 0 0 8.298 0c-.34 0-.64.118-.9.353L0 7.971l7.397 7.619c.079.078.17.144.274.196.548.34 1.057.275 1.527-.196a1.157 1.157 0 0 0 .313-.55 1.295 1.295 0 0 0 0-.628 1.538 1.538 0 0 0-.118-.315 1.048 1.048 0 0 0-.195-.275l-4.54-4.555h14.09z"/></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"><path fill="#333A62" fill-rule="evenodd" d="M18.748 9.267c.182 0 .352-.032.508-.098.157-.065.287-.15.392-.255a1.2 1.2 0 0 0 .254-.393c.065-.157.098-.327.098-.51 0-.34-.117-.635-.352-.884a1.184 1.184 0 0 0-.9-.373H4.579L9.198 2.16c.234-.262.352-.563.352-.903 0-.34-.124-.635-.372-.884A1.202 1.202 0 0 0 8.298 0c-.34 0-.64.118-.9.353L0 7.971l7.397 7.619c.079.078.17.144.274.196.548.34 1.057.275 1.527-.196a1.157 1.157 0 0 0 .313-.55 1.295 1.295 0 0 0 0-.628 1.538 1.538 0 0 0-.118-.315 1.048 1.048 0 0 0-.195-.275l-4.54-4.555h14.09z"/></svg>'],
                responsive:{
                    768:{
                        items: 2,
                        autoWidth: true
                    }
                }
            });
            owl.trigger('refresh.owl.carousel');
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
}
