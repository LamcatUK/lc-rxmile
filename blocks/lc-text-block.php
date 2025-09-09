<?php
/**
 * Text Block
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

$c = get_field( 'centre_content' ) ? 'text-center' : '';

$bw = get_field( 'constrain_width' ) ? 'max-ch' : '';
$tw = get_field( 'constrain_width' ) ? 'max-ch--40' : '';
$bg = get_field( 'background' );

$pt = get_field( 'padding_top' ) ? 'pt-5' : '';
$pb = get_field( 'padding_bottom' ) ? 'pb-5' : 'pb-3';

$mx = '';
if ( get_field( 'centre_content' ) && get_field( 'constrain_width' ) ) {
    $mx = ' mx-auto';
}
if ( get_field( 'id' ) ) {
    echo '<a id="' . esc_attr( get_field( 'id' ) ) . '" class="anchor"></a>';
}

$hl = get_field( 'level' ) ? get_field( 'level' ) : 'h2';
?>
<!-- text_block -->
<section class="text_block <?= esc_attr( implode( ' ', array( $pt, $pb, 'bg--' . $bg ) ) ); ?>">
    <div class="container <?= esc_attr( $c ); ?>">
<?php
if ( get_field( 'side_title' ) ) {
    ?>
        <div class="row">
            <div class="col-md-4">
                <<?= esc_attr( $hl ); ?>><?= esc_html( get_field( 'title' ) ); ?></<?= esc_attr( $hl ); ?>>
            </div>
            <div class="col-md-8">
                <?php
                if ( get_field( 'cta' ) ) {
                    echo '<div class="mb-4 ' . esc_attr( $bw ) . '">';
                } else {
                    echo '<div class="' . esc_attr( $bw ) . '">';
                }
                echo wp_kses_post( apply_filters( 'the_content', get_field( 'content' ) ) ) . '</div>';
                if ( get_field( 'cta' ) ) {
                    $cta = get_field( 'cta' );
                    ?>
                <a href="<?= esc_url( $cta['url'] ); ?>" target="<?= esc_attr( $cta['target'] ); ?>" class="btn btn-primary"><?= esc_html( $cta['title'] ); ?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    <?php
} else {
    if ( get_field( 'title' ) ) {
        echo '<' . esc_attr( $hl ) . ' class="mb-4 ' . esc_attr( $tw ) . esc_attr( $mx ) . '">' . wp_kses_post( get_field( 'title' ) ) . '</' . esc_attr( $hl ) . '>';
    }
    if ( get_field( 'cta' ) ) {
        echo '<div class="mb-4 ' . esc_attr( $bw ) . esc_attr( $mx ) . '">';
    } else {
        echo '<div class="' . esc_attr( $bw ) . esc_attr( $mx ) . '">';
    }
    echo wp_kses_post( apply_filters( 'the_content', get_field( 'content' ) ) ) . '</div>';
    if ( get_field( 'cta' ) ) {
        $cta = get_field( 'cta' );
        ?>
    <a href="<?= esc_url( $cta['url'] ); ?>" target="<?= esc_attr( $cta['target'] ); ?>" class="btn btn-primary"><?= esc_html( $cta['title'] ); ?></a>
        <?php
    }
}
?>
    </div>
</section>