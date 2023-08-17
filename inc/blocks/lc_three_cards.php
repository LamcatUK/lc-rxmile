<?php
$bg = get_field('background');
?>
<!-- three_cards -->
<section class="three_cards pb-5 bg--<?=$bg?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
        while (have_rows('cards')) {
            the_row();
            $img = wp_get_attachment_image_src(get_sub_field('image'), 'large');
            ?>
            <div class="col-lg-4 py-5 py-xl-0">
                <div class="three_cards__card">
                    <img class="three_cards__image mb-4"
                        src="<?=$img[0]?>"
                        width=<?=$img[1]?>
                    height=<?=$img[2]?>>
                    <div class="pre-title text-center">
                        <?=get_sub_field('pre_title')?>
                    </div>
                    <h3 class="text-center">
                        <?=get_sub_field('title')?>
                    </h3>
                    <div>
                        <?=get_sub_field('content')?>
                    </div>
                </div>
            </div>
            <?php
        }
?>
        </div>
    </div>
</section>