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
        $path = '/wp-content/plugins/elementor-custom-widgets/';



        ?>
        <link href="/wp-content/plugins/elementor-custom-widgets/base.css" rel="stylesheet">
        <section class="s1">
            <div class="video-hero">
                <div class="hero-player-overlay">
                    <video autoplay="autoplay" loop="loop" muted="muted">
                        <source src="<?php echo $path; ?>assets/permission_stockLoop.mp4" type="video/mp4">
                    </video>
                    <div class="hero-player-content">
                        <div class="hero-player-content-overlay">
                            <div class="columnar">
                                <div class="columns-twelve">
                                    <div class="floating-text">
                                        <div class="play-icon"><img src="<?php echo $path; ?>assets/icons/Play_Icon.svg">
                                        </div>
                                        <h2>Permission’s blockchain and cryptocurrency enable you to<br/><span style="font-weight: 600;">own, control</span> and <span style="font-weight: 600;">profit</span> from your time and personal information.</h2>
                                        <div class="buttons">
                                            <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Join Us Now</a>
                                        </div>
                                    </div>
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
        <section class="s2">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title">Think of Permission as your digital “agent.”</div>
                    <div class="sub-title">We make it easy for you to receive value for your time and data while engaging with the web as you normally do.</div>
                </div>
            </div>
            <div class="columnar tabs-home">
                <ul class="tabs__caption">
                    <li class="active">Первая вкладка</li>
                    <li>Вторая вкладка</li>
                </ul>
                <div class="columns-six">
                    <div class="tabs__content  active">
                        <p>Локаята принимает во внимание онтологический закон исключённого третьего, открывая новые горизонты. Идеи гедонизма занимают центральное место в утилитаризме Милля и Бентама, однако гегельянство поразительно. Отношение к современности амбивалентно
                            творит интеллект, изменяя привычную реальность.</p>
                        <p>Апостериори, созерцание понимает под собой позитивизм, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире. Закон исключённого третьего, следовательно, абстрактен. Катарсис рефлектирует
                            трагический знак, открывая новые горизонты.</p>
                    </div>
                    <div class="tabs__content">
                        <p>Закон внешнего мира, как принято считать, реально рассматривается знак, отрицая очевидное. Гегельянство творит катарсис, хотя в официозе принято обратное. Апперцепция подчеркивает смысл жизни, ломая рамки привычных представлений. Представляется логичным,
                            что адживика откровенна.</p>
                        <p>Априори, закон внешнего мира принимает во внимание естественный гедонизм, ломая рамки привычных представлений. Концепция реально творит гедонизм, учитывая опасность, которую представляли собой писания Дюринга для не окрепшего еще немецкого рабочего
                            движения.</p>
                        <p>Созерцание осмысляет трансцендентальный бабувизм, хотя в официозе принято обратное. Бабувизм абстрактен. Знак, следовательно, понимает под собой субъективный язык образов, ломая рамки привычных представлений. Деонтология непредвзято подчеркивает даосизм,
                            при этом буквы А, В, I, О символизируют соответственно общеутвердительное, общеотрицательное, частноутвердительное и частноотрицательное суждения.</p>
                    </div>
                    <div class="buttons">
                        <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Join Us Now</a>
                    </div>
                </div>
                <div class="columns-six-eight">
                    <img src="https://permission.io/wp-content/uploads/2019/11/heroCatalogue.png">
                </div>
            </div>
        </section>
        <section class="s3">
            <div class="video-block">
                <div class="permission-secondary-video" style="position:relative;">
                    <iframe id="perm-sec-video" src="https://player.vimeo.com/video/366780942" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                    <div class="overlay" style="position: absolute; left: 0;top:0;bottom:0;right:0;background:url('/wp-content/uploads/2019/11/chrl.png') no-repeat;background-size: cover;background-position: center">

                        <div class="play-icon" style="opacity:0.5;margin: 0;">▷</div>
                    </div>
                </div>
            </div>
            <div class="text-block">

            </div>
        </section>
        <section class="s4">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title">The Staus Quo</div>
                    <div class="sub-title">Merchants pay centralized third-party platforms to show you their products, interrupting you and exploiting your data in the process.  Tech giants yield mind-boggling profits while you gain zero financial benefit from your time and information.</div>
                </div>
                <div class="columnar">
                    <div class="columns-five">
                        <div class="title-color">60%</div>
                        <div class="text">of millennials have installed ad blockers to escape chronic interruptions</div>
                        <div class="title-color">87%</div>
                        <div class="text">of consumers would opt out of having their personal information sold to third parties</div>
                        <div class="title-color">8x</div>
                        <div class="text">attention has escalated by a factor of 8 in the past 2 decades</div>
                        <div class="title-color">50B</div>
                        <div class="text">stimated global loss in 2020 due to bots and  click fraud</div>
                    </div>
                    <div class="columns-six-seven">
                        <img src="hhttps://permission.io/wp-content/uploads/2019/11/ad_revenue_piechart.svg">
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="text-bottom">
                            Google, Amazon, and Facebook dominate the web and take nearly 70% of all ad dollars, while shrinking your choices and suffocating merchants with declining ROI and a lack of transparency about whether their ad dollars are spent on real people.
                        </div>
                    </div>
                </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            (function($) {
                $(function() {
                    $("ul.tabs__caption").on("click", "li:not(.active)", function() {
                        $(this)
                            .addClass("active")
                            .siblings()
                            .removeClass("active")
                            .closest("div.tabs-home")
                            .find("div.tabs__content")
                            .removeClass("active")
                            .eq($(this).index())
                            .addClass("active");
                    });
                });
            })(jQuery);

        </script>

        <script>
            (function() {
                var player = new Vimeo.Player(document.querySelector('#perm-sec-video'));

                var overlay = document.querySelector('.permission-secondary-video .overlay');

                function handleClick(evt) {
                    evt.target.style.display = 'none';
                    player.play();
                };

                overlay[bindEvent]('click', handleClick.bind(this));
            })()
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
