<?php

$button_style = get_sub_field( 'button_style' );
$button_text = get_sub_field( 'button_text' );
$button_link_type = get_sub_field( 'button_link_type' );
$button_link = get_sub_field( "button_link_$button_link_type" );

if($button_link_type == "internal"):
	$button_link = get_the_permalink( $button_link->ID );
endif;

$button_target = get_sub_field( 'button_link_target' );

echo "<a href='$button_link' class='btn $button_style' target='$button_target'>$button_text</a>";
