<?php
$order_map = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
?>
<!-- contact_block -->
<section class="contact_block py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 contact_block__content <?=$order_text?>">
                <h2>Contact Us</h2>
                <ul class="fa-ul">
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> <?=get_field('address','options')?></li>
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> <?=do_shortcode('[contact_phone]')?></li>
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span> <?=do_shortcode('[contact_email]')?></li>
                </ul>
                <h2>Connect</h2>
                <div class="contact_block__social">
                    <?=do_shortcode('[social_icons]')?>
                </div>
            </div>
            <div class="col-lg-8 contact_block__image <?=$order_map?>">
                <iframe src="<?=get_field('google_embed','options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>