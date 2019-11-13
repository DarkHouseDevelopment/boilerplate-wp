<?php 
/*
Template Name: Near Norterra
*/

get_header();

	get_template_part( 'template-parts/near-norterra/content', 'hero' );
	
	get_template_part( 'template-parts/near-norterra/content', 'overview' );

	get_template_part( 'template-parts/near-norterra/content', 'nn_categories' );
	
	if(get_field( 'include_banner_cta' )):
		while(have_rows( 'banner_cta' )): the_row();
			get_template_part( 'template-parts/page/content', 'call-to-action' );
		endwhile;
	endif;

get_footer(); 	