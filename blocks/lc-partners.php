<?php
/**
 * Text Block
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;
$partners = new WP_Query(
	array(
		'post_type'      => 'partner',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	)
);

if ( ! $partners->have_posts() ) {
	return;
}

$partner_list = array();
// extract partner names from post titles
while ( $partners->have_posts() ) {
	$partners->the_post();
	$partner_list[] = get_the_title();
}

// implode $partner list with commas, and add 'and' before the last partner
if ( count( $partner_list ) > 1 ) {
	$last_partner = array_pop( $partner_list );
	$partner_names = implode( ', ', $partner_list ) . ' and ' . $last_partner;
} else {
	$partner_names = $partner_list[0];
}

// substitute {PARTNERS} in the intro text with the partner names
$intro_text = get_field( 'partner_block_intro', 'option' );
if ( $intro_text ) {
	$intro_text = str_replace( '{PARTNERS}', $partner_names, $intro_text );
	// update_field( 'partner_block_intro', $intro_text, 'option' );
}

?>
<section class="lc-partners my-5">
	<div class="container py-5">
		<h2 class="mb-4"><?= esc_html( get_field( 'partner_block_title', 'option' ) ); ?></h2>
		<div class="mb-4"><?= wp_kses_post( $intro_text ); ?></div>
		<div class="row g-5 mb-4">
		<?php
		while ( $partners->have_posts() ) {
			$partners->the_post();
			$l = get_field( 'link', get_the_ID() );
			?>
				<div class="col-md-8 d-flex flex-column justify-content-between">
					<h3><?= esc_html( get_the_title() ); ?></h3>
					<div class="mb-3"><?= wp_kses_post( apply_filters( 'the_content', get_the_content() ) ); ?></div>
					<a href="<?= esc_url( $l['url'] ); ?>" class="btn btn-primary align-self-center"><?= esc_html( get_the_title() ); ?> Integration</a>
				</div>
				<div class="col-md-4">
					<?= get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
				</div>
				<?php
			}
			wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
</section>