<?php
$c = get_field('centre_content') ? 'text-center' : '';

$bw = get_field('constrain_width') ? 'max-ch' : '';
$tw = get_field('constrain_width') ? 'max-ch--40' : '';
$bg = get_field('background');

$pt = get_field('padding_top') ? 'pt-5' : '';
$pb = get_field('padding_bottom') ? 'pb-5' : 'pb-3';

$m = '';
if (get_field('centre_content') && get_field('constrain_width') ) {
    $m = ' mx-auto';
}
if (get_field('id')) {
    echo '<a id="' . get_field('id') . '" class="anchor"></a>';
}
?>
<!-- text_block -->
<section class="text_block <?=$pt?> <?=$pb?> bg--<?=$bg?>">
    <div class="container <?=$c?>">
<?php
if (get_field('side_title')) {
    ?>
        <div class="row">
            <div class="col-md-4">
                <h2><?=get_field('title')?></h2>
            </div>
            <div class="col-md-8">
                <?php
                if (get_field('cta')) {
                    echo '<div class="mb-4 ' . $bw . '">';
                }
                else {
                    echo '<div class="' . $bw . '">';
                }
                echo apply_filters('the_content', get_field('content') ) . '</div>';
                if (get_field('cta')) {
                    $cta = get_field('cta');
                    ?>
                <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    <?php
}
else {
    if (get_field('title')) {
        echo '<h2 class="mb-4 ' . $tw . $m . '">' . get_field('title') . '</h2>';
    }
    if (get_field('cta')) {
        echo '<div class="mb-4 ' . $bw . $m . '">';
    }
    else {
        echo '<div class="' . $bw . $m . '">';
    }
    echo apply_filters('the_content', get_field('content') ) . '</div>';
    if (get_field('cta')) {
        $cta = get_field('cta');
        ?>
    <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
        <?php
    }
}
?>
    </div>
</section>