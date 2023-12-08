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
                                    <div class="modal-title text-primary h2">
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
                                    <div class="modal-title text-primary h2">
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