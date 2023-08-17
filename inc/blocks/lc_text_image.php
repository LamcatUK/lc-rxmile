<?php
$order_image = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';

$cols_text = (get_field('split') == '5050') ? 'col-lg-6' : 'col-lg-8';
$cols_image = (get_field('split') == '5050') ? 'col-lg-6' : 'col-lg-4';

$bg = get_field('background');

$pt = get_field('padding_top') ? 'pt-5' : '';
$pb = get_field('padding_bottom') ? 'pb-5' : 'pb-3';

if (get_field('id')) {
    echo '<a id="' . get_field('id') . '" class="anchor"></a>';
}
?>
<!-- text_image -->
<section
    class="text_image pb-5 <?=$pt?> <?=$pb?> bg--<?=$bg?>">
    <div class="container">
        <div class="row">
            <div
                class="<?=$cols_text?> text_image__content <?=$order_text?>">
                <?php
                if (get_field('title')) {
                    echo '<h2>' . get_field('title') . '</h2>';
                }
?>
                <?=get_field('content')?>
                <?php
if (get_field('cta')) {
    $cta = get_field('cta');
    ?>
                <a href="<?=$cta['url']?>"
                    target="<?=$cta['target']?>"
                    class="btn btn-primary"><?=$cta['title']?></a>
                <?php
}

$img = wp_get_attachment_image_src(get_field('image'), 'large');
?>
            </div>
            <div
                class="<?=$cols_image?> text_image__image text-center mb-4 mb-lg-0 <?=$order_image?>">
                <img src="<?=$img[0]?>"
                    width=<?=$img[1]?>
                height=<?=$img[0]?>
                class="img-fluid">
            </div>
        </div>
    </div>
</section>