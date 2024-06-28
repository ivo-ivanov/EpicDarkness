<?php
/**
 * Kirki config file.
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists('Kirki') ){
    return;
}


$config_theme_options = 'cartify_theme_options';
Kirki::add_config( $config_theme_options, array(
	'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );


$panel_settings = 'cartify_theme_options_panel';

$section_header_settings = 'cartify_header_settings';
$section_footer_settings = 'cartify_footer_settings';
$section_shop_settings = 'cartify_shop_settings';
$section_page_settings = 'cartify_page_settings';
$section_dock_settings = 'cartify_dock_settings';
$section_blog_settings = 'cartify_blog_settings';
$section_portfolio_settings = 'cartify_portfolio_settings';
$section_api_settings = 'cartify_api_settings';
$section_404_settings = 'cartify_404_settings';
$section_advanced_settings = 'cartify_advance_settings';
$section_cookie_settings = 'cartify_cookie_settings';


$section_divider = '<div class="kirki-framework-agni-divider"></div>';

$section_header_blocks_placement_options = [
	'top-left' => esc_html__( 'Top Left', 'cartify' ),
	'top-center' => esc_html__( 'Top Center', 'cartify' ),
	'top-right' => esc_html__( 'Top Right', 'cartify' ),
	'center-left' => esc_html__( 'Center Left', 'cartify' ),
	'center-center' => esc_html__( 'Center Center', 'cartify' ),
	'center-right' => esc_html__( 'Center Right', 'cartify' ),
	'bottom-left' => esc_html__( 'Bottom Left', 'cartify' ),
	'bottom-center' => esc_html__( 'Bottom Center', 'cartify' ),
	'bottom-right' => esc_html__( 'Bottom Right', 'cartify' ),
];

$section_header_id_options = cartify_get_header_list_dropdown();


function cartify_kirki_section_products_list(){
	$query_args = array(
		'post_type' => 'product'
	);

	return apply_filters( 'agni_get_posttype_options', $query_args, true );
}



function cartify_kirki_section_blocks_list(){
	$query_args = array(
		'post_type' => 'agni_block'
	);
	return apply_filters( 'agni_get_posttype_options', $query_args, true );
}


Kirki::add_panel( $panel_settings, array(
    'priority'    => 10,
    'title'       => esc_html__( 'Cartify Theme Options', 'cartify' ),
    'description' => esc_html__( 'My panel description', 'cartify' ),
) );

Kirki::add_section( $section_header_settings, [
    'title'          => esc_html__( 'Header Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
 ] );
 Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'header_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_header_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'header_settings_header_source',
	'label'       => esc_html__( 'Header Source', 'cartify' ),
	'section'     => $section_header_settings,
	'choices'     => [
		'1'   => esc_html__( 'Builder', 'cartify' ),
		'2' => esc_html__( 'Content Block', 'cartify' ),
	],
	'default'     => '1',
	
] );




Kirki::add_section( $section_footer_settings, [
    'title'          => esc_html__( 'Footer Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
]);

Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'footer_settings_footer_source',
	'label'       => esc_html__( 'Footer Source', 'cartify' ),
	'section'     => $section_footer_settings,
	'choices'     => [
		'1'   => esc_html__( 'Default', 'cartify' ),
		'2' => esc_html__( 'Content Block', 'cartify' ),
	],
	'default'     => '1',
	
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'footer_settings_content_block_choice',
	'label'       => esc_html__( 'Block Choice', 'cartify' ),
	'section'     => $section_footer_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'	  => cartify_kirki_section_blocks_list(),
		'active_callback' => [
		[
			'setting'  => 'footer_settings_footer_source',
			'operator' => '==',
			'value'    => '2',
		]
	],
] );



























































































































































































































































	











































































































































































































































































































































































































































































































































































































































Kirki::add_section( $section_shop_settings, [
    'title'          => esc_html__( 'Shop Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_label_hot',
	'label'       => esc_html__( 'Hot label', 'cartify' ),
	'description' => esc_html__( 'It will add hot label to chosen products on archive & product page', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'placeholder' => esc_html__( 'Select products...', 'cartify' ),
	'priority'    => 10,
	'multiple'    => 999,
	'choices'     => cartify_kirki_section_products_list(),
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_label_new',
	'label'       => esc_html__( 'New label', 'cartify' ),
	'description' => esc_html__( 'It will add new label to chosen products on archive & product page', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'placeholder' => esc_html__( 'Select products...', 'cartify' ),
	'priority'    => 10,
	'multiple'    => 999,
	'choices'     => cartify_kirki_section_products_list(),
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_fullwidth',
	'label'       => esc_html__( 'Fullwidth', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,

	] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_general_view_choice',
	'label'       => esc_html__( 'View', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => 'grid',
	'priority'    => 10,
	'choices'     => [
		
		'grid'   => esc_html__( 'Grid', 'cartify' ),
		'list' => esc_html__( 'List', 'cartify' ),
	],
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_categories_bar_show',
	'label'       => esc_html__( 'Categories Bar', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_general_thumbnail_choice',
	'label'       => esc_html__( 'Archives thumbnail Choice', 'cartify' ),
	'section'     => $section_shop_settings,
	'choices'     => [
		'1' => esc_html__( 'Simple (Single image)', 'cartify' ),
		'2' => esc_html__( 'Hover (Two images)', 'cartify' ),
		'3' => esc_html__( 'Slider (All images)', 'cartify' ),
	],
	
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_general_display_style',
	'label'       => esc_html__( 'Archives Display Style', 'cartify' ),
	'section'     => $section_shop_settings,
	'choices'     => [
		'1' => esc_html__( 'Style 1', 'cartify' ),
		'2' => esc_html__( 'Style 2', 'cartify' ),
		'3' => esc_html__( 'Style 3', 'cartify' ),
		'4' => esc_html__( 'Style 4', 'cartify' ),
		'5' => esc_html__( 'Style 5', 'cartify' ),
		'1a' => esc_html__( 'Style 1 Alt', 'cartify' ),
		'2a' => esc_html__( 'Style 2 Alt', 'cartify' ),
	],
	'default'     => '1a',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_product_category',
	'label'       => esc_html__( 'Archives Product Category', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_product_quickview',
	'label'       => esc_html__( 'Archives Product Quickview', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_product_compare',
	'label'       => esc_html__( 'Archives Product Compare', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_product_stock',
	'label'       => esc_html__( 'Archives Product Stock', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_product_countdown',
	'label'       => esc_html__( 'Archives Product Countdown', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_variable_add_to_cart',
	'label'       => esc_html__( 'Variable Products Add to cart', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,

	] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_show_qty',
	'label'       => esc_html__( 'Show Qty', 'cartify' ),
	'description'       => esc_html__( 'Display quantity field near products to change cart quantity', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_general_show_qty_choice',
	'label'       => esc_html__( 'Qty Display choice', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '2',
	'priority'    => 10,
	'choices'     => [
		
		'1'   => esc_html__( 'Visible After added to cart', 'cartify' ),
		'2' => esc_html__( 'Before adding to cart', 'cartify' ),
	],
] );



Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_general_qty_style',
	'label'       => esc_html__( 'Qty style', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'     => [
		
		''   => esc_html__( 'Default', 'cartify' ),
		'dropdown' => esc_html__( 'Dropdown', 'cartify' ),
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_show_desc',
	'label'       => esc_html__( 'Show Descriptionn', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_general_sidebar',
	'label'       => esc_html__( 'Sidebar', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'     => [
		''   => esc_html__( 'No sidebar', 'cartify' ),
		'sidebar-left' => esc_html__( 'Left sidebar', 'cartify' ),
		'sidebar-right'  => esc_html__( 'Right sidebar', 'cartify' ),
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_general_topbar',
	'label'       => esc_html__( 'Topbar', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );



Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_general_pagination',
	'label'       => esc_html__( 'Pagination Style', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
	'choices'     => [
		'1'   => esc_html__( 'Number/Default)', 'cartify' ),
		'2' => esc_html__( 'Infinite Scroll', 'cartify' ),
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_search',
	'label'       => esc_html__( 'Search', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_search_hide_outofstock',
	'label'       => esc_html__( 'Hide out of stock', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_filter',
	'label'       => esc_html__( 'Filter', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'shop_settings_filter_toggle_text',
	'label'    => esc_html__( 'Label', 'cartify' ),
	'section'  => $section_shop_settings,
	'default'  => '',
	'priority' => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_filter_toggle',
	'label'       => esc_html__( 'Toggle on Desktop', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_filter_toggle_content',
	'label'       => esc_html__( 'Content Choice', 'cartify' ),
	'section'     => $section_shop_settings,
	'choices'     => [
		'shop-sidebar' => esc_html__( 'Sidebar', 'cartify' ),
		'topbar' => esc_html__( 'Topbar', 'cartify' ),
		
	],
	'active_callback' => [
		[
			'setting'  => 'shop_settings_filter_toggle',
			'operator' => '===',
			'value'    => true,
		]
	],
	'default'     => 'topbar',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_compare',
	'label'       => esc_html__( 'Compare', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'dropdown-pages',
	'settings'    => 'shop_settings_compare_page_choice',
	'label'       => esc_html__( 'Page to populate', 'cartify' ),
	'section'     => $section_shop_settings,
	
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_single',
	'label'       => esc_html__( 'Single', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'shop_settings_single_sidebar',
	'label'       => esc_html__( 'Sidebar', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'     => [
		''   => esc_html__( 'No sidebar', 'cartify' ),
		'sidebar-left' => esc_html__( 'Left sidebar', 'cartify' ),
		'sidebar-right'  => esc_html__( 'Right sidebar', 'cartify' ),
	],
] );



Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_cart',
	'label'       => esc_html__( 'Cart', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'shop_settings_cart_block_choice',
	'label'       => esc_html__( 'Empty Cart Block Choice', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'	  => cartify_kirki_section_blocks_list()
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_checkout',
	'label'       => esc_html__( 'Checkout', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_multistep_checkout',
	'label'       => esc_html__( 'Multi Step Checkout', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'shop_settings_account',
	'label'       => esc_html__( 'My Account', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_social_login_fb_show',
	'label'       => esc_html__( 'Social Login Facebook', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'shop_settings_social_login_google_show',
	'label'       => esc_html__( 'Social Login Google', 'cartify' ),
	'section'     => $section_shop_settings,
	'default'     => '1',
	'priority'    => 10,
] );




Kirki::add_section( $section_dock_settings, [
    'title'          => esc_html__( 'Dock Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'dock_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_dock_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'dock_settings_general_show',
	'label'       => esc_html__( 'Enable Dock', 'cartify' ),
	'section'     => $section_dock_settings,
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'dock_settings_general_shop_show',
	'label'       => esc_html__( 'Shop Dock', 'cartify' ),
	'section'     => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_show',
			'operator' => '===',
			'value'    => true,
		]
	],
	'default'     => '1',
	'priority'    => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'     => 'url',
	'settings' => 'dock_settings_general_shop_link',
	'label'    => esc_html__( 'Shop Dock Link', 'cartify' ),
	'section'  => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_shop_show',
			'operator' => '!=',
			'value'    => '',
		]
	],
	'default'  => '',
	'priority' => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'dock_settings_general_category_dropdown_show',
	'label'       => esc_html__( 'Category Dock', 'cartify' ),
	'section'     => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_show',
			'operator' => '===',
			'value'    => true,
		]
	],
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'url',
	'settings' => 'dock_settings_general_category_dropdown_link',
	'label'    => esc_html__( 'Category Dock Link', 'cartify' ),
	'description' => esc_html__( 'Keep this empty to open side category menu', 'cartify' ),
	'section'  => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_category_dropdown_show',
			'operator' => '!=',
			'value'    => '',
		]
	],
	'default'  => '',
	'priority' => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'dock_settings_general_cart_show',
	'label'       => esc_html__( 'Cart Dock', 'cartify' ),
	'section'     => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_show',
			'operator' => '===',
			'value'    => true,
		]
	],
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'url',
	'settings' => 'dock_settings_general_cart_link',
	'label'    => esc_html__( 'Cart Dock Link', 'cartify' ),
	'description' => esc_html__( 'Keep this empty to open side cart panel', 'cartify' ),
	'section'  => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_cart_show',
			'operator' => '!=',
			'value'    => '',
		]
	],
	'default'  => '',
	'priority' => 10,
] );


Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'dock_settings_general_myaccount_show',
	'label'       => esc_html__( 'Myaccount Dock', 'cartify' ),
	'section'     => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_show',
			'operator' => '===',
			'value'    => true,
		]
	],
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'url',
	'settings' => 'dock_settings_general_myaccount_link',
	'label'    => esc_html__( 'Myaccount Dock Link', 'cartify' ),
	'description' => esc_html__( 'Keep this empty to open side login panel', 'cartify' ),
	'section'  => $section_dock_settings,
	'active_callback' => [
		[
			'setting'  => 'dock_settings_general_myaccount_show',
			'operator' => '!=',
			'value'    => '',
		]
	],
	'default'  => '',
	'priority' => 10,
] );



Kirki::add_section( $section_page_settings, [
    'title'          => esc_html__( 'Page Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'page_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_page_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'page_settings_general_title',
	'label'       => esc_html__( 'Title', 'cartify' ),
	'section'     => $section_page_settings,
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'page_settings_general_title_alignment',
	'label'       => esc_html__( 'Title Alignment', 'cartify' ),
	'section'     => $section_page_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'     => [
		'left'   => esc_html__( 'Left', 'cartify' ),
		'center' => esc_html__( 'Center', 'cartify' ),
		'right'  => esc_html__( 'Right', 'cartify' ),
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'page_settings_general_remove_margin',
	'label'       => esc_html__( 'Remove Margin', 'cartify' ),
	'section'     => $section_page_settings,
	'default'     => '1',
	'priority'    => 10,
] );











Kirki::add_section( $section_blog_settings, [
    'title'          => esc_html__( 'Blog Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'blog_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_blog_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'blog_settings_general_display_style',
	'label'       => esc_html__( 'Archives Display Style', 'cartify' ),
	'section'     => $section_blog_settings,
	'choices'     => [
		'1' => esc_html__( 'Style 1', 'cartify' ),
		'2' => esc_html__( 'Style 2', 'cartify' ),
		'3' => esc_html__( 'Style 3', 'cartify' ),
	],
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => 'blog_settings_general_sidebar',
	'label'       => esc_html__( 'Sidebar', 'cartify' ),
	'section'     => $section_blog_settings,
	'default'     => 'no-sidebar',
	'priority'    => 10,
	'choices'     => [
		'no-sidebar'   => esc_html__( 'No sidebar', 'cartify' ),
		'left' => esc_html__( 'Left sidebar', 'cartify' ),
		'right'  => esc_html__( 'Right sidebar', 'cartify' ),
	],
] );

























Kirki::add_section( $section_portfolio_settings, [
    'title'          => esc_html__( 'Portfolio Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => 'portfolio_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_portfolio_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => 'portfolio_settings_general_display_style',
	'label'       => esc_html__( 'Archives Display Style', 'cartify' ),
	'section'     => $section_portfolio_settings,
	'choices'     => [
		'1' => esc_html__( 'Style 1', 'cartify' ),
		'2' => esc_html__( 'Style 2', 'cartify' ),
		'3' => esc_html__( 'Style 3', 'cartify' ),
	],
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'dropdown-pages',
	'settings'    => 'portfolio_settings_archive_page_choice',
	'label'       => esc_html__( 'Archive Page', 'cartify' ),
	'section'     => $section_portfolio_settings,
	'default'     => '',
	'priority'    => 10,
] );





















Kirki::add_section( $section_404_settings, [
    'title'          => esc_html__( '404 Page Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => '404_settings_general',
	'label'       => esc_html__( 'General', 'cartify' ),
	'section'     => $section_404_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'radio',
	'settings'    => '404_settings_general_choice',
	'label'       => esc_html__( '404 Source', 'cartify' ),
	'section'     => $section_404_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'     => [
		''   => esc_html__( 'Preset with Content Block', 'cartify' ),
		'content-block' => esc_html__( 'Content Block', 'cartify' ),
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'custom',
	'settings'    => '404_settings_content',
	'label'       => esc_html__( 'Content', 'cartify' ),
	'section'     => $section_404_settings,
	'default'     => $section_divider,
	'priority'    => 10,
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'image',
	'settings'    => '404_settings_content_image_url',
	'label'       => esc_html__( 'Image (Icon/Logo)', 'cartify' ),
	
	'section'     => $section_404_settings,
	'default'     => '',
	'active_callback' => [
		[
			'setting'  => '404_settings_general_choice',
			'operator' => '==',
			'value'    => '',
		]
	],
] );
Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => '404_settings_content_products_search',
	'label'       => esc_html__( 'Search only for Products', 'cartify' ),
	'section'     => $section_404_settings,
	'default'     => '1',
	'priority'    => 10,
	'active_callback' => [
		[
			'setting'  => '404_settings_general_choice',
			'operator' => '==',
			'value'    => '',
		]
	],
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'select',
	'settings'    => '404_settings_content_block_choice',
	'label'       => esc_html__( 'Block Choice', 'cartify' ),
	'section'     => $section_404_settings,
	'default'     => '',
	'priority'    => 10,
	'choices'	  => cartify_kirki_section_blocks_list()
] );











Kirki::add_section( $section_advanced_settings, [
    'title'          => esc_html__( 'Advanced Settings', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'advanced_settings_generate_custom_thumbnails',
	'label'       => esc_html__( 'Custom Thumbnail Sizes', 'cartify' ),
	'section'     => $section_advanced_settings,
	'default'     => '',
	'priority'    => 10,
] );


Kirki::add_section( $section_api_settings, [
    'title'          => esc_html__( 'API Keys', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
 ] );









Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'api_settings_facebook_app_id',
	'label'    => esc_html__( 'Facebook App ID', 'cartify' ),
	'description' => sprintf( wp_kses( __('You can get/create App ID by following these steps <a href="%s" target="_blank">steps</a>', 'cartify'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'developers.facebook.com/docs/facebook-login/web' ) ),
	'section'  => $section_api_settings,
	'default'  => '',
	'priority' => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'api_settings_google_client_id',
	'label'    => esc_html__( 'Google Client ID', 'cartify' ),
	'description' => sprintf( wp_kses( __('You can get/create Client ID by following these steps <a href="%s" target="_blank">steps</a>', 'cartify'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'developers.google.com/identity/gsi/web/guides/get-google-api-clientid' ) ),
	'section'  => $section_api_settings,
	'default'  => '',
	'priority' => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'api_settings_google_map_api',
	'label'    => esc_html__( 'Google Map API', 'cartify' ),
	'description' => sprintf( wp_kses( __('You can get API key by following these steps <a href="%s" target="_blank">steps</a>', 'cartify'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'developers.google.com/maps/documentation/javascript/get-api-key' ) ),
	'section'  => $section_api_settings,
	'default'  => '',
	'priority' => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'api_settings_instagram_token',
	'label'    => esc_html__( 'Instagram Token', 'cartify' ),
	'description' => sprintf( wp_kses( __('You can get/create token by following these steps <a href="%s" target="_blank">steps</a>. It might be same as facebook app id.', 'cartify'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'developers.facebook.com/docs/instagram-basic-display-api/getting-started' ) ),
	'section'  => $section_api_settings,
	'default'  => '',
	'priority' => 10,
] );



Kirki::add_section( $section_cookie_settings, [
    'title'          => esc_html__( 'Cookie Notice', 'cartify' ),
    'description'    => esc_html__( 'My section description.', 'cartify' ),
    'panel'          => $panel_settings,
    'priority'       => 160,
 ] );

 Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'cookie_settings_notice_show',
	'label'       => esc_html__( 'Enable', 'cartify' ),
	'section'     => $section_cookie_settings,
	'default'     => '',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'        => 'toggle',
	'settings'    => 'cookie_settings_notice_privacy_page',
	'label'       => esc_html__( 'Enable Privacy Policy Page', 'cartify' ),
	'description' => esc_html__( 'It will display the Privacy Policy Page you choose at Settings -> Privacy', 'cartify' ),
	'section'     => $section_cookie_settings,
	'default'     => '',
	'priority'    => 10,
] );

Kirki::add_field( $config_theme_options, [
	'type'     => 'text',
	'settings' => 'cookie_settings_notice_expire_period',
	'label'    => esc_html__( 'Expiry Period (in hrs)', 'cartify' ),
	'description' => sprintf( wp_kses( __('To convert duration to hrs <a href="%s" target="_blank">Click Here</a>', 'cartify'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'www.google.com/search?q=months+to+hours' ) ),
	'section'  => $section_cookie_settings,
	'default'  => '',
	'priority' => 10,
	'active_callback' => [
		[
			'setting'  => 'cookie_settings_notice_show',
			'operator' => '==',
			'value'    => '1',
		]
	],
] );