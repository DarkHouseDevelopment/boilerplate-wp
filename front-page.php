<?php 

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
			
		if(have_rows( 'homepage_content_sections' )):
			while(have_rows( 'homepage_content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'hero_image_feature':
						get_template_part( 'template-parts/frontpage/content', 'hero' );
						break;
						
					case 'intro_content':
						get_template_part( 'template-parts/frontpage/content', 'intro' );
						break;
						
					case 'download':
						get_template_part( 'template-parts/frontpage/content', 'download' );
						break;
						
					case 'callout_text':
						get_template_part( 'template-parts/frontpage/content', 'callout' );
						break;
						
					case 'get_connected':
						get_template_part( 'template-parts/frontpage/content', 'get-connected' );
						break;
				}
			
			endwhile;
		endif;

	endwhile;
endif; 

get_footer();
