<?php 

// Register Custom Post Type
function rentals_post_type() {

	$labels = array(
		'name'                => 'Rentals',
		'singular_name'       => 'Rental',
		'menu_name'           => 'Rentals',
		'parent_item_colon'   => 'Parent Rental:',
		'all_items'           => 'All Rentals',
		'view_item'           => 'View Rental',
		'add_new_item'        => 'Add New Rental',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Rental',
		'update_item'         => 'Update Rental',
		'search_items'        => 'Search rentals',
		'not_found'           => 'No rentals found',
		'not_found_in_trash'  => 'No rentals found in Trash',
	);
	$rewrite = array(
		'slug'                => 'rentals',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'rentals',
		'description'         => 'Rentals in Union Park at Norterra',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg enable-background="new 0 0 285 285" viewBox="0 0 285 285" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="m51.907 168.806h-14.909v17.114h14.466c5.468 0 10.935-1.41 10.935-8.554 0-6.794-4.137-8.56-10.492-8.56z"/><path fill="currentColor" d="m278.212 117.227h-31.317l-88.274-76.751c.495-1.602.844-3.269.844-5.025 0-9.37-7.595-16.965-16.965-16.965s-16.965 7.595-16.965 16.965c0 1.756.35 3.423.844 5.025l-88.274 76.751h-31.317c-3.748 0-6.788 3.04-6.788 6.788v135.712c0 3.748 3.04 6.788 6.788 6.788h271.424c3.748 0 6.788-3.04 6.788-6.788v-135.712c0-3.748-3.04-6.788-6.788-6.788zm-142.951-66.487c2.205 1.039 4.635 1.676 7.239 1.676s5.035-.637 7.239-1.676l76.482 66.487h-167.443zm-60.591 152.909c0 7.326 1.933 10.063 1.933 13.056 0 3.352-3.436 5.65-6.788 5.65-7.938 0-8.56-7.672-8.56-10.236 0-11.118-2.022-15.614-9.964-15.614h-14.293v18.616c0 4.323-2.82 7.233-7.233 7.233s-7.233-2.91-7.233-7.233v-48.962c0-6.438 3.349-8.47 8.47-8.47h24.081c17.197 0 21.783 9.441 21.783 17.646 0 6.877-4.054 13.671-10.932 15.264v.173c7.41 1.054 8.736 6.438 8.736 12.877zm56.716 17.562h-34.669c-5.118 0-8.47-2.032-8.47-8.47v-46.582c0-6.438 3.352-8.47 8.47-8.47h33.964c4.23 0 7.323 1.237 7.323 5.823 0 4.589-3.092 5.823-7.323 5.823h-27.968v13.765h24.523c3.8 0 6.794 1.054 6.794 5.557 0 4.496-2.994 5.56-6.794 5.56h-24.523v15.348h28.673c4.24 0 7.326 1.234 7.326 5.823 0 4.586-3.087 5.823-7.326 5.823zm72.431-7.858c0 5.733-2.474 9.002-8.563 9.002-4.586 0-6.089-.971-7.938-3.881l-25.145-39.698h-.176v36.611c0 4.669-2.644 6.967-6.967 6.967s-6.967-2.298-6.967-6.967v-50.373c0-5.999 2.91-8.47 9.083-8.47 3.003 0 5.65 1.145 7.233 3.792l25.321 40.848h.173v-37.672c0-4.679 2.647-6.967 6.977-6.967 4.323 0 6.97 2.289 6.97 6.967v49.841zm56.805-43.486h-13.671v45.255c0 4.323-2.83 7.233-7.233 7.233-4.416 0-7.236-2.91-7.236-7.233v-45.255h-13.678c-4.141 0-7.502-2.125-7.502-6.089 0-3.974 3.361-6.089 7.502-6.089h41.819c4.147 0 7.5 2.115 7.5 6.089-.001 3.964-3.353 6.089-7.501 6.089z"/></svg>'),
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'rentals', $args );

}

// Hook into the 'init' action
add_action( 'init', 'rentals_post_type', 0 );

