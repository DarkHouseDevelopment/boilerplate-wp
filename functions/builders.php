<?php 

// Register Custom Builder
function builders_post_type() {

	$labels = array(
		'name'                  => _x( 'Builders', 'Builder General Name', 'verrado' ),
		'singular_name'         => _x( 'Builder', 'Builder Singular Name', 'verrado' ),
		'menu_name'             => __( 'Builders', 'verrado' ),
		'name_admin_bar'        => __( 'Builder', 'verrado' ),
		'archives'              => __( 'Builder Archives', 'verrado' ),
		'attributes'            => __( 'Builder Attributes', 'verrado' ),
		'parent_item_colon'     => __( 'Parent Builder:', 'verrado' ),
		'all_items'             => __( 'All Builders', 'verrado' ),
		'add_new_item'          => __( 'Add New Builder', 'verrado' ),
		'add_new'               => __( 'Add New', 'verrado' ),
		'new_item'              => __( 'New Builder', 'verrado' ),
		'edit_item'             => __( 'Edit Builder', 'verrado' ),
		'update_item'           => __( 'Update Builder', 'verrado' ),
		'view_item'             => __( 'View Builder', 'verrado' ),
		'view_items'            => __( 'View Builders', 'verrado' ),
		'search_items'          => __( 'Search Builder', 'verrado' ),
		'not_found'             => __( 'Not found', 'verrado' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'verrado' ),
		'featured_image'        => __( 'Featured Image', 'verrado' ),
		'set_featured_image'    => __( 'Set featured image', 'verrado' ),
		'remove_featured_image' => __( 'Remove featured image', 'verrado' ),
		'use_featured_image'    => __( 'Use as featured image', 'verrado' ),
		'insert_into_item'      => __( 'Insert into builder', 'verrado' ),
		'uploaded_to_this_item' => __( 'Uploaded to this builder', 'verrado' ),
		'items_list'            => __( 'Builders list', 'verrado' ),
		'items_list_navigation' => __( 'Builders list navigation', 'verrado' ),
		'filter_items_list'     => __( 'Filter builder list', 'verrado' ),
	);
	$args = array(
		'label'                 => __( 'Builder', 'verrado' ),
		'description'           => __( 'Builders in Verrado', 'verrado' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-multisite',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'builders', $args );

} 
add_action( 'init', 'builders_post_type', 0 );