<?php

function agni_child_enqueue_scripts() {
    // Adding parent styles
    wp_enqueue_style( 'agni-parent-style', get_template_directory_uri() . '/style.css', array() );

    //Adding child stylesheet
	wp_enqueue_style( 'agni-child-style', get_stylesheet_directory_uri() . '/style.css'  );
}
add_action( 'wp_enqueue_scripts', 'agni_child_enqueue_scripts', 9 );

function replace_image_urls_with_production_domain($image, $attachment_id, $size, $icon) {
    // Check if the image URL contains "localhost"
    if (strpos($image[0], 'localhost') !== false) {
        // Replace "localhost" with the production domain
        $image[0] = str_replace('http://localhost', 'https://epicdarkness.com', $image[0]);
    }

    return $image;
}
add_filter('wp_get_attachment_image_src', 'replace_image_urls_with_production_domain', 10, 4);

?>