<?php

function agni_child_enqueue_scripts() {
    // Adding parent styles
    wp_enqueue_style( 'agni-parent-style', get_template_directory_uri() . '/style.css', array() );

    //Adding child stylesheet
	wp_enqueue_style( 'agni-child-style', get_stylesheet_directory_uri() . '/style.css'  );
}
add_action( 'wp_enqueue_scripts', 'agni_child_enqueue_scripts', 9 );

function set_post_revisions_limit() {
    define('WP_POST_REVISIONS', 3);
}
add_action('init', 'set_post_revisions_limit');

?>