<?php
$bg = get_field('background');
?>
<!-- four_cards -->
<section class="four_cards px-5 pt-5 bg--<?=$bg?>">
    <div class="row d-flex justify-content-center">
        <?php
        while (have_rows('cards')) {
            the_row();
            ?>
            <div class="col-lg-6 col-xl-3 py-5 py-xl-0">
                <div class="text-center four_cards__card">
                    <img class="four_cards__image mb-4" src="<?=wp_get_attachment_image_url(get_sub_field('image'),'large')?>">
                    <h3><?=get_sub_field('title')?></h3>
                    <div><?=get_sub_field('content')?></div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>