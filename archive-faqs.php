<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="padding-top">
    <div class="container pb-5">
        <div class="page-meta">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
        <h1 class="mb-5">FAQs</h1>
        <div itemscope="" itemtype="https://schema.org/FAQPage" class="accordion accordion-flush" id="accordion">
        <?php
        $c = 0;
        // $show = 'show';
        // $collapsed = '';
        $show = '';
        $collapsed = 'collapsed';
        
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
        <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion-item">
            <div class="accordion-header" itemprop="name" id="heading_<?=$c?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?=$c?>" aria-expanded="true" aria-controls="collapse_<?=$c?>">
                <button class="accordion-button <?=$collapsed?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?=$c?>" aria-expanded="true" aria-controls="collapse_<?=$c?>">
                    <?=get_the_title()?>
                </button>
            </div>
            <div class="accordion-collapse collapse <?=$show?>" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="collapse_<?=$c?>" aria-labelledby="heading_<?=$c?>" data-bs-parent="#accordion">
                <div itemprop="text" class="accordion-body">
                    <?=apply_filters('the_content',get_the_content())?>
                </div>
            </div>
        </div>
                <?php
                $c++;
                $show = '';
                $collapsed = 'collapsed';
            }
        }
        ?>
        </div>
    </div>
</main>
<?php

get_footer();
