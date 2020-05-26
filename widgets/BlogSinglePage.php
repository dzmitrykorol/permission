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
        global $post;
        $page = get_post($post->ID);
        $pageTitle = $page->post_title;

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
                'default' => $pageTitle,
//                'default' => 'TEXT TITLE',
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
        $page = get_post($post->ID);
        $path = '/wp-content/plugins/elementor-custom-widgets/';
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('paragraphText', 'none');

        $pageList = get_pages("child_of=".$post->post_parent."&parent=".$post->post_parent."&sort_column=menu_order&sort_order=asc");
        ?>

        <div class="tabs tabs-article" data-tabs="secondary">
            <div data-tab="blog" class="blog active">
                <div class="hero">
                </div>

                <div class="columnar">
                    <div class="columns-twelve">
                        <a href="<?php echo getTabLinkByCategoryId($page->post_parent); ?>" class="article-category">
                            <?php echo get_the_title($page->post_parent); ?>
                        </a>
                        <h1><?php echo $page->post_title; ?></h1>
                        <div class="subtitle-article"><?php echo $settings['page_subtitle']; ?></div>
                    </div>
                </div>

                <div class="columnar article-share">
                    <div class="share-social-info columns-four-one">
                        <div class="photo">
                            <?php
                            $twitter = get_the_author_meta('twitter', $page->post_author);
                            $avatar = get_avatar($page->post_author);
                            echo $avatar;
                            ?>
                        </div>
                        <div class="text-wrap">
                            <div class="text"><?php echo get_the_author_meta('nicename'); ?></div>
                            <a target="_blank"
                               href="https://twitter.com/<?php echo $twitter; ?>">@<?php echo $twitter; ?></a>
                        </div>
                    </div>

                    <div class="share-social-icons columns-four-nine">
                        <?php include plugin_dir_path( __FILE__ ) . 'share-social-icons-section.php'; ?>
                    </div>
                </div>

                <div class="columnar article-img">
                    <div class="columns-twelve">
                        <img style="width: 100%" src="<?php echo get_the_post_thumbnail_url($page->ID, 'large'); ?>">
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

                        <?php
                        echo $settings['blog_content_middle'];
                        $pages = [];
                        foreach ($pageList as $page) {
                            $pages[] = $page->ID;
                        }
                        $randPageIndex = array_rand($pages, 1);
                        $randPage = $pages[$randPageIndex];
                        $marker = true;
                        $count = count($pages);

                        if ($randPage === $post->ID && $count > 1) {
                            while ($marker) {
                                $randPageIndex = array_rand($pages, 1);
                                $randPage = $pages[$randPageIndex];
                                if ($randPage !== $post->ID) {
                                    $marker = false;
                                }
                            }
                        }
                        if ($count > 1) { ?>
                            <div class="wp-block-article">
                                <div class="article-card-thumb"><img
                                            src="<?php echo get_the_post_thumbnail_url($randPage, 'large'); ?>">
                                </div>
                                <div class="blog-card-desc">
                                    <div class="blog-card-excerpt single-page">
                                        <?php echo get_the_title($randPage); ?>
                                    </div>
                                    <a href="<?php echo get_page_link($randPage); ?>" class="blog-card-link">
                                        Read More
                                        <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <?php echo $settings['blog_content_bottom']; ?>

                        <?php
                        $tags = get_post_meta($post->ID, 'tags', true);
                        $allTags = explode(', ', $tags);
                        $lastElement = end($allTags);
                        ?>
                        <div class="tags">TAGS:
                            <?php
                            if (!empty($tags)) {
                                foreach ($allTags as $tag) { ?>
                                    <?php
                                    if ($tag === $lastElement) { ?>
                                        <a href="/blog/tag/?tag=<?php echo strtolower($tag); ?>"><?php echo $tag; ?></a>
                                    <?php } else { ?>
                                        <a href="/blog/tag/?tag=<?php echo strtolower($tag); ?>"><?php echo $tag.','; ?></a>
                                    <?php }
                                }
                            } else {
                                echo 'tags are not added yet';
                            }
                            ?>
                        </div>
                        <div class="share-social-icons">
                            <?php include plugin_dir_path( __FILE__ ) . 'share-social-icons-section.php'; ?>
                        </div>
                    </div>
                </div>


                <?php
                $current = array_search($post->ID, $pages, false);
                $prevID = $pages[$current - 1];
                $nextID = $pages[$current + 1];

                ?>
                <div class="columnar article-nav">
                    <div class="columns-four-two">
                        <div class="text">Previous Post</div>
                        <a href="<?php echo get_page_link($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
                    </div>
                    <div class="columns-four-eight">
                        <div class="text">Next Post</div>
                        <a href="<?php echo get_page_link($nextID); ?>"><?php echo get_the_title($nextID); ?></a>
                    </div>
                </div>


                <?php
                // hide temporarily by check on no-existing var
                $empty = '';

                if ($empty) { ?>
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
                <?php }

                include plugin_dir_path( __FILE__ ) . 'articles-blocks.php';
                ?>

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
        view.addInlineEditingAttributes( 'blog_content_top', 'none' );
        view.addInlineEditingAttributes( 'blog_content_middle', 'none' );
        view.addInlineEditingAttributes( 'blog_content_bottom', 'none' );
        console.log(settings);
        #>
        <div class="tabs tabs-article" data-tabs="secondary">
            <div data-tab="blog" class="blog active">
                <div class="hero">
                </div>

                <div class="columnar">
                    <div class="columns-twelve">
                        <a href="#" class="article-category">Cryptocurrency</a>
                        <h1>{{{ settings.page_title }}}</h1>
                        <div class="subtitle-article">{{{ settings.page_subtitle }}}</div>
                    </div>
                </div>

                <div class="columnar article-share">

                    <div class="share-social-info columns-four-one">
                        <div class="photo"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/drawkit-folder-man-colour.svg"></div>
                        <div class="text-wrap">
                            <div class="text">Permission</div>
                            <a href="#">@permissionIO</a>
                        </div>
                    </div>
                    <div class="share-social-icons columns-four-nine">
                        <div class="share-text">share</div>
                        <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/tw-icon.svg"></a>
                        <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/fa-icon.svg"></a>
                        <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/LinkedInLogo.svg"></a>
                        <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/reddit.svg"></a>
                        <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/telegram.svg"></a>
                    </div>

                </div>

                <div class="columnar article-img">
                    <div class="columns-twelve">
                        <img src="/wp-content/plugins/elementor-custom-widgets/assets/img-e.png">
                        <p>Source</p>
                    </div>
                </div>

                <div class="columnar article-date">
                    <div class="columns-eight">
                        <p>PUBLISHED </p>
                    </div>
                </div>
                <div class="columnar article-content">
                    <div class="columns-eight">
                        <p>{{{ settings.blog_content_top }}}</p>
                        <div class="wp-block-considerable-quote left">
                            <div class="quote">{{{ settings.the_quote }}}</div>
                        </div>

                        {{{ settings.blog_content_middle }}}

                        {{{ settings.blog_content_bottom }}}
                        <div class="tags">TAGS: List of tags</div>
                        <div class="share-social-icons">
                            <div class="share-text">share</div>
                            <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/tw-icon.svg"></a>
                            <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/fa-icon.svg"></a>
                            <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/LinkedInLogo.svg"></a>
                            <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/reddit.svg"></a>
                            <a href="#" class="share-icons"><img src="/wp-content/plugins/elementor-custom-widgets/assets/icons/telegram.svg"></a>
                        </div>
                    </div>
                </div>

                <div class="columnar article-nav">
                    <div class="columns-four-two">
                        <div class="text">Previous Post</div>
                        <a href="">Previous post title</a>
                    </div>
                    <div class="columns-four-eight">
                        <div class="text">Next Post</div>
                        <a href="">Next post title</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
