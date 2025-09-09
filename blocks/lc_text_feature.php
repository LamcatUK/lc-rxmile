<!-- text_feature -->
<section class="text_feature py-5">
    <div class="container text-center">
        <?php
        if (get_field('title')) {
            echo '<h2>' . get_field('title') . '</h2>';
        }
        if (get_field('cta')) {
            echo '<div class="text-larger mb-4">';
        }
        else {
            echo '<div class="text-larger">';
        }
        echo get_field('content');
        echo '</div>';
        if (get_field('cta')) {
            $cta = get_field('cta');
            ?>
        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
            <?php
        }
        ?>
    </div>
</section>