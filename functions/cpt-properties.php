<?php
	
// Register Custom Post Type
function properties_cpt() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'kukuiula' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'kukuiula' ),
		'menu_name'             => __( 'Properties', 'kukuiula' ),
		'name_admin_bar'        => __( 'Property', 'kukuiula' ),
		'archives'              => __( 'Property Archives', 'kukuiula' ),
		'attributes'            => __( 'Property Attributes', 'kukuiula' ),
		'parent_item_colon'     => __( 'Parent Property:', 'kukuiula' ),
		'all_items'             => __( 'All Properties', 'kukuiula' ),
		'add_new_item'          => __( 'Add New Property', 'kukuiula' ),
		'add_new'               => __( 'Add New', 'kukuiula' ),
		'new_item'              => __( 'New Property', 'kukuiula' ),
		'edit_item'             => __( 'Edit Property', 'kukuiula' ),
		'update_item'           => __( 'Update Property', 'kukuiula' ),
		'view_item'             => __( 'View Property', 'kukuiula' ),
		'view_items'            => __( 'View Properties', 'kukuiula' ),
		'search_items'          => __( 'Search Property', 'kukuiula' ),
		'not_found'             => __( 'Not found', 'kukuiula' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kukuiula' ),
		'featured_image'        => __( 'Featured Image', 'kukuiula' ),
		'set_featured_image'    => __( 'Set featured image', 'kukuiula' ),
		'remove_featured_image' => __( 'Remove featured image', 'kukuiula' ),
		'use_featured_image'    => __( 'Use as featured image', 'kukuiula' ),
		'insert_into_item'      => __( 'Insert into property', 'kukuiula' ),
		'uploaded_to_this_item' => __( 'Uploaded to this property', 'kukuiula' ),
		'items_list'            => __( 'Properties list', 'kukuiula' ),
		'items_list_navigation' => __( 'Properties list navigation', 'kukuiula' ),
		'filter_items_list'     => __( 'Filter properties list', 'kukuiula' ),
	);
	$args = array(
		'label'                 => __( 'Property', 'kukuiula' ),
		'description'           => __( 'Real estate listings for kukuiula.com', 'kukuiula' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'rewrite'               => array( 'with_front' => false, 'slug' => 'own/properties' ),
	);
	register_post_type( 'properties', $args );

}
add_action( 'init', 'properties_cpt', 0 );