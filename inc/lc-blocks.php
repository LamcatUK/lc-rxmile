<?php
/**
 * Register ACF Blocks
 *
 * @package LC Base
 */

defined('ABSPATH') || exit;

/**
 * Register ACF Blocks
 */
function acf_blocks()
{
    if (function_exists('acf_register_block') ) {
        acf_register_block(
            array(
            'name'                => 'lc_page_title',
            'title'                => __('LC Page Title'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_page_title.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'page', 'title' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_integration_partners',
            'title'                => __('LC Integration Partners'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_integration_partners.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'integration', 'partners' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_2_cta',
            'title'                => __('LC 2 CTA'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_2_cta.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'two', 'cta' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        // acf_register_block(array(
        //     'name'                => 'lc_contact_block',
        //     'title'                => __('LC Contact Block'),
        //     'description'        => __(''),
        //     'render_template'    => 'blocks/lc_contact_block.php',
        //     'category'            => 'layout',
        //     'icon'                => 'excerpt-view',
        //     'keywords'            => array( 'contact', 'block' ),
        //     'mode'    => 'edit',
        //     'supports' => array('mode' => false),
        // ));
        acf_register_block(
            array(
            'name'                => 'lc_breadcrumbs',
            'title'                => __('LC Breadcrumbs'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_breadcrumbs.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'breadcrumbs' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_faq_block',
            'title'                => __('LC FAQ'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_faq_block.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'faq','block' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_big_cta',
            'title'                => __('LC Big CTA'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_big_cta.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'big','cta' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_form',
            'title'                => __('LC Form'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_form.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'form' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_three_cards',
            'title'                => __('LC Three Cards'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_three_cards.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'three', 'cards' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_four_cards',
            'title'                => __('LC Four Cards'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_four_cards.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'four', 'cards' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_icon_card',
            'title'                => __('LC Icon Card'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_icon_card.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'icon', 'card' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_hero',
            'title'                => __('LC Hero'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc-hero.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'image', 'hero' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_video',
            'title'                => __('LC Video'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_video.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'video' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_featured_in',
            'title'                => __('LC Featured In'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_featured_in.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'featured', 'in' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_testimonials',
            'title'                => __('LC Testimonials'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_testimonials.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'testimonials' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_text_block',
            'title'                => __('LC Text Block'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc-text-block.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'text', 'block' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        // acf_register_block(array(
        //     'name'                => 'lc_text_feature',
        //     'title'                => __('LC Text Feature'),
        //     'description'        => __(''),
        //     'render_template'    => 'blocks/lc_text_feature.php',
        //     'category'            => 'layout',
        //     'icon'                => 'align-pull-right',
        //     'keywords'            => array( 'text', 'feature' ),
        //     'mode'    => 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block(array(
        //     'name'                => 'lc_text_image_text',
        //     'title'                => __('LC Text Image Text'),
        //     'description'        => __(''),
        //     'render_template'    => 'blocks/lc_text_image_text.php',
        //     'category'            => 'layout',
        //     'icon'                => 'excerpt-view',
        //     'keywords'            => array( 'text', 'image' ),
        //     'mode'    => 'edit',
        //     'supports' => array('mode' => false),
        // ));
        acf_register_block(
            array(
            'name'                => 'lc_text_image',
            'title'                => __('LC Text/Image'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc-text-image.php',
            'category'            => 'layout',
            'icon'                => 'align-pull-right',
            'keywords'            => array( 'text', 'image' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_latest_posts',
            'title'                => __('LC Latest Posts'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_latest_posts.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'latest', 'posts' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_stat_spinner',
            'title'                => __('LC Stat Spinner'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_stat_spinner.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'stat', 'spinner' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
        acf_register_block(
            array(
            'name'                => 'lc_indie_faq',
            'title'                => __('LC Indie FAQ'),
            'description'        => __(''),
            'render_template'    => 'blocks/lc_indie_faq.php',
            'category'            => 'layout',
            'icon'                => 'excerpt-view',
            'keywords'            => array( 'indie', 'faq' ),
            'mode'    => 'edit',
            'supports' => array('mode' => false),
            )
        );
    }
}
add_action('acf/init', 'acf_blocks');
