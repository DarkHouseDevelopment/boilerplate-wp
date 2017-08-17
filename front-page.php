<?php 

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
			
		if(have_rows( 'homepage_content_sections' )):
			while(have_rows( 'homepage_content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'hero_image':
						get_template_part( 'template-parts/frontpage/content', 'hero' );
						break;
						
					case 'intro':
						get_template_part( 'template-parts/frontpage/content', 'intro' );
						break;
				}
			
			endwhile;
		endif;

	endwhile;
endif; 

get_footer();
