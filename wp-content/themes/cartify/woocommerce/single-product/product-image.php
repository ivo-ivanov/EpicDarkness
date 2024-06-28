<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;


if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

if(!isset( $product )){
	global $product;
	$post_thumbnail_id = $product->get_image_id();
	$attachment_ids = $product->get_gallery_image_ids();
}
else{
	$post_thumbnail_id = isset($variation_image_id)?$variation_image_id:$product->get_image_id();
	$attachment_ids = isset($variation_additional_image_ids)?$variation_additional_image_ids:$product->get_gallery_image_ids();

	}



$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes', 
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

if( !empty($attachment_ids) ){
	wp_enqueue_style('slick');
	wp_enqueue_script('slick');
}

?>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'cartify' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); 

				if ( $attachment_ids && $post_thumbnail_id ) {
			foreach ( $attachment_ids as $attachment_id ) {
				echo apply_filters( 'woocommerce_single_product_image_gallery_html', wc_get_gallery_image_html( $attachment_id, true ), $attachment_id ); 
			}
		}

		

		?>
	</div>
</div>
