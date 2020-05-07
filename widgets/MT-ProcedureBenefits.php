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
class MT_procedureBenefits extends Widget_Base {
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
		return 'mt-procedure_benefits';
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
		return __( '[Master Template] Procedure Benefits', 'elementor' );
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
			'benefit_title',
			[
				'label' => __( 'Title & Content', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'benefit_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'default' => __( 'Tab Content', 'elementor' ),
				'placeholder' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$this->add_control(
			'benefits',
			[
				'label' => __( 'Benefits Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'benefit_title' => __( 'Benefit #1', 'elementor' ),
						'benefit_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'benefit_title' => __( 'Benefit #2', 'elementor' ),
						'benefit_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ benefit_title }}}',
			]
		);

		$this->add_control(
			'benefit_image',
			[
				'label' => 'Choose  Benefit image',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
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
		$tabs = $this->get_settings_for_display( 'benefits' );
		$settings = $this->get_settings_for_display();
		?>
        <section class="sec-all-the-benefits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>All The Benefits</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
	                    <?php
	                    foreach ( $tabs as $index => $item ) :
		                    $tab_count = $index + 1;
	                    if($tab_count < 4) {
		                    $benefit_title_setting_key = $this->get_repeater_setting_key( 'benefit_title', 'benefits', $index );
		                    $benefit_content_setting_key = $this->get_repeater_setting_key( 'benefit_content', 'benefits', $index );

		                    $this->add_render_attribute( $benefit_title_setting_key, [
		                    ] );
		                    $this->add_render_attribute( $benefit_content_setting_key, [
		                    ] );
		                    ?>
                            <div class="benefits-item">
                                <h3 <?php echo $this->get_render_attribute_string( $benefit_title_setting_key ); ?>><?php echo $item['benefit_title']; ?></h3>
                                <p <?php echo $this->get_render_attribute_string( $benefit_content_setting_key ); ?>><?php echo $item['benefit_content']; ?></p>
                            </div>
                        <?php }
                        endforeach; ?>
                    </div>
                    <div class="col-md-7 text-right">
                        <img style="    height: 348px;" src="<?php echo $settings['benefit_image']['url']; ?>" alt="">
                    </div>
                </div>
                <div class="row">
	                <?php
	                $element_index = 0;
	                foreach ( $tabs as $index => $item ) :
		                $tab_count = $index + 1;

		                if($tab_count > 3) {
		                    $element_index = $element_index + 1;
			                $benefit_title_setting_key = $this->get_repeater_setting_key( 'benefit_title', 'benefits', $index );
			                $benefit_content_setting_key = $this->get_repeater_setting_key( 'benefit_content', 'benefits', $index );

			                $this->add_render_attribute( $benefit_title_setting_key, [
			                ] );
			                $this->add_render_attribute( $benefit_content_setting_key, [
			                ] );
			                ?>
                            <div class="col-md-<?php echo ($element_index % 2) ? '5' : '7'; ?>">
                                <div class="benefits-item" style="<?php echo ($element_index % 2) ? '' : 'padding-left: 40px;'?>">
                                    <h3 <?php echo $this->get_render_attribute_string( $benefit_title_setting_key ); ?>><?php echo $item['benefit_title']; ?></h3>
                                    <p <?php echo $this->get_render_attribute_string( $benefit_content_setting_key ); ?>><?php echo $item['benefit_content']; ?></p>
                                </div>
                            </div>
		                <?php }
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
        <section class="sec-all-the-benefits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>All The Benefits</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <#
                        _.each( settings.benefits, function( item, index ) {
                        var tabCount = index + 1;
                        if(tabCount < 4) {
                            tabTitleKey = view.getRepeaterSettingKey( 'benefit_title', 'benefits',index );
                            tabContentKey = view.getRepeaterSettingKey( 'benefit_content', 'benefits',index );

                            view.addRenderAttribute( tabTitleKey, {
                            } );
                            view.addRenderAttribute( tabContentKey, {
                            } );


                            view.addInlineEditingAttributes( tabTitleKey, 'none' );
                            view.addInlineEditingAttributes( tabContentKey, 'none' );
                            #>
                            <div class="benefits-item">
                                <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.benefit_title }}}</h3>
                                <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.benefit_content }}}</p>
                            </div>
                        <# }
                        } ); #>
                    </div>
                    <div class="col-md-7 text-right">
                        <img style="    height: 348px;" src="{{{ settings.benefit_image.url }}}" alt="">
                    </div>
                </div>
                <div class="row">
                    <#
                    var elementIndex = 0;
                    _.each( settings.benefits, function( item, index ) {
                        var tabCount = index + 1;
                        var gridClass;
                        if (tabCount > 3) {
                            elementIndex++;
                            tabTitleKey = view.getRepeaterSettingKey( 'benefit_title', 'benefits',index );
                            tabContentKey = view.getRepeaterSettingKey( 'benefit_content', 'benefits',index );

                            view.addRenderAttribute( tabTitleKey, {
                            } );
                            view.addRenderAttribute( tabContentKey, {
                            } );

                            view.addInlineEditingAttributes( tabTitleKey, 'none' );
                            view.addInlineEditingAttributes( tabContentKey, 'none' );
                            var style = '';
                            if (elementIndex % 2) {
                                gridClass = 5;

                            } else {
                                gridClass = 7;
                    style = '    padding-left: 40px;';
                            }
                            #>
                            <div class="col-md-{{{ gridClass }}}">
                                <div class="benefits-item" style="{{ style }}">
                                    <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.benefit_title }}}</h3>
                                    <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.benefit_content }}}</p>
                                </div>
                            </div>
                        <# }
                    } ); #>
                </div>
            </div>
        </section>
		<?php
	}
}
