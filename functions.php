<?php

/************************************************************************/
/* FUNCTIONS
/************************************************************************/

	// External files	
	include 'functions/btnshortcode.php';
	include 'functions/properties.php';
	include 'functions/builders.php';
	include 'functions/roles.php';
	include 'functions/grid-taxonomies.php';
	include 'functions/acf-customizations.php';

/************************************************************************/
/* THEME SUPPORT
/************************************************************************/

function theme_setup(){
	
	add_theme_support( 'title-tag' );
	
	add_theme_support('menus');
	
	add_theme_support( 'custom-logo', array(
		'width'       => 400,
		'height'      => 100,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support('post-thumbnails');
	add_image_size('grid-thumbnail', 480, 320, true); // Add custom thumbnail size for the grid thumbnails
	add_image_size('slider', 1140, 760, true); // Add custom image size for the interior page sliders
	
	register_nav_menus( array(
		'preheader' => __('Pre-Header Menu', 'boilerplate-wp'),
		'preheader_resident' => __('Resident Pre-Header Menu', 'boilerplate-wp'),
		'main' => __('Main Menu', 'boilerplate-wp' ),
		'main_verrado_resident' => __('Verrado Resident Main Menu', 'boilerplate-wp' ),
		'main_victory_resident' => __('Victory Resident Main Menu', 'boilerplate-wp' ),
		'footer' => __('Footer Menu', 'boilerplate-wp' ),
		'footer_resident' => __('Resident Footer Menu', 'boilerplate-wp' ),
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
	
	register_sidebar(array(
    	'id' => 'verrado-resident-sidebar-calendar',
    	'name' => 'Verrado Resident Homepage Calendar',
    	'description' => '',
    	'before_widget' => '<div id="%1$s" class="interior-widget widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="widgettitle">',
    	'after_title' => '</h2>',
    ));
    register_sidebar(array(
    	'id' => 'verrado-resident-sidebar-social',
    	'name' => 'Verrado Resident Homepage Social',
    	'description' => '',
    	'before_widget' => '<div id="%1$s" class="interior-widget widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="widgettitle">',
    	'after_title' => '</h2>',
    ));

	register_sidebar(array(
    	'id' => 'victory-resident-sidebar-calendar',
    	'name' => 'Victory Resident Homepage Calendar',
    	'description' => '',
    	'before_widget' => '<div id="%1$s" class="interior-widget widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="widgettitle">',
    	'after_title' => '</h2>',
    ));
    register_sidebar(array(
    	'id' => 'victory-resident-sidebar-social',
    	'name' => 'Victory Resident Homepage Social',
    	'description' => '',
    	'before_widget' => '<div id="%1$s" class="interior-widget widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="widgettitle">',
    	'after_title' => '</h2>',
    ));
};

/************************************************************************/
/* wp_head();
/************************************************************************/

// Add Stylesheets
function theme_styles() {
	// typography.com include
	wp_enqueue_style( 'typography', 'https://cloud.typography.com/6262094/7919372/css/fonts.css' );	
		
	wp_enqueue_style( 'layout', get_stylesheet_directory_uri().'/assets/css/layout.css' );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/assets/css/styles.css' );
	wp_enqueue_style( 'print', get_stylesheet_directory_uri().'/assets/css/print.css', null, null, 'print' );
	
	global $post;
	$post_parent = $post->post_parent;
	if($post_parent == 14131):
		wp_enqueue_style( 'residents', get_stylesheet_directory_uri().'/assets/css/residents.css' );
	endif;
}

// Add Scripts
function theme_scripts() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), null, true);
	
	if(is_page_template( array( 'page-templates/grid.php' ) )):
		wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3.0.3/dist/isotope.pkgd.min.js', array('jquery'), null, true );
	endif;
	
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri().'/assets/js/scripts-min.js', array('jquery'), null, true );
	wp_enqueue_script( 'mandrill-api', '//mandrillapp.com/api/docs/js/mandrill.js' );
}

// Add typekit
function theme_font_scripts(){
	wp_enqueue_script( 'theme_typekit', '//use.typekit.net/chl0grr.js' );
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/0ccf308790.js' );
}

function theme_typekit_const(){
	if( wp_script_is( 'theme_typekit', 'done' ) ):
		echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	endif;
}

// Add preload tag to web font scripts and styles
function add_script_attributes($tag, $handle) {
    if ( 'theme_typekit' !== $handle && 'fontawesome' !== $handle )
        return $tag;
    return str_replace( ' src', ' preload src', $tag );
}
add_filter('script_loader_tag', 'add_script_attributes', 10, 2);

function add_style_attributes($html, $handle) {
    if ( 'layout' !== $handle && 'styles' !== $handle )
        return $html;
    return str_replace( ' href', ' preload href', $html );
}
add_filter('style_loader_tag', 'add_style_attributes', 10, 2);


/************************************************************************/
/* WYSIWYG COLOR PALETTE
/************************************************************************/

