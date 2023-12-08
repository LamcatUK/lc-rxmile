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
                    // echo var_dump(get_field('digivox1'));
                    if (get_field('digivox1') != 'No') {
                        $modalID = random_str(4);
                        if (get_field('digivox1') == 'Courier (Calendar)') {
                            $code = get_field('courier_calendar', 'options');
                            $modalTitle = 'Courier Calendar';
                        } else {
                            $code = get_field('pharmacy_form', 'options');
                            $modalTitle = 'Pharmacy Form';
                        }
                        ?>
                    <div class="btn btn-<?=get_field('button_type1')?> mb-2"
                        data-bs-toggle="modal"
                        data-bs-target="#modal<?=$modalID?>">
                        <?=$cta['title']?>
                    </div>
                    <div class="modal fade" id="modal<?=$modalID?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title h2">
                                        <?=$modalTitle?>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <?=$code?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    // echo var_dump(get_field('digivox2'));
                    if (get_field('digivox2') != 'No') {
                        $modalID = random_str(4);
                        if (get_field('digivox2') == 'Courier (Calendar)') {
                            $code = get_field('courier_calendar', 'options');
                            $modalTitle = 'Courier Calendar';
                        } else {
                            $code = get_field('pharmacy_form', 'options');
                            $modalTitle = 'Pharmacy Form';
                        }
                        ?>
                    <div class="btn btn-<?=get_field('button_type2')?> mb-2"
                        data-bs-toggle="modal"
                        data-bs-target="#modal<?=$modalID?>">
                        <?=$cta['title']?>
                    </div>
                    <div class="modal fade" id="modal<?=$modalID?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title h2">
                                        <?=$modalTitle?>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <?=$code?>
                                </div>
                            </div>
                        </div>
                    </div>
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