<section class="stat_spinner py-5">
    <div class="container">
        <div class="stats">
            <?php
            while (have_rows('stats')) {
                the_row();
            ?>
            <div class="stat">
                <div class="stat__inner">
                    <?php
                    $endval = get_sub_field('stat');
                    $endval = preg_replace('/,/', '.', $endval);
                    $decimals = strlen(substr(strrchr($endval, "."), 1));
                    ?>
                    <div class="stat__value">
                        <div class="stat__qualifier"><?=get_sub_field('stat_prefix')?></div>
                        <?=do_shortcode("[countup start='0' end='{$endval}' decimals='{$decimals}' duration='3' scroll='true']")?>
                        <div class="stat__qualifier"><?=get_sub_field('stat_suffix')?></div>
                    </div>
                    <div class="stat__title"><?=get_sub_field('stat_title')?></div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script src="<?=get_stylesheet_directory_uri()?>/js/slick.min.js"></script>
<script type="text/javascript">
(function($){
    $('.stats').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 1000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
})(jQuery);
</script>
<?php
}, 9999);