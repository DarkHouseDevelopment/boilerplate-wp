<?php

function change_acf_color_picker() {
	
	echo "<script>
		acf.add_filter('color_picker_args', function( args, field ){

		    // overwrite palette with custom colors
		    args.palettes = ['#fde200', '#00ce9b', '#3cc4ee', '#ecf7f9', '#000000', '#999999', '#dfdfde', '#ffffff']		
		
		    // return
		    return args;
		
		});
	</script>";
}

add_action( 'acf/input/admin_head', 'change_acf_color_picker' );