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
	
	$button_styles = get_sub_field( 'button_styles' );
	$btn['style']['bg'] = esc_html($button_styles['button_color']);
	$btn['style']['color'] = esc_html($button_styles['button_text_color']);
	$btn['class'] = "btn";
	
	$button_text = get_sub_field( 'button_text' );
	
	$button_link = get_sub_field( 'button_link' );
	$button_link_type = $button_link['button_link_type'];
	$button_target = $button_link['button_link_target'];
	if($button_link_type == "popup"):
		$button_target = "_self";
	endif;
	
	if($button_link_type == "internal"):
		$button_href = $button_link["button_link_$button_link_type"];
		$button_href = get_permalink( $button_link->ID );
	elseif($button_link_type == "popup"):
		if(!isset($GLOBALS['popup_count'])):
			$GLOBALS['popup_count'] = 1;
		else:
			$GLOBALS['popup_count'] = $GLOBALS['popup_count'] + 1;
		endif;
		$button_href = "javascript:void(0);' data-target='#modal-$postID-{$GLOBALS['popup_count']}";
		$btn['class'] = "btn modal-trigger";
		$btn['popup_content'] = $button_link['pop_up_content'];
	else:
		$button_href = esc_url($button_link["button_link_$button_link_type"]);
	endif;	
		
	$btn['rel'] = '';
	if($button_link_type == "external"):
		$btn['rel'] = 'rel="noopener"';
	endif;
	
	$btn['link_type'] = esc_html($button_link_type);
	$btn['link'] = $button_href;
	$btn['target'] = esc_attr($button_target);
	$btn['text'] = esc_html($button_text);
		
	return $btn;
}

// echo single CTA button
function dynamic_button() {
	$btn = get_button_fields();
	echo "<a href='{$btn['link']}' class='{$btn['class']}' style='background:{$btn['style']['bg']}; border-color:{$btn['style']['bg']}; color:{$btn['style']['color']};' target='{$btn['target']}' {$btn['rel']}>{$btn['text']}</a>";
}

// echo multiple CTA buttons
function dynamic_buttons( $field_name ) {
	global $post;
	
	if( have_rows( $field_name ) ):
		while( have_rows( $field_name ) ): the_row();
			$btn = get_button_fields();
			echo "<a href='{$btn['link']}' class='{$btn['class']}' style='background:{$btn['style']['bg']}; border-color:{$btn['style']['bg']}; color:{$btn['style']['color']};' target='{$btn['target']}' {$btn['rel']}>{$btn['text']}</a>";
			
			if(isset($btn['popup_content'])):
				echo "<div id='modal-{$post->ID}-{$GLOBALS['popup_count']}' class='overlay'><div class='overlay-content'><div class='btn-modal'><div class='close'></div>{$btn['popup_content']}</div></div></div>";
			endif;
		endwhile;
	endif;
}

function get_section_id(){
	$section_id = get_sub_field_sanitized( 'section_id', false, false, 'esc_html' );
	
	if($section_id):
		echo "<a id='$section_id' name='$section_id'></a>";
	endif;
}

