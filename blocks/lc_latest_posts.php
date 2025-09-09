<!-- latest_blogs -->
<section class="latest_blogs py-5">
    <div class="container">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
        ));
    
        if ($q->have_posts()) {
            echo '<h2 class="text-center mb-5">Latest News and Insights</h2>';
            echo '<div class="row justify-content-center mb-4">';
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$img) {
                    $img = catch_that_image($q);
                }
                $cats = get_the_category();
                $category = $cats[0]->name;
                ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-xl-0">
            <div class="latest">
                <a href="<?=get_the_permalink(get_the_ID())?>">
                    <div class="latest__image">
                        <img src="<?=$img?>" width=1000 height=581>
                    </div>
                    <div class="latest__meta">
                        <div>
                            <?=get_the_author_meta('display_name')?><br><?=get_the_date('jS F, Y')?>
                        </div>
                        <div><strong><?=$category?></strong></div>
                    </div>
                    <div class="latest__card">
                        <div class="latest__title">
                            <?=get_the_title()?>
                        </div>
                        <div class="latest__excerpt">
                            <?=wp_trim_words(get_the_content(), 10)?>
                        </div>
                    </div>
                    <div class="latest__link">See More</div>
                </a>
            </div>
        </div>
        <?php
            }
            echo '</div>';
        }
        wp_reset_postdata();
        ?>
        <div class="text-center">
            <a href="<?=get_permalink(get_option('page_for_posts'))?>"
                class="btn btn-outline btn--small">All Insights</a>
        </div>
    </div>
</section>