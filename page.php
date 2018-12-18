<?php get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
		
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
					
				case 'live_connected_nav':
					$nav_blocks = 'default';
					include(locate_template( 'template-parts/page/content-nav-blocks.php' ));
					break;
					
				case 'custom_nav_blocks':
					$nav_blocks = 'custom';
					include(locate_template( 'template-parts/page/content-nav-blocks.php' ));
					break;
					
				case 'quick_move-in_results':
					get_template_part( 'template-parts/page/content', 'quick-move-results' );
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