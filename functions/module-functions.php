<?php
// Module Functions

// background image/color for modules
function background_type(){
	global $post;
	$postID = $post->ID;
	
	$bg = array();
	
	$bg_type = get_sub_field_sanitized( 'background_type', $postID, false, 'sanitize_text_field' );
	
	if($bg_type == "color"):
		
		$bg_color = get_sub_field_sanitized( 'background_color', $postID, false, 'sanitize_text_field' );
		$bg['css'] = "background: $bg_color";
		return $bg;
		
	else:
	
		$bg_image = get_sub_field( 'background_image', $postID );
		$desktop_bg_image = $bg_image['desktop_background_image'];
		$mobile_bg_image = $bg_image['mobile_background_image'];
		$bg_style = $bg_image['background_style'];
		$bg_pos = $bg_image['background_position'];
		
		$bg['desktop_background_image'] = esc_url($desktop_bg_image['url']);
		$bg['mobile_background_image'] = esc_url($mobile_bg_image['url']);
		$bg['background_style'] = esc_attr($bg_style);
		$bg['background_position'] = esc_attr($bg_pos);
		
		$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
		$bg['css'] = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css";
		
		if( $mobile_bg_image['url'] ):
			$bg['css_mobile'] = "background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css";
			$bg['mobile_html_css'] = "<div class='mobile-bg' style='{$bg['css_mobile']}'></div>";
		endif;
		
		return $bg;
		
	endif;
}


// buttons
// get the button acf fields
function get_button_fields() {
	global $post;
	$postID = $post->ID;
	
	$btn = array();
	
	$button_styles = get_sub_field( 'button_styles',$postID );
	$button_color = $button_styles['button_color'];
	$button_type = $button_styles['button_type'];
	
	$button_text = get_sub_field( 'button_text',$postID );
	
	$button_link = get_sub_field( 'button_link' );
	$button_link_type = $button_link['button_link_type'];
	$button_target = $button_link['button_link_target'];
	$button_link = $button_link["button_link_$button_link_type"];
	
	if($button_link_type == "internal"):
		$button_link = get_permalink( $button_link->ID );
	endif;
	
	$btn['rel'] = '';
	if($button_link_type == "external"):
		$btn['rel'] = 'rel="noopener"';
	endif;
	
	$button_class = "btn-$button_color";
	if($button_style === 'outline'):
		$button_class .= "-outline";
	endif;
	
	$btn['link'] = esc_url($button_link);
	$btn['class'] = esc_attr($button_class);
	$btn['target'] = esc_attr($button_target);
	$btn['text'] = esc_html($button_text);
	
	return $btn;
	
	//echo "<a href='$button_link' class='btn $button_class' target='$button_target'>$button_text</a>";
}

// echo single CTA button
function dynamic_button() {
	$btn = get_button_fields();
	echo "<a href='{$btn['link']}' class='btn {$btn['class']}' target='{$btn['target']}' {$btn['rel']}>{$btn['text']}</a>";
}

// echo multiple CTA buttons
function dynamic_buttons( $field_name ) {
	if( have_rows( $field_name ) ):
		while( have_rows( $field_name ) ): the_row();
			$btn = get_button_fields();
			echo "<a href='{$btn['link']}' class='btn {$btn['class']}' target='{$btn['target']}' {$btn['rel']}>{$btn['text']}</a>";
		endwhile;
	endif;
}

