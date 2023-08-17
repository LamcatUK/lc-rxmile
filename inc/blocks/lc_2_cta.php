<?php
$bg = get_field('background');
?>
<!-- two_cta -->
<section class="two_cta bg--<?=$bg?>">
    <div class="py-5 d-flex flex-wrap mx-auto justify-content-center">
        <?php
        if (get_field('cta1')) {
            $cta = get_field('cta1');
            $calendly1 = get_field('calendly1');
            if ($calendly1['is_calendly1'] ?? null) {
                $path = $calendly1['calendly1'] ?: '';
                ?>
        <a class="btn btn-<?=get_field('button_type1')?> mx-3 mb-2"
            href=""
            onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rxmileteam/<?=$path?>'});return false;"><?=$cta['title']?></a>
        <?php
            } else {
                ?>
        <a class="btn btn-<?=get_field('button_type1')?> mx-3 mb-2"
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
            onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rxmileteam/<?=$path?>'});return false;"><?=$cta['title']?></a>
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
</section>