<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/theme_custom.php',                    // Theme customizations.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	//EXTRAS
	'/tinymce_styles.php',                  // TinyMCE Custom Styles.
	'/customizer_custom.php',               // Custom Customizer additions.
	'/security.php',                        // Security functions.
	'/shortcodes.php',                      // Shortcodes.
	'/divi.php',                            // Divi builder - plugin functions.
	'/taygeta-facilitadores.php',           // Funções para os Facilitadores Credenciados do Jogo da Transf.
	'/theeventscalendar.php',               // Funções para o plugin The Events Calendar
//	'/breadcrumb.php',                      // Breadcrumb.
	//META BOX + CPT
//	'/plugin_meta_box.php',                 // Meta Box- plugin functions.
//	'/custom_post_types_taxonomies.php'     // Custom Post Types and Custom Taxonomies.

);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
