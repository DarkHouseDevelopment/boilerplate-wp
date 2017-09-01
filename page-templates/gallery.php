<?php
/*
Template Name: Gallery
*/

error_reporting(E_ALL);
ini_set('display_errors', '1');
	
get_header(); 
		
	if ( have_posts() ):
		while ( have_posts() ) : the_post();
			global $post;
			$parent = $post->post_parent;
			$title_class = get_field( 'script_font' ) === true ? "page-title script" : "page-title";
		
			echo "<section role='main' class='$parent_slug'>";
			echo "<h1 class='$title_class' style='color: ".get_field( 'page_title_color' )."'>".get_the_title()."</h1>";
		
			if(have_rows( 'gallery_sections' )):
				while(have_rows( 'gallery_sections' )): the_row();
				
					$layout = get_row_layout();
					
					switch($layout){					
						case 'video_gallery':
							get_template_part( 'template-parts/gallery/content', 'video' );
							break;
							
						case 'photo_galleries':
							get_template_part( 'template-parts/gallery/content', 'photo' );
							break;
							
						case 'lookbook_gallery':
							get_template_part( 'template-parts/gallery/content', 'lookbook' );
							break;
					}
				
				endwhile;
			endif;
			
			echo "</section>";
			
			if($parent):
				echo "<nav id='back_nav'><div class='wrap'><div class='sm-12'><a href='".get_permalink( $parent )."'><i class='fa fa-arrow-left'></i> Back to Grid</a></div></div></nav>";
			endif;
				
		endwhile;
	endif;

echo "<div class='overlay'><div class='gallery-slider'></div><a class='close' href='javascript:void(0);'><i class='fa fa-close'></i></a><div class='coverup'><i class='fa fa-spinner fa-spin'></i></div></div>";

get_footer();