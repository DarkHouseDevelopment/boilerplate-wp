<?php 

// Register Custom Post Type
function properties_post_type() {

	$labels = array(
		'name'                => 'Homes',
		'singular_name'       => 'Home',
		'menu_name'           => 'Homes',
		'parent_item_colon'   => 'Parent Home:',
		'all_items'           => 'All Homes',
		'view_item'           => 'View Home',
		'add_new_item'        => 'Add New Home',
		'add_new'             => 'New Home',
		'edit_item'           => 'Edit Home',
		'update_item'         => 'Update Home',
		'search_items'        => 'Search homes',
		'not_found'           => 'No homes found',
		'not_found_in_trash'  => 'No homes found in Trash',
	);
	$rewrite = array(
		'slug'                => 'homes',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'homes',
		'description'         => 'Homes in Verrado',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
        'menu_icon'           => 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'homes', $args );

}

// Hook into the 'init' action
add_action( 'init', 'properties_post_type', 0 );



/**
 * Save min bed and bath post metadata when a homes post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
function save_min_bed_bath( $post_id ) {

    $post_type = get_post_type($post_id);

    // If this isn't a 'book' post, don't update it.
    if ( "homes" != $post_type ) return;

    // - Update the post's metadata.

    if ( isset( $_POST['bedrooms'] ) ) {
        update_post_meta( $post_id, 'min_beds', sanitize_text_field( min($_POST['bedrooms']) ) );
    }

    if ( isset( $_POST['bathrooms'] ) ) {
        update_post_meta( $post_id, 'min_baths', sanitize_text_field( min($_POST['bathrooms']) ) );
    }
}
add_action( 'save_post', 'save_min_bed_bath' );


// retrofit min bed and bath solution
function update_all_min_bed_bath(){
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'homes'
	);
	$homes_query = new WP_Query($args);
	
	if ( $homes_query->have_posts() ) :
		while ( $homes_query->have_posts() ) : $homes_query->the_post();
		
			global $post;
			$bedrooms = get_field( 'bedrooms' ) ? get_field( 'bedrooms' ) : array(0);
			$bathrooms = get_field( 'bathrooms' ) ? get_field( 'bathrooms' ) : array(0);
			
			update_post_meta( $post->ID, 'min_beds', sanitize_text_field( min($bedrooms) ) );
			update_post_meta( $post->ID, 'min_baths', sanitize_text_field( min($bathrooms) ) );
		
		endwhile;
	endif;
}
// only needs to run once
//add_action( 'init', 'update_all_min_bed_bath' );