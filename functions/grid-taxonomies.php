<?php

// Register Custom Taxonomy
function grid_display() {

	$labels = array(
		'name'                       => _x( 'Grid Display', 'Taxonomy General Name', 'verrado' ),
		'singular_name'              => _x( 'Grid', 'Taxonomy Singular Name', 'verrado' ),
		'menu_name'                  => __( 'Grid Display', 'verrado' ),
		'all_items'                  => __( 'All Grids', 'verrado' ),
		'parent_item'                => __( 'Parent Grid', 'verrado' ),
		'parent_item_colon'          => __( 'Parent Grid:', 'verrado' ),
		'new_item_name'              => __( 'New Grid Name', 'verrado' ),
		'add_new_item'               => __( 'Add New Grid', 'verrado' ),
		'edit_item'                  => __( 'Edit Grid', 'verrado' ),
		'update_item'                => __( 'Update Grid', 'verrado' ),
		'view_item'                  => __( 'View Grid', 'verrado' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'verrado' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'verrado' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'verrado' ),
		'popular_items'              => __( 'Popular Items', 'verrado' ),
		'search_items'               => __( 'Search Items', 'verrado' ),
		'not_found'                  => __( 'Not Found', 'verrado' ),
		'no_terms'                   => __( 'No items', 'verrado' ),
		'items_list'                 => __( 'Items list', 'verrado' ),
		'items_list_navigation'      => __( 'Items list navigation', 'verrado' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
	);
	register_taxonomy( 'grid_display', array( 'page' ), $args );

}
add_action( 'init', 'grid_display', 0 );



// Register Custom Taxonomy
function grid_category() {

	$labels = array(
		'name'                       => _x( 'Grid Category', 'Taxonomy General Name', 'verrado' ),
		'singular_name'              => _x( 'Grid Category', 'Taxonomy Singular Name', 'verrado' ),
		'menu_name'                  => __( 'Grid Category', 'verrado' ),
		'all_items'                  => __( 'All Grid Categories', 'verrado' ),
		'parent_item'                => __( 'Parent Grid Category', 'verrado' ),
		'parent_item_colon'          => __( 'Parent Grid Category:', 'verrado' ),
		'new_item_name'              => __( 'New Grid Category Name', 'verrado' ),
		'add_new_item'               => __( 'Add New Grid Category', 'verrado' ),
		'edit_item'                  => __( 'Edit Grid Category', 'verrado' ),
		'update_item'                => __( 'Update Grid Category', 'verrado' ),
		'view_item'                  => __( 'View Grid Category', 'verrado' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'verrado' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'verrado' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'verrado' ),
		'popular_items'              => __( 'Popular Items', 'verrado' ),
		'search_items'               => __( 'Search Items', 'verrado' ),
		'not_found'                  => __( 'Not Found', 'verrado' ),
		'no_terms'                   => __( 'No items', 'verrado' ),
		'items_list'                 => __( 'Items list', 'verrado' ),
		'items_list_navigation'      => __( 'Items list navigation', 'verrado' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
	);
	register_taxonomy( 'grid_cat', array( 'page' ), $args );

}
add_action( 'init', 'grid_category', 0 );