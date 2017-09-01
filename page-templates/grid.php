<?php 
/*
Template Name: Grid Landing Page
*/


get_header();

if ( have_posts() ):
	while ( have_posts() ) : the_post(); 
		
		echo "<section role='main'>";
		
		if(get_field( 'grid_title_image' )):
			$grid_title_image = get_field( 'grid_title_image' );
			echo "<h1 class='page-title'><img src='{$grid_title_image['url']}' alt='".get_the_title()."' /></h1>";
		else:
			echo "<h1 class='page-title script'>".get_the_title()."</h1>";
		endif;
		
		get_template_part( 'template-parts/grid/content', 'intro' );
		
		get_template_part( 'template-parts/grid/content', 'iso-grid' );
		
		echo "</section>";
		
	endwhile;
endif; 

get_footer();