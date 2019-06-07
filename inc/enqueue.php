<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		//Divi builder style 1st
		wp_enqueue_style( 'divi_builder-styles', get_template_directory_uri() . '/css/divi_builder.css', array(), $css_version );

		//Theme style 2nd
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.css', array(), $css_version );

		//Google Fonts
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap', false ); 

		wp_enqueue_script( 'jquery' );

		//Theme Scripts
		wp_enqueue_script( 'jt-scripts', get_template_directory_uri() . '/js/scripts.js', array(), $js_version, true );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
