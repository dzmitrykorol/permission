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
class MT_galleryHub extends Widget_Base {

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
		return 'mt-galleryHub';
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
		return __( '[Master Template] Gallery Hub', 'elementor-header-bullet' );
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

		$repeater = new Repeater();


		$repeater->add_control(
			'galleryHubName', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'galleryHubLink',
			[
				'label' => __( 'Link to gallery', 'plugin-domain' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( '/your-link/', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => ''
				],
			]
		);

		$repeater->add_control(
			'galleryHubBG',
			[
				'label' => 'Choose Testimonial author phone',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_control(
			'Gallerys',
			[
				'label' => __( 'testimonials List', 'plugin-domain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
				]
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
		$this->add_inline_editing_attributes( 'galleryHubName', 'none' );
		?>
        <section class="gallery-hub">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Gallery</h2>
                    </div>
                </div>
                <div class="row">
	                <?php
	                if ( $settings['Gallerys'] ) {
		                foreach (  $settings['Gallerys'] as $item ){?>
                            <div class="col-md-6">
                                <a href="<?php echo $item['galleryHubLink']['url']?>" class="gallery-hub__element">
                                    <img src="<?php echo $item['galleryHubBG']['url']?>" alt="">
                                    <h3><?php echo $item['galleryHubName']; ?></h3>
                                </a>
                            </div>
			                <?php
		                }
	                }
	                ?>

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
}
