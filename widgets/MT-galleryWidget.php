<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Controls_Manager;
use Elementor\Utils;
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
class MT_galleryWidget extends Widget_Base {

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
		return 'mt-galleryWidget';
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
		return __( '[Master Template] Gallery Widget', 'elementor-header-bullet' );
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
			'gallery_image',
			[
				'label' => 'Choose Testimonial author phone',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);
		$repeater->add_control(
			'gallery_name',
			[
				'label' => 'Gallery Name',
				'type' => Controls_Manager::TEXT,
				'default' => 'Name'
			]
		);

		$this->add_control(
			'gallery_images',
			[
				'label' => __( 'testimonials List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
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
		?>
        <section class="sec-gallery sec-gallery__ghub">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel gallery-carousel">
	                        <?php
	                        if ( $settings['gallery_images'] ) {
		                        foreach (  $settings['gallery_images'] as $item ){?>
                                    <div class="item">
                                        <a data-fancybox="gallery" href="<?php echo $item['gallery_image']['url']?>">
                                            <div class="sec-gallery__hub">
                                                <p><?php $item['gallery_name']; ?></p>
                                                <img src="<?php echo $item['gallery_image']['url']?>" alt="">
                                            </div>
                                        </a>
                                    </div>
			                        <?php
		                        }
	                        }
	                        ?>
                        </div>
                        <script>
                            $('.gallery-carousel').owlCarousel({
                                loop: true,
                                margin: 12,
                                nav: true,
                                items: 1,
                                autoWidth: false,
                                dots: true,
                                responsive:{
                                    0:{
                                        items: 1
                                    },
                                    768:{
                                        items: 3,
                                        autoWidth: false
                                    }
                                },
                                navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"><path fill="#333A62" fill-rule="evenodd" d="M18.748 9.267c.182 0 .352-.032.508-.098.157-.065.287-.15.392-.255a1.2 1.2 0 0 0 .254-.393c.065-.157.098-.327.098-.51 0-.34-.117-.635-.352-.884a1.184 1.184 0 0 0-.9-.373H4.579L9.198 2.16c.234-.262.352-.563.352-.903 0-.34-.124-.635-.372-.884A1.202 1.202 0 0 0 8.298 0c-.34 0-.64.118-.9.353L0 7.971l7.397 7.619c.079.078.17.144.274.196.548.34 1.057.275 1.527-.196a1.157 1.157 0 0 0 .313-.55 1.295 1.295 0 0 0 0-.628 1.538 1.538 0 0 0-.118-.315 1.048 1.048 0 0 0-.195-.275l-4.54-4.555h14.09z"/></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"><path fill="#333A62" fill-rule="evenodd" d="M18.748 9.267c.182 0 .352-.032.508-.098.157-.065.287-.15.392-.255a1.2 1.2 0 0 0 .254-.393c.065-.157.098-.327.098-.51 0-.34-.117-.635-.352-.884a1.184 1.184 0 0 0-.9-.373H4.579L9.198 2.16c.234-.262.352-.563.352-.903 0-.34-.124-.635-.372-.884A1.202 1.202 0 0 0 8.298 0c-.34 0-.64.118-.9.353L0 7.971l7.397 7.619c.079.078.17.144.274.196.548.34 1.057.275 1.527-.196a1.157 1.157 0 0 0 .313-.55 1.295 1.295 0 0 0 0-.628 1.538 1.538 0 0 0-.118-.315 1.048 1.048 0 0 0-.195-.275l-4.54-4.555h14.09z"/></svg>'],
                            });
                        </script>
                    </div>
                </div>
            </div>
        </section>

		<?php
	}
}
