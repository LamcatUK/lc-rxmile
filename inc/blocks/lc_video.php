<?php
$modal = random_str(8);
?>
<!-- full_video -->
<section class="full_video py-5">
    <div class="container text-center">
        <?php
        if (get_field('title')) {
            echo '<h2>' . get_field('title') . '</h2>';
        }
        if (get_field('video_provider') == 'YouTube') {
            ?>
        <div class="ratio ratio-16x9 w-100">
            <iframe src="https://www.youtube.com/embed/<?=get_field('video_id')?>" allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
            <?php
        }
        else {
            ?>
        <div class="full_video__container" id="vidimg<?=$modal?>">
            <img src="<?=get_vimeo_data_from_id(get_field('video_id'), 'thumbnail_url')?>" class="img-fluid product_video pointer">
            <div class="play">
                <img src="<?=get_stylesheet_directory_uri()?>/img/play-button.svg">
            </div>
        </div>
        <div class="ratio ratio-16x9" id="video<?=$modal?>" style="display:none">
            <iframe id="vid<?=$modal?>" src="https://player.vimeo.com/video/<?=get_field('video_id')?>?byline=0&portrait=0" allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <script>
(function ($) {
    $('#vidimg<?=$modal?>').on('click',function() {
        $('#vidimg<?=$modal?>').fadeOut('fast', function() {
            $('#video<?=$modal?>').css('display', 'block');
            $("iframe#vid<?=$modal?>")[0].src += "&autoplay=1";
        });
    });
})(jQuery);
        </script>
            <?php
        }
        ?>
    </div>
</section>
<?php
if (get_field('name')) {
    if (get_field('video_provider') == 'YouTube') {
    ?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "VideoObject",
    "name": "<?=get_field('name')?> | RxMile",
    "description": <?=json_encode(get_field('description'))?>,
    "thumbnailUrl": "https://i.ytimg.com/vi/<?=get_field('video_id')?>/default.jpg",
    "uploadDate": "<?=get_field('upload_date')?>T00:00:00+00:00",
    "duration": "<?=lc_time_to_8601(get_field('length'))?>",
    "embedUrl": "https://www.youtube.com/embed/<?=get_field('video_id')?>"
}
</script>
    <?php
    }
}