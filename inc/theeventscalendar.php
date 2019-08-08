<?php
/**
 * Modern Tribe - The Events Calendar functions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// Limit Words in the Excerpt

add_filter( 'excerpt_length', function( $length ) {
    return function_exists( 'tribe_is_list_view' ) && tribe_is_list_view()
        ? 30
        : $length;
}, 1000 );


