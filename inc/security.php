<?php
/**
 * Add security enhancements
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function branode_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'branode_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'branode_remove_version_scripts_styles', 9999);

//WordPress Fail Login return 401
function branode_login_failed_401() {
	status_header( 401 );
}
add_action( 'wp_login_failed', 'branode_login_failed_401' );