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
            <div class="col-md-9 theContent">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'full')?>"
                    alt="" class="img-fluid mb-4" width=1000 height=581>
                <h1 class="news__title"><?=get_the_title()?></h1>
                <div class="news__date mb-4">Posted by
                    <strong><?=get_the_author_meta('display_name')?></strong>
                    on
                    <strong><?=get_the_date('jS F, Y')?></strong>
                    in <strong><?=$cats?></strong>.<br>
                    <em><?=estimate_reading_time_in_minutes(get_the_content(), 300, true, true)?></em>
                </div>
                <div class="p-4 links">
                    <div class="h5 d-none d-lg-block">Quick Links</div>
                    <div class="h5 d-lg-none" data-bs-toggle="collapse" href="#links" role="button">Quick Links</div>
                    <div class="collapse d-lg-block" id="links">
                        <?php
                        foreach ($sidebar as $heading => $id) {
                            ?>
                        <li><h3><a
                                href="#<?=$id?>"><?=$heading?></a>
                        </h3></li>
                        <?php
                        }
?>
                    </div>
                </div>
                <div class="py-4">
                    <?php
                    foreach ($blocks as $block) {
                        if ($block['blockName'] == 'core/heading') {
                            if (!array_key_exists('level', $block['attrs'])) {
                                $heading = strip_tags($block['innerHTML']);
                                $id = acf_slugify($heading);
                                echo '<a id="' . $id . '" class="anchor">' . $block['innerHTML'] . '</a>';
                            }
                        }
                        echo render_block($block);
                    }
?>
                </div>
                <div>
                    <?php lc_post_nav(); ?>
                </div>
                <?=related_posts()?>
            </div>
            <div class="col-md-3">
                <?=latest_posts()?>
            </div>
        </div>
    </div>
</main>
<?php

get_footer();
?>