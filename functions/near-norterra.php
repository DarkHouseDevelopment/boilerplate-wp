<?php 

add_action( 'init', 'register_near_norterra_post_type', 0 );
// Register Custom Amenities
function register_near_norterra_post_type() {

	$labels = array(
		'name'                  => _x( 'Near Norterra', 'Builder General Name', 'unionpark' ),
		'singular_name'         => _x( 'Near Norterra Amenity', 'Amenity Singular Name', 'unionpark' ),
		'menu_name'             => __( 'Near Norterra', 'unionpark' ),
		'name_admin_bar'        => __( 'Near Norterra Amenity', 'unionpark' ),
		'archives'              => __( 'Near Norterra Archives', 'unionpark' ),
		'attributes'            => __( 'Near Norterra Amenity Attributes', 'unionpark' ),
		'parent_item_colon'     => __( 'Parent Amenity:', 'unionpark' ),
		'all_items'             => __( 'All Near Norterra Amenities', 'unionpark' ),
		'add_new_item'          => __( 'Add New Near Norterra Amenity', 'unionpark' ),
		'add_new'               => __( 'Add New', 'unionpark' ),
		'new_item'              => __( 'New Near Norterra Amenity', 'unionpark' ),
		'edit_item'             => __( 'Edit Near Norterra Amenity', 'unionpark' ),
		'update_item'           => __( 'Update Near Norterra Amenity', 'unionpark' ),
		'view_item'             => __( 'View Near Norterra Amenity', 'unionpark' ),
		'view_items'            => __( 'View Near Norterra Amenities', 'unionpark' ),
		'search_items'          => __( 'Search Near Norterra Amenity', 'unionpark' ),
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
	$rewrite = array(
		'slug'                  => 'live/near-norterra/%nn_category%',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Near Norterra', 'unionpark' ),
		'description'           => __( 'Amenities Near Norterra', 'unionpark' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'live/near-norterra',		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'near-norterra', $args );

} 

add_action( 'init', 'register_near_norterra_category_taxonomy', 0 );
// create two taxonomies, genres and writers for the post type "book"
function register_near_norterra_category_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'unionpark' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'unionpark' ),
		'search_items'      => __( 'Search Categories', 'unionpark' ),
		'all_items'         => __( 'All Categories', 'unionpark' ),
		'parent_item'       => __( 'Parent Category', 'unionpark' ),
		'parent_item_colon' => __( 'Parent Category:', 'unionpark' ),
		'edit_item'         => __( 'Edit Category', 'unionpark' ),
		'update_item'       => __( 'Update Category', 'unionpark' ),
		'add_new_item'      => __( 'Add New Category', 'unionpark' ),
		'new_item_name'     => __( 'New Category Name', 'unionpark' ),
		'menu_name'         => __( 'Categories', 'unionpark' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'live/near-norterra', 'with_front' => false ),
	);

	register_taxonomy( 'nn_category','near-norterra', $args );
}

function near_norterra_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'nn_category' );
        if( $terms ){
            return str_replace( '%nn_category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'near_norterra_post_link', 1, 3 );


if( function_exists('acf_add_options_page') ) {
 		
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Near Norterra Options',
		'menu_title' 	=> 'Near Norterra Options',
		'parent_slug' 	=> 'edit.php?post_type=near-norterra',
	));
	
}
