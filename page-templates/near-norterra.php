<?php 
/*
Template Name: Near Norterra
*/

get_header();

	get_template_part( 'template-parts/amenities/content', 'hero' );
	
	get_template_part( 'template-parts/amenities/content', 'overview' );

	get_template_part( 'template-parts/amenities/content', 'amenity_types' );
	
	if(get_field( 'include_banner_cta' )):
		while(have_rows( 'banner_cta' )): the_row();
			get_template_part( 'template-parts/page/content', 'call-to-action' );
		endwhile;
	endif;

get_footer(); 	