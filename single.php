<?php  

get_header(); 

if ( have_posts() ):
	while ( have_posts() ) : the_post();
					
		get_template_part( 'template-parts/blog/content', 'header' );
		
		echo "<section role='main'>";
				
		if(have_rows( 'content_sections' )):
			while(have_rows( 'content_sections' )): the_row();
			
				$layout = get_row_layout();
					
				switch($layout){
					case 'full_width_text':
						get_template_part( 'template-parts/page/content', 'full-width-text' );
						break;
						
					case 'pattern_content':
						get_template_part( 'template-parts/page/content', 'pattern' );
						break;
						
					case 'pattern_video':
						get_template_part( 'template-parts/page/content', 'pattern-video' );
						break;
						
					case 'pattern_gallery':
						get_template_part( 'template-parts/page/content', 'pattern-gallery' );
						break;
						
					case 'content_sidebar':
						get_template_part( 'template-parts/page/content', 'sidebar' );
						break;
											
					case 'download_cta':
						get_template_part( 'template-parts/page/content', 'download-cta' );
						break;
				}
			
			endwhile;
		else:
		
			get_template_part( 'template-parts/page/content', 'page' );
		
		endif;
		
		echo "</section>";
					
	endwhile;
endif; 
	
get_footer();