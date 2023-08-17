<?php
$bg = get_field('background');
$ibg = get_field('icon_background');
?>
<!-- icon_card -->
<section class="icon_card bg--<?=$bg?>">
    <div class="container py-2">
        <div class="icon_card__card">
            <div class="row">
                <div class="col-md-2 mb-4 mb-md-0">
                    <div class="icon_holder m-auto bg--<?=$ibg?>">
                        <img src="<?=get_field('icon')?>" alt="">
                    </div>
                </div>
                <div class="col-md-10">
                    <h3><?=get_field('title')?></h3>
                    <div class="content"><?=apply_filters( 'the_content', get_field('content') )?></div>
                </div>
            </div>
        </div>
    </div>
</section>