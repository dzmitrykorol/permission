<?php

namespace ElementorWidgetExtender\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class MT_indexLeader extends Widget_Base {

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
		return 'mt-indexLead';
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
		return __( '[Master Template] Index Lead ', 'elementor-header-bullet' );
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
				'label' => __( 'Lead Content', 'elementor-header-bullet' ),
			]
		);

        $this->add_control(
            'use_video',
            [
                'label' => __('Use video as background?', 'elementor-hello-world'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor-hello-world'),
                'label_off' => __('No', 'elementor-hello-world'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label'       => 'Background poster for video',
                'type'        => Controls_Manager::MEDIA,
                'placeholder' => 'Choose image for poster',
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'background_video',
            [
                'label'       => 'Background video',
                'type'        => Controls_Manager::TEXT,
                'placeholder' => 'Relative path to video file',
                'default'     => '',
            ]
        );

		$this->add_control(
			'leadText',
			[
				'label'       => 'Main H1 text',
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'Enter H1 text here',
				'default'     => 'Gastroenteritis Is A Serious Problem'
			]
		);

        $this->add_control(
            'promopart',
            [
                'label'       => 'Text for video section',
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => 'Enter here any text',
            ]
        );

        $this->add_control(
            'form_id',
            [
                'label'       => 'ID of form',
                'type'        => Controls_Manager::NUMBER,
                'placeholder' => 'Enter id of GF form',
                'default'     => '2'
            ]
        );

		$this->add_control(
			'paragraphtext',
			[
				'label'       => __( 'Main Paragraph text', 'elementor-header-bullet' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your lead paragraph text here', 'elementor' ),
				'default'     => __( 'Making Dental Care Attainable', 'elementor' ),
			]
		);

		$this->add_control(
		        'leadbutton',
                [
                    'label' => 'Lead Button',
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your lead button text here', 'elementor' ),
                    'default'     => __( 'Schedule an appointment', 'elementor' ),
                ]
        );

        $this->add_control(
            'leadbutton_link',
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
				'label' => __( 'Lead Content Style', 'elementor-hello-world' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Main H1 Typography',
				'name'     => 'h1_typography',
				'selector' => '{{WRAPPER}} h1.title span',
			]
		);

		$this->add_control(
			'h1_color',
			[
				'label'     => __( 'Main H1 Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],

				'selectors' => [
					'{{WRAPPER}} h1.title span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'lead_backgroundcolor',
			[
				'label'     => __( 'Main section background Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#f1f5fb',
				'selectors' => [
					'{{WRAPPER}} .sec-home-img' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'    => 'Main Paragraph Typography',
				'name'     => 'p_typography',
				'selector' => '{{WRAPPER}} h2.sub-title span',
			]
		);

		$this->add_control(
			'paragraph_color',
			[
				'label'     => __( 'Main Paragraph Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h2.sub-title span' => 'color: {{VALUE}}',
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
        $promoText = $settings['promopart'];
        $formId = $settings['form_id'];
        $this->add_inline_editing_attributes( 'background_image', 'none' );
        $this->add_inline_editing_attributes( 'background_video', 'none' );
        $this->add_inline_editing_attributes( 'leadText', 'none' );
		$this->add_inline_editing_attributes( 'paragraphText', 'none' );
		$this->add_inline_editing_attributes( 'leadbutton', 'none' );
		$this->add_inline_editing_attributes( 'leadbutton_link', 'none' );
		$this->add_inline_editing_attributes( 'lead_backgroundcolor', 'none' );
		?>
        <section class="sec-home-img" <?php if ($settings['use_video'] === 'yes') { echo 'style=height:unset'; }?>>
            <?php if ($settings['use_video'] === 'yes') { ?>
                <div class="fullscreen-bg">
                    <video src="<?php echo $settings['background_video']; ?>" class="fullscreen-bg__video" onloadeddata="this.play();" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline">
                        <source src="<?php echo $settings['background_video']; ?>" type="video/mp4">
                        Your browser does not support the video tag or the file format of this video.
                    </video>
                </div>
            <div class="container hide">
                <div class="row wrapper">
                    <div class="col-6 promopart">
                        <?php echo $promoText; ?>
                </div>
                    <div class="col-6 leadform">
                        <?php
                        echo do_shortcode('[gravityform id='.$formId.' title=true description=false ajax=true tabindex=1]');
                        ?>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-home">
                                <h1 class="title"><span <?php echo $this->get_render_attribute_string( 'leadText' ); ?>><?php echo $settings['leadText']; ?></span></h1>
                                <h2 class="sub-title"><span <?php echo $this->get_render_attribute_string( 'paragraphtext' ); ?>><?php echo $settings['paragraphtext']; ?></span></h2>
                                <a href="<?php echo $settings['leadbutton_link']['url']; ?>"><button <?php echo $this->get_render_attribute_string( 'leadbutton' ); ?>><?php echo $settings['leadbutton']; ?></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
        view.addInlineEditingAttributes( 'promopart', 'none' );
        view.addInlineEditingAttributes( 'form_id', 'none' );
        view.addInlineEditingAttributes( 'use_video', 'none' );
        view.addInlineEditingAttributes( 'background_image', 'none' );
        view.addInlineEditingAttributes( 'background_video', 'none' );
        view.addInlineEditingAttributes( 'leadText', 'none' );
        view.addInlineEditingAttributes( 'paragraphtext', 'none' );
        view.addInlineEditingAttributes( 'leadbutton', 'none' );
        #>

        <section class="sec-home-img <# if (settings.use_video === 'yes') { #>style=height:unset<# } #>">
            <# if (settings.use_video === 'yes') { #>
            <div class="fullscreen-bg">
                <video loop muted autoplay poster="{{{ settings.background_image.url }}}" class="fullscreen-bg__video">
                    <source src="{{{ settings.background_video }}}" type="video/mp4">
                </video>
            </div>
            <div class="container hide">
                <div class="row wrapper">
                    <div class="row wrapper">
                        <div class="col-6 promopart">
                            {{{ settings.promopart }}}
                        </div>
                        <div class="col-6 leadform">
                            Here will be placed your form after save and refresh the page
                        </div>
                    </div>
                </div>
            </div>
            <# } else { #>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-home">
                            <h1 class="title"><span {{{ view.getRenderAttributeString('leadText') }}}>{{{ settings.leadText }}}</span></h1>
                            <h2 class="sub-title"><span {{{ view.getRenderAttributeString('paragraphtext') }}}>{{{ settings.paragraphtext }}}</span></h2>
                            <button {{{ view.getRenderAttributeString('leadbutton') }}}>{{{ settings.leadbutton }}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <# }#>
        </section>
		<?php
	}
}
