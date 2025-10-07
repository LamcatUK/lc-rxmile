<?php
/**
 * The template for displaying all single posts
 *
 * @package cb-mvp
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
the_post();

$catnames = get_the_category(get_the_ID());
$catnameArr = array();
if ($catnames) {
    foreach ($catnames as $obj) {
        // echo lcvar($obj);
        // $catnameArr[] = '<a href="' . get_category_link( $obj->term_id ) . '">' . $obj->category_nicename . '</a>';
        $catnameArr[] = $obj->cat_name;
    }
}
$cats = implode(', ', $catnameArr);
$posttags = get_the_tags();

$content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            $sidebar[$heading] = $id;
        }
    }
}
?>
<style>
    .links {
        border-radius: 1rem;
        background-color: hsl(202, 100%, 95%);
    }

    .theContent a {
        text-decoration: none;
    }
    #links h3 {
        font-size: 1rem;
        font-weight: 400;
        display: inline;
    }
</style>
<main id="main" class="padding-top">
    <div class="container py-3">
        <div class="page-meta">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
?>
        </div>
        <div class="row">
            <div class="col-md-12 theContent">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'full')?>"
                    alt="" class="img-fluid mb-4" width=1000 height=581>
                <h1 class="news__title"><?=get_the_title()?></h1>
				                <div class="event__date">
                    <?php
                    if ( get_field( 'start_date', get_the_ID() ) ) {
                        echo esc_html( ymd_to_display( get_field( 'start_date', get_the_ID() ) ) );
                    }
                    if ( get_field( 'end_date', get_the_ID() ) && get_field( 'end_date', get_the_ID() ) !== get_field( 'start_date', get_the_ID() ) ) {
                        echo ' - ' . esc_html( ymd_to_display( get_field( 'end_date', get_the_ID() ) ) );
                    }
                    ?>
                </div>

                <div class="py-4">
                    <?php
                    foreach ($blocks as $block) {
                        if ($block['blockName'] == 'core/heading') {
                            if (!array_key_exists('level', $block['attrs'])) {
                                $heading = strip_tags( $block['innerHTML'] );
                                $id = acf_slugify( $heading );
                                echo '<a id="' . $id . '" class="anchor">' . $block['innerHTML'] . '</a>';
                            }
                        }
                        echo render_block($block);
                    }
					?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php

get_footer();
?>