<?php
$bg = get_field('background');

?>
<!-- big_cta -->
<section class="big_cta py-5">
    <div class="container">
        <div class="big_cta__inner bg--<?=$bg?>">
            <div class="row">
                <div class="col-md-6 pb-0 pb-md-5 p-5">
                    <h2 class="mb-6">
                        <?=get_field('title')?>
                    </h2>
                    <div>
                        <?=get_field('content')?>
                    </div>
                </div>
                <div class="col-md-6 p-5 pb-3 pb-md-5 d-flex flex-wrap justify-content-around align-items-center">
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
                    <a class="btn btn-<?=get_field('button_type2')?> mx-3 mb-2"
                        href=""
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rxmile/<?=$path?>'});return false;"><?=$cta['title']?></a>
                    <?php
                        } else {
                            ?>
                    <a class="btn btn-<?=get_field('button_type2')?> mx-3 mb-2"
                        href="<?=$cta['url']?>"
                        target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    <?php
                        }
                    }
?>
                </div>
            </div>
        </div>
    </div>
</section>