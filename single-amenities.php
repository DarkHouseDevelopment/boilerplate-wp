<?php 

//$amenity_page = get_page_by_path( 'near-norterra' );
get_header();

	get_template_part( 'template-parts/amenities/content', 'hero' );
	
	echo "<section role='main'>";
	
	if ( have_posts() ): 
		get_template_part( 'template-parts/amenities/content', 'archive' );
	endif;
	
	
	echo "</section>";

get_footer();