function color_options( $init ) {
	$default_colors = '
		"141414", "Black",
		"FFFFFF", "White"
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

/************************************************************************/
/* ACTIONS & FILTERS
/************************************************************************/

add_action( 'after_setup_theme', 'theme_setup' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_font_scripts' );
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
add_action( 'wp_head', 'theme_typekit_const' );
add_filter( 'tiny_mce_before_init', 'color_options' );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'the_generator', 'remove_gen_version' );



/************************************************************************/
/* COMMUNITY PORTAL
/************************************************************************/

/* Add div around field label and input for WP Members */
add_filter( 'wpmem_register_form_rows', function( $rows ){
	
	foreach ( $rows as $row ) {
		
		// Add meta key + input (i.e. my_field_input ) as div ID for field div wrapper
		$meta_key = $row['meta'];
		$old = '<div';
		$new = '<div id="' . $meta_key . '_input"';
		$str = $rows[ $meta_key ]['field_before'];
		$rows[ $meta_key ]['field_before'] = str_replace( $old, $new, $str );
		
		// Add div wrapper for label with meta_key + label ID (i.e. my_field_label )
		$div_before = '<div id="' . $meta_key . '_label">';
		$div_after  = '</div>';
		$rows[ $meta_key ]['label'] = $div_before . $rows[ $meta_key ]['label'] . $div_after;
		
	}
	return $rows;
});


/* Conditional logic for registration */
function registration_terms() {
	echo "<script type=\"text/javascript\">
	(function($) {
		$(document).ready(function() {
			/* hiding Verrado checkbox and label upon page load */
			$(\"#verrado_checkbox\").hide();
			$('label[for=\"verrado_checkbox\"]').hide();
			$(\"#victory_checkbox\").hide();
			$('label[for=\"victory_checkbox\"]').hide();

			if ($(\"#resident_qualifier\").val() == 'verrado_resident') {
				/* if Verrado is selected from the dropdown, show the Verrado checkbox and label */
				$(\"#verrado_checkbox\").show();
				$('label[for=\"verrado_checkbox\"]').show();
			}else{
				/* if anything else besides Verrado is selected from the dropdown, hide Verrado checkbox and label */
				$(\"#verrado_checkbox\").hide();
				$('label[for=verrado_checkbox\]').hide();
			}
			$(\"#resident_qualifier\").change(function() {
				if ($(\"#resident_qualifier\").val() == 'verrado_resident') {
					$(\"#verrado_checkbox\").show();
					$('label[for=\"verrado_checkbox\"]').show();
				} else {
					$(\"#verrado_checkbox\").hide();
					$('label[for=\"verrado_checkbox\"]').hide();
				}

				if ($(\"#resident_qualifier\").val() == 'victory_resident') {
					$(\"#victory_checkbox\").show();
					$('label[for=\"victory_checkbox\"]').show();
				} else {
					$(\"#victory_checkbox\").hide();
					$('label[for=\"victory_checkbox\"]').hide();
				}
			});
		});
	})(jQuery);
	</script>";
}
add_action( 'wp_head', 'registration_terms' );


add_action( 'wpmem_pre_register_data', 'my_required_checkboxes' );
function my_required_checkboxes( $fields ) {
	
	global $wpmem_themsg;
	
	if ( $fields['resident_qualifier'] == 'verrado_resident' ) {
		if ( ! isset( $_POST['verrado_checkbox'] ) ) {
			// checkbox was empty.
			$wpmem_themsg = 'Verrado checkbox is required.';
		}
	}
	
	if ( $fields['resident_qualifier'] == 'victory_resident' ) {
		if ( ! isset( $_POST['victory_checkbox'] ) ) {
			// checkbox was empty.
			$wpmem_themsg = 'Victory checkbox is required.';
		}
	}
}

/* Format Resident List */
add_filter( 'wpmem_ul_user_list', 'wpmem_ul_create_table' );
function wpmem_ul_create_table( $list ) {
	return '<div id="wpmem-ul-list-heading">
		<div class="first_name">First Name</div>
		<div class="last_name">Last Name</div>
		<div class="user_email">Email</div>
		<div class="park">Park/Neighborhood</div>
		<div class="resident_address">Address</div>
		<div class="phone1">Phone Number</div>
	</div>' . $list;
}


//* Using the Gravity Forms editor, be sure to check "Allow field to be populated dynamically under Advanced Options
//* You will need to set the Field Parameter Name value to work with the filter as follows: gform_field_value_$parameter_name
//* Dynamically populate first name for logged in users
add_filter('gform_field_value_first_name', 'populate_first_name');
function populate_first_name($value){
	global $current_user;
	get_currentuserinfo();
	return $current_user->user_firstname;
}
//* Dynamically populate last name for logged in users
add_filter('gform_field_value_last_name', 'populate_last_name');
function populate_last_name($value){
	global $current_user;
	get_currentuserinfo();
	return $current_user->user_lastname;
}
//* Dynamically populate email for logged in users
add_filter('gform_field_value_email', 'populate_email');
function populate_email($value){
	global $current_user;
	get_currentuserinfo();
	return $current_user->user_email;
}

// Remove unprocessed shortcode
add_filter( 'wpmem_login_form_args',    'remove_wpmem_txt_code' );
add_filter( 'wpmem_register_form_args', 'remove_wpmem_txt_code' );
function remove_wpmem_txt_code( $args ){
    $args = array(
        'txt_before' => '',
        'txt_after'  => ''
    );
    return $args;
}

//* Hide categories based on role
/*function resident_hide_category(){
	global $current_user;
	if ( is_user_logged_in('verrado') ){
		$posts = query_posts($query_string . '&cat=-27');
	}elseif ( is_user_logged_in('victory') ){
		$posts = query_posts($query_string . '&cat=-26');
	}else {
		$posts = query_posts($query_string . '&cat=-27, -26');
	}
}
add_filter( 'resident_hide_category');
*/

