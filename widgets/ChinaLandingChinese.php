<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class ChinaLandingChinese extends Widget_Base
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
        return 'chinalanding_chinese';
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
        return __('[D.Korol] ChinaLanding China Widget', 'elementor-header-bullet');
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
        global $post;
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        if (isset($GLOBALS["polylang"])) {
            $translations = $GLOBALS["polylang"]->model->post->get_translations($post->ID);

        }

        ?>
        <link href="/wp-content/plugins/elementor-custom-widgets/base.css" rel="stylesheet">
        <div class="chinalanding">
            <section class="ch1">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="text-wrap">
                            <h2>即刻开始购物并赚钱</h2>
                            <div class="text">迄今已注册35万个钱包<br>注册钱包即可赢得100<span>ASK</span>!</div>
                            <div class="buttons">
                                <a href="https://my.permission.io/signup" role="button" target="_blank"click="">创建钱包</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ch2">
                <div class="info-wrap">
                    <div class="logo-ali"><img src="<?php echo $path; ?>assets/chinalanding/Aliexpress_logo.png"></div>
                    <div class="text">已上线，享受安全付款及全球运输</div>
                    <div class="logo-wrap">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/alipay.png"></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/ask.png"></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Visa.png"></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/mc_vrt_pos.png"></div>
                    </div>
                </div>
            </section>




            <section class="ch3">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">现在就购买你喜爱的品牌，并获得奖励</div>
                        <div class="logo-wrap">
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/snker.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/mi.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/ugreen.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/livolo.png"></div>
                        </div>
                        <div class="text">即将入驻</div>
                        <div class="logo-wrap">
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/apple.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/logi.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/lenovo.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/zhi.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/chat.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/union.png"></div>
                        </div>
                        <div class="buttons">
                            <a href="https://shopping.permission.io/" role="button" target="_blank"click="">开始</a>
                        </div>
                    </div>
                </div>
            </section>



            <section class="ch4">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/pepm-ask.png"></div>
                        <div class="title">即刻赚取<span>ASK</span></div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve items-wrap">
                        <div class="card-item">
                            <div class="number">1.</div>
                            <div class="card-title">注册</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-1.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">注册，赢得<span>ASK</span></div>
                        </div>
                        <div class="card-item">
                            <div class="number">2.</div>
                            <div class="card-title">购物</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-2.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">购买你的所爱，赢得<span>ASK</span></div>
                        </div>
                        <div class="card-item">
                            <div class="number">3.</div>
                            <div class="card-title">推荐</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-3.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">推荐朋友，赢得<span>ASK</span></div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="ch5">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">赢得ASK的更多方式</div>
                        <div class="sub-title">即将到来</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve items-wrap">
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic1.png"></div>
                            <div class="card-title">permission.tv</div>
                            <div class="text">观看视频</div>
                        </div>
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic2.png"></div>
                            <div class="card-title">PermissionID</div>
                            <div class="text">建立你的个人数据库</div>
                        </div>
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic3.png"></div>
                            <div class="card-title">Gaming</div>
                            <div class="text">玩游戏</div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="ch6">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">用<span>ASK</span>支付</div>
                        <div class="sub-title">用你的ASK可以兑换电子产品、生活用品、Permission.io礼品及更多</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve items-wrap">
                        <div class="card-item">
                            <a href="https://permission.io/product/oled-bluetooth-smart-watch/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img1.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Bluetooth Smart Watch</div>
                            <div class="price">7000<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/oled-bluetooth-smart-watch/" role="button" target="_blank"click="">购买</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/anker-wireless-earphones/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img2.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Anker Wireless Earphones</div>
                            <div class="price">14000<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/anker-wireless-earphones/" role="button" target="_blank"click="">购买</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/unisex-heavy-blend-full-zip-hooded-sweatshirt/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img3.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Unisex Full Zip Hoodie</div>
                            <div class="price">15000<span>ASK</span>-17000<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/unisex-heavy-blend-full-zip-hooded-sweatshirt/" role="button" target="_blank"click="">购买</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/smart-led-light-bulb/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img4.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Smart LED Light Bulb</div>
                            <div class="price">4400<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/smart-led-light-bulb/" role="button" target="_blank"click="">购买</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="buttons">
                            <a href="https://support.permission.io/" role="button" target="_blank"click="">客户支持及常见问题</a>
                        </div>
                    </div>
                </div>
            </section>




            <section class="ch7">
                <div class="info-wrap">
                    <div class="text">技术支持：</div>
                    <div class="logo-wrap">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/BigData.svg"><div class="sub-title">Big Data</div></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Blockchain.svg"><div class="sub-title">Blockchain</div></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Cloud.svg"><div class="sub-title">A.I.</div></div>
                    </div>
                </div>
            </section>


            <section class="ch8">
                <div class="info-wrap">
                    <div class="text">我们的投资者曾投资过：</div>
                    <div class="logo-wrap">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Ripple-logo.png"></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/filecoin-logo.png"></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/tezor-logo.png"></div>
                    </div>
                </div>
            </section>


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

        <?php
    }
}
