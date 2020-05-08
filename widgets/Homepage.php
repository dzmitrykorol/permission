<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class Homepage extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'homepage';
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
    public function get_title()
    {
        return __('[D.Korol] Homepage Widget', 'elementor-header-bullet');
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
    public function get_icon()
    {
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
    public function get_categories()
    {
        return ['general'];
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
//    public function get_script_depends() {
//        return [ 'elementor-hello-world' ];
//    }


    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {

        // repeater for footer starts
        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __('Tab categories', 'elementor'),
            ]
        );

        // repeater for clinic name and phones ends
        $repeater = new Repeater();

        $repeater->add_control(
            'cat_name',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'cat_url',
            [
                'label' => __('Enter text..', 'elementor'),
                'type' => Controls_Manager::URL,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'cat_all',
            [
                'label' => __('Nav Menu tabs', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'cat_name' => __('Category 1', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                    [
                        'cat_name' => __('Category 2', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                    [
                        'cat_name' => __('Category 3', 'elementor'),
                        'cat_url' => __('#', 'elementor'),
                    ],
                ],
                'title_field' => 'Location section',
            ]
        );
        $this->end_controls_section();
        // repeater for clinic name and phones ends

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

    protected function render()
    {
        ?>
        <link href="/wp-content/plugins/elementor-custom-widgets/base.scss" rel="stylesheet">
        <section class="homepage-wrapper">
            <div class="video-hero">
                <div class="hero-player-overlay">
                    <video autoplay="autoplay" loop="loop" muted="muted">
                        <source src="<?php echo $path; ?>/assets/permission_stockLoop.mp4" type="video/mp4">
                    </video>
                    <div class="hero-player-content">
                        <div class="hero-player-content-overlay">
                            <div class="floating-text">
                                <div class="play-icon">
                                    ▷
                                </div>
                                <h2>Permission’s blockchain and cryptocurrency enable you to<br/><span style="font-weight: 600;">own, control</span> and <span style="font-weight: 600;">profit</span> from your time and personal information.</h2>
                                <div class="buttons">
                                    <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Join Us Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <iframe id="hero-player" src="https://player.vimeo.com/video/366780942" style="width: 100vw;height: 56.25vw;" frameborder="0" webkit-playsinline="true"
                        playsinline="true" allow="autoplay">
                </iframe>
            </div>
        </section>























        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            var bindEvent = document['addEventListener'] ? 'addEventListener' : 'attachEvent';
            var videoHero;
            var heroOverlay;
            var heroContent;
            var player;
            var isPermissionMobile = false;
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                isPermissionMobile = true;
            }

            function setupHero() {
                player = new Vimeo.Player(document.querySelector('#hero-player'));

                videoHero = document.querySelector('.video-hero');

                heroOverlay = document.querySelector('.hero-player-overlay');
                heroContent = document.querySelector('.hero-player-content');
                heroContent[bindEvent]('click', handleClick.bind(this));
                player.on('ended', () => {
                    heroOverlay.style.display = '';
                    heroContent.classList.remove('fadeout');
                });
            }

            function handleFullscreen() {
                heroContent.classList.remove('fadeout');
            }

            function handleClick(evt) {

                var btnCheck = evt.target.getAttribute('role');

                if(btnCheck && btnCheck === 'button') {
                    return;
                }

                player.getPaused().then((paused) => {
                    if (!paused) {
                        stopVideo();
                        // heroContent.classList.remove('fadeout');
                    } else {
                        heroContent.classList.add('fadeout');

                        if (isPermissionMobile) {
                            videoHero.classList.add('slideup');
                        }
                        playVideo();
                        setTimeout(()=> {
                            heroOverlay.style.display = 'none';
                        }, 2050);
                    }
                });
            }

            function playVideo() {
                player.play();
            }

            function stopVideo() {
                player.pause();
            }

            if (document.readyState === "complete" ||
                (document.readyState !== "loading" && !document.documentElement.doScroll)) {
                setupHero();
            } else {
                document.addEventListener("DOMContentLoaded", setupHero);
            }
        </script>
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
    protected function _content_template()
    {
        ?>

        <?php
    }
}
