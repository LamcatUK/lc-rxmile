<?php

defined( 'ABSPATH' ) || exit;

?>
<section class="integration-partners">
	<div class="container py-5">
		<h2 class="text-center"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="mb-5 text-center">
			<?= wp_kses_post( get_field( 'intro' ) ); ?>
		</div>
		<div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
			<?php
			foreach ( get_field( 'partner_pages' ) as $partner ) {
				?>
			<a class="btn btn-primary" href="<?= esc_url( get_permalink( $partner ) ); ?>"><?= esc_html( get_the_title( $partner ) ); ?></a>
				<?php
			}
			?>
		</div>
	</div>
</section>