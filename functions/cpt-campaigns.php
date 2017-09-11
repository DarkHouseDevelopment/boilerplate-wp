<?php
	
// Register Custom Post Type
function campaigns_cpt() {

	$labels = array(
		'name'                  => _x( 'Campaigns', 'Post Type General Name', 'kukuiula' ),
		'singular_name'         => _x( 'Campaign', 'Post Type Singular Name', 'kukuiula' ),
		'menu_name'             => __( 'Campaigns', 'kukuiula' ),
		'name_admin_bar'        => __( 'Campaign', 'kukuiula' ),
		'archives'              => __( 'Campaign Archives', 'kukuiula' ),
		'attributes'            => __( 'Campaign Attributes', 'kukuiula' ),
		'parent_item_colon'     => __( 'Parent Campaign:', 'kukuiula' ),
		'all_items'             => __( 'All Campaigns', 'kukuiula' ),
		'add_new_item'          => __( 'Add New Campaign', 'kukuiula' ),
		'add_new'               => __( 'Add New', 'kukuiula' ),
		'new_item'              => __( 'New Campaign', 'kukuiula' ),
		'edit_item'             => __( 'Edit Campaign', 'kukuiula' ),
		'update_item'           => __( 'Update Campaign', 'kukuiula' ),
		'view_item'             => __( 'View Campaign', 'kukuiula' ),
		'view_items'            => __( 'View Campaigns', 'kukuiula' ),
		'search_items'          => __( 'Search Campaign', 'kukuiula' ),
		'not_found'             => __( 'Not found', 'kukuiula' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kukuiula' ),
		'featured_image'        => __( 'Featured Image', 'kukuiula' ),
		'set_featured_image'    => __( 'Set featured image', 'kukuiula' ),
		'remove_featured_image' => __( 'Remove featured image', 'kukuiula' ),
		'use_featured_image'    => __( 'Use as featured image', 'kukuiula' ),
		'insert_into_item'      => __( 'Insert into campaign', 'kukuiula' ),
		'uploaded_to_this_item' => __( 'Uploaded to this campaign', 'kukuiula' ),
		'items_list'            => __( 'Campaigns list', 'kukuiula' ),
		'items_list_navigation' => __( 'Campaigns list navigation', 'kukuiula' ),
		'filter_items_list'     => __( 'Filter campaigns list', 'kukuiula' ),
	);
	$args = array(
		'label'                 => __( 'Campaign', 'kukuiula' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-chart-line',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'rewrite'				=> array('slug' => 'campaigns','with_front' => false),		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'kukuiula_campaigns', $args );

}
add_action( 'init', 'campaigns_cpt', 0 );


/*
// Register Custom Taxonomy
function campaign_categories() {

	$labels = array(
		'name'                       => _x( 'Campaign Categories', 'Taxonomy General Name', 'kukuiula' ),
		'singular_name'              => _x( 'Campaign Category', 'Taxonomy Singular Name', 'kukuiula' ),
		'menu_name'                  => __( 'Campaign Categories', 'kukuiula' ),
		'all_items'                  => __( 'All Categories', 'kukuiula' ),
		'parent_item'                => __( 'Parent Category', 'kukuiula' ),
		'parent_item_colon'          => __( 'Parent Category:', 'kukuiula' ),
		'new_item_name'              => __( 'New Category Name', 'kukuiula' ),
		'add_new_item'               => __( 'Add New Category', 'kukuiula' ),
		'edit_item'                  => __( 'Edit Category', 'kukuiula' ),
		'update_item'                => __( 'Update Category', 'kukuiula' ),
		'view_item'                  => __( 'View Category', 'kukuiula' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'kukuiula' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'kukuiula' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'kukuiula' ),
		'popular_items'              => __( 'Popular Categories', 'kukuiula' ),
		'search_items'               => __( 'Search Categories', 'kukuiula' ),
		'not_found'                  => __( 'Not Found', 'kukuiula' ),
		'no_terms'                   => __( 'No categories', 'kukuiula' ),
		'items_list'                 => __( 'Categories list', 'kukuiula' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'kukuiula' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'campaign_categories', array( 'kukuiula_campaigns' ), $args );

}
add_action( 'init', 'campaign_categories', 0 );
*/