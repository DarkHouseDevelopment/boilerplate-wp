<?php
$id = get_sub_field('section_id')?get_sub_field('section_id'):'sticky-nav-bar';
$className = 'page-block sticky-cta-button '.get_sub_field('section_class');

// Load values and assign defaults.
$cta_color = get_sub_field( 'cta_button_color' );
$cta_text_color = get_sub_field( 'cta_text_color' );
$cta_icon = get_sub_field( 'cta_icon' );
$cta_icon_url = wp_get_attachment_image_url( $cta_icon, 'full' );
$cta_icon_type = wp_check_filetype( $cta_icon_url );
$cta_icon_output = !empty($cta_icon_type) && $cta_icon_type['ext'] == 'svg' ? file_get_contents( $cta_icon_url ) : wp_get_attachment_image( $cta_icon, 'full' );
$cta_text = get_sub_field( 'cta_text' );
$cta_link_type = get_sub_field( 'cta_link_type' );
$cta_link_target = $cta_link_type == "popup" ? "" : get_sub_field( 'cta_link_target' );

$cta_link = $cta_link_type == "popup" ? "#modal_".esc_attr($id) : get_sub_field( 'cta_link_'.$cta_link_type );
$className .= $cta_link_type == "popup" ? " modal-trigger cta-modal" : "";

$cta_position = get_sub_field( 'cta_position' );
$cta_position_offset = get_sub_field( 'cta_position_offset' );
$stick_to_bottom_mobile = get_sub_field( 'stick_to_bottom_on_mobile' );

$className .= " $cta_position" . ($stick_to_bottom_mobile ? " mobile-bottom" : "");
$posCSS = strpos($cta_position, 'top') !== "false" ? "top:{$cta_position_offset}vh" : "bottom:{$cta_position_offset}vh";

if($cta_link_type == "internal"):
	if(is_array($cta_link)):
		$cta_href = get_permalink( $cta_link['ID'] );
	else:
		$cta_href = get_permalink( $cta_link->ID );
	endif;
else:
	$cta_href = $cta_link;
endif;

echo "<a id='".esc_attr($id)."' class='".esc_attr($className)."' href='$cta_href' target='$cta_link_target' style='background: $cta_color; color: $cta_text_color; $posCSS;'>";
echo $cta_icon ? $cta_icon_output : "";
echo "<span>".$cta_text."</span></a>";

// popup forms are added in /lib/functions/page-elements.php
