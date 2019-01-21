<?php

$button_styles = get_sub_field( 'button_styles' );
$button_color = $button_styles['button_color'];
$button_type = $button_styles['button_type'];

$button_text = get_sub_field( 'button_text' );

$button_link = get_sub_field( 'button_link' );
$button_link_type = $button_link['button_link_type'];
$button_link = $button_link["button_link_$button_link_type"];
if($button_link_type == "internal"):
	$button_link = get_permalink( $button_link->ID );
endif;
$button_target = $button_link['button_link_target'];

$button_class = "btn-$button_color";
if($button_style === 'outline'):
	$button_class .= "-outline";
endif;

echo "<a href='$button_link' class='btn $button_class' target='$button_target'>$button_text</a>";
