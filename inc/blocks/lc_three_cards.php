<?php
/**
 * Block Name: Three Cards
 *
 * This is the template that displays the Three Cards block.
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

$bg = get_field( 'background' ) ? 'bg--' . get_field( 'background' ) : '';
?>
<!-- three_cards -->
<section class="three_cards pb-5 <?= esc_attr( $bg ); ?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            while ( have_rows( 'cards' ) ) {
                the_row();
                $img = wp_get_attachment_image_src( get_sub_field( 'image' ), 'large' );
                ?>
            <div class="col-lg-4 py-5 py-xl-0">
                <div class="three_cards__card">
                    <img class="three_cards__image mb-4"
                        src="<?= esc_url( $img[0] ); ?>"
                        width="<?= esc_attr( $img[1] ); ?>"
                        height="<?= esc_attr( $img[2] ); ?>">
                    <div class="pre-title text-center">
                        <?= esc_html( get_sub_field( 'pre_title' ) ); ?>
                    </div>
                    <h3 class="text-center">
                        <?php
                        if ( get_sub_field( 'title_link' ) ) {
                            ?>
                        <a href="<?= esc_url( get_sub_field( 'title_link' ) ); ?>">
                            <?php
                        }
                        ?>
                        <?= esc_html( get_sub_field( 'title' ) ); ?>
                        <?php
                        if ( get_sub_field( 'title_link' ) ) {
                            ?>
                        </a>
                            <?php
                        }
                        ?>
                    </h3>
                    <div>
                        <?= wp_kses_post( get_sub_field( 'content' ) ); ?>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>