<!-- text_image_text -->
<section class="text_image_text py-5">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2>' . get_field('title') . '</h2>';
        }
        ?>
        <div class="row">
            <div class="col-lg-4"><?=get_field('left_col_text')?></div>
            <div class="col-lg-4"><img src="<?=wp_get_attachment_image_url(get_field('image'),'full')?>" class="img-fluid d-flex mx-auto mb-4 mb-lg-0"></div>
            <div class="col-lg-4"><?=get_field('right_col_text')?></div>
        </div>
    </div>
</section>