<?php

// Adds client custom colors to WYSIWYG editor and ACF color picker. 
$client_colors = array(
    "21272e",  // black
    "9eb909",  // green
    "b23525",  // red
    "ce9640",  // orange
    "f3ec50",  // yellow
    "2aa9aa",  // teal
);

function change_acf_color_picker() {
	
	echo "<script>
		acf.add_filter('color_picker_args', function( args, field ){

		    // overwrite palette with custom colors
		    args.palettes = ['#9eb909', '#b23525', '#ce9640', '#f3ec50', '#2aa9aa', '#21272e', '#ffffff']		
		
		    // return
		    return args;
		
		});
	</script>";
	
}

add_action( 'acf/input/admin_head', 'change_acf_color_picker' );


// Add an Options page to the WP Admin area
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme-options'
	));
	
}