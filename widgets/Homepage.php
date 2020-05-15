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
                                        <h2>Permission’s blockchain and cryptocurrency enable you to <span">own, control</span> and <span>profit</span> from your time and personal information.</h2>
                                        <div class="buttons">
                                            <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Join Us Now</a>
                                        </div>
                                        <div class="social-icons">
                                            <a href="#"><img src="<?php echo $path; ?>assets/icons/TelegramLogo.svg">Telegram Chat</a>
                                            <a href="#"><img src="<?php echo $path; ?>assets/icons/TelegramLogo.svg">Telegram Announcement</a>
                                            <a href="#"><img src="<?php echo $path; ?>assets/icons/TwitterLogo.svg">Twitter</a>
                                            <a href="#"><img src="<?php echo $path; ?>assets/icons/MediumLogo.svg">Medium</a>
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
                <ul class="tabs__caption columns-twelve">
                    <li class="active">For Members</li>
                    <li>For Brands</li>
                </ul>
                <div class="columns-six">
                    <div class="tabs__content  active">
                        <div class="name">For Members</div>
                        <p class="content">Be part of a consumer-focused community that values transparency and trust</p>
                        <p class="content">Permission your data to brands and service providers and be paid for data you choose to share while shopping, being entertained, and other online engagement</p>
                        <p class="content">Opt-in to interact with brands on an unobtrusive basis and receive content that is personalized and relevant</p>
                        <p class="content">Know that your data is secure, anonymized, and never (ever) sold to third parties</p>
                    </div>
                    <div class="tabs__content">
                        <div class="name">For Brands</div>
                        <p class="content">
                            Value exchange advertising achieves 1:1 engagement and a holistic view of members’ needs and desires in real time.</p>
                        <p class="content">The ability to identify and reward members based on their permissioned data leads to brand loyalty and increased ROI.</p>
                        <p class="content">Permission blockchain provides accountability and transparency, eliminating ad spend waste.</p>
                    </div>
                    <div class="buttons">
                        <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Start Earning Now</a>
                    </div>
                </div>
                <div class="columns-four-eight">
                    <img src="https://permission.io/wp-content/uploads/2019/11/heroCatalogue.png">
                </div>
            </div>
        </section>















        <section class="s3">
            <div class="video-block">
                <div class="permission-secondary-video">
                    <iframe id="perm-sec-video" src="https://player.vimeo.com/video/366780942" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                    <div class="overlay">
                        <div class="play-icon">
                            <img src="<?php echo $path; ?>assets/icons/Play_Icon.svg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-block">
                <div class="text">Permission is leading the Web Toward a New Engagement Model</div>
            </div>
        </section>










        <section class="s4">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title">The Staus Quo</div>
                    <div class="sub-title">Merchants pay centralized third-party platforms to show you their products, interrupting you and exploiting your data in the process.  Tech giants yield mind-boggling profits while <span>you gain zero financial benefit from your time and information.</span></div>
                </div>
            </div>
            <div class="columnar content-wrapper">
                <div class="columns-five">
                    <div class="title-color color-blue">60%</div>
                    <div class="text">of millennials have installed ad blockers to escape chronic interruptions</div>
                    <div class="title-color">87%</div>
                    <div class="text">of consumers would opt out of having their personal information sold to third parties</div>
                    <div class="title-color color-orange">8x</div>
                    <div class="text">attention has escalated by a factor of 8 in the past 2 decades</div>
                    <div class="title-color color-blue">50B</div>
                    <div class="text">stimated global loss in 2020 due to bots and click fraud</div>
                </div>
                <div class="columns-six-seven">
                    <img src="<?php echo $path; ?>assets/ad_revenue_piechart.svg">
                </div>
            </div>
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="text-bottom">
                        Google, Amazon, and Facebook dominate the web and take nearly 70% of all ad dollars, while <span>shrinking your choices</span> and suffocating merchants with declining ROI and a lack of transparency about whether their ad dollars are spent on real people.
                    </div>
                </div>
            </div>
        </section>







        <section class="s5">
            <div class="columnar">
                <div class="columns-six img-block">
                    <div class="img-wrap"><img src="<?php echo $path; ?>assets/Illustration.png"></div>
                    <div class="text">Own Your Data™</div>
                </div>
                <div class="content-block columns-five-eight">
                    <div class="text">Permission.io is changing the status quo with <span>ASK</span>,™ <span>the Standard Currency for Permission</span></div>
                    <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/s5-ask.svg"></div>
                </div>
            </div>
        </section>



        <section class="s6">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title"><span>ASK</span> fuels an ecosystem for sellers and buyers to engage on a permission basis</div>
                </div>
            </div>
            <div class="columnar content-wrapper">
                <div class="columns-five-two">
                    <img src="<?php echo $path; ?>assets/handphone.png">
                </div>
                <div class="columns-four-eight">
                    <div class="sub-title">Join Us</div>
                    <div class="text">Empowers consumers to <span>profit from their time and data</span> without giving up control</div>
                    <div class="text">Enables businesses to earn <span>trust</span> and <span>loyalty</span> by asking permission and rewarding customers for their engagement, leading to <span>long-term relationships</span> and <span>increased ROI</span></div>
                    <div class="buttons">
                        <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Start Earning Now</a>
                    </div>
                </div>
            </div>
        </section>




        <section class="s7">
            <div class="columnar">
                <div class="home-col-wrap columns-twelve">
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/card3.svg"></div>
                        <div class="title">Revolutionizing Rewards</div>
                        <div class="text"><span>ASK</span> is a currency that can be earned, traded and spent at the time and location of your choice.  Its utility extends beyond the ordinary rewards program.  Businesses can instantly tap into the power of permission by using ASK to engage and reward customers.</div>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/card2.svg"></div>
                        <div class="title">A use case for <span>ASK</span></div>
                        <div class="text">Our flagship app where users opt-in to register their personal interests and other key data, and embark on various shopping and entertainment journeys. Users earn ASK for engaging with videos, surveys, and other content that addresses their needs and desires. Users can spend ASK and other leading currencies on the Permission platform.</div>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/card1.svg"></div>
                        <div class="title">An optimized ecosystem</div>
                        <div class="text">Permission’s SDK will allow devs to build apps that enable businesses to become permission marketers and meet consumers’ increasing (and rightful!) demand for rewards.  The growth of permission-based applications will incentivize the currency’s growth and enhance its compounding effect. </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="s8">
            <div class="columnar">
                <div class="title columns-twelve">See What Developers Are Creating</div>
                <div class="buttons columns-twelve">
                    <a href="#" role="button" target="_blank"click="">Read the Documentation</a>
                </div>
            </div>
        </section>

        <section class="s9">
            <div class="permission-team">



                <div class="team-blurb">
                    <h3>Exceptional Leaders</h3>
                    <p>
                        Serial entrepreneurs in tech, media, and finance, as well as PhDs and
                        Engineering leaders from
                        Fortune 500 companies
                    </p>
                    <div class="navigation">
                        <span class="previous">&lt;</span>
                        <span class="next">&gt;</span>
                    </div>
                </div>




                <div class="team-container">
                    <figure>
                        <img src="https://about.permission.io/wp-content/uploads/2019/08/charlie.png">
                        <figcaption>
                            <h4>CHARLES H. SILVER</h4>
                            <span>CEO</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="https://about.permission.io/wp-content/uploads/2019/08/stephen.png">
                        <figcaption>
                            <h4>STEVEN WILKINSON CISSP, CBP</h4>
                            <span>CISO</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="http://stageabout.local/wp-content/uploads/2020/04/Hunter-Jensen.png">
                        <figcaption>
                            <h4>HUNTER JENSEN</h4>
                            <span>CTO</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="http://stageabout.local/wp-content/uploads/2020/04/bobby-v5.png">
                        <figcaption>
                            <h4>BOBBY PETERSEN</h4>
                            <span>VP OF MARKETING</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="https://about.stageabout.wpengine.com/wp-content/uploads/2019/08/Matt.png">
                        <figcaption>
                            <h4>MATT ERHART</h4>
                            <span>VP OF FINANCE &amp; COMPLIANCE</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="https://about.stageabout.wpengine.com/wp-content/uploads/2019/08/therese.png">
                        <figcaption>
                            <h4>THERESE FAHY</h4>
                            <span>HR &amp; CONTROLLER</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="https://about.stageabout.wpengine.com/wp-content/uploads/2019/08/gary1.png">
                        <figcaption>
                            <h4>GARY J. SHERMAN Ph.D</h4>
                            <span>FOUNDING MATHEMATICIAN</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="http://stageabout.local/wp-content/uploads/2020/04/Jennifer-Silver.png">
                        <figcaption>
                            <h4>JENNY SILVER</h4>
                            <span>VP OF COMMUNICATIONS</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="https://about.stageabout.wpengine.com/wp-content/uploads/2019/08/daniel_hiltbrand.png">
                        <figcaption>
                            <h4>DANIEL HILTBRAND</h4>
                            <span>DEVELOPMENT ENGINEER</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="http://stageabout.local/wp-content/uploads/2020/04/Robert-Morris.png">
                        <figcaption>
                            <h4>ROBERT MORRIS</h4>
                            <span>MARKETING MANAGER</span>
                        </figcaption>
                    </figure>
                    <h3>Our Advisors</h3>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/robin.png">
                        <figcaption>
                            <h4>ROBIN BLOOR, PHD</h4>
                            <span>FOUNDER OF BLOOR RESEARCH</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/Richard-1.png">
                        <figcaption>
                            <h4>RICHARD LI</h4>
                            <span>GENERAL PARTNER AT<br /> ALPHABLOCK.COM</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/Andrew-1.png">
                        <figcaption>
                            <h4>ANDREW ESSEX</h4>
                            <span>FORMER CEO OF DROGA5</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/Eric-1.png" data-src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
                        <figcaption>
                            <h4>ERIC ERVIN</h4>
                            <span>CEO OF BLOCKFORCE CAPITAL</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/Ichiro.png">
                        <figcaption>
                            <h4>ICHIRO MINAMIKAWA</h4>
                            <span>CEO OF COINTED JAPAN,<br /> FOUNDER AT BLOCKCHAIN TOKYO</span>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="/wp-content/uploads/2019/08/Rob.png">
                        <figcaption>
                            <h4>ROB GREGORY</h4>
                            <span>CEO OF POST-INTERRUPTIVE,<br /> FORMER PRESIDENT OF WHOSAY</span>
                        </figcaption>
                    </figure>
                    <div class="spacer"></div>
                </div>
            </div>
        </section>


        <section class="s10">
            <div class="columnar">
                <div class="columns-twelve logos-wrap">
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/11/forbes_tech_council_logo.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/tribeca_logo.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/maxim_logo.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/rollingstone_logo.png"></div>
                </div>
            </div>
        </section>

        <section class="s11">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title-block">Permission.io Roadmap</div>
                </div>
            </div>
            <div class="time-line">
                <div class="columnar">
                    <div class="columns-twelve time-line-wrap">
                        <div class="time-line-block item-order-1">
                            <div class="dot"></div>
                            <div class="title">Q3 2019</div>
                            <div class="text-wrap">
                                <p>Affiliate Programs Partnerships</p>
                                <p>Ecommerce Platform Partnerships</p>
                                <p>Merchant Portal</p>
                                <p>3rd Party Permission nodes</p>
                            </div>
                        </div>
                        <div class="time-line-block item-order-4">
                            <div class="dot"></div>
                            <div class="title">Q4 2019</div>
                            <div class="text-wrap">
                                <p>Integration with ID Management Systems</p>
                                <p>Enhanced Persnal Datasets</p>
                                <p>Shop with ASK on Permission Platform</p>
                                <p>Permission Blockchain Governance Policy and System</p>
                            </div>
                        </div>
                        <div class="time-line-block item-order-2">
                            <div class="dot"></div>
                            <div class="title">Q1 2020</div>
                            <div class="text-wrap">
                                <p>SDK release</p>
                                <p>Reporting & Analytics</p>
                                <p>Targeted Personal Dataset Query</p>
                                <p>Developer Website and Community Outreach</p>
                            </div>
                        </div>
                        <div class="time-line-block item-order-5">
                            <div class="dot"></div>
                            <div class="title">Q2 2020</div>
                            <div class="text-wrap">
                                <p>IOS App Release</p>
                                <p>Android App release</p>
                                <p>Web App release</p>
                                <p>Integration with Decentralized Identity Systems</p>
                            </div>
                        </div>
                        <div class="time-line-block item-order-3">
                            <div class="dot"></div>
                            <div class="title">Q3/Q4 2020</div>
                            <div class="text-wrap">
                                <p>Decentralized Blockchain</p>
                                <p>Keyword Bidding System</p>
                                <p>Permission Blockchain Governance</p>
                                <p>Member, Merchant and Advertiser Reputation</p>
                            </div>
                        </div>
                        <div class="time-line-block item-order-6">
                            <div class="dot"></div>
                            <div class="title">Q4 2020</div>
                            <div class="text-wrap">
                                <p>Developer API</p>
                                <p>Two-Sided Marketplace</p>
                                <p>Permission Browser Plugin</p>
                                <p>Data Query Optimization</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="img-time-line" src="<?php echo $path; ?>assets/time-line.svg">
        </section>


        <section class="s12">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title-block">In The Newsp</div>
                </div>
            </div>
            <div class="columnar">
                <div class="home-col-wrap columns-twelve">
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/Fortune.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/Medium.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/Forbes.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/BlockTribune.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/BusinessWire.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                    <div class="card card-home">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/BitcoinExchange.jpg"></div>
                        <div class="text">Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…</div>
                        <a href="#" class="blog-card-link">Read More <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg"></a>
                    </div>
                </div>
            </div>

            <div class="columnar">
                <div class="columns-twelve">
                    <div class="buttons">
                        <a href="#" role="button" target="_blank"click="">All News</a>
                    </div>
                </div>
            </div>
        </section>






        <section class="s13">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title-block">On The Air</div>
                </div>
            </div>
            <div class="columnar">
                <div class="home-col-wrap columns-twelve">

                    <div class="card card-home card-soundcloud">
                        <div class="img-wrap"></div>
                            <iframe width="100%" height="260" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/464133330&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                             <div class="text-wrap">
                                <div class="podcast"><img src="<?php echo $path; ?>assets/podcast.png"></div>
                                <div class="text">CEO Charles Silver talks the Permission Marketplace, Ask, and more...</div>
                            </div>
                    </div>


                    <div class="card card-home card-soundcloud">
                        <div class="img-wrap"></div>
                        <iframe width="100%" height="260" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/464133330&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                        <div class="text-wrap">
                            <div class="podcast"><img src="<?php echo $path; ?>assets/podcast.png"></div>
                            <div class="text">CEO Charles Silver talks the Permission Marketplace, Ask, and more...</div>
                        </div>
                    </div>


                    <div class="columns-blog">
                        <div class="blog-card card blog-home">
                            <div class="blog-card-thumb"><img src="https://stageabout.wpengine.com/wp-content/uploads/2020/04/1_V5BBxrLPOhb03UvUF0rxlQ-1024x868.jpeg">
                            </div>
                            <div class="blog-card-desc">
                                <div class="blog-card-cat">
                                    Data Privacy                                        </div>
                                <div class="blog-card-excerpt">
                                    Solving the “Data Rights” Problem: It’s about Compensation                                        </div>
                                <a href="https://stageabout.wpengine.com/blog/data-privacy/solving-the-data-rights-problem-its-about-compensation/" class="blog-card-link test">
                                    Read More
                                    <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="s14">
            <div class="columnar">
                <div class="columns-twelve">
                    <div class="title-block">Our Partners</div>
                </div>
            </div>

            <div class="columnar">
                <div class="columns-twelve logos-wrap">
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/fabrk-logo.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/messari-logo-1.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/fenwick-logo-1.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2019/10/trezor-logo-2.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2020/01/partner_mycryptocheckout.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2020/04/dd-bw1.png"></div>
                    <div class="logo"><img src="https://permission.io/wp-content/uploads/2020/04/Rocktree-bw1.png"></div>
                </div>
            </div>


        </section>










        <!--Блог обновленная верстка-->
        <!--

        <div class="" data-tabs="secondary">
            <div data-tab="blog" class="blog active">
                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>Articles Written About Permission</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="#" class="all-articles">
                            All Articles
                            <img src="<?php echo $path;?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>



                    <div class="blog-col-wrap columns-twelve">




                        <div class="columns-blog">
                            <div class="blog-card card">
                                <div class="blog-card-thumb"></div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-cat">
                                        Category 1
                                    </div>
                                    <div class="blog-card-excerpt">
                                        Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…
                                    </div>
                                    <a href="#" class="blog-card-link">
                                        Read More
                                        <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="columns-blog">
                            <div class="blog-card card">
                                <div class="blog-card-thumb"></div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-cat">
                                        Category 1
                                    </div>
                                    <div class="blog-card-excerpt">
                                        Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…
                                    </div>
                                    <a href="#" class="blog-card-link">
                                        Read More
                                        <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                    </a>
                                </div>
                            </div>
                        </div>




                        <div class="columns-blog">
                            <div class="blog-card card">
                                <div class="blog-card-thumb"></div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-cat">
                                        Category 1
                                    </div>
                                    <div class="blog-card-excerpt">
                                        Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…
                                    </div>
                                    <a href="#" class="blog-card-link">
                                        Read More
                                        <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="columns-blog">
                            <div class="blog-card card">
                                <div class="blog-card-thumb"></div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-cat">
                                        Category 1
                                    </div>
                                    <div class="blog-card-excerpt">
                                        Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…
                                    </div>
                                    <a href="#" class="blog-card-link">
                                        Read More
                                        <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="columns-blog">
                            <div class="blog-card card">
                                <div class="blog-card-thumb"></div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-cat">
                                        Category 1
                                    </div>
                                    <div class="blog-card-excerpt">
                                        Messari adds Permission to it’s Disclosure Registry, joining the ranks of world-renowned projects…
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
        </div>

        -->











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





        <script>
            var scrollAmount = 256;
            (function () {
                var vpWidth = window.innerWidth;

                if (innerWidth < 1000) {
                    scrollAmount = innerWidth;
                }

                const bindEvent = (document.addEventListener) ? 'addEventListener' : 'attachEvent';
                const container = document.querySelector('.permission-team .team-container');
                const navigation = document.querySelector('.permission-team .navigation');


                function handleClick(evt) {
                    if (evt.target.classList.contains('next')) {
                        container.scrollLeft = container.scrollLeft + scrollAmount;
                    } else {
                        container.scrollLeft = container.scrollLeft - scrollAmount;
                    }

                }
                navigation[bindEvent]('click', handleClick.bind(this));
            })();
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
