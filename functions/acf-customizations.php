<?php

// Adds client custom colors to WYSIWYG editor and ACF color picker. 
$client_colors = array(
    "007c87",  // darkteal
    "99c93d",  // green
    "ef3f38",  // red
    "05add1",  // blue
    "c81e58"   // victory red
);

function change_acf_color_picker() {

	global $parent_file;
	global $client_colors;
	$client_colors_acf = array();
	
	foreach ( $client_colors as $value ) {
		$client_colors_acf[] = '#'.$value;
	}
	
	$client_colors_acf_jquery = json_encode($client_colors_acf);
	
	echo "<script>
		(function($){
			acf.add_action('ready append', function() {
				acf.get_fields({ type : 'color_picker'}).each(function() {
					$(this).iris({
						color: $(this).find('.wp-color-picker').val(),
						mode: 'hsv',
						palettes: ".$client_colors_acf_jquery.",
						change: function(event, ui) {
							$(this).find('.wp-color-result').css('background-color', ui.color.toString());
							$(this).find('.wp-color-picker').val(ui.color.toString());
						}
					});
				});
			});
		})(jQuery);
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