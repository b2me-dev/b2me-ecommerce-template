<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package b2me-master-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function b2me_master_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'b2me_master_theme_pingback_header' );
