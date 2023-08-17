<?php
// require_once get_theme_file_path( 'inc/class-cb-wp-navwalker.php' );

//Remove from +New Post in Admin Bar
// add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );
 
// function remove_default_post_type_menu_bar( $wp_admin_bar ) {
//     $wp_admin_bar->remove_node( 'new-post' );
// }
 
// //Remove from the Side Menu
// add_action( 'admin_menu', 'remove_default_post_type' );
 
// function remove_default_post_type() {
//     remove_menu_page( 'edit.php' );
// }

function gb_gutenberg_admin_styles()
{
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1040px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');


function widgets_init()
{
    register_sidebar(
        array(
            'name'          => __('Footer Col 1', 'lc-mcms'),
            'id'            => 'footer-1',
            'description'   => __('Footer Col 1', 'lc-mcms'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer Col 2', 'lc-mcms'),
            'id'            => 'footer-2',
            'description'   => __('Footer Col 2', 'lc-mcms'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
        )
    );

    register_nav_menus(array(
        'primary_nav' => __('Primary Nav', 'lc-mcms'),
    ));
    // register_nav_menus(array(
    //     'sidebar_nav' => __('Sidebar  Nav', 'lc-mcms'),
    // ));

    register_nav_menus(array(
        'footer_menu1' => __('Footer One', 'lc-mcms'),
        'footer_menu2' => __('Footer Two', 'lc-mcms'),
        // 'footer_menu3' => __('Footer Three', 'lc-mcms'),
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');
}
add_action('widgets_init', 'widgets_init', 11);

function acf_blocks()
{
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'				=> 'lc_page_title',
            'title'				=> __('LC Page Title'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_page_title.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'page', 'title' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_2_cta',
            'title'				=> __('LC 2 CTA'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_2_cta.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'two', 'cta' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        // acf_register_block(array(
        // 	'name'				=> 'lc_contact_block',
        // 	'title'				=> __('LC Contact Block'),
        // 	'description'		=> __(''),
        // 	'render_template'	=> 'page-templates/blocks/lc_contact_block.php',
        // 	'category'			=> 'layout',
        // 	'icon'				=> 'excerpt-view',
        // 	'keywords'			=> array( 'contact', 'block' ),
        // 	'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        acf_register_block(array(
            'name'				=> 'lc_breadcrumbs',
            'title'				=> __('LC Breadcrumbs'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_breadcrumbs.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'breadcrumbs' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_faq_block',
            'title'				=> __('LC FAQ'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_faq_block.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'faq','block' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_big_cta',
            'title'				=> __('LC Big CTA'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_big_cta.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'big','cta' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_form',
            'title'				=> __('LC Form'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_form.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'form' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_three_cards',
            'title'				=> __('LC Three Cards'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_three_cards.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'three', 'cards' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_four_cards',
            'title'				=> __('LC Four Cards'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_four_cards.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'four', 'cards' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_icon_card',
            'title'				=> __('LC Icon Card'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_icon_card.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'icon', 'card' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_hero',
            'title'				=> __('LC Hero'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_hero.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'image', 'hero' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_video',
            'title'				=> __('LC Video'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_video.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'video' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_featured_in',
            'title'				=> __('LC Featured In'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_featured_in.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'featured', 'in' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_testimonials',
            'title'				=> __('LC Testimonials'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_testimonials.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'testimonials' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_text_block',
            'title'				=> __('LC Text Block'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_text_block.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'text', 'block' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        // acf_register_block(array(
        // 	'name'				=> 'lc_text_feature',
        // 	'title'				=> __('LC Text Feature'),
        // 	'description'		=> __(''),
        // 	'render_template'	=> 'page-templates/blocks/lc_text_feature.php',
        // 	'category'			=> 'layout',
        // 	'icon'				=> 'align-pull-right',
        // 	'keywords'			=> array( 'text', 'feature' ),
        // 	'mode'	=> 'edit',
        // 	'supports' => array('mode' => false),
        // ));
        // acf_register_block(array(
        // 	'name'				=> 'lc_text_image_text',
        // 	'title'				=> __('LC Text Image Text'),
        // 	'description'		=> __(''),
        // 	'render_template'	=> 'page-templates/blocks/lc_text_image_text.php',
        // 	'category'			=> 'layout',
        // 	'icon'				=> 'excerpt-view',
        // 	'keywords'			=> array( 'text', 'image' ),
        // 	'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        acf_register_block(array(
            'name'				=> 'lc_text_image',
            'title'				=> __('LC Text/Image'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_text_image.php',
            'category'			=> 'layout',
            'icon'				=> 'align-pull-right',
            'keywords'			=> array( 'text', 'image' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_latest_posts',
            'title'				=> __('LC Latest Posts'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_latest_posts.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'latest', 'posts' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_stat_spinner',
            'title'				=> __('LC Stat Spinner'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_stat_spinner.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'stat', 'spinner' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_indie_faq',
            'title'				=> __('LC Indie FAQ'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_indie_faq.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'indie', 'faq' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
    }
}
add_action('acf/init', 'acf_blocks');


if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site Wide Settings',
            'menu_title'	=> 'Site Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}


// function add_first_nav_item($items, $args) {
// 	if( $args->theme_location == 'primary_nav' ) {
// 		return '<li class="d-none d-md-block"><a rel="home" class="logo" href="/" itemprop="url"></a></li>'. $items;
// 	}
// 	return $items;
// }
// add_filter('wp_nav_menu_items','add_first_nav_item', 10, 2);

function lc_time_to_8601($string)
{
    $time = explode(':', $string);
    $output = 'PT' . $time[0] . 'H' . $time[1] . 'M' . $time[2] . 'S';
    return $output;
}

function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function testimonials_slider()
{
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'testimonials',
        'post_status' => 'publish',
        'posts_per_page' => 5,
    ));

    if ($q->have_posts()) {
        echo '<div class="testimonials_slider">';
        while ($q->have_posts()) {
            $q->the_post();
            global $post;
            $slug = $post->post_name;
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
            ?>
<div class="testimonial">
    <div class="testimonial__card">
        <a href="/testimonials/#<?=$slug?>">
            <div class="testimonial__image"><img
                    src="<?=$img[0]?>" width=<?=$img[1]?> height=<?=$img[2]?>
                    class="img-fluid"></div>
            <h4 class="testimonial__title"><?=get_the_title()?></h4>
            <div class="testimonial__role pb-3">
                <?=get_field('title', get_the_ID())?>
            </div>
            <div class="testimonial__content pb-3">
                <?=wp_trim_words(get_field('testimonial', get_the_ID()), 30)?>
            </div>
        </a>
    </div>
</div>
<?php
        }
        echo '</div>';
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();

    add_action('wp_footer', function () {
        ?>
<script src="<?=get_stylesheet_directory_uri()?>/js/slick.min.js"></script>
<script type="text/javascript">
    (function($) {
        $('.testimonials_slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            speed: 1000,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    })(jQuery);
</script>
<?php
    }, 9999);

    return $ob_str;
}



function social_icons()
{
    ob_start();
    $social = get_field('social', 'options');
    if ($social['facebook_url']) {
        ?>
<a href="<?=$social['facebook_url']?>"
    target="_blank" class="icon--fb"><i class="fab fa-facebook-f"></i></a>
<?php
    }
    if ($social['twitter_url']) {
        ?>
<a href="<?=$social['twitter_url']?>"
    target="_blank" class="icon--tw"><i class="fab fa-twitter"></i></a>
<?php
    }
    if ($social['instagram_url']) {
        ?>
<a href="<?=$social['instagram_url']?>"
    target="_blank" class="icon--ig"><i class="fab fa-instagram"></i></a>
<?php
    }
    if ($social['linkedin_url']) {
        ?>
<a href="<?=$social['linkedin_url']?>"
    target="_blank" class="icon--li"><i class="fab fa-linkedin"></i></a>
<?php
    }
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}
add_shortcode('social_icons', 'social_icons');




add_shortcode('pink_steps', function () {
    ob_start();
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-md-2 step_icon mb-4 mb-md-0">
            <div class="step_icon__container">
                <div class="step_icon__step animate__animated animate__fadeIn">1</div>
                <div class="step_icon__icon">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/1-create-account.svg"
                        alt="" class="animate__animated animate__zoomInUp">
                </div>
            </div>
            <div class="step_icon__title animate__animated animate__fadeIn">
                Create your account
            </div>
        </div>
        <div class="col-md-2 step_icon mb-4 mb-md-0">
            <div class="step_icon__container">
                <div class="step_icon__step animate__animated animate__fadeIn animate__delay-1s">2</div>
                <div class="step_icon__icon">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/2-create-orders.svg"
                        alt="" class="animate__animated animate__zoomInUp animate__delay-1s">
                </div>
            </div>
            <div class="step_icon__title animate__animated animate__fadeIn animate__delay-1s">
                Create your orders
            </div>
        </div>
        <div class="col-md-2 step_icon mb-4 mb-md-0">
            <div class="step_icon__container">
                <div class="step_icon__step animate__animated animate__fadeIn animate__delay-2s">3</div>
                <div class="step_icon__icon">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/3-optimize-routes.svg"
                        alt="" class="animate__animated animate__zoomInUp animate__delay-2s">
                </div>
            </div>
            <div class="step_icon__title animate__animated animate__fadeIn animate__delay-2s">
                Optimize your routes
            </div>
        </div>
        <div class="col-md-2 step_icon mb-4 mb-md-0">
            <div class="step_icon__container">
                <div class="step_icon__step animate__animated animate__fadeIn animate__delay-3s">4</div>
                <div class="step_icon__icon">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/4-deliver-packages.svg"
                        alt="" class="animate__animated animate__zoomInUp animate__delay-3s">
                </div>
            </div>
            <div class="step_icon__title animate__animated animate__fadeIn animate__delay-3s">
                Deliver your packages
            </div>
        </div>
    </div>
</div>
<?php
    return ob_get_clean();
});


function lcvar($var)
{
    ob_start();
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    return ob_get_clean();
}



// word count
function estimate_reading_time_in_minutes($content = '', $words_per_minute = 300, $with_gutenberg = false, $formatted = false)
{
    // In case if content is build with gutenberg parse blocks
    if ($with_gutenberg) {
        $blocks = parse_blocks($content);
        $contentHtml = '';

        foreach ($blocks as $block) {
            $contentHtml .= render_block($block);
        }

        $content = $contentHtml;
    }
            
    // Remove HTML tags from string
    $content = wp_strip_all_tags($content);
            
    // When content is empty return 0
    if (!$content) {
        return 0;
    }
            
    // Count words containing string
    $words_count = str_word_count($content);
            
    // Calculate time for read all words and round
    $minutes = ceil($words_count / $words_per_minute);
    
    if ($formatted) {
        $minutes = '<span class="reading">Estimated reading time <time itemprop="timeRequired" datetime="PT' . $minutes . 'M">' . $minutes . ' ' .
            pluralise($minutes, 'minute') . '</time></span>';
    }

    return $minutes;
}

function pluralise($quantity, $singular, $plural=null)
{
    if ($quantity==1 || !strlen($singular)) {
        return $singular;
    }
    if ($plural!==null) {
        return $plural;
    }

    $last_letter = strtolower($singular[strlen($singular)-1]);
    switch($last_letter) {
        case 'y':
            return substr($singular, 0, -1).'ies';
        case 's':
            return $singular.'es';
        default:
            return $singular.'s';
    }
}
?>