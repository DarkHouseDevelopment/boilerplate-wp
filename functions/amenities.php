<?php 

add_action( 'init', 'register_amenities_post_type', 0 );
// Register Custom Amenities
function register_amenities_post_type() {

	$labels = array(
		'name'                  => _x( 'Amenities', 'Builder General Name', 'unionpark' ),
		'singular_name'         => _x( 'Amenity', 'Amenity Singular Name', 'unionpark' ),
		'menu_name'             => __( 'Amenities', 'unionpark' ),
		'name_admin_bar'        => __( 'Amenity', 'unionpark' ),
		'archives'              => __( 'Amenity Archives', 'unionpark' ),
		'attributes'            => __( 'Amenity Attributes', 'unionpark' ),
		'parent_item_colon'     => __( 'Parent Amenity:', 'unionpark' ),
		'all_items'             => __( 'All Amenities', 'unionpark' ),
		'add_new_item'          => __( 'Add New Amenity', 'unionpark' ),
		'add_new'               => __( 'Add New', 'unionpark' ),
		'new_item'              => __( 'New Amenity', 'unionpark' ),
		'edit_item'             => __( 'Edit Amenity', 'unionpark' ),
		'update_item'           => __( 'Update Amenity', 'unionpark' ),
		'view_item'             => __( 'View Amenity', 'unionpark' ),
		'view_items'            => __( 'View Amenities', 'unionpark' ),
		'search_items'          => __( 'Search Amenity', 'unionpark' ),
		'not_found'             => __( 'Not found', 'unionpark' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'unionpark' ),
		'featured_image'        => __( 'Featured Image', 'unionpark' ),
		'set_featured_image'    => __( 'Set featured image', 'unionpark' ),
		'remove_featured_image' => __( 'Remove featured image', 'unionpark' ),
		'use_featured_image'    => __( 'Use as featured image', 'unionpark' ),
		'insert_into_item'      => __( 'Insert into Amenity', 'unionpark' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Amenity', 'unionpark' ),
		'items_list'            => __( 'Amenities list', 'unionpark' ),
		'items_list_navigation' => __( 'Amenities list navigation', 'unionpark' ),
		'filter_items_list'     => __( 'Filter Amenity list', 'unionpark' ),
	);
	$args = array(
		'label'                 => __( 'Amenity', 'unionpark' ),
		'description'           => __( 'Amenities near Norterra', 'unionpark' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'amenities', $args );

} 

add_action( 'init', 'register_amenity_type_taxonomy', 0 );
// create two taxonomies, genres and writers for the post type "book"
function register_amenity_type_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Amenity Types', 'taxonomy general name', 'unionpark' ),
		'singular_name'     => _x( 'Amenity Type', 'taxonomy singular name', 'unionpark' ),
		'search_items'      => __( 'Search Amenity Types', 'unionpark' ),
		'all_items'         => __( 'All Amenity Types', 'unionpark' ),
		'parent_item'       => __( 'Parent Amenity Type', 'unionpark' ),
		'parent_item_colon' => __( 'Parent Amenity Type:', 'unionpark' ),
		'edit_item'         => __( 'Edit Amenity Type', 'unionpark' ),
		'update_item'       => __( 'Update Amenity Type', 'unionpark' ),
		'add_new_item'      => __( 'Add New Amenity Type', 'unionpark' ),
		'new_item_name'     => __( 'New Amenity Type Name', 'unionpark' ),
		'menu_name'         => __( 'Amenity Types', 'unionpark' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'near-norterra', 'with_front' => false ),
	);

	register_taxonomy( 'amenity_type','amenities', $args );
}
