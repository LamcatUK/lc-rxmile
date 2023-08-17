<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="padding-top">
    <div class="container pb-5 testimonial__archive">
        <div class="page-meta">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
        <h1 class="mb-5">Testimonials</h1>
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                global $post;
                ?>
        <a id="<?=$post->post_name?>" class="anchor"></a>
        <div class="testimonial mb-5 row">
            <div class="col-md-3">
                <div class="testimonial__image"><img src="<?=get_the_post_thumbnail_url( get_the_ID(), 'full' )?>" class="img-fluid"></div>
            </div>
            <div class="col-md-9">
                <div class="testimonial__quote"><?=get_field('testimonial')?></div>
                <div class="testimonial__name"><?=get_the_title()?></div>
                <div class="testimonial__role"><?=get_field('title')?></div>
            </div>
        </div>
                <?php
            }
        }
        ?>
    </div>
</main>
<?php

get_footer();
