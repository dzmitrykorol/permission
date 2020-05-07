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
class MT_financing extends Widget_Base {
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
		return 'mt-financing';
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
		return __( '[Master Template] Financing', 'elementor' );
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
			'financing_title',
			[
				'label' => __( 'Page Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Financing / Insurance', 'elementor' ),
				'placeholder' => __( 'Enter the page title', 'elementor' ),
				'label_block' => true,
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'finance_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'finance_content',
			[
				'label' => __( 'Description', 'elementor' ),
				'default' => __( 'Tab Content', 'elementor' ),
				'placeholder' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);



		$this->add_control(
			'finance_bullets',
			[
				'label' => __( 'Financing Bullets', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'finance_title' => __( 'Payment Options', 'elementor' ),
						'finance_content' => __( 'To accommodate all our patients, we accept a variety of payment methods.', 'elementor' ),
					],
					[
						'finance_title' => __( 'Cash', 'elementor' ),
						'finance_content' => __( 'To accommodate all our patients, we accept a variety of payment methods.', 'elementor' ),
					],
				],
				'title_field' => '{{{ finance_title }}}',
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
		$tabs = $this->get_settings_for_display( 'finance_bullets' );
		$settings = $this->get_settings_for_display();
		?>

        <section class="financing">
            <div class="financing__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
	                        <?php
	                        $this->add_inline_editing_attributes( 'financing_title', 'none' );
	                        ?>
                            <h2 <?php echo $this->get_render_attribute_string( 'financing_title' ); ?>><?php echo $settings['financing_title']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="financing__content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
	                        <?php
	                        foreach ( $tabs as $index => $item ) :
		                        $finance_title_setting_key = $this->get_repeater_setting_key( 'finance_title', 'finance_bullets', $index );
		                        $finance_content_setting_key = $this->get_repeater_setting_key( 'finance_content', 'finance_bullets', $index );

		                        $this->add_render_attribute( $finance_title_setting_key, [
		                        ] );
		                        $this->add_render_attribute( $finance_content_setting_key, [
		                        ] );
		                        ?>
                                <div class="financing__bullet">
                                    <h3 <?php echo $this->get_render_attribute_string( $finance_title_setting_key ); ?>><?php echo $item['finance_title']; ?></h3>
                                    <div <?php echo $this->get_render_attribute_string( $finance_content_setting_key ); ?>><?php echo $item['finance_content']; ?></div>
                                </div>
	                        <?php endforeach; ?>
                        </div>
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
        view.addInlineEditingAttributes( 'financing_title', 'none' );
        #>
        <section class="financing">
            <div class="financing__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 {{{ view.getRenderAttributeString('financing_title') }}}>{{{ settings.financing_title }}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="financing__content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <#
                            _.each( settings.finance_bullets, function( item, index ) {
                            tabTitleKey = view.getRepeaterSettingKey( 'finance_title', 'finance_bullets',index );
                            tabContentKey = view.getRepeaterSettingKey( 'finance_content', 'finance_bullets',index );

                            view.addRenderAttribute( tabTitleKey, {
                            } );
                            view.addRenderAttribute( tabContentKey, {
                            } );


                            view.addInlineEditingAttributes( tabTitleKey, 'none' );
                            view.addInlineEditingAttributes( tabContentKey, 'none' );
                            #>
                            <div class="financing__bullet">
                                <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.finance_title }}}</h3>
                                <div {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.finance_content }}}</div>
                            </div>
                            <#
                            } ); #>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
