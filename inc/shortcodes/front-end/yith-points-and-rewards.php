<?php

function skeletor_get_point_conversion_rate( $atts, $content = null){
    $content = shortcode_atts( array(
        'before'                   => 'You have' , 
        'after'                    => 'worth' , 
        'singular'                 => 'Point' , 
        'plural'                   => 'Points' , 
        'word_brake'               => 'false' , 
        
        ), $atts );
        
    $points   = get_user_meta( get_current_user_id(), '_ywpar_user_total_points', true );
    $points   = ( '' === $points ) ? 0 : $points;
    $singular = esc_attr($content['singular']);
    $plural   = esc_attr($content['plural']);
    
    $history = YITH_WC_Points_Rewards()->get_history( get_current_user_id() );
    
    if ( 'yes' === get_option( 'ywpar_show_point_worth_my_account', 'yes' ) ) {
    	$toredeem          = '';
    	$conversion_method = YITH_WC_Points_Rewards()->get_option( 'conversion_rate_method' );
    
    	if ( 'fixed' === $conversion_method ) {
    		$rates    = YITH_WC_Points_Rewards()->get_option( 'rewards_conversion_rate' );
    		$money    = $rates[ get_woocommerce_currency() ]['money'];
    		$toredeem = wc_price( abs( ( $points / $rates[ get_woocommerce_currency() ]['points'] ) * $money ) );
    	} else {
    
    		$rates    = YITH_WC_Points_Rewards()->get_option( 'rewards_percentual_conversion_rate' );
    		$discount = $rates[ get_woocommerce_currency() ]['discount'];
    		$toredeem = ( ( $points / $rates[ get_woocommerce_currency() ]['points'] ) * $discount );
    
    		$toredeem = sprintf( '%s %s', $toredeem . '%', _x( 'on order total', '20% on order total', 'yith-woocommerce-points-and-rewards' ) );
    	}
    }
    
    ?>
    	<p>
    		<?php
    		$points  = sprintf( _nx( '<span class="amount">%1$s</span> %2$s', '<span class="amount">%3$s</span> %4$s', $points, 'First placeholder: number of points; second placeholder: label of points;','yith-woocommerce-points-and-rewards' ), $points, $singular, $points, $plural );
    		$worth   = get_option( 'ywpar_show_point_worth_my_account', 'yes' ) === 'yes' ? ' <span>' . __( esc_attr($content['after']), 'yith-woocommerce-points-and-rewards' ) . ' ' . $toredeem . '</span>' : '';
    		$message = _x( esc_attr($content['before']).'%1$s%2$s.','First placeholder: number of points; second placeholder: label of points;', 'yith-woocommerce-points-and-rewards' );
    		echo sprintf( wp_kses_post( $message ), wp_kses_post( $points ),(esc_attr($content['word_brake']) === 'true' ?'<br/>':''). wp_kses_post( $worth ) );
    		?>
    	</p>
    <?php
}
add_shortcode('point_conversion_rate','skeletor_get_point_conversion_rate');