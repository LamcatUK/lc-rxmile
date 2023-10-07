<?php
if (get_field('use_featured_image') ?? null && get_field('use_featured_image')[0] == 'Yes') {
    $bg = get_the_post_thumbnail_url(get_the_ID(), 'full');
} else {
    $bg = get_field('background') ?: 'blue';
    $bg = get_stylesheet_directory_uri() . '/img/hero--' . $bg . '.svg';
}
?>
<!-- hero -->
<section class="hero py-5" style="background-image:url(<?=$bg?>)">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-4">
                <h1 class="hero__title">
                    <?=get_field('title')?>
                </h1>
                <div class="hero__content">
                    <?=get_field('content')?>
                </div>
                <div class="d-flex flex-wrap w-lg-50 mx-auto justify-content-around">
                    <?php
                if (get_field('cta1')) {
                    $cta = get_field('cta1');
                    $calendly1 = get_field('calendly1');
                    if ($calendly1['is_calendly1'] ?? null) {
                        $path = $calendly1['calendly1'] ?: '';
                        ?>
                    <a class="btn btn-<?=get_field('button_type1')?> mb-2"
                        href=""
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rxmile/<?=$path?>'});return false;"><?=$cta['title']?></a>
                    <?php
                    } else {
                        ?>
                    <a class="btn btn-<?=get_field('button_type1')?> mb-2"
                        href="<?=$cta['url']?>"
                        target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    <?php
                    }
                }
                if (get_field('cta2')) {
                    $cta = get_field('cta2');
                    $calendly2 = get_field('calendly2');
                    if ($calendly2['is_calendly2'] ?? null) {
                        $path = $calendly2['calendly2'] ?: '';
                        ?>
                    <a class="btn btn-<?=get_field('button_type2')?> mb-2"
                        href=""
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rxmile/<?=$path?>'});return false;"><?=$cta['title']?></a>
                    <?php
                    } else {
                        ?>
                    <a class="btn btn-<?=get_field('button_type2')?> mb-2"
                        href="<?=$cta['url']?>"
                        target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    <?php
                    }
                }
?>
                </div>
            </div>
            <?php
            $hippa_class = '';
if (get_field('show_hippa_badge') == 'Left') {
    $hippa_class = 'mx-auto ms-lg-0 me-lg-auto';
} elseif (get_field('show_hippa_badge') == 'Center') {
    $hippa_class = 'mx-auto';
} elseif (get_field('show_hippa_badge') == 'Right') {
    $hippa_class = 'mx-auto me-lg-0 ms-lg-auto';
}
if (get_field('show_hippa_badge') != 'No') {
    ?>
            <div class="col-12">
                <div class="hippa-badge <?=$hippa_class?>"
                    style="background-image:url(<?=get_stylesheet_directory_uri()?>/img/hippa-compliant.png)">
                </div>
            </div>
            <?php
}
?>
        </div>
    </div>
</section>