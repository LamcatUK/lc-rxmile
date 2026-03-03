<?php
/**
 * The template for displaying event archive pages
 *
 * @package lc-rxmile
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Remove meta_query filtering for date, just order by start_date ascending.
add_action(
	'pre_get_posts',
	function ( $query ) {
		if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'event' ) ) {
			$query->set( 'meta_key', 'start_date' );
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'order', 'ASC' );
		}
	}
);

?>
<main id="main" class="padding-top events">
	<div class="container pb-5 events__archive">
		<div class="page-meta">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}
			?>
		</div>
		<h1 class="mb-5">Events</h1>
		<?php
		if ( get_field( 'events_page_intro', 'option' ) ) {
			echo '<div class="events-page-intro mb-5">' . wp_kses_post( get_field( 'events_page_intro', 'option' ) ) . '</div>';
		}
		if ( have_posts() ) {
			$today  = gmdate( 'Y-m-d' );
			$events = array();

			while ( have_posts() ) {
				the_post();
				global $post;
				$start_date = get_field( 'start_date', $post->ID );
				$end_date   = get_field( 'end_date', $post->ID );

				// Only include if upcoming or ongoing.
				if ( $end_date && $end_date < $today ) {
					continue;
				}
				if ( ! $end_date && $start_date < $today ) {
					continue;
				}
				$events[] = array(
					'ID'         => $post->ID,
					'title'      => get_the_title(),
					'start_date' => $start_date,
					'end_date'   => $end_date,
				);
			}
			// Sort by start_date ascending.
			usort(
				$events,
				function ( $a, $b ) {
					return strcmp( $a['start_date'], $b['start_date'] );
				}
			);
			if ( empty( $events ) ) {
				echo '<div class="alert alert-info">No upcoming events found.</div>';
			} else {
				$current_month = '';
				foreach ( $events as $event ) {
					$event_month = ! empty( $event['start_date'] ) ? gmdate( 'F Y', strtotime( $event['start_date'] ) ) : '';
					if ( $event_month && $event_month !== $current_month ) {
						echo '<h2 class="events__month-heading mb-4">' . esc_html( $event_month ) . '</h2>';
						$current_month = $event_month;
					}
					if ( ! get_post_field( 'post_content', $event['ID'] ) ) {
						?>
		<div class="event mb-4 row">
						<?php
					} else {
						?>
		<a href="<?= esc_url( get_permalink( $event['ID'] ) ); ?>" class="event mb-4 row">
						<?php
					}

					$img  = get_the_post_thumbnail_url( $event['ID'], 'medium' );
					$cols = 'col-md-9';
					if ( $img ) {
						?>
			<div class="col-md-3">
				<img src="<?= esc_url( get_the_post_thumbnail_url( $event['ID'], 'medium' ) ); ?>" alt="<?= esc_attr( $event['title'] ); ?>" class="event__image" />
			</div>
						<?php
					} else {
						?>
			<div class="col-md-3">
			</div>
						<?php
						$cols = 'col-md-12';
					}
					?>
			<div class="<?= esc_attr( $cols ); ?> pb-4" style="border-bottom: 1px solid #ccc;">
				<h3 class="event__name"><?= esc_html( $event['title'] ); ?></h3>
				<div class="event__date">
					<?php
					if ( $event['start_date'] ) {
						echo esc_html( ymd_to_display( $event['start_date'] ) );
					}
					if ( $event['end_date'] && $event['end_date'] !== $event['start_date'] ) {
						echo ' - ' . esc_html( ymd_to_display( $event['end_date'] ) );
					}
					?>
				</div>
				<div class="event_summary">
					<?php
					if ( get_field( 'event_summary', $event['ID'] ) ) {
						echo '<div class="event__excerpt">' . wp_kses_post( get_field( 'event_summary', $event['ID'] ) ) . '</div>';
					}
					?>
				</div>
			</div>
					<?php
					if ( ! get_post_field( 'post_content', $event['ID'] ) ) {
						?>
		</div>
						<?php
					} else {
						?>
		</a>
						<?php
					}
					?>
					<?php
				}
			}
		}
		?>
	</div>
</main>
<?php

get_footer();
