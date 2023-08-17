<?php
/**
 * The main template file
 *
 * @package cb-mvp
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="padding-top">
    <div class="container py-5">
        <div class="page-meta">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
?>
        </div>
        <h1 class="mb-5">News and Insights</h1>
        <div class="insights row">
            <?php
while (have_posts()) {
    the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$img) {
        $img = catch_that_image($post);
    }
    $cats = get_the_category();
    $category = $cats[0]->name;
    ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="insight">
                    <a href="<?=get_the_permalink()?>">
                        <div class="insight__image"
                            style="background-image:url('<?=$img?>')">
                        </div>
                        <div class="insight__meta">
                            <div>
                                <?=get_the_author_meta('display_name')?><br><?=get_the_date('jS F, Y')?>
                            </div>
                            <div><strong><?=$category?></strong>
                            </div>
                            <div>
                                <?=estimate_reading_time_in_minutes(get_the_content(), 300, true, true)?>
                            </div>
                        </div>
                        <div class="insight__card">
                            <div class="insight__title">
                                <?=get_the_title()?>
                            </div>
                            <div class="insight__excerpt">
                                <?=wp_trim_words(get_the_content(), 30)?>
                            </div>
                        </div>
                        <div class="insight__link">See more</div>
                    </a>
                </div>
            </div>
            <?php
}
?>
        </div>
        <!-- <div class="scroller-status">
            <div class="loader-ellips infinite-scroll-request">
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
            </div>
        </div> -->
        <?=numeric_posts_nav()?>

        <!-- <nav class="pagination">
            <div class="prev-posts-link alignright"><?php echo get_next_posts_link('Older Entries', $posts->max_num_pages); ?>
    </div>
    <div class="next-posts-link alignleft">
        <?php echo get_previous_posts_link('Newer Entries'); ?>
    </div>
    </nav> -->
    </div>
    </section>
</main>
<?php

get_footer();
?>