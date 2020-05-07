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
class MT_DoctorMemberships extends Widget_Base {
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
		return 'mt-DoctorMemberships';
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
		return __( '[Master Template] Doctor Memberships', 'elementor' );
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
			'section_title',
			[
				'label' => __( 'Section Title', 'elementor' ),
				'default' => __( 'OUR DOCTORS', 'elementor' ),
				'placeholder' => __( 'Enter The Section Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'doctor_name',
			[
				'label' => __( 'Doctor Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Barry Brown', 'elementor' ),
				'placeholder' => __( 'Enter The Doctor Name', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'doctor_position',
			[
				'label' => __( 'Position', 'elementor' ),
				'default' => __( 'Dentist', 'elementor' ),
				'placeholder' => __( 'Enter The Doctor Position', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'doctor_content',
			[
				'label' => __( 'Doctor Content', 'elementor' ),
				'default' => __( 'Doctor Content', 'elementor' ),
				'placeholder' => __( 'Doctor Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'doctor_link',
			[
				'label' => __( 'Link to Doctor', 'plugin-domain' ),
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


		$repeater->add_control(
			'doctor_photo',
			[
				'label' => 'Choose Doctor Photo',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_control(
			'show_morelink',
			[
				'label' => __( 'Show "View More"', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'doctors',
			[
				'label' => __( 'Doctors', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'doctor_name' => __( 'Barry Brown', 'elementor' ),
						'doctor_position' => __( 'Dentist', 'elementor' ),
						'doctor_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo', 'elementor' ),
					],
					[
						'doctor_name' => __( 'Barry Brown', 'elementor' ),
						'doctor_position' => __( 'Dentist', 'elementor' ),
						'doctor_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo', 'elementor' ),
					],
					[
						'doctor_name' => __( 'Barry Brown', 'elementor' ),
						'doctor_position' => __( 'Dentist', 'elementor' ),
						'doctor_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo', 'elementor' ),
					],
					[
						'doctor_name' => __( 'Barry Brown', 'elementor' ),
						'doctor_position' => __( 'Dentist', 'elementor' ),
						'doctor_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo', 'elementor' ),
					],
				],
				'title_field' => '{{{ doctor_name }}}',
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
		$tabs = $this->get_settings_for_display( 'doctors' );
		$settings = $this->get_settings_for_display();
		?>


        <section class="doctors-hub">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 doctors-hub__title">
                        <?php
                        $this->add_inline_editing_attributes( 'section_title', 'none' );
                        ?>
                        <h2 <?php echo $this->get_render_attribute_string( 'section_title' ); ?>><?php echo $settings['section_title']; ?></h2>
                        <?php if ( 'yes' === $settings['show_morelink'] ) {
                            echo '<a href="/">View More</a>';
                        }?>

                    </div>
                </div>
                <div class="row">
	                <?php
	                $element_index = 0;
	                foreach ( $tabs as $index => $item ) :
                        $tab_count = $index + 1;

                        $element_index = $element_index + 1;
                        $doctor_name_setting_key = $this->get_repeater_setting_key( 'doctor_name', 'doctors', $index );
                        $doctor_position_setting_key = $this->get_repeater_setting_key( 'doctor_position', 'doctors', $index );
                        $doctor_content_setting_key = $this->get_repeater_setting_key( 'doctor_content', 'doctors', $index );

                        $this->add_render_attribute( $doctor_name_setting_key, [
                        ] );
                        $this->add_render_attribute( $doctor_position_setting_key, [
                        ] );
                        $this->add_render_attribute( $doctor_content_setting_key, [
                        ] ); ?>
                        <div class="col-md-5 <?php echo ($element_index % 2) ? '' : 'offset-md-1'; ?>">
                            <a href="<?php echo $item['doctor_link']['url'];?>" class="doctors-hub__doctor">
                                <div class="doctors-hub__photo">
                                    <img src="<?php echo $item['doctor_photo']['url']?>" alt="">
                                </div>
                                <div class="doctors-hub__header">
                                    <h3 <?php echo $this->get_render_attribute_string( $doctor_name_setting_key ); ?>><?php echo $item['doctor_name']; ?></h3>
                                    <h4 <?php echo $this->get_render_attribute_string( $doctor_position_setting_key ); ?>><?php echo $item['doctor_position']; ?></h4>
                                </div>
                                <div class="doctors-hub__description">
                                    <p <?php echo $this->get_render_attribute_string( $doctor_content_setting_key ); ?>><?php echo $item['doctor_content']; ?></p>
                                </div>
                            </a>
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
        <#
        view.addInlineEditingAttributes( 'section_title', 'none' );
        #>
        <section class="doctors-hub">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 doctors-hub__title">
                        <h2 {{{ view.getRenderAttributeString('section_title') }}}>{{{ settings.section_title }}}</h2>
                        <# if ( 'yes' === settings.show_morelink ) { #>
                           <a href="/">View More</a>
                        <# } #>
                    </div>
                </div>
                <div class="row">
                    <#
                    var elementIndex = 0;
                    _.each( settings.doctors, function( item, index ) {
                        var tabCount = index + 1;
                        var gridClass;
                            elementIndex++;
                            DoctorTitleKey = view.getRepeaterSettingKey( 'doctor_name', 'doctors',index );
                            DoctorPositionKey = view.getRepeaterSettingKey( 'doctor_position', 'doctors',index );
                            DoctorContentKey = view.getRepeaterSettingKey( 'doctor_content', 'doctors',index );

                            view.addRenderAttribute( DoctorTitleKey, {
                            } );
                            view.addRenderAttribute( DoctorPositionKey, {
                            } );
                            view.addRenderAttribute( DoctorContentKey, {
                            } );

                            view.addInlineEditingAttributes( DoctorTitleKey, 'none' );
                            view.addInlineEditingAttributes( DoctorPositionKey, 'none' );
                            view.addInlineEditingAttributes( DoctorContentKey, 'none' );
                            if (elementIndex % 2) {
                                gridClass = '';
                            } else {
                                gridClass = 'offset-md-1';
                            }
                    #>
                    <div class="col-md-5 {{{ gridClass }}}">
                        <a href="#" class="doctors-hub__doctor">
                            <div class="doctors-hub__photo">
                                <img src="{{{ item.doctor_photo.url }}}" alt="">
                            </div>
                            <div class="doctors-hub__header">
                                <h3 {{{ view.getRenderAttributeString( DoctorTitleKey ) }}}>{{{ item.doctor_name }}}</h3>
                                <h4 {{{ view.getRenderAttributeString( DoctorPositionKey ) }}}>{{{ item.doctor_position }}}</h4>
                            </div>
                            <div class="doctors-hub__description">
                                <p {{{ view.getRenderAttributeString( DoctorContentKey ) }}}>{{{ item.doctor_content }}}</p>
                            </div>
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
