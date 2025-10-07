<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types for the theme.
 *
 * @package lc-rxmile
 */

/**
 * Register custom post types for the theme.
 *
 * This function registers a custom post type called 'people'.
 * The post type is set to be publicly queryable, has a UI in the admin,
 * and supports REST API.
 *
 * @return void
 */
function lc_register_post_types() {

	register_post_type(
		'event',
		array(
			'labels'          => array(
				'name'               => 'Events',
				'singular_name'      => 'Event',
				'add_new_item'       => 'Add New Event',
				'edit_item'          => 'Edit Event',
				'new_item'           => 'New Event',
				'view_item'          => 'View Event',
				'search_items'       => 'Search Events',
				'not_found'          => 'No events found',
				'not_found_in_trash' => 'No events in trash',
			),
			'has_archive'     => true,
			'public'          => true,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => true,
			'menu_position'   => 25,
			'menu_icon'       => 'dashicons-calendar',
			'supports'        => array( 'title', 'editor', 'thumbnail' ),
			'capability_type' => 'post',
			'map_meta_cap'    => true,
			'rewrite'         => array(
				'slug'       => 'events',
				'with_front' => false,
			),
		)
	);

	register_post_type(
		'partner',
		array(
			'labels'          => array(
				'name'               => 'Partners',
				'singular_name'      => 'Partner',
				'add_new_item'       => 'Add New Partner',
				'edit_item'          => 'Edit Partner',
				'new_item'           => 'New Partner',
				'view_item'          => 'View Partner',
				'search_items'       => 'Search Partners',
				'not_found'          => 'No partners found',
				'not_found_in_trash' => 'No partners in trash',
			),
			'has_archive'     => false,
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => true,
			'menu_position'   => 25,
			'menu_icon'       => 'dashicons-networking',
			'supports'        => array( 'title', 'editor', 'thumbnail' ),
			'capability_type' => 'post',
			'map_meta_cap'    => true,
			'rewrite'         => false,
        ),
    );
}
add_action( 'init', 'lc_register_post_types' );

/**
 * Add custom columns for start_date and end_date in the event admin list
*/
add_filter(
    'manage_event_posts_columns',
    function ( $columns ) {
        $columns['start_date'] = 'Start Date';
        $columns['end_date']   = 'End Date';
        return $columns;
    }
);

add_action(
    'manage_event_posts_custom_column',
    function ( $column, $post_id ) {
        if ( 'start_date' === $column ) {
            $date = get_field( 'start_date', $post_id );
            echo esc_html( $date );
        }
        if ( 'end_date' === $column ) {
            $date = get_field( 'end_date', $post_id );
            echo esc_html( $date );
        }
    },
    10,
    2
);

/**
 * Make start_date and end_date filterable in the admin list
 */
add_action(
    'restrict_manage_posts',
    function () {
        global $typenow;
        if ( 'event' === $typenow ) {
            $start = isset( $_GET['start_date'] ) ? esc_attr( $_GET['start_date'] ) : '';
            $end   = isset( $_GET['end_date'] ) ? esc_attr( $_GET['end_date'] ) : '';
            echo '<input type="text" name="start_date" placeholder="Start Date (YYYYMMDD)" value="' . $start . '" style="width:140px; margin-right:8px;" />';
            echo '<input type="text" name="end_date" placeholder="End Date (YYYYMMDD)" value="' . $end . '" style="width:140px; margin-right:8px;" />';
        }
    }
);

add_filter(
    'parse_query',
    function ( $query ) {
        global $pagenow;
        $post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
        if ( is_admin() && 'edit.php' === $pagenow && 'event' === $post_type ) {
            if ( ! empty( $_GET['start_date'] ) ) {
                $query->query_vars['meta_query'][] = array(
                    'key'     => 'start_date',
                    'value'   => $_GET['start_date'],
                    'compare' => '>=',
                    'type'    => 'NUMERIC',
                );
            }
            if ( ! empty( $_GET['end_date'] ) ) {
                $query->query_vars['meta_query'][] = array(
                    'key'     => 'end_date',
                    'value'   => $_GET['end_date'],
                    'compare' => '<=',
                    'type'    => 'NUMERIC',
                );
            }
        }
    }
);

