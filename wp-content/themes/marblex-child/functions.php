<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'marblex_child_style' );
				function marblex_child_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

/**
 * Your code goes below.
 */

add_action('woocommerce_before_shop_loop_item_title', 'make_product_image_clickable', 10);

function make_product_image_clickable() {
    global $product;

    // Get the product ID
    $product_id = $product->get_id();

    // Get the product permalink
    $product_permalink = get_permalink($product_id);

    // Output the clickable product image
    echo '<a href="' . esc_url($product_permalink) . '">';
    echo woocommerce_get_product_thumbnail(); // This function gets the product thumbnail
    echo '</a>';
}
