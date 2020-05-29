<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class ChinaLandingEnglish extends Widget_Base
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
        return 'chinalanding_english';
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
        return __('[D.Korol] ChinaLanding English Widget', 'elementor-header-bullet');
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
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        ?>
        <link href="/wp-content/plugins/elementor-custom-widgets/base.css" rel="stylesheet">
        <div class="chinalanding">
            <section class="ch1">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="text-wrap">
                            <h2>Shop & Earn Now</h2>
                            <div class="text">350,000 Wallets to Date.<br>Create a wallet today and immediately EARN 100 <span>ASK</span>!</div>
                            <div class="buttons">
                                <a href="https://my.permission.io/signup" role="button" target="_blank"click="">Create a Wallet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ch2">
                <div class="info-wrap">
                    <div class="logo-ali"><img src="<?php echo $path; ?>assets/chinalanding/Aliexpress_logo.png"></div>
                    <div class="text">available now with secure payment & international shipping</div>
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
                        <div class="title">Shop Your Favorite Brands & Get Paid Now</div>
                        <div class="logo-wrap">
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/snker.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/mi.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/ugreen.png"></div>
                            <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/livolo.png"></div>
                        </div>
                        <div class="text">Coming Soon</div>
                        <div class="logo-wrap">
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/apple.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/logi.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/lenovo.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/zhi.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/chat.png"></div>
                            <div class="logo logo-nocolor"><img src="<?php echo $path; ?>assets/chinalanding/union.png"></div>
                        </div>
                        <div class="buttons">
                            <a href="https://shopping.permission.io/" role="button" target="_blank"click="">Get Started</a>
                        </div>
                    </div>
                </div>
            </section>



            <section class="ch4">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/pepm-ask.png"></div>
                        <div class="title">Earn <span>ASK</span> Now</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve items-wrap">
                        <div class="card-item">
                            <div class="number">1.</div>
                            <div class="card-title">Sign Up</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-1.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">Sign up, earn <span>ASK</span></div>
                        </div>
                        <div class="card-item">
                            <div class="number">2.</div>
                            <div class="card-title">Shop</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-2.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">Shop for what you love, earn <span>ASK</span></div>
                        </div>
                        <div class="card-item">
                            <div class="number">3.</div>
                            <div class="card-title">Refer</div>
                            <div class="img-wrap">
                                <img src="<?php echo $path; ?>assets/chinalanding/s4-3.png">
                                <div class="circle"></div>
                            </div>
                            <div class="text">Refer friends, earn <span>ASK</span></div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="ch5">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">More Ways To Earn ASK</div>
                        <div class="sub-title">Coming Soon</div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve items-wrap">
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic1.png"></div>
                            <div class="card-title">permission.tv</div>
                            <div class="text">Watch videos & earn</div>
                        </div>
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic2.png"></div>
                            <div class="card-title">PermissionID</div>
                            <div class="text">Build your own personal data store & earn</div>
                        </div>
                        <div class="card card-item">
                            <div class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/ic3.png"></div>
                            <div class="card-title">Gaming</div>
                            <div class="text">Play games and earn</div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="ch6">
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="title">Pay With <span>ASK</span></div>
                        <div class="sub-title">Redeem Your ASK For Electronics, Lifestyle Products, Permission.io Swag & More</div>
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
                                <a href="https://permission.io/product/oled-bluetooth-smart-watch/" role="button" target="_blank"click="">Shop Now</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/anker-wireless-earphones/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img2.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Anker Wireless Earphones</div>
                            <div class="price">14000<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/anker-wireless-earphones/" role="button" target="_blank"click="">Shop Now</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/unisex-heavy-blend-full-zip-hooded-sweatshirt/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img3.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Unisex Full Zip Hoodie</div>
                            <div class="price">15000<span>ASK</span>-17000<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/unisex-heavy-blend-full-zip-hooded-sweatshirt/" role="button" target="_blank"click="">Shop Now</a>
                            </div>
                        </div>
                        <div class="card-item">
                            <a href="https://permission.io/product/smart-led-light-bulb/" class="img-wrap"><img src="<?php echo $path; ?>assets/chinalanding/img4.jpg"></a>
                            <div class="text">Best Sellers</div>
                            <div class="card-title">Smart LED Light Bulb</div>
                            <div class="price">4400<span>ASK</span></div>
                            <div class="buttons">
                                <a href="https://permission.io/product/smart-led-light-bulb/" role="button" target="_blank"click="">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columnar">
                    <div class="columns-twelve">
                        <div class="buttons">
                            <a href="https://support.permission.io/" role="button" target="_blank"click="">Customer Support & FAQ’s</a>
                        </div>
                    </div>
                </div>
            </section>




            <section class="ch7">
                <div class="info-wrap">
                    <div class="text">Powered by: </div>
                    <div class="logo-wrap">
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/BigData.svg"><div class="sub-title">Big Data</div></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Blockchain.svg"><div class="sub-title">Blockchain</div></div>
                        <div class="logo"><img src="<?php echo $path; ?>assets/chinalanding/Cloud.svg"><div class="sub-title">A.I.</div></div>
                    </div>
                </div>
            </section>


            <section class="ch8">
                <div class="info-wrap">
                    <div class="text">Our investors have invested into: </div>
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
