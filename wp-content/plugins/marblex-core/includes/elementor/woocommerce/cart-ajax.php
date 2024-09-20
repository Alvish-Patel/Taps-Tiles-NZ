<?php
add_action( 'wp_ajax_add_foobar', 'marblex_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_add_foobar', 'marblex_ajax_add_to_cart' );

function marblex_ajax_add_to_cart() {
    $product_id  = $_POST['product_id'];

// add code the add the product to your cart
    global $woocommerce;
    $woocommerce->cart->add_to_cart( $product_id );
    die();
}

function marblex_custom_mini_carts(){

    echo'<a href="javascript:void(0)" class="pt-tools-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvascart" >';
    echo '<i class="ti-shopping-cart"></i>';
    echo '<span class="basket-item-count">';
    echo WC()->cart->get_cart_contents_count();
    // echo WC()->cart->get_cart_total();
    echo'</span>';
    echo '</a>';



    echo '<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvascart">';
     echo '<button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i class="ion-android-close"></i></button>';

    echo '<div class="pt-cart-header">';
    echo '<h3 class="modal-title">Your Cart';
    echo '<span class="cart-panel-counter">';
    echo WC()->cart->get_cart_contents_count();
    echo '</span> </h3>';
    echo '</div>';


    echo '<div class="widget_shopping_cart_content">';
    woocommerce_mini_cart();
    echo '</div>';
    echo'</div>';
}

add_shortcode( 'marblex-mini-cart', 'marblex_custom_mini_carts' );

//you have to change according to above mini cart shortcode function.

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <a href="javascript:void(0)" class="pt-tools-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvascart" >
        <i class="ti-shopping-cart"></i>
        <span class="basket-item-count">
            <?php echo WC()->cart->get_cart_contents_count();  ?>
        </span>
    </a>



    <?php $fragments['a.pt-tools-button'] = ob_get_clean();

    return $fragments;

} );

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    // echo '<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ion-android-close"></i></button>';
    ?>

        <div class="pt-cart-header">
            <h3 class="modal-title">Your Cart
                <span class="cart-panel-counter">
                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
            </h3>
        </div>


        <?php $fragments['.pt-cart-header'] = ob_get_clean();

        return $fragments;

    } );
?>