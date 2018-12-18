<?php 
/*
Template Name: Stay in Touch
*/

session_start();

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
	
	get_template_part( 'template-parts/page/content', 'stay-in-touch' );
	
	if(get_field( 'include_download_cta' )):
		get_template_part( 'template-parts/page/content', 'download-cta' );
	endif;

	endwhile; 
endif; 

get_footer(); 