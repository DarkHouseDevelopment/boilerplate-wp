<?php

$button_styles = get_sub_field( 'button_styles' );
$button_color = $button_styles['button_color'];
$button_text_color = $button_styles['button_text_color'];
$button_class = "btn";

$button_text = get_sub_field( 'button_text' );

$button_link = get_sub_field( 'button_link' );
$button_link_type = $button_link['button_link_type'];

if($button_link_type == "internal"):
	$button_link = $button_link["button_link_$button_link_type"];
	$button_link = get_permalink( $button_link->ID );
elseif($button_link_type == "popup"):
	if(!isset($GLOBALS['popup_count'])):
		$GLOBALS['popup_count'] = 1;
	else:
		$GLOBALS['popup_count'] = $GLOBALS['popup_count'] + 1;
	endif;
	$button_link = 'javascript:void(0);" data-modal="'.$post->ID.'-'.$GLOBALS['popup_count'];
	$button_class = "btn modal-trigger";
else:
	$button_link = $button_link["button_link_$button_link_type"];
endif;

$button_rel = '';
if($button_link_type == "external"):
	$button_rel = 'rel="noopener"';
endif;

$button_target = $button_link['button_link_target'];
if($button_link_type == "popup"):
	$button_target = "_self";
endif;


echo '<a href="'.esc_url($button_link).'" class="'.$button_class.'" style="background:'.esc_html($button_color).'; color:'.esc_html($button_text_color).';" target="'.esc_attr($button_target).'" '.$button_rel.'>'.esc_html($button_text).'</a>';

if($button_link_type == "popup"):	
	echo "<div class='modal-overlay'><div id='{$post->ID}-{$GLOBALS['popup_count']}' class='modal'>";
	the_sub_field( 'pop_up_content' );
	echo "</div></div>";
endif;