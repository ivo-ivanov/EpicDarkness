<?php

function agni_child_enqueue_scripts() {
    // Adding parent styles
    wp_enqueue_style( 'agni-parent-style', get_template_directory_uri() . '/style.css', array() );

    //Adding child stylesheet
	wp_enqueue_style( 'agni-child-style', get_stylesheet_directory_uri() . '/style.css'  );
}
add_action( 'wp_enqueue_scripts', 'agni_child_enqueue_scripts', 9 );

// Load the local.php file if we're in a development environment
if ('production' !== wp_get_environment_type()) {
    // Require the local.php file
    require_once get_stylesheet_directory() . '/local.php';
}

// Use a quality setting of 85 for AVIF images.
function filter_avif_quality( $quality, $mime_type ) {
	if ( 'image/avif' === $mime_type ) {
		return 85;
	}
	return $quality;
}
add_filter( 'wp_editor_set_quality', 'filter_avif_quality', 10, 2 );

// Output AVIFs for uploaded JPEGs and PNGs
function filter_image_editor_output_format( $formats ) {
	$formats['image/jpeg'] = 'image/avif';
    $formats['image/png'] = 'image/avif';
	return $formats;
}
add_filter( 'image_editor_output_format', 'filter_image_editor_output_format' );

?>