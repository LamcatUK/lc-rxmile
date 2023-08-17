<!-- two_cards -->
<section class="two_cards py-5">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2 class="text-center">' . get_field('title') . '</h2>';
        }
        ?>
        <div class="row">
            <?php
        while (have_rows('cards')) {
            the_row();
            ?>
            <div class="col-md-6 two_cards__card">
                <img class="two_cards__image mb-4" src="<?=wp_get_attachment_image_url(get_sub_field('image'),'large')?>">
                <h3><?=get_sub_field('title')?></h3>
                <div class="mb-4"><?=get_sub_field('content')?></div>
                <?php
                if (get_sub_field('cta')) {
                    $cta = get_sub_field('cta');
                    ?>
                <div class="text-right">
                    <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
                </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>