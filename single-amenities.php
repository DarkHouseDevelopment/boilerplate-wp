<?php  

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
		
		get_template_part( 'template-parts/amenities/content', 'single' );
					
	endwhile;
endif; 
	
get_footer();