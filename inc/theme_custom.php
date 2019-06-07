<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//Set Excerpt length - by WORDS
function custom_excerpt_length( $length ) {
	return 30; //WORDS
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );


// Set except length to CUSTOM number of characters.
// echo get_excerpt(140);
function get_excerpt( $count ) {
	$excerpt = get_the_excerpt();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	return $excerpt;
}

//Change the Read More - Excerpt
//Replace function from -> setup.php
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	if ( $post->post_type = 'fornecedores') {
		$post_excerpt = $post_excerpt ;
	}
	return $post_excerpt;
}

/**
 * Remove archive labels.
 * 
 */
add_filter( 'get_the_archive_title', 'simple_archive_title' );
function simple_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}