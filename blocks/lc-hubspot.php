<?php
/**
 * Block template for LC Hubspot.
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

$bg      = get_field('background');
$form_id = get_field('form_id');
$img     = get_field( 'background_image' );
if ( 'none' !== $img ) {
	$ibg = 'style="background-image:url(' . get_stylesheet_directory_uri() . '/img/hero--' . get_field( 'background_image' ) . '.svg)"';
}
?>
<!-- form_block -->
<section class="form_block bg--<?= esc_attr( $bg ); ?>" <?= esc_html( $ibg ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="form_block__container">
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
					<script>
					hbspt.forms.create({
						portalId: "4968908",
						formId: "<?= esc_attr( $form_id ); ?>",
						region: "na1"
					});
					</script>
				</div>
			</div>
		</div>
	</div>
</section>