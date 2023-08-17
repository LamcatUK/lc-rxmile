<?php
$bg = get_field('background');
$formID = get_field('form_id');
$img = get_field( 'background_image' );
if ($img !== 'none') {
    $ibg = 'style="background-image:url(' . get_stylesheet_directory_uri() . '/img/hero--' . get_field( 'background_image' ) . '.svg)"';
}
?>
<!-- form_block -->
<section class="form_block bg--<?=$bg?>" <?=$ibg?>>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form_block__container">
                    <?=do_shortcode('[contact-form-7 id="' . $formID . '" title="false"]')?>
                </div>
            </div>
        </div>
    </div>
</section>