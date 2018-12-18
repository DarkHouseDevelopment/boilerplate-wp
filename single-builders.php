<?php  

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
					
		get_template_part( 'template-parts/builders/content', 'hero' );
		
		echo "<section role='main'>";
		
		get_template_part( 'template-parts/builders/content', 'builder-details' );
		
		get_template_part( 'template-parts/builders/content', 'floorplans' );
		
		echo "</section>";
					
	endwhile;
endif; 
	
get_footer();