<?php get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post();
		
		$title_class = get_field( 'script_font' ) === true ? "page-title script" : "page-title";
		
		echo "<section role='main'>";
		echo "<h1 class='$title_class' style='color: ".get_field( 'page_title_color' )."'>".get_the_title()."</h1>";
		
		if(have_rows( 'content_sections' )):
			while(have_rows( 'content_sections' )): the_row();
			
				$layout = get_row_layout();
				
				switch($layout){					
					case 'default_page_content':
						get_template_part( 'template-parts/page/content', 'page' );
						break;
						
					case 'full_width_image_slider':
						get_template_part( 'template-parts/page/content', 'fullwidth-slider' );
						break;
						
					case 'full_width_video':
						get_template_part( 'template-parts/page/content', 'fullwidth-video' );
						break;
						
					case 'content_w_image_collage':
						get_template_part( 'template-parts/page/content', 'page-collage' );
						break;
						
					case 'two_column_content':
						get_template_part( 'template-parts/page/content', 'page-columns' );
						break;
						
					case 'business_info':
						get_template_part( 'template-parts/page/content', 'business-info' );
						break;
						
					case 'photo_gallery_grid':
						get_template_part( 'template-parts/page/content', 'photo-gallery' );
						break;
						
					case 'video_gallery_grid':
						get_template_part( 'template-parts/page/content', 'video-gallery' );
						break;
						
					case 'stay_connected_form':
						get_template_part( 'template-parts/page/content', 'stay-connected-form' );
						break;
						
					case 'lead_gen_form':
						get_template_part( 'template-parts/page/content', 'lead-form' );
						break;
				}
			
			endwhile;
		endif;
		
		echo "</section>";
		
		global $post;
		$post_parent = $post->post_parent;
		
		if($_SERVER['HTTP_REFERER'] && !user_has_role('verrado') && !user_has_role('victory')):
			echo "<nav id='back_nav' class='grid'><div class='wrap'><div class='sm-12'><a href='".$_SERVER['HTTP_REFERER']."'><i class='fa fa-arrow-left'></i> Back to Grid</a></div></div></nav>";
		elseif($post_parent && $post_parent != 14131 && !user_has_role('verrado') && !user_has_role('victory')):
			echo "<nav id='back_nav' class='grid'><div class='wrap'><div class='sm-12'><a href='".get_permalink( $post_parent )."'><i class='fa fa-arrow-left'></i> Back to Grid</a></div></div></nav>";
		endif;
		
		if($post_parent != 14131 && !is_page( array( 'stay-connected' ) ) && !user_has_role('verrado') && !user_has_role('victory')):
			get_template_part( 'template-parts/page/content', 'stay-connected' );
		endif;

	endwhile; 
endif; 

get_footer(); 