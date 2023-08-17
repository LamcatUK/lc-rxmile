<?php
$bg = get_field('background');
$py = get_field('show_button') == 'Yes' ? 'py-5' : 'pt-5';
?>
<!-- testimonials -->
<section class="testimonials bg--<?=$bg?> <?=$py?>">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2 class="text-center">' . get_field('title') . '</h2>';
        }
        if (get_field('intro')) {
            echo '<div class="text-center mx-auto max-ch mb-4">' . get_field('intro') . '</div>';
        }
        ?>
        <?=testimonials_slider()?>
        <?php
        if (get_field('show_button')) {
            ?>
        <div class="text-center">
            <a href="/testimonials/" class="btn btn-outline btn--small">View All</a>
        </div>
            <?php
        }
        ?>
    </div>
</section>