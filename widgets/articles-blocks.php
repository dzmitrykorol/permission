<?php
$path = '/wp-content/plugins/elementor-custom-widgets/';
?>
<div class="columnar category-item <?php if (is_page('blog')) { echo 'first'; } ?>">
    <div class="columns-seven">
        <h2>Articles about Permission</h2>
    </div>
    <div class="columns-ten-three">
        <a href="/blog" class="all-articles">
            All Articles
            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
        </a>
    </div>

    <div class="blog-col-wrap columns-twelve">
        <?php
        $pages = get_pages([
            'sort_order' => 'ASC',
            'sort_column' => 'date',
            'hierarchical' => 0,
            'parent' => [7095, 7092, 7096, 7097, 7098, 7099, 7115],
            'number' => 3,
            'post_type' => 'page',
            'post_status' => 'publish',
        ]);

        foreach ($pages as $page) {
            $parts = parse_url($page->guid);
            parse_str($parts['query'], $query);
            $id = $query['page_id'];
            ?>
            <div class="columns-blog">
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
                        <a href="<?php echo get_page_link($page->ID);
                        ?>" class="blog-card-link test">
                            Read More
                            <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div class="columnar category-item">
    <div class="columns-seven">
        <h2>Permission Updates</h2>
    </div>
    <div class="columns-ten-three">
        <a href="/blog/permission-updates/" class="all-articles">
            All Articles
            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
        </a>
    </div>

    <div class="blog-col-wrap columns-twelve">


        <?php
        $permissionPages = get_pages([
            'sort_order' => 'ASC',
            'sort_column' => 'date',
            'hierarchical' => 0,
            'parent' => 7099,
            'number' => 3,
            'post_type' => 'page',
            'post_status' => 'publish',
        ]);
        foreach ($permissionPages as $page) {
            $parts = parse_url($page->guid);
            parse_str($parts['query'], $query);
            $id = $query['page_id']; ?>
            <div class="columns-blog">
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
                        <a href="<?php echo get_page_link($page->ID); ?>" class="blog-card-link test">
                            Read More
                            <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="columnar category-item" id="load_more">
    <div class="columns-seven">
        <h2>All Articles</h2>
    </div>
    <div class="columns-ten-three">
        <a href="/blog/all-articles" class="all-articles">
            All Articles
            <img src="<?php echo $path; ?>/assets/icons/chevron-right-big.svg">
        </a>
    </div>

    <div class="blog-col-wrap columns-twelve">
        <?php
        $allPages = get_pages([
            'sort_order' => 'ASC',
            'sort_column' => 'date',
            'hierarchical' => 0,
            'parent' => [7095, 7092, 7096, 7097, 7098, 7099, 7115],
            'number' => 6,
            'post_type' => 'page',
            'post_status' => 'publish',
        ]);

        foreach ($allPages as $key => $page) {
            $parts = parse_url($page->guid);
            parse_str($parts['query'], $query);
            $id = $query['page_id']; ?>
            <div class="columns-blog">
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
                        <a href="<?php echo get_page_link($page->ID); ?>" class="blog-card-link test">
                            Read More
                            <img src="https://cdn.permission.io/apps/permissionbase/assets/icons/chevron-right.svg">
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>