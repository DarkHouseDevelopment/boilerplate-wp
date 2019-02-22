<?php

function change_acf_color_picker() {
	
	echo "<script>
		acf.add_filter('color_picker_args', function( args, field ){

		    // overwrite palette with custom colors
		    args.palettes = ['#175467', '#CDEFFA', '#014937', '#A1ECDA', '#791000', '#FF8F7E', '#FFDBD3', '#1F2020', '#3B3C3C', '#ffffff']		
				
		    // return
		    return args;
		
		});
	</script>";
}

add_action( 'acf/input/admin_head', 'change_acf_color_picker' );


//function to remove the related videos form the end of a video
function prepareVideo($iframe){
	
	// use preg_match to find iframe src
	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];
										
	// add extra params to iframe src
	$params = array(
		'rel' => 0,
		'title' => 0,
		'byline' => 0,
		'portrait' => 0,
	);
	
	$new_src = add_query_arg($params, $src);				
	$iframe = str_replace($src, $new_src, $iframe);
					
	// add extra attributes to iframe html
	$attributes = 'frameborder="0"';
	
	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
		
	return '<div class="video-wrapper">'.wp_kses($iframe,$allowed_html).'</div>';
}