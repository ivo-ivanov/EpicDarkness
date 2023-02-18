<?php

/**
 * Agni Framework functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Agni Framework
 */

/**
 * Defining framwork constants
 */
define('AGNI_TEXTDOMAIN', wp_get_theme()->get('TextDomain'));
define('AGNI_FRAMEWORK_DIR', get_template_directory());
define('AGNI_FRAMEWORK_URL', get_template_directory_uri());
define('AGNI_FRAMEWORK_CSS_URL', AGNI_FRAMEWORK_URL . '/assets/css');
define('AGNI_FRAMEWORK_JS_URL', AGNI_FRAMEWORK_URL . '/assets/js');
define('AGNI_FRAMEWORK_IMG_URL', AGNI_FRAMEWORK_URL . '/assets/img');
define('AGNI_FRAMEWORK_ICONS_URL', AGNI_FRAMEWORK_URL . '/assets/icons');
define('AGNI_TEMPLATE_DIR', AGNI_FRAMEWORK_DIR . '/inc');
define('AGNI_TEMPLATE_URL', AGNI_FRAMEWORK_URL . '/inc');

if (!function_exists('cartify_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cartify_setup()
    {
        
        load_theme_textdomain( 'cartify', get_template_directory() . '/languages' );

                add_theme_support('automatic-feed-links');

        
        add_theme_support('title-tag');

        
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

                add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
}
add_action('after_setup_theme', 'cartify_setup');

if (!function_exists('cartify_content_width')) {
    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function cartify_content_width()
    {
                                $GLOBALS['content_width'] = apply_filters('cartify_content_width', 640);
    }
}
add_action('after_setup_theme', 'cartify_content_width', 0);


/**
 * Loading Custom theme functions.
 */
require AGNI_TEMPLATE_DIR . '/template-functions.php';

function cartify_theme_custom_functions()
{ }
add_action('after_setup_theme', 'cartify_theme_custom_functions');
