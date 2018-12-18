<?php 
/*
Template Name: Beaver Builder
*/

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
	
	get_template_part( 'template-parts/page/content', 'page' );
	
	endwhile; 
endif; 

get_footer(); 