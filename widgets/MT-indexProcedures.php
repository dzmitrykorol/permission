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
class MT_indexProcedures extends Widget_Base {

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
		return 'mt-indexProcedures';
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
		return __( '[Master Template] Index Procedures ', 'elementor-header-bullet' );
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
	      'section_textinputs',
            [
                    'label' => 'Lead Procedure Inputs Test'
            ]
        );

	    $this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Lead Content', 'elementor-header-bullet' ),
			]
		);

		$this->add_control(
			'procedure_header',
			[
				'label'       => 'Procedure header text',
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'Enter procedure header',
				'default'     => 'Orthodontist Services'
			]
		);

		$this->add_control(
			'procedure_description',
			[
				'label'       => __( 'Procedure Description text', 'elementor-header-bullet' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your lead paragraph text here', 'elementor' ),
				'default'     => __( 'Making Dental Care Attainable', 'elementor' ),
			]
		);

		$this->add_control(
			'procedure_image',
			[
				'label' => 'Choose Procedure Image',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_control(
		        'procedure_url',
                [
                    'label' =>  'Enter link to Procedure Page',
                    'type'  => \Elementor\Controls_Manager::URL,
                    'default'   => [
                        'url' => '#'
                    ]
                ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Procedure Content Style', 'elementor-hello-world' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Procedure Header Typography',
				'name'     => 'procedure_header_typography',
				'selector' => '{{WRAPPER}} .our-offers-text h3.title span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Procedure Description Typography',
				'name'     => 'procedure_description_typography',
				'selector' => '{{WRAPPER}} .our-offers-text p.description span',
			]
		);

		$this->add_control(
			'procedure_header_color',
			[
				'label'     => __( 'Procedure Header Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],

				'selectors' => [
					'{{WRAPPER}} .our-offers-text h3.title span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'procedure_description_color',
			[
				'label'     => __( 'Procedure Description Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],

				'selectors' => [
					'{{WRAPPER}} .our-offers-text p.description span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'procedure_border_color',
			[
				'label'     => __( 'Procedure Border Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'deafault' => 'rgba(51, 58, 98, 0.09)',
				'selectors' => [
					'{{WRAPPER}} .sec-our-offers .container' => 'border-color: {{VALUE}}',
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
		$this->add_inline_editing_attributes( 'procedure_header', 'none' );
		$this->add_inline_editing_attributes( 'procedure_description', 'none' );
		$this->add_inline_editing_attributes('procedure_url', 'none');
        $procedure_url = $settings['procedure_url']['url'];
        $procedure_image_url = $settings['procedure_image']['url'];
		?>
        <section class="sec-our-offers">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 align-items-center">
                        <div class="our-offers-text">
                            <a href="<?php echo $settings['procedure_url']['url']; ?>"><h3 class="title"><span <?php echo $this->get_render_attribute_string( 'procedure_header' ); ?>><?php echo $settings['procedure_header']; ?></span></h3></a>
                            <p class="description"><span <?php echo $this->get_render_attribute_string( 'procedure_description' ); ?>><?php echo $settings['procedure_description']; ?></span></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="our-offers-img">
                            <?php
                                if (strlen($procedure_url) > 0) { ?>
                                    <a href="<?php echo $procedure_url; ?>"><img src="<?php echo $procedure_image_url; ?>" alt="<?php echo $settings['procedure_header']; ?>"></a>
                                <?php } else { ?>
                                    <img src="<?php echo $procedure_image_url; ?>" alt="<?php echo $settings['procedure_header']; ?>">
                                <?php }
                            ?>
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
        view.addInlineEditingAttributes( 'procedure_header', 'none' );
        view.addInlineEditingAttributes( 'procedure_description', 'none' );
        view.addInlineEditingAttributes( 'procedure_url', 'none' );
        #>
        <section class="sec-our-offers">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 align-items-center">
                        <div class="our-offers-text">
                            <a href="{{{ settings.procedure_url.url }}}"><h3 class="title"><span {{{ view.getRenderAttributeString('procedure_header') }}}>{{{ settings.procedure_header }}}</span></h3></a>
                            <p class="description"><span {{{ view.getRenderAttributeString('procedure_description') }}}>{{{ settings.procedure_description }}}</span></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="our-offers-img">
                            <a href="{{{ settings.procedure_url.url }}}"><img src="{{{ settings.procedure_image.url }}}" alt="{{{ settings.procedure_header }}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
