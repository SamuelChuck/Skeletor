<?php
/**
 * Woocommerce global Sale structure.
 *
 * @author SamuelChuck
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Flash Sale
 */

function skeletor_wc_product_sale_flash( $output, $post, $product ) {
    
global $post, $product, $wc_cpdf;;

$badge_style = get_theme_mod('bubble_style','style1');

if($badge_style == 'style1') $badge_style = 'circle';
if($badge_style == 'style2') $badge_style = 'square';
if($badge_style == 'style3') $badge_style = 'frame';

    if($product->is_on_sale()) {
        if($product->is_type( 'variable' ) )
        {
            $regular_price = $product->get_variation_regular_price();
            $sale_price = $product->get_variation_price();
        } else {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        }
        
        $custom_text = get_theme_mod('sale_bubble_text');
		if($custom_text){ $text = $custom_text; } 
		else{
        $discount = $regular_price - $sale_price;
        $text= get_woocommerce_currency_symbol(). round($discount);}
        
        return '<div class="callout sale-badge badge-'.$badge_style.'"><div class="badge-inner secondary on-sale"><span class="onsale">' . $text. '<del> Off</del></span></div></div>';
    }
}
add_filter( 'woocommerce_sale_flash', 'skeletor_wc_product_sale_flash', 11, 3 );



/*function wc_product_sale_flash( $output, $post, $product ) {
    global $product;
    if($product->is_on_sale()) {
        if($product->is_type( 'variable' ) )
        {
            $regular_price = $product->get_variation_regular_price();
            $sale_price = $product->get_variation_price();
        } else {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        }
        $percent = (($regular_price - $sale_price) / $regular_price) * 100;
        return '<span class="onsale">' . round($percent) . '% Off</span>';
    }
}
add_filter( 'woocommerce_sale_flash', 'wc_product_sale_flash', 11, 3 );*/