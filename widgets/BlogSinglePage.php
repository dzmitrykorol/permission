<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class BlogSinglePage extends Widget_Base
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
        return 'blog-single-page';
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
        return __('[D.Korol] Blog Single Page Widget', 'elementor-header-bullet');
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
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('paragraphText', 'none');

        $posts = get_posts(array(
            'numberposts' => 5,
            'category_name' => 'blog',
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => array(),
            'exclude' => array(),
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true,
        ));

        ?>

        <div class="tabs tabs-article" data-tabs="secondary">
            <div data-tab="blog" class="blog active">
                <div class="hero">
                </div>

                <div class="columnar">
                    <div class="columns-twelve">
                        <a href="#" class="article-category">Cryptocurrency</a>
                        <h1>Cryptocurrency value rises over $14 billion in 24 hours as bitcoin rallies 10%</h1>
                        <div class="subtitle-article">Bitcoin was up over 10% from 24 hours previously trading at
                            $6,569.17 at around 11:57 a.m. Singapore time.
                        </div>
                    </div>
                </div>

                <div class="columnar article-share">

                    <div class="share-social-info columns-four-one">
                        <div class="photo"><img src="<?php echo $path; ?>assets/icons/drawkit-folder-man-colour.svg">
                        </div>
                        <div class="text-wrap">
                            <div class="text">Permission</div>
                            <a href="#">@permissionIO</a>
                        </div>
                    </div>
                    <div class="share-social-icons columns-four-nine">
                        <div class="share-text">share</div>
                        <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/tw-icon.svg"></a>
                        <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/fa-icon.svg"></a>
                        <a href="#" class="share-icons"><img
                                    src="<?php echo $path; ?>assets/icons/LinkedInLogo.svg"></a>
                        <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/mail-ic.svg"></a>
                    </div>

                </div>

                <div class="columnar article-img">
                    <div class="columns-twelve">
                        <img src="<?php echo $path; ?>assets/img-e.png">
                        <p>Source</p>
                    </div>
                </div>

                <div class="columnar article-date">
                    <div class="columns-eight">
                        <p>PUBLISHED TUE, MAR 24 2020 / 12:05 AM EDT</p>
                    </div>
                </div>
                <div class="columnar article-content">
                    <div class="columns-eight">
                        <p><a href="#">Cryptocurrency prices rallied</a> on Tuesday even as equity markets continue to
                            come under pressure due to coronavirus fears weighing on investors’ sentiment. </p>
                        <p>Bitcoin was up over 10% from 24 hours previously, trading at $6,569.17 at around 11:57 a.m.
                            Singapore time, according to data from Coindesk.</p>
                        <p>Ethereum was up over 7% while XRP saw a more than 5% jump in its price. </p>
                        <p>The market capitalization — or entire value of the cryptocurrency market — rose over $14
                            billion in 24 hours at 11:47 a.m. Singapore time to reach $182.62 billion., according to
                            data from Coinmarketcap.com. </p>
                        <div class="wp-block-considerable-quote left">
                            <div class="quote">“We’re seeing some really bullish bitcoin price action today along with
                                other asset classes after the Fed announced unprecedented measures yesterday to shore up
                                the economy,”
                            </div>
                        </div>
                        <p>Cryptocurrency prices rallied on Tuesday even as equity markets continue to come under
                            pressure due to coronavirus fears weighing on investors’ sentiment. </p>
                        <p>Bitcoin was up over 10% from 24 hours previously, trading at $6,569.17 at around 11:57 a.m.
                            Singapore time, according to data from Coindesk.</p>
                        <p>Ethereum was up over 7% while XRP saw a more than 5% jump in its price. </p>
                        <p><a href="#">Stocks in Europe</a> and the U.S. closed lower again on Monday with
                            cyptocurrencies bucking the trend. In Asia, stocks were broadly higher in Tuesday morning
                            trade after the U.S. Federal Reserve announced an open-ended asset purchase program on
                            Monday to support markets as the number of coronavirus cases globally continue to rise. </p>
                        <p>Cryptocurrency prices rallied on Tuesday even as equity markets continue to come under
                            pressure due to coronavirus fears weighing on investors’ sentiment. </p>
                        <p>Bitcoin was up over 10% from 24 hours previously, trading at $6,569.17 at around 11:57 a.m.
                            Singapore time, according to data from Coindesk.</p>
                        <p><a href="#">Ethereum</a> was up over 7% while XRP saw a more than 5% jump in its price. </p>

                        <div class="wp-block-article">
                            <div class="article-card-thumb"><img src="<?php echo $path; ?>assets/bullseye-dark.png">
                            </div>
                            <div class="blog-card-desc">
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                        <p>Cryptocurrency prices rallied on Tuesday even as equity markets continue to come under
                            pressure due to coronavirus fears weighing on investors’ sentiment. </p>
                        <p><a href="#">Bitcoin</a> was up over 10% from 24 hours previously, trading at $6,569.17 at
                            around 11:57 a.m. Singapore time, according to data from Coindesk.</p>
                        <p>Ethereum was up over 7% while XRP saw a more than 5% jump in its price. </p>
                        <p>Stocks in Europe and the U.S. closed lower again on Monday with cyptocurrencies bucking the
                            trend. In Asia, stocks were broadly higher in Tuesday morning trade after the U.S. Federal
                            Reserve announced an open-ended asset purchase program on Monday to support markets as the
                            number of coronavirus cases globally continue to rise. </p>
                        <p><a href="#">Cryptocurrency prices</a> rallied on Tuesday even as equity markets continue to
                            come under pressure due to coronavirus fears weighing on investors’ sentiment. </p>
                        <p>Bitcoin was up over 10% from 24 hours previously, trading at $6,569.17 at around 11:57 a.m.
                            Singapore time, according to data from Coindesk.</p>
                        <p>Ethereum was up over 7% while XRP saw a more than 5% jump in its price. </p>
                        <div class="tags">TAGS: <a href="#">Cryptocurrency,</a> <a href="#">Bitcoin,</a> <a href="#">Asia,</a>
                            <a href="#">Markets</a></div>
                        <div class="share-social-icons">
                            <div class="share-text">share</div>
                            <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/tw-icon.svg"></a>
                            <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/fa-icon.svg"></a>
                            <a href="#" class="share-icons"><img
                                        src="<?php echo $path; ?>assets/icons/LinkedInLogo.svg"></a>
                            <a href="#" class="share-icons"><img src="<?php echo $path; ?>assets/icons/mail-ic.svg"></a>
                        </div>
                    </div>
                </div>


                <div class="columnar article-nav">
                    <div class="columns-four-two">
                        <div class="text">Previous Post</div>
                        <a href="">Bitcoin was up over 10% from 24 hours previously trading at $6,569.17 at around 11:57
                            a.m. Singapore time.</a>
                    </div>
                    <div class="columns-four-eight">
                        <div class="text">Next Post</div>
                        <a href="">Bitcoin was up over 10% from 24 hours previously trading at $6,569.17 at around 11:57
                            a.m. Singapore time.</a>
                    </div>
                </div>


                <div class="columnar">
                    <div class="card blog-newsletter article-newsletter columns-twelve">
                        <div class="">
                            <h2 class="centered-text">
                                Get our newsletter in your inbox Monday through Friday.
                            </h2>
                        </div>
                        <div class="blog-newsletter-email">
                            <div class="text-input marketing with-button">
                                <input type="text" class="small-copy" placeholder="Email Address">
                                <label>Email Address</label>
                                <button class="salmon marketing">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="article-video">
                    <div class="columnar">
                        <div class="columns-seven">
                            <h2>Watch This</h2>
                        </div>
                        <div class="columns-ten-three">
                            <a href="#" class="all-articles">
                                All Videos
                                <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                            </a>
                        </div>
                        <div class="columns-twelve video-block">
                            <a href="#">
                                <img src="<?php echo $path; ?>assets/icons/play.svg">
                            </a>
                            <p>Bitcoin was up over 10% from 24 hours previously trading at $6,569.17 at around 11:57
                                a.m. Singapore time.</p>
                        </div>
                    </div>
                </div>


                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>More articles about Permission</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="#" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <div class="columns-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-five-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-nine-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-five-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-nine-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>Permission Updates</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="#" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <div class="columns-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-five-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-nine-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>All Articles</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="#" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <div class="columns-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-five-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="columns-nine-four">
                        <div class="blog-card card">
                            <div class="blog-card-thumb"></div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Category 1
                                </div>
                                <div class="blog-card-excerpt">
                                    Messari adds Permission to it’s Disclosure Registry, joining the ranks of
                                    world-renowned projects…
                                </div>
                                <a href="#" class="blog-card-link">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
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
                            <h1 class="title"><span {{{ view.getRenderAttributeString('leadText') }}}>{{{
                                settings.leadText }}}</span></h1>
                            <h2 class="sub-title"><span {{{ view.getRenderAttributeString('paragraphtext') }}}>{{{
                                settings.paragraphtext }}}</span></h2>
                            <button {{{ view.getRenderAttributeString(
                            'leadbutton') }}}>{{{ settings.leadbutton }}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <# }#>
        </section>
        <?php
    }
}
