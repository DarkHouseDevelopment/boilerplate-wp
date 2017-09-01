<?php 
get_header();

if ( have_posts() ):
	while ( have_posts() ) : the_post(); 
	
		echo "<section role='main'>";
		
		if(have_rows( 'homepage_content_sections' )):
			while(have_rows( 'homepage_content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'homepage_video_takeover':
						get_template_part( 'template-parts/home/content', 'hero-video' );
						break;
						
					case 'feature_content':
						get_template_part( 'template-parts/home/content', 'feature' );
						break;
						
					case 'find_a_home_form':
						$form_title = get_sub_field( 'form_title' );
						$submit_btn_text = get_sub_field( 'submit_button_text' );
						get_template_part( 'template-parts/homes/content', 'find-a-home-form' );
						break;
				}
			
			endwhile;
		endif;
		
		get_template_part( 'template-parts/page/content', 'stay-connected' );
		
		echo "</section>";
		
	endwhile;
endif; 

get_footer();