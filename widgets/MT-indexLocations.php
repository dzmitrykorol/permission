<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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
class MT_indexLocations extends Widget_Base {

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
		return 'mt-indexlocations';
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
		return __( '[Master Template] Index Locations ', 'elementor-header-bullet' );
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
			'location_name', [
				'label' => __( 'Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List content' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'location_address', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'location_wt', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'location_phone', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);


		$repeater->add_control(
			'location_image',
			[
				'label' => 'Choose Testimonial author phone',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_control(
			'locations',
			[
				'label' => __( 'Location List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'location_name' => __( 'CHICAGO, IL, OFFICE', 'plugin-domain' ),
						'location_address' => __( '686 Haag Circles', 'plugin-domain' ),
						'location_wt' => __( 'Open Today 8:00am - 5:00pm All Hours', 'plugin-domain' ),
						'location_phone' => __( '(123) 123-4567', 'plugin-domain' ),

					]
				],
				'title_field' => '{{{ location_name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Content Style', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => 'Location Name Typography',
				'name' => 'location_name_typography',
				'selector' => '{{WRAPPER}} .location-item .location-text .title',
			]
		);

		$this->add_control(
			'location_name_color',
			[
				'label' => __( 'Location Name Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .location-item .location-text .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => 'Location Address Typography',
				'name' => 'location_address_typography',
				'selector' => '{{WRAPPER}} .location-item .location-text .address',
			]
		);

		$this->add_control(
			'location_address_color',
			[
				'label' => __( 'Location Address Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .location-item .location-text .address' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => 'Location Work Time Typography',
				'name' => 'location_wt_typography',
				'selector' => '{{WRAPPER}} .location-item .location-text .operating-time',
			]
		);

		$this->add_control(
			'location_wt_color',
			[
				'label' => __( 'Location Work Time Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .location-item .location-text .operating-time' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => 'Location Phone Typography',
				'name' => 'location_phone_typography',
				'selector' => '{{WRAPPER}} .location-item .location-text .phone span',
			]
		);

		$this->add_control(
			'location_phone_color',
			[
				'label' => __( 'Location Phone Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .location-item .location-text .phone span' => 'color: {{VALUE}}',
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

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

        <section class="sec-locations">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Locations</h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel location-carousel-js location-carousel">
	                <?php
	                if ( $settings['locations'] ) {
		                foreach (  $settings['locations'] as $item ){?>
                            <div class="item">

                                <div class="location-item">
                                    <div class="location-text">
                                        <span class="title"><?php echo $item['location_name']?></span>
                                        <span class="address"><span><?php echo $item['location_address']?></span></span>
                                        <span class="operating-time"><?php echo $item['location_wt']?></span>
                                        <span class="phone"><span><?php echo $item['location_phone']?></span></span>
                                    </div>
                                    <div class="location-img" style="background-image: url('<?php echo $item['location_image']['url']?>')"></div>
                                </div>
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
	protected function _content_template() {
		?>



        <section class="sec-locations">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Locations</h2>
                        </div>
                    </div>
                </div>
                <div class="location-carousel elementor-editor-location">
                    <# if ( settings.locations.length ) { console.log(settings.locations);#>
                    <# _.each( settings.locations, function( item ) { #>
                            <div class="item">

                                <div class="location-item">
                                    <div class="location-text">
                                        <span class="title">{{{ item.location_name }}}</span>
                                        <span class="address"><span>{{{ item.location_address }}}</span></span>
                                        <span class="operating-time">{{{ item.location_wt }}}</span>
                                        <span class="phone"><span>{{{ item.location_phone }}}</span></span>
                                    </div>
                                    <div class="location-img" style="background-image: url('{{{ item.location_image.url }}}')"></div>
                                </div>
                            </div>
                <# }); #>
                <# } #>
                </div>
            <#
            console.log($('#elementor-preview-iframe'));
            #>
            </div>
        </section>





		<?php
	}
}
