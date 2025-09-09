<!-- icon_block -->
<section class="icon_block py-5">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2 class="text-center">' . get_field('title') . '</h2>';
        }
        ?>
        <div class="d-flex flex-wrap justify-content-center">
        <?php
        while (have_rows('icons')) {
            the_row();
            ?>
        <div class="icon_block__container">
            <img src="<?=wp_get_attachment_image_url(get_sub_field('icon'),'full')?>" class="img-fluid">
            <h3><?=get_sub_field('title')?></h3>
            <div><?=get_sub_field('content')?></div>
        </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>