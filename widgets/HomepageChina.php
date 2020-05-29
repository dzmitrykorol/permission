<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class HomepageChina extends Widget_Base
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
        return 'china-homepage';
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
        return __('[D.Korol] China Homepage Widget', 'elementor-header-bullet');
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
        <!-- Hunter, this is file for chinese homepage, place html here-->

        <link href="/wp-content/plugins/elementor-custom-widgets/base.css" rel="stylesheet">
        <div class="homepage">
            <section class="s1">
                <div class="video-hero">
                    <div class="hero-player-overlay">
                        <video autoplay="autoplay" loop="loop" muted="muted" width="1920">
                            <source src="<?php echo $path; ?>assets/permission_stockLoop.mp4" type="video/mp4">
                        </video>
                        <div class="hero-player-content">
                            <div class="hero-player-content-overlay">
                                <div class="columnar">
                                    <div class="columns-twelve">
                                        <div class="floating-text">
                                            <div class="play-icon"><img src="<?php echo $path; ?>assets/icons/Play_Icon.svg">
                                            </div>
                                            <h2>Permission的区块链和加密货币使您能够拥有、控制自己的时间和个人信息并从中获利。</h2>
                                            <div class="buttons">
                                                <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">现在加入</a>
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
                        <div class="title">将Permission视为您的数字“代理”。</div>
                        <div class="sub-title">与平常一样，我们使您可以轻松地在与网络互动的同时通过您的时间和数据获得价值。</div>
                    </div>
                </div>
                <div class="columnar tabs-home">
                    <ul class="tabs__caption columns-twelve">
                        <li class="active">对于会员：</li>
                        <li>对于商家：</li>
                    </ul>
                    <div class="columns-six">
                        <div class="tabs__content  active">
                            <div class="name">对于会员：</div>
                            <p class="content">成为重视透明度和信任的、以消费者为中心的社区的一部分</p>
                            <p class="content">向品牌商和服务提供商授予您的数据许可权，并利用您选择在购物，娱乐和其他在线互动时共享的数据获得收入</p>
                            <p class="content">选择加入即可与品牌进行互动，并获得个性化且相关的内容</p>
                            <p class="content">知道您的数据是安全的，匿名的，并且永远不会出售给第三方</p>
                        </div>
                        <div class="tabs__content">
                            <div class="name">For Brands</div>
                            <p class="content">价值交换广告可实现1：1互动，并实时全面了解会员的需求。</p>
                            <p class="content">通过成员的许可数据识别和奖励成员，可提高品牌忠诚度并提高投入回报率（ROI）。</p>
                            <p class="content">Permission区块链提供责任感和透明度，消除了广告支出浪费。</p>
                        </div>
                        <div class="buttons">
                            <a href="https://shopping.stageabout.wpengine.com" role="button" target="_blank"click="">Start Earning Now</a>
                        </div>
                    </div>
                    <div class="columns-four-eight">
                        <img src="/wp-content/uploads/2020/05/Phone-China.png">
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
                    <div class="text">Permission正在引导网络迈向新的参与模式</div>
                </div>
            </section>

            <section class="s4">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">现状</div>
                        <div class="sub-title">商家付费使用集中的第三方平台向您展示他们的产品，从而打扰您上网并利用您的数据。在您从时间和信息中获得零财务收益的同时，科技巨头产生了令人难以置信的利润。</span></div>
                    </div>
                </div>
                <div class="columnar content-wrapper">
                    <div class="columns-five">
                        <div class="title-color color-blue">60%</div>
                        <div class="text">的千禧一代安装了广告拦截器，以逃避长期的干扰</div>
                        <div class="title-color">87%</div>
                        <div class="text">的消费者会选择不将其个人信息出售给第三方</div>
                        <div class="title-color color-orange">8倍</div>
                        <div class="text">在过去的20年中，获得消费者关注的成本已经上升了8倍</div>
                        <div class="title-color color-blue">50B</div>
                        <div class="text">估计到2020年，由于漫游器和点击欺诈而造成的全球损失</div>
                    </div>
                    <div class="columns-six-seven">
                        <img src="<?php echo $path; ?>assets/ad_revenue_piechart.svg">
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="text-bottom">
                            Google，Amazon和Facebook主导着网络，并占据了所有广告收入的近70％，同时由于ROI下降以及广告费用是否花在真实人群上而缺乏透明度，从而缩小了选择范围，并给商家造成了困扰。
                        </div>
                    </div>
                </div>
            </section>

            <section class="s5">
                <div class="columnar">
                    <div class="columns-six img-block">
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/Illustration.png"></div>
                        <div class="text">拥有您的数据™</div>
                    </div>
                    <div class="content-block columns-five-eight">
                        <div class="text">Permission.io正在通过Permission网络上的标准数字货币ASK更改现状，™</span></div>
                        <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/s5-ask.svg"></div>
                    </div>
                </div>
            </section>

            <section class="s6">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title"><span>ASK</span> 促进了买卖双方在许可基础上参与的生态系统</div>
                    </div>
                </div>
                <div class="columnar content-wrapper">
                    <div class="columns-five-two">
                        <img src="<?php echo $path; ?>assets/handphone.png">
                    </div>
                    <div class="columns-four-eight">
                        <div class="sub-title">现在加入</div>
                        <div class="text">使消费者能够从他们的时间和数据中获利而无需放弃控制</div>
                        <div class="text">通过征求许可和奖励客户的参与，使企业赢得 <span>信任</span> 和 <span>忠诚</span> b从而建立<span>长期关系</span> 并 <span>提高ROI</span></div>
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
                            <div class="title">颠覆奖励机制</div>
                            <div class="text"><span>ASK</span> 是一种可以在您选择的时间和地点赚取，交易和消费的货币。它的效用超出了普通奖励计划的范围。企业可以使用ASK来吸引和奖励客户，从而立即利用许可的力量。
                            </div>
                        </div>
                        <div class="card card-home">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/card2.svg"></div>
                            <div class="title"><span>ASK</span>的用例</div>
                            <div class="text">我们的旗舰应用程序，用户可以选择注册他们的个人兴趣和其他关键数据，并进行各种购物和娱乐之旅。用户通过与视频，调查和其他满足其需求和欲望的内容互动而获得ASK。用户可以在Permission平台上花费ASK和其他主要货币。</div>
                        </div>
                        <div class="card card-home">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/icons/card1.svg"></div>
                            <div class="title">优化的生态系统</div>
                            <div class="text">Permission的SDK使开发人员能够构建应用程序，以允许用户在集成的生态系统中进行许可并通过其获利。基于权限的应用程序的广泛使用将激励货币的增长并增强其复利效果。 </div>
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
                        <h3>杰出的领导者</h3>
                        <p>
                            Permission由科技，媒体和金融领域的连续企业家，以及《财富》 500强公司的博士学位和工程师领导。
                        </p>
                        <div class="navigation">
                            <span class="previous">&lt;</span>
                            <span class="next">&gt;</span>
                        </div>
                    </div>




                    <div class="team-container">
                        <figure>
                            <img src="/wp-content/uploads/2019/08/charlie.png">
                            <figcaption>
                                <h4>CHARLES H. SILVER</h4>
                                <span>CEO</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/robin.png">
                            <figcaption>
                                <h4>ROBIN BLOOR, 博士</h4>
                                <span>技术推广负责人</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2020/04/Hunter-Jensen.png">
                            <figcaption>
                                <h4>JOE UNDERBRINK</h4>
                                <span>首席数据科学家、数学家</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2020/04/bobby-v5.png">
                            <figcaption>
                                <h4>BOBBY PETERSEN</h4>
                                <span>营销副总裁</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/Matt.png">
                            <figcaption>
                                <h4>MATT ERHART</h4>
                                <span>财务与合规副总裁</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/therese.png">
                            <figcaption>
                                <h4>THERESE FAHY</h4>
                                <span>人力资源</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/gary1.png">
                            <figcaption>
                                <h4>GARY J. SHERMAN 博士</h4>
                                <span>基础数学家</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2020/04/Jennifer-Silver.png">
                            <figcaption>
                                <h4>JENNY SILVER</h4>
                                <span>通信副总裁</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/daniel_hiltbrand.png">
                            <figcaption>
                                <h4>DANIEL HILTBRAND</h4>
                                <span>D开发工程师</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2020/04/Robert-Morris.png">
                            <figcaption>
                                <h4>ROBERT MORRIS</h4>
                                <span>市场经理</span>
                            </figcaption>
                        </figure>
                        <h3>我们的顾问</h3>

                        <figure>
                            <img src="/wp-content/uploads/2019/08/Richard-1.png">
                            <figcaption>
                                <h4>RICHARD LI</h4>
                                <span>ALPHABLOCK.COM<br />的管理合伙人</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/Andrew-1.png">
                            <figcaption>
                                <h4>ANDREW ESSEX</h4>
                                <span>DROGA5前首席执行官</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/Eric-1.png" >
                            <figcaption>
                                <h4>ERIC ERVIN</h4>
                                <span>区块链资本首席执行官</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/Ichiro.png">
                            <figcaption>
                                <h4>南川一郎</h4>
                                <span>COINTED JAPAN首席执行官， <br />东京区块链创始人</span>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="/wp-content/uploads/2019/08/Rob.png">
                            <figcaption>
                                <h4>罗伯·格里</h4>
                                <span>POST-INTERRUPTIVE的首席执行官， <br />WHOSAY的前总统</span>
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
                        <div class="title-block">Permission.io路线图</div>
                    </div>
                </div>
                <div class="time-line">
                    <div class="columnar">
                        <div class="columns-twelve time-line-wrap">
                            <div class="time-line-block item-order-1">
                                <div class="dot"></div>
                                <div class="title">2019年第三季度</div>
                                <div class="text-wrap">
                                    <p>会员计划合作伙伴</p>
                                    <p>电子商务平台合作伙伴</p>
                                    <p>商家门户</p>
                                    <p>第三方权限节点</p>
                                </div>
                            </div>
                            <div class="time-line-block item-order-4">
                                <div class="dot"></div>
                                <div class="title">2019年第四季度</div>
                                <div class="text-wrap">
                                    <p>与ID管理系统集成</p>
                                    <p>增强型个人数据集</p>
                                    <p>在Permission平台上使用ASK进行购物</p>
                                    <p>权限区块链治理政策与系统</p>
                                </div>
                            </div>
                            <div class="time-line-block item-order-2">
                                <div class="dot"></div>
                                <div class="title">2020年第一季度</div>
                                <div class="text-wrap">
                                    <p>SDK版本</p>
                                    <p>报告与分析</p>
                                    <p>有针对性的个人数据集查询</p>
                                    <p>开发者网站和社区扩展</p>
                                </div>
                            </div>
                            <div class="time-line-block item-order-5">
                                <div class="dot"></div>
                                <div class="title">2020年第二季度</div>
                                <div class="text-wrap">
                                    <p>iOS App发布</p>
                                    <p>Android App发布</p>
                                    <p>网络应用发布</p>
                                    <p>与去中心化身份系统集成</p>
                                </div>
                            </div>
                            <div class="time-line-block item-order-3">
                                <div class="dot"></div>
                                <div class="title">2020年第三季度</div>
                                <div class="text-wrap">
                                    <p>去中心化区块链</p>
                                    <p>关键字竞价系统</p>
                                    <p>Permission区块链治理</p>
                                    <p>商家和广告商中建立声誉</p>
                                </div>
                            </div>
                            <div class="time-line-block item-order-6">
                                <div class="dot"></div>
                                <div class="title">2020年第四季度</div>
                                <div class="text-wrap">
                                    <p>开发人员API</p>
                                    <p>双向市场</p>
                                    <p>Permission浏览器插件</p>
                                    <p>数据查询优化</p>
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
                        <div class="title-block">相关报道：</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="home-col-wrap columns-twelve">
                        <div class="card card-home">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/logos/Fortune.jpg"></div>
                            <div class="text">11个加密项目周二宣布已加入梅萨里（Massari）披露注册表…</div>
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
                        <div class="title-block">相关采访</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="home-col-wrap columns-twelve">

                        <div class="card card-home card-soundcloud">
                            <div class="img-wrap"></div>
                            <iframe width="100%" height="260" scrolling="no" frameborder="no" allow="autoplay" src="https://player.fm/series/business-leaders-podcast-2544232/charlie-silvers-mission-to-take-power-back-for-the-consumer-from-facebook-and-youtube"></iframe>
                            <div class="text-wrap">
                                <div class="podcast"><img src="<?php echo $path; ?>assets/podcast.png"></div>
                                <div class="text">首席执行官Charles Silver谈Permission的市场、ASK及其他</div>
                            </div>
                        </div>


                        <div class="card card-home card-soundcloud">
                            <div class="img-wrap"></div>
                            <iframe width="100%" height="260" scrolling="no" frameborder="no" allow="autoplay" src="https://coinpm.podbean.com/e/talks-%E2%80%94-charlie-silver-ceo-of-permissionio/"></iframe>
                            <div class="text-wrap">
                                <div class="podcast"><img src="<?php echo $path; ?>assets/podcast.png"></div>
                                <div class="text">Permission市场用加密货币为用户的时间和数据提供补偿</div>
                            </div>
                        </div>


                        <div class="card card-home card-soundcloud">
                            <div class="img-wrap"></div>
                            <iframe width="100%" height="260" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/464133330&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                            <div class="text-wrap">
                                <div class="podcast"><img src="<?php echo $path; ?>assets/podcast.png"></div>
                                <div class="text">首席执行官Charles Silvers的使命是为消费者夺回权力</div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="s14">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title-block">合作伙伴</div>
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
        </div>

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
