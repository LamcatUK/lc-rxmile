<?php
/**
 * Text + Image Block
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

$order_image = ( 'text_left' === get_field( 'order' ) ) ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text  = ( 'text_left' === get_field( 'order' ) ) ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
$cols_text   = ( '5050' === get_field( 'split' ) ) ? 'col-lg-6' : 'col-lg-8';
$cols_image  = ( '5050' === get_field( 'split' ) ) ? 'col-lg-6' : 'col-lg-4';

$bg = get_field( 'background' );

$pt = get_field( 'padding_top' ) ? 'pt-5' : '';
$pb = get_field( 'padding_bottom' ) ? 'pb-5' : 'pb-3';

if ( get_field( 'id' ) ) {
    echo '<a id="' . esc_attr( get_field( 'id' ) ) . '" class="anchor"></a>';
}
?>
<!-- text_image -->
<section
    class="text_image pb-5 <?= esc_attr( implode( ' ', array( $pt, $pb, 'bg--' . $bg ) ) ); ?>">
    <div class="container">
        <div class="row">
            <div
                class="<?= esc_attr( $cols_text ); ?> text_image__content <?= esc_attr( $order_text ); ?>">
                <?php
                if ( get_field( 'title' ) ) {
                    echo '<h2>' . esc_html( get_field( 'title' ) ) . '</h2>';
                }

                echo wp_kses_post( get_field( 'content' ) );

                if ( get_field( 'cta' ) ) {
                    $cta = get_field( 'cta' );
                    ?>
                <a href="<?= esc_url( $cta['url'] ); ?>"
                    target="<?= esc_attr( $cta['target'] ); ?>"
                    class="btn btn-primary align-self-center"><?= esc_html( $cta['title'] ); ?></a>
                    <?php
                }
                $img = wp_get_attachment_image_src( get_field( 'image' ), 'large' );
                ?>
            </div>
            <div
                class="<?= esc_attr( $cols_image ); ?> text_image__image text-center mb-4 mb-lg-0 <?= esc_attr( $order_image ); ?>">
                <img src="<?= esc_url( $img[0] ); ?>"
                    width="<?= esc_attr( $img[1] ); ?>"
                    height="<?= esc_attr( $img[2] ); ?>"
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>