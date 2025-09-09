<?php
/**
 * Hero block template.
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

if ( get_field( 'use_featured_image' ) ?? null && 'Yes' === get_field( 'use_featured_image' )[0] ) {
    $bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
} else {
    $bg = get_field( 'background' ) ? get_field( 'background' ) : 'blue';
    $bg = get_stylesheet_directory_uri() . '/img/hero--' . $bg . '.svg';
}
?>
<!-- hero -->
<section class="hero py-5" style="background-image:url(<?= esc_attr( $bg ); ?>)">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-4">
                <h1 class="hero__title">
                    <?= wp_kses_post( get_field( 'title' ) ); ?>
                </h1>
                <div class="hero__content">
                    <?= wp_kses_post( get_field( 'content' ) ); ?>
                </div>
                <div class="d-flex flex-wrap w-lg-50 mx-auto justify-content-around">
                    <?php
                    if ( get_field( 'cta1' ) ) {
                        $cta       = get_field( 'cta1' );
                        $calendly1 = get_field( 'calendly1' );
                        if ( $calendly1['is_calendly1'] ?? null ) {
                            $path = isset( $calendly1['calendly1'] ) && $calendly1['calendly1'] ? $calendly1['calendly1'] : '';
                            ?>
                    <a class="btn btn-<?= esc_attr( get_field( 'button_type1' ) ); ?> mb-2"
                        href=""
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/<?= esc_url( $path ); ?>'});return false;"><?= esc_html( $cta['title'] ); ?></a>
                            <?php
                        } else {
                            ?>
                    <a class="btn btn-<?= esc_attr( get_field( 'button_type1' ) ); ?> mb-2"
                        href="<?= esc_url( $cta['url'] ); ?>"
                        target="<?= esc_attr( $cta['target'] ); ?>"><?= esc_html( $cta['title'] ); ?></a>
                            <?php
                        }
                    }
                    if ( get_field( 'cta2' ) ) {
                        $cta       = get_field( 'cta2' );
                        $calendly2 = get_field( 'calendly2' );
                        if ( $calendly2['is_calendly2'] ?? null ) {
                            $path = isset( $calendly2['calendly2'] ) && $calendly2['calendly2'] ? $calendly2['calendly2'] : '';
                            ?>
                    <a class="btn btn-<?= esc_attr( get_field( 'button_type2' ) ); ?> mb-2"
                        href=""
                        onclick="Calendly.initPopupWidget({url: 'https://calendly.com/<?= esc_url( $path ); ?>'});return false;"><?= esc_html( $cta['title'] ); ?></a>
                            <?php
                        } else {
                            ?>
                    <a class="btn btn-<?= esc_attr( get_field( 'button_type2' ) ); ?> mb-2"
                        href="<?= esc_url( $cta['url'] ); ?>"
                        target="<?= esc_attr( $cta['target'] ); ?>"><?= esc_html( $cta['title'] ); ?></a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
            $hippa_class = '';
            if ( 'Left' === get_field( 'show_hippa_badge' ) ) {
                $hippa_class = 'mx-auto ms-lg-0 me-lg-auto';
            } elseif ( 'Center' === get_field( 'show_hippa_badge' ) ) {
                $hippa_class = 'mx-auto';
            } elseif ( 'Right' === get_field( 'show_hippa_badge' ) ) {
                $hippa_class = 'mx-auto me-lg-0 ms-lg-auto';
            }
            if ( 'No' !== get_field( 'show_hippa_badge' ) ) {
                ?>
            <div class="col-12">
                <div class="d-inline-block hippa-badge <?= esc_attr( $hippa_class ); ?>"
                    style="background-image:url(<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/hippa-compliant.png)">
                </div>
                <div class="d-inline-block hippa-badge <?= esc_attr( $hippa_class ); ?>"
                    style="background-image:url(<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/ncpa-logo.png)">
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>