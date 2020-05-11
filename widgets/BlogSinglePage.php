<?php

namespace ElementorWidgetExtender;

use Elementor\Repeater;
use Elementor\Settings;
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
        // Top post's part starts
        $this->start_controls_section(
            'section_top',
            [
                'label' => __('Top part of article', 'elementor'),
            ]
        );

        $this->add_control(
            'page_title',
            [
                'label' => 'Type page title',
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'page_subtitle',
            [
                'label' => 'Type page sub title',
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'blog_content_top',
            [
                'label' => __('Top article part', 'elementor'),
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ornare odio, non 
                ultricies leo. Mauris turpis erat, tristique eget dui eget, egestas consequat mi. Integer convallis, 
                justo ut fermentum fermentum, erat purus pulvinar massa, ac viverra massa libero at nibh. Cras ac mi at
                 nulla rutrum accumsan a nec tortor.', 'elementor'),
                'placeholder' => __('Tab Content', 'elementor'),
                'type' => Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'blog_content_middle',
            [
                'label' => __('Middle article part', 'elementor'),
                'default' => __('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ornare odio, non 
                ultricies leo. Mauris turpis erat, tristique eget dui eget, egestas consequat mi. Integer convallis, 
                justo ut fermentum fermentum, erat purus pulvinar massa, ac viverra massa libero at nibh. Cras ac mi at
                 nulla rutrum accumsan a nec tortor.</p>', 'elementor'),
                'placeholder' => __('Tab Content', 'elementor'),
                'type' => Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'blog_content_bottom',
            [
                'label' => __('Bottom article part', 'elementor'),
                'default' => __('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ornare odio, non 
                ultricies leo. Mauris turpis erat, tristique eget dui eget, egestas consequat mi. Integer convallis, 
                justo ut fermentum fermentum, erat purus pulvinar massa, ac viverra massa libero at nibh. Cras ac mi at
                 nulla rutrum accumsan a nec tortor.</p>', 'elementor'),
                'placeholder' => __('Tab Content', 'elementor'),
                'type' => Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->end_controls_section();
        // Top post's part ends

        // Middle post's part starts
        $this->start_controls_section(
            'section_middle',
            [
                'label' => __('Middle part of article', 'elementor'),
            ]
        );


        $this->add_control(
            'the_quote',
            [
                'label' => 'Type page sub title',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('“We’re seeing some really bullish bitcoin price action today along with other ...',
                    'plugin-domain'),
            ]
        );

        $this->end_controls_section();
        // Midddle post's part ends

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
        global $wp;
        $page = get_post($post->ID);
//        dump($page);
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        $settings = $this->get_settings_for_display();
//        dump($settings);
        $this->add_inline_editing_attributes('paragraphText', 'none');

        ?>

        <div class="tabs tabs-article" data-tabs="secondary">
            <div data-tab="blog" class="blog active">
                <div class="hero">
                </div>

                <div class="columnar">
                    <div class="columns-twelve">
                        <a href="#" class="article-category">Cryptocurrency</a>
                        <h1><?php echo $page->post_title; ?></h1>
                        <div class="subtitle-article"><?php echo $settings['page_subtitle']; ?></div>
                    </div>
                </div>

                <div class="columnar article-share">

                    <div class="share-social-info columns-four-one">
                        <div class="photo"><img src="<?php echo $path; ?>assets/icons/drawkit-folder-man-colour.svg">
                        </div>
                        <div class="text-wrap">
                            <div class="text"><?php echo get_the_author_meta('nicename'); ?></div>
                            <a href="#">@permissionIO</a>
                        </div>
                    </div>

                    <div class="share-social-icons columns-four-nine">
                        <div class="share-text">share</div>
                        <a rel="nofollow" class="share-icons" href="#" data-count="twi"
                           onclick="window.open('//twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php
                           echo home_url($wp->request); ?>','_blank', 'scrollbars=0, resizable=1, menubar=0, left=100,' +
                                   ' top=100, width=550, ' +'height=440, toolbar=0, status=0');return false"
                           title="Add to Twitter" target="_blank"><img src="<?php echo $path; ?>assets/icons/tw-icon.svg">
                        </a>
                        <a rel="nofollow" class="share-icons" href="#" data-count="fb"
                           onclick="window.open('//www.facebook.com/sharer.php?m2w&amp;s=100&amp;p[url]=<?php
                           echo home_url($wp->request); ?>&amp;[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[images]'+
                                   '[0]=undefined', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, ' +
                                   'width=550, height=440, toolbar=0, status=0');return false"
                           title="Share in Facebook" target="_blank"><img src="<?php echo $path; ?>assets/icons/fa-icon.svg">
                        </a>
                        <a rel="nofollow" class="share-icons" href="#" data-count="lnkd"
                           onclick="window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=<?php
                           echo home_url($wp->request); ?>&amp;title=<?php the_title(); ?>', '_blank', 'scrollbars=0, ' +
                                   'resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0');
                                   return false" title="Add to Linkedin" target="_blank">
                            <img src="<?php echo $path; ?>assets/icons/LinkedInLogo.svg">
                        </a>
                        <!--<a href="#" class="share-icons"><img src="--><?php //echo $path; ?><!--assets/icons/mail-ic.svg"></a>-->
                    </div>

                </div>

                <div class="columnar article-img">
                    <div class="columns-twelve">
                        <img src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                        <p>Source</p>
                    </div>
                </div>

                <div class="columnar article-date">
                    <div class="columns-eight">
                        <?php
                        $date = $page->post_date;
                        $unixTimestamp = strtotime($date);
                        $dayOfWeek = date("l", $unixTimestamp);
                        ?>
                        <p>PUBLISHED
                            <?php echo strtoupper($dayOfWeek);
                            echo ' '.get_the_date('', $page->ID);
                            echo ' / '.get_post_time('i:h A T', true, $page->ID);
                            ?></p>
                    </div>
                </div>
                <div class="columnar article-content">
                    <div class="columns-eight">
                        <p><?php echo $settings['blog_content_top']; ?></p>
                        <div class="wp-block-considerable-quote left">
                            <div class="quote"><?php echo $settings['the_quote']; ?></div>
                        </div>

                        <?php echo $settings['blog_content_middle']; ?>

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

                        <?php echo $settings['blog_content_bottom']; ?>

                        <div class="tags">TAGS: <a href="#">Cryptocurrency,</a> <a href="#">Bitcoin,</a> <a href="#">Asia,</a>
                            <a href="#">Markets</a></div>
                        <div class="share-social-icons">
                            <div class="share-text">share</div>
                            <a rel="nofollow" class="share-icons" href="#" data-count="twi"
                               onclick="window.open('//twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php
                               echo home_url($wp->request); ?>','_blank', 'scrollbars=0, resizable=1, menubar=0, left=100,' +
                                       ' top=100, width=550, ' +'height=440, toolbar=0, status=0');return false"
                               title="Add to Twitter" target="_blank"><img src="<?php echo $path; ?>assets/icons/tw-icon.svg">
                            </a>
                            <a rel="nofollow" class="share-icons" href="#" data-count="fb"
                               onclick="window.open('//www.facebook.com/sharer.php?m2w&amp;s=100&amp;p[url]=<?php
                               echo home_url($wp->request); ?>&amp;[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[images]'+
                                       '[0]=undefined', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, ' +
                                       'width=550, height=440, toolbar=0, status=0');return false"
                               title="Share in Facebook" target="_blank"><img src="<?php echo $path; ?>assets/icons/fa-icon.svg">
                            </a>
                            <a rel="nofollow" class="share-icons" href="#" data-count="lnkd"
                               onclick="window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=<?php
                               echo home_url($wp->request); ?>&amp;title=<?php the_title(); ?>', '_blank', 'scrollbars=0, ' +
                                       'resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0');
                               return false" title="Add to Linkedin" target="_blank">
                                <img src="<?php echo $path; ?>assets/icons/LinkedInLogo.svg">
                            </a>
<!--                            <a href="#" class="share-icons"><img src="--><?php //echo $path; ?><!--assets/icons/mail-ic.svg"></a>-->
                        </div>
                    </div>
                </div>


                <?php
                $prev_page = get_previous_post();
                $next_page = get_next_post();
                ?>
                <div class="columnar article-nav">
                    <div class="columns-four-two">
                        <div class="text">Previous Post</div>
                        <a href="<?php echo get_page_link($prev_page->ID); ?>"><?php echo $prev_page->post_title; ?></a>
                    </div>
                    <div class="columns-four-eight">
                        <div class="text">Next Post</div>
                        <a href="<?php echo get_page_link($next_page->ID); ?>"><?php echo $next_page->post_title; ?></a>
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
                            <p><?php echo $page->post_title; ?></p>
                        </div>
                    </div>
                </div>


                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>More articles about Permission</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="/blog" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <?php
                    $allPages = get_pages([
                        'sort_order' => 'ASC',
                        'sort_column' => 'date',
                        'hierarchical' => 0,
                        'parent' => [5782, 5699, 5785, 5786, 5787, 5788, 5789],
                        'number' => 8,
                        'post_type' => 'page',
                        'post_status' => 'publish',
                    ]);
                    foreach ($allPages as $key => $page) {
                        $parts = parse_url($page->guid);
                        parse_str($parts['query'], $query);
                        $id = $query['page_id'];
                        switch ($key) {
                            case 0 : ?>
                                <div class="columns-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 1 : ?>
                                <div class="columns-five-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 2 : ?>
                                <div class="columns-nine-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 3 : ?>
                                <div class="columns-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 4 : ?>
                                <div class="columns-five-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 5 : ?>
                                <div class="columns-nine-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;

                            case 6 : ?>
                                <div class="columns-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;

                            case 7 : ?>
                                <div class="columns-five-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;

                            case 8 : ?>
                                <div class="columns-nine-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                        }
                    } ?>
                </div>
                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>Permission Updates</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="/blog/permission-marketing" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <?php
                    $permissionPages = get_pages([
                        'sort_order' => 'ASC',
                        'sort_column' => 'date',
                        'hierarchical' => 0,
//                        'child_of'     => 5788,
                        'parent' => 5788,
                        'number' => 3,
                        'post_type' => 'page',
                        'post_status' => 'publish',
                    ]);
                    foreach ($permissionPages as $key => $page) {
                        $parts = parse_url($page->guid);
                        parse_str($parts['query'], $query);
                        $id = $query['page_id'];
                        switch ($key) {
                            case 0 : ?>
                                <div class="columns-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 1 : ?>
                                <div class="columns-five-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 2 : ?>
                                <div class="columns-nine-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                        }
                        ?>

                    <?php } ?>
                </div>
                <div class="columnar category-item">
                    <div class="columns-seven">
                        <h2>All Articles</h2>
                    </div>
                    <div class="columns-ten-three">
                        <a href="/blog" class="all-articles">
                            All Articles
                            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
                        </a>
                    </div>
                    <?php
                    $permissionPages = get_pages([
                        'sort_order' => 'ASC',
                        'sort_column' => 'date',
                        'hierarchical' => 0,
//                        'child_of'     => 5788,
                        'parent' => 5788,
                        'number' => 3,
                        'post_type' => 'page',
                        'post_status' => 'publish',
                    ]);
                    foreach ($permissionPages as $key => $page) {
                        $parts = parse_url($page->guid);
                        parse_str($parts['query'], $query);
                        $id = $query['page_id'];
                        switch ($key) {
                            case 0 : ?>
                                <div class="columns-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link test">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 1 : ?>
                                <div class="columns-five-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                            case 2 : ?>
                                <div class="columns-nine-four">
                                    <div class="blog-card card">
                                        <div class="blog-card-thumb"><img
                                                    src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
                                        </div>
                                        <div class="blog-card-desc">
                                            <div class="blog-card-cat">
                                                <?php echo get_the_title($page->post_parent); ?>
                                            </div>
                                            <div class="blog-card-excerpt">
                                                <?php echo $page->post_title; ?>
                                            </div>
                                            <a href="<?php echo get_page_link($id); ?>" class="blog-card-link">
                                                Read More
                                                <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php break;
                        }
                        ?>

                    <?php } ?>
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
