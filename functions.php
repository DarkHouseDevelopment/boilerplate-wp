<?php

/************************************************************************/
/* FUNCTIONS
/************************************************************************/

	// External files
	require_once("functions/acf-customizations.php");
	require_once("functions/homes.php");
	require_once("functions/builders.php");
	require_once("functions/btnshortcode.php");
	

/************************************************************************/
/* THEME SUPPORT
/************************************************************************/

function theme_setup(){
	
	add_theme_support( 'title-tag' );
	
	add_theme_support('menus');
	
	add_theme_support( 'custom-logo', array(
		'width'       => 116,
		'height'      => 68,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support('post-thumbnails');
	add_image_size('blog-thumbnail', 360, 220, true); 
	add_image_size('blog-featured', 710, 360, true); 
	add_image_size('blog-image', 330, 330, true); 
	add_image_size('floorplan-thumbnail', 275, 190, true); 
	add_image_size('gallery', 446, 330, true);
	
	// Add custom sizes to WordPress Media Library
	function drollic_choose_sizes( $sizes ) {
	    return array_merge( $sizes, array(
	        'blog-featured' => __('Blog Featured Image'),
	        'blog-image' => __('Blog Content Image'),
	        'gallery' => __('Gallery Image'),
	    ) );
	}
	add_filter( 'image_size_names_choose', 'drollic_choose_sizes' );
	
	register_nav_menus( array(
		'main' => __('Main Menu', 'boilerplate-wp' ),
		'footer' => __('Footer Menu', 'boilerplate-wp' ),
		'social' => __('Social Menu', 'boilerplate-wp' ),
	) );
	
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption'
	) );
	
	register_sidebar(array(
		'name' 				=> 'Default Sidebar',
		'id' 					=> 'default-sidebar',
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>',
	));
};

/************************************************************************/
/* wp_head();
/************************************************************************/

// Add Stylesheets
function theme_styles() {
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/assets/css/styles.css' );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0' );
	
	if(is_page_template( 'page-templates/print-qmi.php' )):
		wp_enqueue_style( 'print-qmi', get_stylesheet_directory_uri().'/assets/css/print-qmi.css' );
	endif;
}

// Add typekit
function theme_scripts(){
	wp_enqueue_script( 'theme_typekit', '//use.typekit.net/uyv5qhl.js' );
	
	wp_register_script('carousel', get_template_directory_uri() . '/assets/js/carousel.min.js', 'jquery', NULL, true);
	wp_enqueue_script('carousel');
}

function theme_typekit_const(){
	if( wp_script_is( 'theme_typekit', 'done' ) ):
		echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	endif;
}

/************************************************************************/
/* WYSIWYG COLOR PALETTE
/************************************************************************/

function color_options( $init ) {
	$default_colors = '
		"21272e", "Black",		
	    "9eb909", "Green",
	    "b23525", "Red",
	    "ce9640", "Orange",
	    "f3ec50", "Yellow",
	    "2aa9aa", "Teal"
	';
	// Add custom colors here
	$custom_colors = '
	            
	';
	$init['textcolor_map'] = '['.$default_colors.','.$custom_colors.']'; // build color grid default+custom colors
	$init['textcolor_rows'] = 6; // enable 6th row for custom colors in grid
	return $init;
}

/************************************************************************/
/* OTHER FUNCTIONS
/************************************************************************/

function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
function remove_gen_version() {
	return '';
}
function special_parent_classes( $classes, $item ) {

    if ( ( is_singular( 'homes' ) || is_post_type_archive( 'homes' ) ) && $item->ID == 161 ) {
        $classes[] = 'current-page-ancestor';
    }
    if ( is_singular( 'builders' ) && $item->url == '/builders/' ) {
        $classes[] = 'current-page-ancestor';
    }
    if ( is_singular( 'post' ) && $item->url == get_bloginfo( 'url' ) . '/blog/' ) {
        $classes[] = 'current-page-ancestor';
    }

    return $classes;

}


/************************************************************************/
/* ACTIONS & FILTERS
/************************************************************************/

add_action( 'after_setup_theme', 'theme_setup' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
add_action( 'wp_head', 'theme_typekit_const' );
add_filter( 'tiny_mce_before_init', 'color_options' );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'the_generator', 'remove_gen_version' );
add_filter( 'nav_menu_css_class', 'special_parent_classes', 10, 2 );

