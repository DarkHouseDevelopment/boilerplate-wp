<?php 
/*
Template Name: Find Your Place
*/

session_start();

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
	
	
	get_template_part( 'template-parts/find-your-place/content', 'find-home' );
	
	if(get_field( 'include_download_cta' )):
		get_template_part( 'template-parts/page/content', 'download-cta' );
	endif;

	endwhile; 
endif; 

get_footer(); 