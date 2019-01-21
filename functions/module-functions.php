<?php
// Module Functions

// background image/color for modules
function background_type(){
	global $post;
	$postID = $post->ID;
	
	$bg = array();
	
	$bg_type = get_sub_field( 'background_type', $postID );
	
	if($bg_type == "color"):
		
		$bg_color = get_sub_field( 'background_color', $postID );
		$bg['css'] = "background: $bg_color";
		return $bg;
		
	else:
	
		$bg_image = get_sub_field( 'background_image', $postID );
		$desktop_bg_image = $bg_image['desktop_background_image'];
		$mobile_bg_image = $bg_image['mobile_background_image'];
		$bg_style = $bg_image['background_style'];
		$bg_pos = $bg_image['background_position'];
		
		$bg['desktop_background_image'] = $desktop_bg_image['url'];
		$bg['mobile_background_image'] = $mobile_bg_image['url'];
		$bg['background_style'] = $bg_style;
		$bg['background_position'] = $bg_pos;
		
		$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
		$bg['css'] = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css";
		
		if( $mobile_bg_image['url'] ):
			$bg['css_mobile'] = "background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css";
			$bg['mobile_html_css'] = "<div class='mobile-bg' style='{$bg['css_mobile']}'></div>";
		endif;
		
		return $bg;
		
	endif;
}