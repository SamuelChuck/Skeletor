<?php
/**
 * Add woocommerce column to WooCommerce-related admin pages
 * 
 * @author      Misha Rudrastyh
 * @author-url  https://rudrastyh.com/woocommerce/columns.html
 * @editor      SamuelChuck
*/

/**
 * Add a column to Orders Admin Page with Products Purchased
*/
add_filter('manage_edit-shop_order_columns', 'skeletor_order_items_column' );
function skeletor_order_items_column( $order_columns ) {
    $order_columns['order_products'] = "Purchased products";
    return $order_columns;
}
 
add_action( 'manage_shop_order_posts_custom_column' , 'skeletor_order_items_column_cnt' );
function skeletor_order_items_column_cnt( $colname ) {
	global $the_order; // the global order object
 
 	if( $colname == 'order_products' ) {
 
		// get items from the order global object
		$order_items = $the_order->get_items();
 
		if ( !is_wp_error( $order_items ) ) {
			foreach( $order_items as $order_item ) {
 
 				echo $order_item['quantity'] .' × <a href="' . admin_url('post.php?post=' . $order_item['product_id'] . '&action=edit' ) . '">'. $order_item['name'] .'</a><br />';
				// you can also use $order_item->variation_id parameter
				// by the way, $order_item['name'] will display variation name too
 
			}
		}
 
	}
 
}

/**
 * Add a column with WooCommerce Billing Details to Users Admin Page
*/
add_filter( 'manage_users_columns', 'skeletor_billing_address_column', 20 );
function skeletor_billing_address_column( $user_columns ) {
 
	return array_slice( $user_columns, 0, 3, true ) // 4 columns before
	+ array( 'billing_address' => 'Billing Address' ) // our column is 5th
	+ array_slice( $user_columns, 3, NULL, true );
 
}
 
add_filter( 'manage_users_custom_column', 'skeletor_populate_with_billing_address', 10, 3 );
function skeletor_populate_with_billing_address( $row_output, $user_column_name, $user_id ) {
 
	if( $user_column_name == 'billing_address' ) {
 
		$address = array();
		if( $billing_address_1 = get_user_meta( $user_id, 'billing_address_1', true ) )
			$address[] = $billing_address_1;
 
		if( $billing_address_2 = get_user_meta( $user_id, 'billing_address_2', true ) )
			$address[] = $billing_address_2;
 
		if( $billing_city = get_user_meta( $user_id, 'billing_city', true ) )
			$address[] = $billing_city;
 
		if( $billing_postcode = get_user_meta( $user_id, 'billing_postcode', true ) )
			$address[] = $billing_postcode;
 
		if( $billing_country = get_user_meta( $user_id, 'billing_country', true ) )
			$address[] = $billing_country;
 
		return join(', ', $address ); // here we replace and return our custom $row_output
 
	}
 
}

/**
 * Make any WordPress Admin Column Sortable
*/
add_filter('manage_edit-{cpt or taxonomy or users}_sortable_columns', 'skeletor_sortable');
function skeletor_sortable( $sortable_columns ){
	// just add your column in array in following format:
	//  array( 'column ID' => '$_GET['orderby'] parameter value' )
	return $sortable_columns;
}
//sort by meta value
add_action( 'pre_get_posts', 'skeletor_filter' );
 
function skeletor_filter( $query ) {
	// if it is not admin area, exit the filter immediately
	if ( ! is_admin() ) return;
 
	if( empty( $_GET['orderby'] ) || empty( $_GET['order'] ) ) return;
 
	if( $_GET['orderby'] == 'unique_parameter' ) {
		$query->set('meta_key', 'meta_key_to_sort_by' );
		$query->set('orderby', 'meta_value'); // or meta_value_num
		$query->set('order', $_GET['order'] );
	}
 
	return $query;
 
}

/**
 * Add Total Sales Sortable Column
*/
// add
add_filter( 'manage_edit-product_columns', 'skeletor_total_sales_1', 20 );
// populate
add_action( 'manage_posts_custom_column', 'skeletor_total_sales_2' );
// make sortable
add_filter('manage_edit-product_sortable_columns', 'skeletor_total_sales_3');
// how to sort
add_action( 'pre_get_posts', 'skeletor_total_sales_4' );
 
function skeletor_total_sales_1( $col_th ) {
 
	// a little different way of adding new columns
	return wp_parse_args( array( 'total_sales' => 'Total Sales' ), $col_th );
 
}
 
function skeletor_total_sales_2( $column_id ) {
 
	if( $column_id  == 'total_sales' )
		echo get_post_meta( get_the_ID(), 'total_sales', true );
 
}
 
function skeletor_total_sales_3( $a ){
	return wp_parse_args( array( 'total_sales' => 'by_total_sales' ), $a );
 
}
 
function skeletor_total_sales_4( $query ) {
 
	if( !is_admin() || empty( $_GET['orderby']) || empty( $_GET['order'] ) )
		return;
 
	if( $_GET['orderby'] == 'by_total_sales' ) {
		$query->set('meta_key', 'total_sales' );
		$query->set('orderby', 'meta_value_num');
		$query->set('order', $_GET['order'] );
	}
 
	return $query;
 
}

