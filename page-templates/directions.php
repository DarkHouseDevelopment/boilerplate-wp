<?php 
/*
Template Name: Directions
*/


get_header();

if ( have_posts() ):
	while ( have_posts() ) : the_post(); 
		
		echo "<section role='main'>";
		echo "<h1 class='page-title script'>".get_the_title()."</h1>";
		
		if(have_rows( 'content_sections' )):
			while(have_rows( 'content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'visit_verrado':
						get_template_part( 'template-parts/directions/content', 'visit-verrado' );
						break;
						
					case 'verrado_maps':
						get_template_part( 'template-parts/directions/content', 'verrado-maps' );
						break;
						
					case 'already_residents':
						get_template_part( 'template-parts/directions/content', 'already-residents' );
						break;
				}
			
			endwhile;
		endif;
		
		get_template_part( 'template-parts/page/content', 'stay-connected' );
		
		echo "</section>";
		
	endwhile;
endif; 

get_footer();