<?php
/**
 * Skeletor Pages Taxonomies.
 *
 * @package skeletor/tax
 */



if ( ! function_exists( 'page_group' ) ) {

// Register Page Group Taxonomy
function page_group() {

	$labels = array(
		'name'                       => _x( 'Groups', 'Taxonomy General Name', 'skeletor' ),
		'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', 'skeletor' ),
		'menu_name'                  => __( 'Groups', 'skeletor' ),
		'all_items'                  => __( 'All Groups', 'skeletor' ),
		'parent_item'                => __( 'Parent Group', 'skeletor' ),
		'parent_item_colon'          => __( 'Parent Group:', 'skeletor' ),
		'new_item_name'              => __( 'New Group Name', 'skeletor' ),
		'add_new_item'               => __( 'Add New Group', 'skeletor' ),
		'edit_item'                  => __( 'Edit Group', 'skeletor' ),
		'update_item'                => __( 'Update Group', 'skeletor' ),
		'view_item'                  => __( 'View Group', 'skeletor' ),
		'separate_items_with_commas' => __( 'Separate Groups with commas', 'skeletor' ),
		'add_or_remove_items'        => __( 'Add or remove Groups', 'skeletor' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'skeletor' ),
		'popular_items'              => __( 'Popular Groups', 'skeletor' ),
		'search_items'               => __( 'Search Groups', 'skeletor' ),
		'not_found'                  => __( 'Not Found', 'skeletor' ),
		'no_terms'                   => __( 'No Groups', 'skeletor' ),
		'items_list'                 => __( 'Groups list', 'skeletor' ),
		'items_list_navigation'      => __( 'Groups list navigation', 'skeletor' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'page_group', array( 'page' ), $args );

}
add_action( 'init', 'page_group', 0 );

}