<?php
/**
 * Understrap modify editor
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



//Hide default Styles dropdown
function remove_default_format_select( $buttons ) {
    //Remove the format dropdown select and text color selector
    $remove = array( 'formatselect' );

    return array_diff( $buttons, $remove );
 }
//add_filter( 'mce_buttons', 'remove_default_format_select' );


// Modify TinyMCE editor
// Hide h1 
function tiny_mce_remove_unused_formats( $initFormats ) {
    // Add block format elements you want to show in dropdown
    $initFormats['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre';
    return $initFormats;
}
add_filter( 'tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );




// Callback function to insert 'styleselect' into the $buttons array
// Place FORMATS in the first line
function my_new_mce_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons', 'my_new_mce_buttons' );





function custom_formats_options( $settings ) {
    $custom_styles_formats = [
        
		[ 
			'title' => 'Overline',
			'selector' => 'h5,h6,p,span',
			'inline' => 'small',
			'classes' => 'overline',
			'wrapper' => true, 
		],
		[ 
			'title' => 'Descriçao', 
			'selector' => 'h5,h6,p,span', 
			'inline' => 'small', 
			'classes' => 'description', 
			'wrapper' => true, 
			'exact' => '1' 
		],
      

        [ 'title' => 'Buttons', 'type' => 'group',
            'items' => [
            	[ 'title' => 'Botão link', 'selector' => 'a, button', 'classes' => 'btn btn-link', 'exact' => '1' ],
                [ 'title' => 'Botão primário', 'selector' => 'a, button', 'classes' => 'btn btn-primary', 'exact' => '1' ],
                [ 'title' => 'Botão secundário', 'selector' => 'a, button', 'classes' => 'btn btn-secondary', 'exact' => '1' ],
                [ 'title' => 'Botão primário outline', 'selector' => 'a, button', 'classes' => 'btn btn-outline-primary', 'exact' => '1' ],
                [ 'title' => 'Botão secundário outline', 'selector' => 'a, button', 'classes' => 'btn btn-outline-secondary', 'exact' => '1' ],
                [ 'title' => 'Transformar em grande', 'selector' => 'a.btn, button.btn', 'classes' => 'btn-lg', 'exact' => '1' ],
            ]
        ], // Buttons

    ];

  //$new_style_formats = array_merge( $default_style_formats, $custom_styles_formats );
  $settings['style_formats'] = json_encode( $custom_styles_formats );
  return $settings;

}
add_filter( 'tiny_mce_before_init', 'custom_formats_options' );