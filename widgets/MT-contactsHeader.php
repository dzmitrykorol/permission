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
class MT_contactsHeader extends Widget_Base {
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
		return 'mt-ContactsHeader';
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
		return __( '[Master Template] Contact Us Header', 'elementor' );
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
			'contactus_title',
			[
				'label' => __( 'Header Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'We are based in state, city', 'elementor' ),
				'placeholder' => __( 'Enter the your contact us page title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'contactus_icon',
			[
				'label' => __( 'Contact Us Bullet Icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'place'  => __( 'Place', 'plugin-domain' ),
					'phone' => __( 'Phone', 'plugin-domain' ),
					'time' => __( 'Time', 'plugin-domain' ),
				],
			]
		);

		$repeater->add_control(
			'contactus_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'default' => __( 'Chicago, IL, Office, 686 Haag Circles', 'elementor' ),
				'placeholder' => __( 'Contact Us content text', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'contactus_items',
			[
				'label' => __( 'Contact Us Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ contactus_content }}}',
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
		$bullets = $this->get_settings_for_display( 'contactus_items' );
		$settings = $this->get_settings_for_display();
		?>

        <section class="contacts contacts--header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
	                    <?php
	                    $this->add_inline_editing_attributes( 'contactus_title', 'none' );
	                    ?>
                        <h2 <?php echo $this->get_render_attribute_string( 'contactus_title' ); ?>><?php echo $settings['contactus_title']; ?></h2>
                    </div>
                    <div class="col-12">
                        <div class="contacts__elements">
	                        <?php
	                        foreach ( $bullets as $index => $item ) :
		                        $contactus_content_setting_key = $this->get_repeater_setting_key( 'contactus_content', 'contactus_items', $index );

		                        $this->add_render_attribute( $contactus_content_setting_key, [] );
		                        $this->add_inline_editing_attributes( 'contactus_content', 'none' );
		                        ?>
                                <div class="contacts__element">
                                    <img src="<?php echo get_template_directory_uri()?>/img/<?php echo $item['contactus_icon'] ?>.svg" alt="">
                                    <p <?php echo $this->get_render_attribute_string( $contactus_content_setting_key ); ?>><?php echo $item['contactus_content']; ?></p>
                                </div>
	                        <?php
	                        endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
