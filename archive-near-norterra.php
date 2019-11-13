<?php 

get_header();

	get_template_part( 'template-parts/near-norterra/content', 'hero' );
	
	get_template_part( 'template-parts/near-norterra/content', 'archive_overview' );
	
	if ( have_posts() ):
		
		get_template_part( 'template-parts/near-norterra/content', 'nn_categories' );
	
	endif;

get_footer();