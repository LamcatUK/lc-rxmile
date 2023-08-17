<?php
$bg = get_field('background');
?>
<style>
    .features__card {
        width: 200px;
    }
</style>
<section class="featured_in py-5 bg--<?=$bg?>">
    <div class="container">
        <h2 class="mb-5 text-center">
            <?=get_field('title')?></h2>
        <div class="features mb-4">
            <?php
                while (have_rows('logos')) {
                    the_row();
                    $img = wp_get_attachment_image_src(get_sub_field('logo'), 'large')
                    ?>
            <div class="features__card px-4">
                <img class="features__logo" src="<?=$img[0]?>"
                    width=<?=$img[1]?>
                height=<?=$img[2]?>>
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
    (function($) {
        $('.features').slick({
            infinite: true,
            dots: false,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    })(jQuery);
</script>
<?php
}, 9999);
