<?php
namespace ElementorWidgetExtender\Widgets;


use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) {
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
class MT_procedureHubHeader extends Widget_Base {
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
	public function get_name() {
		return 'mt-procedure_hubHeader';
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
	public function get_title() {
		return __( '[Master Template] Procedure HubHeader', 'elementor' );
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
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register tabs widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Tabs', 'elementor' ),
			]
		);

		$this->add_control(
			'procedureHub_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'procedureHub_content',
			[
				'label' => __( 'Description', 'elementor' ),
				'default' => __( 'Tab Content', 'elementor' ),
				'placeholder' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
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
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="location-hub location-hub__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 <?php echo $this->get_render_attribute_string( 'procedureHub_title' ); ?>><?php echo $settings['procedureHub_title']; ?></h1>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <p <?php echo $this->get_render_attribute_string( 'procedureHub_content' ); ?>><?php echo $settings['procedureHub_content']; ?></p>                    </div>
                </div>
                </div>
            </div>
        </section>
		<?php
	}

	/**
	 * Render tabs widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
        <#
        view.addInlineEditingAttributes( 'procedureHub_title', 'none' );
        view.addInlineEditingAttributes( 'procedureHub_content', 'none' );
        #>

        <section class="location-hub location-hub__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 {{{ view.getRenderAttributeString('procedureHub_title') }}}>{{{ settings.procedureHub_title }}}</h1>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <p {{{ view.getRenderAttributeString('procedureHub_content') }}}>{{{ settings.procedureHub_content }}}</p>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
