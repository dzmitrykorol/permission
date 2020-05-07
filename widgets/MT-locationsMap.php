<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Modules\DynamicTags\Module as TagsModule;

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
class MT_locationMaps extends Widget_Base {

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
		return 'mt-locmap';
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
		return __( '[Master Template] Location Map ', 'elementor-header-bullet' );
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
				'label' => __( 'Content', 'elementor-header-bullet' ),
			]
		);

		$this->add_control(
			'address',
			[
				'label' => __( 'Widget Address', 'elementor-header-bullet' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
					],
				],
				'placeholder' => __( 'Enter office address', 'elementor' ),
				'default' => __( '686 Haag Cirles', 'elementor' ),
			]
		);

		$this->add_control(
			'worktime',
			[
				'label' => __( 'Enter Office Work time', 'elementor-header-bullet' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter office Work Time', 'elementor' ),
				'default' => __( 'Opem Today 8:00am - 5:00pm All hours', 'elementor' ),
			]
		);

		$this->add_control(
			'office_number',
			[
				'label' => __( 'Enter Office Phone Number', 'elementor-header-bullet' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter office Phone number', 'elementor' ),
				'default' => __( '(123) 123-4567', 'elementor' ),
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Content Style', 'elementor-hello-world' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Location Map Header Typography',
				'name'     => 'lmheader_typography',
				'selector' => '{{WRAPPER}} h2.title',
			]
		);

		$this->add_control(
			'lmheader_color',
			[
				'label' => __( 'Location Map Header Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
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
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Location Map Address Typography',
				'name'     => 'lmaddress_typography',
				'selector' => '{{WRAPPER}} .address span',
			]
		);

		$this->add_control(
			'lmaddress_color',
			[
				'label' => __( 'Location Map Address Color', 'plugin-domain' ),
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
				'label'    => 'Location Map Phone Typography',
				'name'     => 'lmphone_typography',
				'selector' => '{{WRAPPER}} .phone span',
			]
		);

		$this->add_control(
			'lmphone_color',
			[
				'label' => __( 'Location Map Phone Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .phone span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Location Map Work Time Typography',
				'name'     => 'lmwp_typography',
				'selector' => '{{WRAPPER}} .operating-time span',
			]
		);

		$this->add_control(
			'lmwp_color',
			[
				'label' => __( 'Location Map Work Time Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .operating-time span' => 'color: {{VALUE}}',
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
		$this->add_inline_editing_attributes( 'address', 'none' );
		$this->add_inline_editing_attributes( 'worktime', 'none' );
		$this->add_inline_editing_attributes( 'office_number', 'none' );


		?>

        <section class="sec-address">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-4 margin-auto">
                        <div class="sec-address-text">
                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                            <span class="address"><span <?php echo $this->get_render_attribute_string( 'address' ); ?>><?php echo $settings['address']; ?></span></span>
                            <span class="operating-time"><span <?php echo $this->get_render_attribute_string( 'worktime' ); ?>><?php echo $settings['worktime']; ?></span></span>
                            <span class="phone"><span <?php echo $this->get_render_attribute_string( 'office_number' ); ?>><?php echo $settings['office_number']; ?></span></span>
                            <div class="buttons">
                                <button>directions</button>
                                <button>call</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="map">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo rawurlencode( $settings['address'] ); ?>&amp;z=10&amp;iwloc=near&amp;output=embed" aria-label="<?php echo esc_attr( $settings['address'] );?>"></iframe>
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
	protected function _content_template() {
		?>

        <#
        view.addInlineEditingAttributes( 'address', 'none' );
        view.addInlineEditingAttributes( 'worktime', 'none' );
        view.addInlineEditingAttributes( 'office_number', 'none' );
        #>

        <section class="sec-address">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-4 margin-auto">
                        <div class="sec-address-text">
                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                            <span class="address"><span {{{ view.getRenderAttributeString('address') }}} >{{{ settings.address }}}</span></span>
                            <span class="operating-time"><span {{{ view.getRenderAttributeString('worktime') }}} >{{{ settings.worktime }}}</span></span>
                            <span class="phone"><span {{{ view.getRenderAttributeString('office_number') }}} >{{{ settings.office_number }}}</span></span>
                            <div class="buttons">
                                <button>directions</button>
                                <button>call</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="map">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{{ encodeURI(settings.address) }}}&amp;z=10&amp;iwloc=near&amp;output=embed" aria-label="{{{ settings.address }}}"></iframe>
                            <img src="img/icons/combined-shape.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
