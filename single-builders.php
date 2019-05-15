<?php  

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
					
		get_template_part( 'template-parts/builders/content', 'hero' );
		
		echo "<section role='main'>";
		
		get_template_part( 'template-parts/builders/content', 'builder-details' );
		
		if(get_field( 'include_builder_cta' )):
			while(have_rows( 'builder_cta' )): the_row();
				get_template_part( 'template-parts/page/content', 'call-to-action' );
			endwhile;
		endif;
		
		get_template_part( 'template-parts/builders/content', 'floorplans' );
		
		echo "</section>";
					
	endwhile;
endif; 
	
get_footer();