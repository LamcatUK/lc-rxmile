<!-- image_cta -->
<section class="image_cta py-5" style="background-image:url(<?=get_field('background')?>)">
    <div class="container text-center py-5">
        <h2 class="h1 title text--<?=get_field('theme')?>"><?=get_field('title')?></h2>
        <?php
        if (get_field('subtitle')) {
            if (get_field('cta')) {
            ?>
        <div class="text-larger text--<?=get_field('theme')?> mb-4"><?=get_field('subtitle')?></div>
            <?php
            }
            else {
            ?>
        <div class="text-larger text--<?=get_field('theme')?>"><?=get_field('subtitle')?></div>
            <?php
            }
        }
        if (get_field('cta')) {
            $cta = get_field('cta');
            ?>
        <a class="btn btn-primary" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
            <?php
        }
        ?>
    </div>
</section>