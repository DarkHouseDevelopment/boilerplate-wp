<?php 

get_header();

	get_template_part( 'template-parts/near-norterra/content', 'nn_category_hero' );
	
	get_template_part( 'template-parts/near-norterra/content', 'archive_overview' );
	
	if ( have_posts() ):
		
		get_template_part( 'template-parts/near-norterra/content', 'archive' );
	
	endif;

get_footer();