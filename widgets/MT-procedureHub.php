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
class MT_procedureHub extends Widget_Base {
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
		return 'mt-procedure_hub';
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
		return __( '[Master Template] Procedure Hub', 'elementor' );
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
			'procedure_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'procedure_content',
			[
				'label' => __( 'Description', 'elementor' ),
				'default' => __( 'Tab Content', 'elementor' ),
				'placeholder' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'procedure_image',
			[
				'label' => 'Choose Procedure image',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$repeater->add_control(
			'website_link',
			[
				'label' => __( 'Link to Procedure', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'procedures',
			[
				'label' => __( 'Procedure Hub Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'procedure_title' => __( 'Benefit #1', 'elementor' ),
						'procedure_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'procedure_title' => __( 'Benefit #2', 'elementor' ),
						'procedure_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ procedure_title }}}',
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
		$tabs = $this->get_settings_for_display( 'procedures' );
		$settings = $this->get_settings_for_display();
		?>
        <section class="location-hub location-hub__content">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ( $tabs as $index => $item ) :
                        $procedure_title_setting_key = $this->get_repeater_setting_key( 'procedure_title', 'procedures', $index );
                        $precedure_content_setting_key = $this->get_repeater_setting_key( 'procedure_content', 'procedures', $index );

                        $this->add_render_attribute( $procedure_title_setting_key, [
                        ] );
                        $this->add_render_attribute( $precedure_content_setting_key, [
                        ] );
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <a href="<?php echo $item['website_link']['url'];?>" class="location-hub__element">
                                <h3 <?php echo $this->get_render_attribute_string( $procedure_title_setting_key ); ?>><?php echo $item['procedure_title']; ?></h3>
                                <p <?php echo $this->get_render_attribute_string( $precedure_content_setting_key ); ?>><?php echo $item['procedure_content']; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
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
        <section class="location-hub location-hub__content">
        <div class="container">
            <div class="row">
                        <#
                        _.each( settings.procedures, function( item, index ) {
                            tabTitleKey = view.getRepeaterSettingKey( 'procedure_title', 'procedures',index );
                            tabContentKey = view.getRepeaterSettingKey( 'procedure_content', 'procedures',index );

                            view.addRenderAttribute( tabTitleKey, {
                            } );
                            view.addRenderAttribute( tabContentKey, {
                            } );


                            view.addInlineEditingAttributes( tabTitleKey, 'none' );
                            view.addInlineEditingAttributes( tabContentKey, 'none' );
                            #>
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ item.website_link.url }}" class="location-hub__element">
                                <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.procedure_title }}}</h3>
                                <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.procedure_content }}}</p>
                            </a>
                        </div>
                        <#
                        } ); #>
                </div>
            </div>
        </section>
		<?php
	}
}
