<?php
$bg = get_field('background');
?>
<!-- breadcrumbs -->
<section class="breadcrumbs bg--<?=$bg?>">
    <div class="container">
        <div class="page-meta">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
    </div>
</section>
