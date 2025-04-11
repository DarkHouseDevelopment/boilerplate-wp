<?php get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
		
	echo "<section role='main'>";
			
	if(have_rows( 'content_sections' )):
		while(have_rows( 'content_sections' )): the_row();
		
			$layout = get_row_layout();

			echo current_user_can('administrator') ? "<!-- Layout: ".$layout." -->" : "";
				
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
					
				case 'content_sidebar_multiple_ctas':
					get_template_part( 'template-parts/page/content', 'sidebar-multiple-ctas' );
					break;
					
				case 'image_grid':
					get_template_part( 'template-parts/page/content', 'image-grid' );
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
					
				case 'quick_move-in_results':
					get_template_part( 'template-parts/page/content', 'quick-move-results' );
					break;
										
				case 'download_cta':
					get_template_part( 'template-parts/page/content', 'download-cta' );
					break;
										
				case 'builders_feature':
					get_template_part( 'template-parts/page/content', 'builders-feature' );
					break;
										
				case 'builder_incentives':
					get_template_part( 'template-parts/page/content', 'builder-incentives' );
					break;
										
				case 'agents_builders':
					get_template_part( 'template-parts/page/content', 'agents-builders' );
					break;
				
				case 'faq':
					get_template_part( 'template-parts/page/content', 'faq' );
					break;
				
				case 'development_updates_blog':
					get_template_part( 'template-parts/page/content', 'development-blog' );
					break;
				
				case 'call_to_action_form':
					get_template_part( 'template-parts/page/content', 'call-to-action-form' );
					break;
				
				case 'sticky_nav_bar':
					get_template_part( 'template-parts/page/content', 'sticky-nav-bar' );
					break;
				
				case 'sticky_cta_button':
					get_template_part( 'template-parts/page/content', 'sticky-cta-button' );
					break;
				
				case 'cta_blocks':
					get_template_part( 'template-parts/page/content', 'cta-blocks' );
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