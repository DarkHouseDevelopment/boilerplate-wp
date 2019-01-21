<?php

/************************************************************************/
/* FUNCTIONS
/************************************************************************/

	// External files
	require_once("functions/acf-customizations.php");
	require_once("functions/resources-cpt.php");
	require_once("functions/btnshortcode.php");
	

/************************************************************************/
/* THEME SUPPORT
/************************************************************************/

function theme_setup(){
	
	add_theme_support( 'title-tag' );
	
	add_theme_support('menus');
	
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 25,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support('post-thumbnails');
	//add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
	
	register_nav_menus( array(
		'main' => __('Main Menu', 'boilerplate-wp' ),
		//'footer' => __('Footer Menu', 'boilerplate-wp' ),
		//'social' => __('Social Menu', 'boilerplate-wp' ),
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
	
	register_sidebar(array(
		'name' 				=> 'Footer Left',
		'id' 					=> 'footer-left',
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>',
	));
	
	register_sidebar(array(
		'name' 				=> 'Footer Center',
		'id' 					=> 'footer-center',
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>',
	));
	
	register_sidebar(array(
		'name' 				=> 'Footer Right',
		'id' 					=> 'footer-right',
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
	//wp_enqueue_style( 'typekit', 'https://use.typekit.net/TYPEKIT_PROJECT_ID.css' );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/assets/css/styles.css' );
	wp_enqueue_style( 'modules', get_stylesheet_directory_uri().'/assets/css/modules.css' );
}

// Add Scritps
function theme_scripts() {		
	wp_register_script('slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', 'jquery', NULL, true);
	wp_enqueue_script('slick-slider');
	
	if(is_post_type_archive( "resources" )):
		wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'isotope-packery', get_template_directory_uri().'/assets/js/packery-mode.pkgd.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array('jquery'), null, true );
	endif;
	
	wp_register_script('script', get_template_directory_uri() . '/assets/js/scripts.js', 'jquery', NULL, true);
	wp_enqueue_script('script');
}

/************************************************************************/
/* WYSIWYG COLOR PALETTE
/************************************************************************/

function color_options( $init ) {
	$default_colors = '
		"fde200", "Yellow",
		"00ce9b", "Green",
		"3cc4ee", "Blue",
		"ecf7f9", "Pale Blue",
		"000000", "Black",
		"999999", "Grey",
		"dfdfde", "Light Grey",
		"FFFFFF", "White",
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

//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'remove_jquery_migrate');

/************************************************************************/
/* ACTIONS & FILTERS
/************************************************************************/

add_action( 'after_setup_theme', 'theme_setup' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
add_filter( 'tiny_mce_before_init', 'color_options' );

