<?php 

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
			
		if(have_rows( 'home_content_sections' )):
			while(have_rows( 'home_content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'hero_image':
						get_template_part( 'template-parts/frontpage/content', 'hero' );
						break;
						
					case 'intro_text':
						get_template_part( 'template-parts/frontpage/content', 'intro' );
						break;
						
					case 'pattern_content':
						get_template_part( 'template-parts/frontpage/content', 'pattern' );
						break;
						
					case 'full_width_content':
						get_template_part( 'template-parts/frontpage/content', 'full-width' );
						break;
					
					case 'call_to_action':
						get_template_part( 'template-parts/page/content', 'call-to-action' );
						break;
						
					case 'find_your_home':
						get_template_part( 'template-parts/frontpage/content', 'find-home' );
						break;
				}
			
			endwhile;
		endif;

	endwhile;
endif; 

get_footer();
