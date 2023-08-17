<?php
$bg = get_field('background');
?>
<!-- faq -->
<style>
    .accordion-item {
        background-color: unset !important;
    }

    .accordion-collapse {
        background-color: white;
        border-radius: 0.5rem;
        color: grey !important;
    }

    .bg--blue .accordion-button:not(.collapsed) {
        background-color: #e6f6ff !important;
        color: #212529 !important;
    }

    .bg--blue .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23000' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z' clip-rule='evenodd'/%3e%3c/svg%3e")
    }

    .bg--blue-100 .accordion-button {
        background-color: #072b7d !important;
        color: white !important;
    }

    .bg--blue-100 .accordion-button.collapsed::after {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23fff' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
    }
</style>
<section class="faq py-5 bg--<?=$bg?>">
    <div class="container position-relative">
        <?php
        if (get_field('faq_title')) {
            echo '<h2 class="text-center mb-4">' . get_field('faq_title') . '</h2>';
        }
        echo '<div itemscope="" itemtype="https://schema.org/FAQPage" class="accordion accordion-flush" id="accordion">';

$c = 0;
$show = '';
$collapsed = 'collapsed';
while (have_rows('faqs')) {
    the_row();
    ?>
        <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion-item">
            <div class="accordion-header" itemprop="name"
                id="heading_<?=$c?>" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse_<?=$c?>"
                aria-expanded="true"
                aria-controls="collapse_<?=$c?>">
                <button class="accordion-button <?=$collapsed?>"
                    type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse_<?=$c?>"
                    aria-expanded="true"
                    aria-controls="collapse_<?=$c?>">
                    <?=get_sub_field('question')?>
                </button>
            </div>
            <div class="accordion-collapse collapse <?=$show?>"
                itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"
                id="collapse_<?=$c?>"
                aria-labelledby="heading_<?=$c?>"
                data-bs-parent="#accordion">
                <div itemprop="text" class="accordion-body">
                    <?=get_sub_field('answer')?>
                </div>
            </div>
        </div>
        <?php
    $c++;
    $show = '';
    $collapsed = 'collapsed';
}

echo '</div> <!-- #accordion -->';
        
?>
    </div>
</section>