<?php
namespace ElementorWidgetExtender\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;

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
class MT_testinonialsTabs extends Widget_Base {

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
		return 'tabsMT';
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
		return __( '[Master Template] Testimonials Tabs', 'elementor' );
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
		return 'eicon-tabs';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'tabs', 'accordion', 'toggle' ];
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
		$TestimonialsRepeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title & Content', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tabType',
			[
				'label' => __( 'Testimonial Type', 'plugin-domain' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'text'  => __( 'Text', 'plugin-domain' ),
					'video' => __( 'Video', 'plugin-domain' ),
				],
			]
		);

		$TestimonialsRepeater->add_control(
			'testimonialContent',
			[
				'label' => __( 'Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$TestimonialsRepeater->add_control(
			'testimonialAuthor',
			[
				'label' => __( 'Author Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
		);

		$TestimonialsRepeater->add_control(
			'TestimonialPhoto',
			[
				'label' => 'Choose Author Photo',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				]
			]
		);

		$TestimonialsRepeater->add_control(
			'testimonialType',
			[
				'label' => __( 'Testimonial Type', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'text'  => __( 'Text', 'plugin-domain' ),
					'video' => __( 'Video', 'plugin-domain' ),
				],
			]
		);

		$this->add_control(
			'repeaterTestimonial',
			[
				'label' => __( 'Testimonials Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $TestimonialsRepeater->get_controls()
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'elementor' ),
					],
					[
						'tab_title' => __( 'Tab #2', 'elementor' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
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
		$tabs = $this->get_settings_for_display( 'tabs' );
		$testimonials = $this->get_settings_for_display( 'repeaterTestimonial' );
		$id_int = substr( $this->get_id_int(), 0, 3 );
		?>
        <div class="testimonials-tabs">
		    <div class="elementor-tabs" role="tablist">
			<div class="elementor-tabs-wrapper">
				<?php
				foreach ( $tabs as $index => $item ) :
					$tab_count = $index + 1;

					$tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );

					$this->add_render_attribute( $tab_title_setting_key, [
						'id' => 'elementor-tab-title-' . $id_int . $tab_count,
						'class' => [ 'elementor-tab-title', 'elementor-tab-desktop-title' ],
						'data-tab' => $tab_count,
						'tabindex' => $id_int . $tab_count,
						'role' => 'tab',
						'aria-controls' => 'elementor-tab-content-' . $id_int . $tab_count,
					] );
					?>
					<div <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>><?php echo $item['tab_title']; ?></div>
				<?php endforeach; ?>
			</div>
			<div class="elementor-tabs-content-wrapper">
				<?php
				foreach ( $tabs as $index => $item ) :
					$tab_count = $index + 1;

					$tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );

					$tab_title_mobile_setting_key = $this->get_repeater_setting_key( 'tab_title_mobile', 'tabs', $tab_count );

					$this->add_render_attribute( $tab_content_setting_key, [
						'id' => 'elementor-tab-content-' . $id_int . $tab_count,
						'class' => [ 'elementor-tab-content', 'elementor-clearfix' ],
						'data-tab' => $tab_count,
						'role' => 'tabpanel',
						'aria-labelledby' => 'elementor-tab-title-' . $id_int . $tab_count,
					] );

					$this->add_render_attribute( $tab_title_mobile_setting_key, [
						'class' => [ 'elementor-tab-title', 'elementor-tab-mobile-title' ],
						'tabindex' => $id_int . $tab_count,
						'data-tab' => $tab_count,
						'role' => 'tab',
					] );

					$this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );
					?>
					<div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>>
						<?php
						foreach ( $testimonials as $indexTestimonial => $itemTestimonial ) :
							$testimonial_content = $this->get_repeater_setting_key('testimonialContent', 'repeaterTestimonial', $indexTestimonial);

							$this->add_render_attribute( $testimonial_content, [] );

							$this->add_inline_editing_attributes( $testimonial_content, 'advanced' );
							if ( $itemTestimonial['testimonialType'] == $item['tabType']) {
							?>
							<div class="item">
								<div class="text-testimonials">
									<p><?php echo  $itemTestimonial['testimonialContent']; ?></p>
								</div>
								<div class="footer-testimonials">
									<div class="photo-name">
										<div class="photo"><img src="<?php echo  $itemTestimonial['TestimonialPhoto']['url']; ?>" alt=""></div>
										<div class="name"><?php echo  $itemTestimonial['testimonialAuthor']; ?></div>
									</div>
									<div class="stars-logo">
										<div class="stars"><img src="http://mt.elementor/wp-content/themes/elementor-theme/img/stars.svg" alt=""></div>
										<div class="logo"><img src="http://mt.elementor/wp-content/themes/elementor-theme/img/logo-testimonials.png" alt=""></div>
									</div>
								</div>
							</div>
						<?php }
							endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
        </div>
		<?php
	}


}
