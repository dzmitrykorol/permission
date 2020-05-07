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
class MT_procedureQuestions extends Widget_Base {
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
		return 'mt-procedure_questions';
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
		return __( '[Master Template] Procedure Questions', 'elementor' );
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
			'question_title',
			[
				'label' => __( 'Title & Content', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'question_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'default' => __( 'Tab Content', 'elementor' ),
				'placeholder' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$this->add_control(
			'questions',
			[
				'label' => __( 'Questions Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'question_title' => __( 'What is a Dental Implant?', 'elementor' ),
						'question_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
					[
						'question_title' => __( 'What is a Dental Implant?', 'elementor' ),
						'question_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
					[
						'question_title' => __( 'What is a Dental Implant?', 'elementor' ),
						'question_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
					[
						'question_title' => __( 'What is a Dental Implant?', 'elementor' ),
						'question_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.', 'elementor' ),
					],
				],
				'title_field' => '{{{ question_title }}}',
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
		$tabs = $this->get_settings_for_display( 'questions' );
		$settings = $this->get_settings_for_display();
		?>
        <section class="sec-frequently-asked-questions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Frequently Asked Questions</h2>
                            <h2 class="mobile-title">FAQ</h2>
                            <button>Appointment</button>
                        </div>
                    </div>
                </div>
                <div class="row">
	                <?php
	                foreach ( $tabs as $index => $item ) :
		                $tab_count = $index + 1;
		                if($tab_count < 3) {
			                $benefit_title_setting_key = $this->get_repeater_setting_key( 'question_title', 'questions', $index );
			                $benefit_content_setting_key = $this->get_repeater_setting_key( 'question_content', 'questions', $index );

			                $this->add_render_attribute( $benefit_title_setting_key, [
			                ] );
			                $this->add_render_attribute( $benefit_content_setting_key, [
			                ] );
			                ?>
                            <div class="col-md-6">
                                <h3 <?php echo $this->get_render_attribute_string( $benefit_title_setting_key ); ?>><?php echo $item['question_title']; ?></h3>
                                <p <?php echo $this->get_render_attribute_string( $benefit_content_setting_key ); ?>><?php echo $item['question_content']; ?></p>
                            </div>
		                <?php }
	                endforeach; ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
	                <?php
	                foreach ( $tabs as $index => $item ) :
		                $tab_count = $index + 1;
		                if($tab_count > 2) {
			                $benefit_title_setting_key = $this->get_repeater_setting_key( 'question_title', 'questions', $index );
			                $benefit_content_setting_key = $this->get_repeater_setting_key( 'question_content', 'questions', $index );

			                $this->add_render_attribute( $benefit_title_setting_key, [
			                ] );
			                $this->add_render_attribute( $benefit_content_setting_key, [
			                ] );
			                ?>
                                <div class="col-md-6">
                                    <h3 <?php echo $this->get_render_attribute_string( $benefit_title_setting_key ); ?>><?php echo $item['question_title']; ?></h3>
                                    <p <?php echo $this->get_render_attribute_string( $benefit_content_setting_key ); ?>><?php echo $item['question_content']; ?></p>
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
        <section class="sec-frequently-asked-questions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Frequently Asked Questions</h2>
                            <h2 class="mobile-title">FAQ</h2>
                            <button>Appointment</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <#
                    _.each( settings.questions, function( item, index ) {
                    var tabCount = index + 1;
                    if(tabCount < 3) {
                    tabTitleKey = view.getRepeaterSettingKey( 'question_title', 'questions',index );
                    tabContentKey = view.getRepeaterSettingKey( 'question_content', 'questions',index );

                    view.addRenderAttribute( tabTitleKey, {
                    } );
                    view.addRenderAttribute( tabContentKey, {
                    } );


                    view.addInlineEditingAttributes( tabTitleKey, 'none' );
                    view.addInlineEditingAttributes( tabContentKey, 'none' );
                    #>
                    <div class="col-md-6">
                        <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.question_title }}}</h3>
                        <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.question_content }}}</p>
                    </div>
                    <# }
                    } ); #>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <#
                    _.each( settings.questions, function( item, index ) {
                    var tabCount = index + 1;
                    if(tabCount > 2) {
                    tabTitleKey = view.getRepeaterSettingKey( 'question_title', 'questions',index );
                    tabContentKey = view.getRepeaterSettingKey( 'question_content', 'questions',index );

                    view.addRenderAttribute( tabTitleKey, {
                    } );
                    view.addRenderAttribute( tabContentKey, {
                    } );


                    view.addInlineEditingAttributes( tabTitleKey, 'none' );
                    view.addInlineEditingAttributes( tabContentKey, 'none' );
                    #>
                    <div class="col-md-6">
                        <h3 {{{ view.getRenderAttributeString( tabTitleKey ) }}}>{{{ item.question_title }}}</h3>
                        <p {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.question_content }}}</p>
                    </div>
                    <# }
                    } ); #>
                </div>
            </div>
        </section>
		<?php
	}
}
