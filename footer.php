<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cb-mvp
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<div class="footer pb-3">
	<div class="container pt-5">
		<div class="row px-4 px-md-0">
			<div class="col-md-6 col-lg-3 text-center text-md-start mb-4">
				<img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/rxmile-logo--white.png"
					class="mb-3" width=180 height=49>
				<div class="text-blue-100"><a href="/control/">Control</a>, <a href="/compliant/">Compliant</a>, <a
						href="/cost-effective/">Cost-Effective</a></div>
				<div class="social justify-content-center justify-content-md-start">
					<?= do_shortcode('[social_icons]'); ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 mb-4 d-flex flex-column mx-auto">
				<div class="d-flex mb-4 mx-auto mx-md-0 text-center text-md-start"><img
						src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/icon--marker.svg"
						class="icon"> 320 W Sabal Palm Ste 300,<br>Longwood, Orlando,<br> FL 32779</div>
				<div class="d-flex mx-auto mx-md-0"><img
						src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/icon--envelope.svg"
						class="icon"> <a href="mailto:inquiries@rxmile.com">inquiries@rxmile.com</a></div>
			</div>
			<div class="col-md-6 col-lg-3 text-center text-md-start mb-4">
				<?php wp_nav_menu( array( 'theme_location' => 'footer_menu1' ) ); ?>
			</div>
			<div class="col-md-6 col-lg-3 text-center text-md-start mb-4">
				<?php wp_nav_menu( array( 'theme_location' => 'footer_menu2' ) ); ?>
			</div>
		</div>
	</div>
	<div class="container py-2 colophon">
		<div class="row">
			<div class="col-md-4 text-center text-md-start">
				<a href="/terms-conditions/">Terms &amp; Conditions</a>&nbsp;
				<a href="/privacy-policy/">Privacy Policy</a>
			</div>
			<div class="col-md-4 text-center">
				Copyright &copy; <?= gmdate( 'Y' ); ?>
				RxMile
			</div>
			<div class="col-md-4 text-center text-md-end">
				<a href="http://flpixel.com/" rel="nofollow noopener" target="_blank">Site by FL Pixel</a>
			</div>
		</div>
	</div>
</div>
</div><!-- #page -->

<div class="modal fade" id="choiceModal" tabindex="-1" role="dialog" aria-labelledby="choiceModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width:min(600px,90vw)" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row two_cards g-4">
					<div class="col-md-6">
						<div class="two_cards__card text-center" type="button" data-bs-toggle="modal" data-bs-target="#pharmacyModal" data-bs-dismiss="modal">
							<div class="h3">For Pharmacies</div>
							<div class="mb-4">Schedule your pharmacy delivery software demo here.</div>
							<div class="btn btn-primary btn--small mb-2">Book Demo</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="two_cards__card text-center" type="button" data-bs-toggle="modal" data-bs-target="#courierModal" data-bs-dismiss="modal">
							<div class="h3">For Couriers</div>
							<div class="mb-4">Schedule a demo to join our courier network here.</div>
							<div class="btn btn-navbar mb-2 fw-bold" style="min-width:190px">Book Demo</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Pharmacy HubSpot Form Modal -->
<div class="modal fade" id="pharmacyModal" tabindex="-1" role="dialog" aria-labelledby="pharmacyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pharmacyModalLabel">For Pharmacies</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Replace with your HubSpot form embed code for Pharmacies -->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
				<script>
				hbspt.forms.create({
					region: "na1",
					portalId: "4968908",
					formId: "af16aae5-9b98-48d8-be60-12777f90d28d"
				});
				</script>
			</div>
		</div>
	</div>
</div>

<!-- Courier HubSpot Form Modal -->
<div class="modal fade" id="courierModal" tabindex="-1" role="dialog" aria-labelledby="courierModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="courierModalLabel">For Couriers</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Replace with your HubSpot form embed code for Couriers -->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
				<script>
				hbspt.forms.create({
					region: "na1",
					portalId: "4968908",
					formId: "f546eeac-a6c9-4257-ab9f-e34f2e1aa5d9"
				});
				</script>
			</div>
		</div>
	</div>
</div>


<script src="//code.tidio.co/omplptyg4akvt0tcpb9lkuprv9qr6jqc.js"></script>
<!-- <script src="https://links.digivox.ai/js/form_embed.js"></script> -->
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<!-- <div class="enquire-button">Enquire</div> -->
<?php
wp_footer();
if ( get_field( 'gtm_property', 'options' ) ) {
	?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
		src="https://www.googletagmanager.com/ns.html?id=<?= get_field( 'gtm_property', 'options' ); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php
}
?>
</body>

</html>