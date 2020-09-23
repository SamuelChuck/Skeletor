<?php
/**
 * Cart Get Number of Items in the Cart
 *
 * This shortcode prints the number of items (products) in the cart and also processes plural forms (1 product, 2 products).
 *
 * @see     https://docs.woocommerce.com/document/show-cart-contents-total/
 * @package WooCommerce/Cart Contents
 * @version 3.0.0
 */

function skeletor_woocommerce_cart_contents_count($atts, $content = null){
    $content = shortcode_atts( array(
        'text'                 =>  false , 
        'text-type'            => 'product',
        ), $atts );
    
    global $woocommerce;
    $count = $woocommerce->cart->cart_contents_count;
    
    if ( esc_attr($content['text']) == true && esc_attr($content['text']) != false ){
        
        if( esc_attr($content['text-type']) == 'item' ){
            $plural_count = sprintf( _n( '%d item', '%d items', $count, 'skeletor' ), $count );
            
        }elseif( esc_attr($content['text-type']) == 'product' ){
            $plural_count = sprintf( _n( '%d product', '%d products', $count, 'skeletor' ), $count );
        }

    } else{
            $plural_count ='';
        }
    echo '<span class="skeletor-cart-count">'.$plural_count.'</span>';
    
}
add_shortcode('woocommerce_cart_contents_count','skeletor_woocommerce_cart_contents_count');

