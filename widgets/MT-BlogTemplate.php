<?php
namespace ElementorWidgetExtender\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor tabs widget.
 *
 * Elementor widget that displays vertical or horizontal tabs with different
 * pieces of content.
 *
 * @since 1.0.0
 */
class MT_BlogTemplate extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve tabs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'mt-blog-template';
    }

    /**
     * Get widget title.
     *
     * Retrieve tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('[Master Template] Blog Template', 'elementor');
    }

    /**
     * Get widget icon.
     *
     * Retrieve tabs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-post-excerpt';
    }

    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Register tabs widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'blog_tabs',
            [
                'label' => __('Post attributes', 'elementor'),
            ]
        );

//        $repeater = new Repeater();

        $this->add_control(
            'blog_title',
            [
                'label' => __('Title & Content', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Tab Title', 'elementor'),
                'placeholder' => __('Tab Title', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'blog_content',
            [
                'label' => __('Content', 'elementor'),
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ornare odio, non ultricies leo. Mauris turpis erat, tristique eget dui eget, egestas consequat mi. Integer convallis, justo ut fermentum fermentum, erat purus pulvinar massa, ac viverra massa libero at nibh. Cras ac mi at nulla rutrum accumsan a nec tortor.  ',
                    'elementor'),
                'placeholder' => __('Tab Content', 'elementor'),
                'type' => Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'blog_image',
            [
                'label' => 'Choose  Benefit image',
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => ''
                ]
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render tabs widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $blog_title = $this->get_settings_for_display('blog_title');
        $blog_content = $this->get_settings_for_display('blog_content');
        $blog_image = $this->get_settings_for_display('blog_image');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-main-container">
                        <div class="blog-header"></div>
                        <div class="blog-body">
                            <div class="blog-title"><?php echo $blog_title; ?></div>
                            <div class="blog-content">
                                <div class="blog-text">
                                    <?php echo $blog_content; ?>
                                </div>
                                <div class="blog-img">
                                    <?php
                                    if (strlen($blog_image['url']) !== 0) {
                                        ?>
                                            <img src="<?php echo $blog_image['url']; ?>" alt="<?php echo $blog_title;?>">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Render tabs widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
    }
}

?>
