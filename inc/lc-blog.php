<?php

function catch_that_image($post) {
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = '';
    if (!empty($matches[1])) {
        $first_img = $matches[1][0];
    }
    if(empty($first_img)){ //Defines a default image
      $first_img = "/wp-content/themes/lc-rxmile/img/blog-default.jpg";
    }
    return $first_img;
  }

function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}



function recent_posts($post)
{
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array( $post )
    ));

    if ($q->have_posts()) {
        ?>
        <div class="recent_news">
            <div class="row">
            <?php
            while ($q->have_posts()) {
                $q->the_post(); ?>
                <div class="col-12 col-md-4 col-lg-12 mb-4">
                    <div class="recent">
                        <a href="<?=get_the_permalink()?>">
                            <div class="recent__image"><img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>"></div>
                            <div class="recent__card">
                                <div class="recent__title"><?=get_the_title()?></div>
                                <div class="recent__date"><?=get_the_date()?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
        <?php
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}


function related_posts() {

    ob_start();

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if ($related_cats_post->have_posts()) {
        ?>
        <hr class="my-4">
        <div class="recent_news">
            <div class="h3 mb-4">Related Posts</div>
            <div class="row">
            <?php
            while ($related_cats_post->have_posts()){
                $related_cats_post->the_post(); 
                ?>
                <div class="col-md-4">
                    <div class="recent">
                        <a href="<?=get_the_permalink()?>">
                            <div class="recent__image" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>"></div>
                            <div class="recent__card">
                                <div class="recent__title"><?=get_the_title()?></div>
                                <div class="recent__meta"><?=get_the_date('jS F, Y')?></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        <?php
    }

     wp_reset_postdata();
     $ob_str = ob_get_contents();
     ob_end_clean();
     return $ob_str;

}

function related_posts_by_cat($cat_id) {

    ob_start();

    $query_args = array( 
        'category__in'   => $cat_id,
        'post_type'      => 'post',
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if ($related_cats_post->have_posts()) {
        ?>
        <div class="recent_news">
            <div class="h2 mb-4">Related Posts</div>
            <div class="row">
            <?php
            while ($related_cats_post->have_posts()){
                $related_cats_post->the_post(); 
                ?>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="recent">
                        <a href="<?=get_the_permalink()?>">
                            <div class="recent__image" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>"></div>
                            <div class="recent__card">
                                <div class="recent__title"><?=get_the_title()?></div>
                                <div class="recent__meta"><?=get_the_date('jS F, Y')?></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        <?php
    }

     wp_reset_postdata();
     $ob_str = ob_get_contents();
     ob_end_clean();
     return $ob_str;

}

function latest_posts()
{
    ob_start();
    $post_id = get_the_ID();

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in'    => array($post_id),
    ));

    if ($q->have_posts()) {
        echo '<div class="h3 mb-4">Latest Insights</div>';
        while ($q->have_posts()) {
            $q->the_post(); ?>
            <div class="recent">
                <a href="<?=get_the_permalink(get_the_ID())?>">
                    <div class="recent__image" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>"></div>
                    <div class="recent__card">
                        <div class="recent__title"><?=get_the_title()?></div>
                        <div class="recent__meta"><?=get_the_date('jS F, Y')?></div>
                    </div>
                </a>
            </div>
            <?php
        }
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}



function lc_post_nav()
{
        ?>
        <div class="d-flex justify-content-between">
        <?php
        $prev_post_obj = get_adjacent_post( '', '', true );
        if ($prev_post_obj) {
            $prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
            $prev_post_link     = get_permalink( $prev_post_ID );
            ?>
        <a href="<?php echo $prev_post_link; ?>" rel="next" class="btn btn-previous">Previous</a>
           <?php
        }

        $next_post_obj  = get_adjacent_post( '', '', false );
        if ($next_post_obj) {
            $next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
            $next_post_link     = get_permalink( $next_post_ID );
            ?>
        <a href="<?php echo $next_post_link; ?>" rel="next" class="btn btn-next">Next</a>
           <?php
        }
        ?>
        </div>
        <?php

}