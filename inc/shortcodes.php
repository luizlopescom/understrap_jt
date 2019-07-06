<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//Site name
function sitename_shortcode( $atts ){
	return get_bloginfo( 'name' );
}
add_shortcode( 'sitename', 'sitename_shortcode' );


//Date shortcodes
function year_shortcode() {
	$year = date('Y');
	return $year;
}
add_shortcode('year', 'year_shortcode');

//Copyright
function copyright_shortcode( $atts ){
	return '©';
}
add_shortcode( 'copyright', 'copyright_shortcode' );
add_shortcode( 'c', 'copyright_shortcode' );

//Registered
function registered_shortcode( $atts ){
	return '®';
}
add_shortcode( 'registered', 'registered_shortcode' );
add_shortcode( 'r', 'registered_shortcode' );

//Trademark
function trademark_shortcode( $atts ){
	return '™';
}
add_shortcode( 'trademark', 'trademark_shortcode' );
add_shortcode( 'tm', 'trademark_shortcode' );


//Icons Shortcodes
function fa_user_plus_shortcode() {
	return '<i class="fa fa-user-plus" aria-hidden="true"></i>';
}
add_shortcode('fa_user_plus', 'fa_user_plus_shortcode');

function fa_mail_shortcode() {
	return '<i class="fa fa-envelope-o" aria-hidden="true"></i>';
}
add_shortcode('fa_mail', 'fa_mail_shortcode');

function fa_phone_shortcode() {
	return '<i class="fa fa-phone" aria-hidden="true"></i>';
}
add_shortcode('fa_phone', 'fa_phone_shortcode');

function fa_pin_shortcode() {
	return '<i class="fa fa-map-marker" aria-hidden="true"></i>';
}
add_shortcode('fa_map', 'fa_pin_shortcode');


//Customizer info
//Endereço
function endereco1_shortcode() {
	return get_theme_mod('endereco_site');
}
add_shortcode('endereco', 'endereco1_shortcode');

function endereco2_shortcode() {
	return get_theme_mod('endereco2_site');
}
add_shortcode('endereco2', 'endereco2_shortcode');

//Tels
function tel1_shortcode() {
	return '<a href="tel:' . get_theme_mod('telefone_site') . '">' . get_theme_mod('telefone_site') . '</a>';
}
add_shortcode('tel', 'tel1_shortcode');

function tel2_shortcode() {
	return '<a href="tel:' . get_theme_mod('whatsapp_site') . '">' . get_theme_mod('whatsapp_site') . '</a>';
}
add_shortcode('tel2', 'tel2_shortcode');

//Email
function email1_shortcode() {
	return '<a href="mailto:' . get_theme_mod('email_site') . '">' . get_theme_mod('email_site') . '</a>';
}
add_shortcode('email', 'email1_shortcode');

function email2_shortcode() {
	return '<a href="mailto:' . get_theme_mod('email2_site') . '">' . get_theme_mod('email2_site') . '</a>';
}
add_shortcode('email2', 'email2_shortcode');
