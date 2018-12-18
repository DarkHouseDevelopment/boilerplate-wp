<?php
	
$btn_text = get_sub_field( 'button_text' );
$btn_type = get_sub_field( 'button_type' );

switch($btn_type){
	case "internal":
		$btn_link_page = get_sub_field( 'button_internal' );
		$btn_link = get_permalink($btn_link_page);
		$btn_target = "_self";
		break;
		
	case "media":
		$btn_link_media = get_sub_field( 'button_media' );
		$btn_link = $btn_link_media['url'];
		$btn_target = "_blank";
		break;
		
	case "external":
		$btn_link = get_sub_field( 'button_external' );
		$btn_target = "_blank";
		break;
		
	case "custom":
		$btn_link = get_sub_field( 'button_custom' );
		$btn_target = "_blank";
		break;
}