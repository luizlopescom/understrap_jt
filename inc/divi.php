<?php
/**
 * Understrap modify editor
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 *  This will hide the Divi "Project" post type.
 *  Thanks to georgiee (https://gist.github.com/EngageWP/062edef103469b1177bc#gistcomment-1801080) for his improved solution.
 */
add_filter( 'et_project_posttype_args', 'remove_et_project_posttype_args', 10, 1 );
function remove_et_project_posttype_args( $args ) {
  return array_merge( $args, array(
	'public'				=> false,
	'exclude_from_search'	=> false,
	'publicly_queryable'	=> false,
	'show_in_nav_menus'		=> false,
	'show_ui'				=> false
  ));
}


//Remove Divi builder style 
function divi_deregister_styles() {
	//$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

	//if( $is_page_builder_used ) {
		wp_dequeue_style('et-builder-modules-style');
		wp_dequeue_style('et-builder-modules-style-css');

		wp_dequeue_style('magnific-popup');
	//}
}
add_action( 'wp_print_styles', 'divi_deregister_styles', 100 );

//Remove Divi builder scripts on non Divi pages
function deregister_script() {
	$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

	if( !$is_page_builder_used ) {
		wp_dequeue_script('et-builder-modules-global-functions-script');
		wp_dequeue_script('google-maps-api');
		wp_dequeue_script('divi-fitvids');
		wp_dequeue_script('waypoints');
		wp_dequeue_script('magnific-popup');
		
		wp_dequeue_script('hashchange');
		wp_dequeue_script('salvattore');
		wp_dequeue_script('easypiechart');
		
		wp_dequeue_script('et-jquery-visible-viewport');
		
		wp_dequeue_script('magnific-popup');
		wp_dequeue_script('et-jquery-touch-mobile');
		wp_dequeue_script('et-builder-modules-script');

		wp_dequeue_script('et-core-common');

	}
}
add_action( 'wp_print_scripts', 'deregister_script', 100 );

//Unset custom Divi builder image sizes
add_action('intermediate_image_sizes_advanced', 'cp_remove_extra_image_sizes');
function cp_remove_extra_image_sizes( $sizes ) {
	unset( $sizes['et-pb-post-main-image'] );
	unset( $sizes['et-pb-post-main-image-fullwidth'] );
	unset( $sizes['et-pb-portfolio-image'] );
	unset( $sizes['et-pb-portfolio-module-image'] );
	unset( $sizes['et-pb-portfolio-image-single'] );
	unset( $sizes['et-pb-gallery-module-image-portrait'] );
	return $sizes;
}
