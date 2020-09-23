<?php
/**
 * Woocommerce Custom Taxonomy Functions.
 * This is where initial Theme Functions runs.
 *
 * @package skeletor/class
 */
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Product Materials Taxonomy.
 * Check if wc_product_taxonomy_materials function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_materials' ) ) {

// Register Product Materials Taxonomy
function wc_product_taxonomy_materials() {

	$labels = array(
		'name'                       => _x( 'Product Materials', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Material', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Materials', 'skeletor' ),
		'all_items'                  => __( 'All Materials', 'skeletor' ),
		'parent_item'                => __( 'Parent Material', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Material:', 'skeletor' ),
		'new_item_name'              => __( 'New Material Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Material', 'skeletor' ),
		'edit_item'                  => __( 'Edit Material', 'skeletor' ),
		'update_item'                => __( 'Update Material', 'skeletor' ),
		'view_item'                  => __( 'View Material', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate materials with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Materials', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Materials', 'skeletor' ),
		'search_items'               => __( 'Search Materials', 'skeletor' ),
		'not_found'                  => __( 'No Materials Found', 'skeletor' ),
		'no_terms'                   => __( 'No Materials', 'skeletor' ),
		'items_list'                 => __( 'Materials list', 'skeletor' ),
		'items_list_navigation'      => __( 'Materials list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'material',
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,

	);
	register_taxonomy( 'product_mat', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_materials', 0 );

}


/**
 * Products Colors Taxonomy.
 * Check if wc_product_taxonomy_colors function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_colors' ) ) {

// Register Products Colors Taxonomy
function wc_product_taxonomy_colors() {

	$labels = array(
		'name'                       => _x( 'Product Colors', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Color', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Colors', 'skeletor' ),
		'all_items'                  => __( 'All Colors', 'skeletor' ),
		'parent_item'                => __( 'Parent Color', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Color:', 'skeletor' ),
		'new_item_name'              => __( 'New Color Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Color', 'skeletor' ),
		'edit_item'                  => __( 'Edit Color', 'skeletor' ),
		'update_item'                => __( 'Update Color', 'skeletor' ),
		'view_item'                  => __( 'View Color', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate colors with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Colors', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Colors', 'skeletor' ),
		'search_items'               => __( 'Search Colors', 'skeletor' ),
		'not_found'                  => __( 'No Colors Found', 'skeletor' ),
		'no_terms'                   => __( 'No Colors', 'skeletor' ),
		'items_list'                 => __( 'Colors list', 'skeletor' ),
		'items_list_navigation'      => __( 'Colors list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'color',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_col', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_colors', 0 );

}


/**
 * Products Decorations Taxonomy.
 * Check if wc_product_taxonomy_decorations function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_decorations' ) ) {

// Register Custom Taxonomy
function wc_product_taxonomy_decorations() {

	$labels = array(
		'name'                       => _x( 'Product Decorations', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Decoration', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Decorations', 'skeletor' ),
		'all_items'                  => __( 'All Decorations', 'skeletor' ),
		'parent_item'                => __( 'Parent Decoration', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Decoration:', 'skeletor' ),
		'new_item_name'              => __( 'New Decoration Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Decoration', 'skeletor' ),
		'edit_item'                  => __( 'Edit Decoration', 'skeletor' ),
		'update_item'                => __( 'Update Decoration', 'skeletor' ),
		'view_item'                  => __( 'View Decoration', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate decoration with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Decorations', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Decorations', 'skeletor' ),
		'search_items'               => __( 'Search Decorations', 'skeletor' ),
		'not_found'                  => __( 'Not Found', 'skeletor' ),
		'no_terms'                   => __( 'No Decorations', 'skeletor' ),
		'items_list'                 => __( 'Decorations list', 'skeletor' ),
		'items_list_navigation'      => __( 'Decorations list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'decoration',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_dec', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_decorations', 0 );

}
 
/**
 * Products Styles Taxonomy.
 * Check if wc_product_taxonomy_Styles function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_styles' ) ) {

// Register Custom Taxonomy
function wc_product_taxonomy_styles() {

	$labels = array(
		'name'                       => _x( 'Product Styles', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Style', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Styles', 'skeletor' ),
		'all_items'                  => __( 'All Styles', 'skeletor' ),
		'parent_item'                => __( 'Parent Style', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Style:', 'skeletor' ),
		'new_item_name'              => __( 'New Style Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Style', 'skeletor' ),
		'edit_item'                  => __( 'Edit Style', 'skeletor' ),
		'update_item'                => __( 'Update Style', 'skeletor' ),
		'view_item'                  => __( 'View Style', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate Style with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Styles', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Styles', 'skeletor' ),
		'search_items'               => __( 'Search Styles', 'skeletor' ),
		'not_found'                  => __( 'Not Found', 'skeletor' ),
		'no_terms'                   => __( 'No Styles', 'skeletor' ),
		'items_list'                 => __( 'Styles list', 'skeletor' ),
		'items_list_navigation'      => __( 'Styles list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'style',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_style', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_styles', 0 );

}
 
/**
 * Products Vendors Taxonomy.
 * Check if wc_product_taxonomy_Vendors function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_vendors' ) ) {

// Register Custom Taxonomy
function wc_product_taxonomy_vendors() {

	$labels = array(
		'name'                       => _x( 'Product Vendors', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Vendor', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Vendors', 'skeletor' ),
		'all_items'                  => __( 'All Vendors', 'skeletor' ),
		'parent_item'                => __( 'Parent Vendor', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Vendor:', 'skeletor' ),
		'new_item_name'              => __( 'New Vendor Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Vendor', 'skeletor' ),
		'edit_item'                  => __( 'Edit Vendor', 'skeletor' ),
		'update_item'                => __( 'Update Vendor', 'skeletor' ),
		'view_item'                  => __( 'View Vendor', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate Vendor with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Vendors', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Vendors', 'skeletor' ),
		'search_items'               => __( 'Search Vendors', 'skeletor' ),
		'not_found'                  => __( 'Not Found', 'skeletor' ),
		'no_terms'                   => __( 'No Vendors', 'skeletor' ),
		'items_list'                 => __( 'Vendors list', 'skeletor' ),
		'items_list_navigation'      => __( 'Vendors list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'vendor',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_vendor', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_vendors', 0 );

}

/**
 * Products Measurements Taxonomy.
 * Check if wc_product_taxonomy_Measurements function exsists
 */
if ( ! function_exists( 'wc_product_taxonomy_measurements' ) ) {

// Register Custom Taxonomy
function wc_product_taxonomy_measurements() {

	$labels = array(
		'name'                       => _x( 'Product Measurements', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Product Measurement', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Measurements', 'skeletor' ),
		'all_items'                  => __( 'All Measurements', 'skeletor' ),
		'parent_item'                => __( 'Parent Measurement', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Measurement:', 'skeletor' ),
		'new_item_name'              => __( 'New Measurement Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Measurement', 'skeletor' ),
		'edit_item'                  => __( 'Edit Measurement', 'skeletor' ),
		'update_item'                => __( 'Update Measurement', 'skeletor' ),
		'view_item'                  => __( 'View Measurement', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate Measurement with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Measurements', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Measurements', 'skeletor' ),
		'search_items'               => __( 'Search Measurements', 'skeletor' ),
		'not_found'                  => __( 'Not Found', 'skeletor' ),
		'no_terms'                   => __( 'No Measurements', 'skeletor' ),
		'items_list'                 => __( 'Measurements list', 'skeletor' ),
		'items_list_navigation'      => __( 'Measurements list navigation', 'skeletor' ),
	);
	$rewrite = array(
		'slug'                       => 'measurement',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_measurement', array( 'product' ), $args );

}
add_action( 'init', 'wc_product_taxonomy_measurements', 0 );

}
