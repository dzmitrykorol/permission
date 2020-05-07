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
class MT_procedureProcess extends Widget_Base {
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
		return 'mt-procedure_process';
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
		return __( '[Master Template] Procedure Process', 'elementor' );
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

		$repeater = new Repeater();

		$repeater->add_control(
			'process_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Process title', 'elementor' ),
				'placeholder' => __( 'Process Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'process_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'default' => __( 'Lorem Ipsum', 'elementor' ),
				'placeholder' => __( 'Process content text', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$this->add_control(
			'process_items',
			[
				'label' => __( 'Process Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'process_title' => __( 'Why clinic name', 'elementor' ),
						'process_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
					[
						'process_title' => __( 'Why clinic name', 'elementor' ),
						'process_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
				],
				'title_field' => '{{{ process_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => __( 'Tabs', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label' => __( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.elementor-active' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
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
		$tabs = $this->get_settings_for_display( 'process_items' );
		$settings = $this->get_settings_for_display();
		?>

        <section class="sec-process">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>The Process</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
	                <?php
	                foreach ( $tabs as $index => $item ) :
		                $tab_count = $index + 1;
			                $process_title_setting_key = $this->get_repeater_setting_key( 'process_title', 'process_items', $index );
			                $process_content_setting_key = $this->get_repeater_setting_key( 'process_content', 'process_items', $index );

			                $this->add_render_attribute( $process_title_setting_key, [
				                'class' => [ 'title', 'elementor-tab-mobile-title' ],
			                ] );
			                $this->add_render_attribute( $process_content_setting_key, [
			                ] );
			                ?>
                            <div class="col-md-4">
                                <div class="process-item">
                                    <h3 <?php echo $this->get_render_attribute_string( $process_title_setting_key ); ?>><?php echo $item['process_title']; ?></h3>
                                    <p <?php echo $this->get_render_attribute_string( $process_content_setting_key ); ?>><?php echo $item['process_content']; ?></p>
                                </div>
                            </div>
		                <?php
	                endforeach; ?>
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
        <section class="sec-process">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>The Process</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <#
                    _.each( settings.process_items, function( item, index ) {
                    var tabCount = index + 1;
                    tabTitleKey = view.getRepeaterSettingKey( 'process_title', 'process_items',index );
                    tabContentKey = view.getRepeaterSettingKey( 'process_content', 'process_items',index );

                    view.addRenderAttribute( tabTitleKey, {
                    } );
                    view.addRenderAttribute( tabContentKey, {
                    } );


                    view.addInlineEditingAttributes( tabTitleKey, 'none' );
                    view.addInlineEditingAttributes( tabContentKey, 'none' );
                    #>
                    <div class="col-md-4">
                        <div class="process-item">
                            <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.process_title }}}</h3>
                            <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.process_content }}}</p>
                        </div>
                    </div>
                    <#
                    } );
                    #>
                </div>
            </div>
        </section>
		<?php
	}
}
