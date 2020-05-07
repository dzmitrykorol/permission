<?php
namespace ElementorWidgetExtender\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class MT_locationSections extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mt-locsec';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( '[Master Template] Location Section ', 'elementor-header-bullet' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}



	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor-header-bullet' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Header Address', 'elementor-header-bullet' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your location Description', 'elementor' ),
				'default' => __( 'Add Your Location Description Here', 'elementor' ),
			]
		);

		$this->add_control(
		        'locationimage',
                [
                        'label' => 'Choose Location Image',
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src()
                    ]
                ]
        );

        $this->add_control(
            'leadbutton',
            [
                'label' => 'Lead Button',
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your lead button text here', 'elementor' ),
                'default'     => __( 'Get Started', 'elementor' ),
            ]
        );

        $this->add_control(
            'description_link',
            [
                'label' => 'Button Link To',
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'Enter your link here', 'elementor' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Content Style', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
			        'label' => 'Location Header Typography',
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} h2.title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Location Header Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h2.title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => 'Location Description Typography',
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .description',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Location Description Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */

	protected function render() {
	    $settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'description', 'none' );
		$this->add_inline_editing_attributes( 'description_link', 'none' );
		$this->add_inline_editing_attributes( 'leadbutton', 'none' );
		?>

        <section class="sec-home-location">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 margin-auto">
                        <div class="sec-home-location-text">
                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                            <div class="description"> <div <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></div></div>
                            <a href="<?php echo $settings['description_link']['url']; ?>"><button><?php echo $settings['leadbutton']; ?></button></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="<?php echo $settings['locationimage']['url']; ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
			<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
	    ?>

        <#
        view.addInlineEditingAttributes( 'description', 'none' );
        view.addInlineEditingAttributes( 'leadbutton', 'none' );
        #>

        <section class="sec-home-location">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 margin-auto">
                        <div class="sec-home-location-text">
                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                            <div class="description"> <div {{{ view.getRenderAttributeString('description') }}}>{{{ settings.description }}}</div> </div>
                            <button>{{{ settings.leadbutton }}}</button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="{{{ settings.locationimage.url }}}" alt="">
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
