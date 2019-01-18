<?php

// Register Custom Post Type
function resources_cpt() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'lingolive' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'lingolive' ),
		'menu_name'             => __( 'Resources', 'lingolive' ),
		'name_admin_bar'        => __( 'Resource', 'lingolive' ),
		'archives'              => __( 'Resource Archives', 'lingolive' ),
		'attributes'            => __( 'Resource Attributes', 'lingolive' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'lingolive' ),
		'all_items'             => __( 'All Resources', 'lingolive' ),
		'add_new_item'          => __( 'Add New Resource', 'lingolive' ),
		'add_new'               => __( 'Add New', 'lingolive' ),
		'new_item'              => __( 'New Resource', 'lingolive' ),
		'edit_item'             => __( 'Edit Resource', 'lingolive' ),
		'update_item'           => __( 'Update Resource', 'lingolive' ),
		'view_item'             => __( 'View Resource', 'lingolive' ),
		'view_items'            => __( 'View Resources', 'lingolive' ),
		'search_items'          => __( 'Search Resource', 'lingolive' ),
		'not_found'             => __( 'Not found', 'lingolive' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lingolive' ),
		'featured_image'        => __( 'Featured Image', 'lingolive' ),
		'set_featured_image'    => __( 'Set featured image', 'lingolive' ),
		'remove_featured_image' => __( 'Remove featured image', 'lingolive' ),
		'use_featured_image'    => __( 'Use as featured image', 'lingolive' ),
		'insert_into_item'      => __( 'Insert into item', 'lingolive' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lingolive' ),
		'items_list'            => __( 'Items list', 'lingolive' ),
		'items_list_navigation' => __( 'Items list navigation', 'lingolive' ),
		'filter_items_list'     => __( 'Filter items list', 'lingolive' ),
	);
	$args = array(
		'label'                 => __( 'Resource', 'lingolive' ),
		'description'           => __( 'Custom post type to handle Resources including Video, Webinar, Case Study, and White Paper.', 'lingolive' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'resources', $args );

}
add_action( 'init', 'resources_cpt', 0 );

// Register Custom Taxonomy
function resource_type() {

	$labels = array(
		'name'                       => _x( 'Resource Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Resource Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Resource Types', 'text_domain' ),
		'all_items'                  => __( 'All Resource Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Resource Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Resource Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Resource Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Resource Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Resource Type', 'text_domain' ),
		'update_item'                => __( 'Update Resource Type', 'text_domain' ),
		'view_item'                  => __( 'View Resource Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
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
	register_taxonomy( 'resource_type', array( 'resources' ), $args );

}
add_action( 'init', 'resource_type', 0 );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Resources Options',
		'menu_title'	=> 'Resources Options',
		'parent_slug'	=> 'edit.php?post_type=resources',
	));
	
}