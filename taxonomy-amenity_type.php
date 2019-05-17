<?php 

get_header();

	get_template_part( 'template-parts/amenities/content', 'amenity-type-hero' );
	
	get_template_part( 'template-parts/amenities/content', 'archive_overview' );
	
	if ( have_posts() ):
		
		get_template_part( 'template-parts/amenities/content', 'archive' );
	
	endif;

get_footer();