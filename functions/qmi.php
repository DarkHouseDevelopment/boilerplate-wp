<?php 

// Register Custom Post Type
function qmi_post_type() {

	$labels = array(
		'name'                => 'Quick Move-Ins',
		'singular_name'       => 'Quick Move-In',
		'menu_name'           => 'Quick Move-Ins',
		'parent_item_colon'   => 'Parent Quick Move-In:',
		'all_items'           => 'All Quick Move-Ins',
		'view_item'           => 'View Quick Move-In',
		'add_new_item'        => 'Add New Quick Move-In',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Quick Move-In',
		'update_item'         => 'Update Quick Move-In',
		'search_items'        => 'Search qmi',
		'not_found'           => 'No qmi found',
		'not_found_in_trash'  => 'No qmi found in Trash',
	);
	$rewrite = array(
		'slug'                => 'qmi',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'qmi',
		'description'         => 'Quick Move-In Homes in Union Park at Norterra',
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
        'menu_icon'           => 'dashicons-tag',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'qmi', $args );

}

// Hook into the 'init' action
add_action( 'init', 'qmi_post_type', 0 );