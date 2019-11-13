<?php 
/*
Template Name: Stay in Touch
*/

session_start();

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
	
	get_template_part( 'template-parts/page/content', 'stay-in-touch' );
	
	if(have_rows( 'content_sections' )):
	
		echo "<section class='page-content'>";
	
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
					
				case 'content_sidebar_cta':
					get_template_part( 'template-parts/page/content', 'sidebar-cta' );
					break;
					
				case 'call_to_action':
					get_template_part( 'template-parts/page/content', 'call-to-action' );
					break;
					
				case 'live_connected_amenities':
					get_template_part( 'template-parts/page/content', 'live-amenities' );
					break;
					
				case 'live_connected_nav':
					$nav_blocks = 'default';
					include(locate_template( 'template-parts/page/content-nav-blocks.php' ));
					break;
					
				case 'custom_nav_blocks':
					$nav_blocks = 'custom';
					include(locate_template( 'template-parts/page/content-nav-blocks.php' ));
					break;
					
				case 'builders_feature':
					get_template_part( 'template-parts/page/content', 'builders-feature' );
					break;
					
				case 'quick_move-in_results':
					get_template_part( 'template-parts/page/content', 'quick-move-results' );
					break;
										
				case 'download_cta':
					get_template_part( 'template-parts/page/content', 'download-cta' );
					break;
			}
		
		endwhile;
	
		echo "</section>";
	
	endif;
	
	if(get_field( 'include_download_cta' )):
		get_template_part( 'template-parts/page/content', 'download-cta' );
	endif;

	endwhile; 
endif; 

get_footer(); 