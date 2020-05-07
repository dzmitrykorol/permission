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
class MT_DoctorSingle extends Widget_Base {
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
		return 'mt-Doctorsingle';
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
		return __( '[Master Template] Doctor Single Widget', 'elementor' );
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
			'doctor_name',
			[
				'label' => __( 'Doctor Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Barry Brown', 'elementor' ),
				'placeholder' => __( 'Enter The Doctor Name', 'elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'doctor_position',
			[
				'label' => __( 'Position', 'elementor' ),
				'default' => __( 'Dentist', 'elementor' ),
				'placeholder' => __( 'Enter The Doctor Position', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$this->add_control(
			'doctor_content',
			[
				'label' => __( 'Doctor Content', 'elementor' ),
				'default' => __( 'Doctor Content', 'elementor' ),
				'placeholder' => __( 'Doctor Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);



		$this->add_control(
			'doctor_photo',
			[
				'label' => 'Choose Doctor Photo',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'membership',
			[
				'label' => __( 'Membership Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Barry Brown', 'elementor' ),
				'placeholder' => __( 'Enter The Doctor Name', 'elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'doctorMemberships',
			[
				'label' => __( 'Memberships', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'membership' => __( '10 000procedures per month', 'elementor' ),
					],
					[
						'membership' => __( 'The best dentist ever', 'elementor' ),
					],
					[
						'membership' => __( '10 000procedures per month', 'elementor' ),
					],
					[
						'membership' => __( 'The best dentist ever', 'elementor' ),
					],
					[
						'membership' => __( '10 000procedures per month', 'elementor' ),
					],
				],
				'title_field' => '{{{ membership }}}',
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
		$tabs = $this->get_settings_for_display( 'doctorMemberships' );
		$settings = $this->get_settings_for_display();
		?>

        <div class="doctor">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-1">
	                    <?php
	                    $this->add_inline_editing_attributes( 'doctor_name', 'none' );
	                    $this->add_inline_editing_attributes( 'doctor_position', 'none' );
	                    $this->add_inline_editing_attributes( 'doctor_content', 'none' );
	                    ?>

                        <h2 <?php echo $this->get_render_attribute_string( 'doctor_name' ); ?>><?php echo $settings['doctor_name']; ?></h2>
                        <div class="position"><span <?php echo $this->get_render_attribute_string( 'doctor_position' ); ?>><?php echo $settings['doctor_position']; ?></span></div>
                        <p <?php echo $this->get_render_attribute_string( 'doctor_content' ); ?>><?php echo $settings['doctor_content']; ?></p>
                        <div class="doctor__credentials">
                            <h3>Crenetials & memberships</h3>
                            <ul>
	                            <?php
	                            foreach ( $tabs as $index => $item ) :
		                            $doctor_membership_setting_key = $this->get_repeater_setting_key( 'membership', 'doctorMemberships', $index );
		                            $this->add_render_attribute( $doctor_membership_setting_key, [] );
		                            ?>
                                    <li<?php echo $this->get_render_attribute_string( $doctor_membership_setting_key ); ?>><?php echo $item['membership']; ?></li>
	                            <?php
	                            endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="doctor__photo">
                            <img src="<?php echo $settings['doctor_photo']['url']?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        view.addInlineEditingAttributes( 'doctor_name', 'none' );
        view.addInlineEditingAttributes( 'doctor_position', 'none' );
        view.addInlineEditingAttributes( 'doctor_content', 'none' );
        #>

        <div class="doctor">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <h2 {{{ view.getRenderAttributeString('doctor_name') }}}>{{{ settings.doctor_name }}}</h2>
                        <div class="position"><span {{{ view.getRenderAttributeString('doctor_position') }}}>{{{ settings.doctor_position }}}</span></div>
                        <p {{{ view.getRenderAttributeString('doctor_content') }}}>{{{ settings.doctor_content }}}</p>
                        <div class="doctor__credentials">
                            <h3>Crenetials & memberships</h3>
                            <ul>
                                <#
                                var elementIndex = 0;
                                _.each( settings.doctorMemberships, function( item, index ) {

                                DoctorMembershipKey = view.getRepeaterSettingKey( 'membership', 'doctorMemberships',index );

                                view.addRenderAttribute( DoctorMembershipKey, {
                                } );

                                view.addInlineEditingAttributes( DoctorMembershipKey, 'none' );

                                #>
                                <li {{{ view.getRenderAttributeString( DoctorMembershipKey ) }}}>{{{ item.membership }}}</li>
                                <#
                                } ); #>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="doctor__photo">
                            <img src="{{{ settings.doctor_photo.url }}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php
	}
}
