<?php
$bg = get_field('background');
?>
<!-- faq -->
<section class="faq py-5 bg--<?=$bg?>">
    <div class="container position-relative">
        <?php
        if (get_field('faq_title')) {
            echo '<h2 class="text-center mb-4">' . get_field('faq_title') . '</h2>';
        }
        echo '<div itemscope="" itemtype="https://schema.org/FAQPage" class="accordion accordion-flush" id="accordion">';

        $c = 0;
        // $show = 'show';
        // $collapsed = '';
        $show = '';
        $collapsed = 'collapsed';
        $q = new WP_Query( array(
            'post_type' => 'faqs',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'	 	=> 'show_in_faq_block',
                    'value'	  	=> 'Yes',
                    'compare' => 'LIKE',
                ),
            )
        ));
        while ($q->have_posts()) {
            $q->the_post();
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

        echo '</div> <!-- #accordion -->';

        if (get_field('show_more')) {
            ?>
            <div class="text-center">
                <a href="/faqs/" class="btn btn-outline btn--small">See More FAQs</a>
            </div>
            <?php
        }
        
        ?>
    </div>
</section>