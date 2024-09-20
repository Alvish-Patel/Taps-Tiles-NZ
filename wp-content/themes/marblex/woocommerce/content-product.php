<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<div class="pt-woo-single-product-main">
		<div class="pt-product-item">
			<div class="pt-product-content">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_post_thumbnail( 'techtrix-woo-medium', array( 'class' => 'img-fluid' ) ); ?>
					<span class="overlay-link"></span>
				</a>
				<?php woocommerce_show_product_loop_sale_flash(); ?>
			
			</div>
			<div class="pt-product-meta">
				<div class="pt-product-info">
					<div class="pt-grid-rating"><?php woocommerce_template_loop_rating(); ?></div>
					<a href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_title(); ?></a>
				</div>
				<div class="pt-grid-price"><?php woocommerce_template_loop_price(); ?> </div>
			</div>
		</div>
	</div>
</li>
