<?php 

$builder_page = get_page_by_path( 'meet-our-builders' );
get_header();

	get_template_part( 'template-parts/builders/content', 'hero' );
	
	echo "<section role='main'>";
	
	if ( have_posts() ): 
		get_template_part( 'template-parts/builders/content', 'archive' );
	endif;
			
	if(get_field( 'include_download_cta', $builder_page->ID )):
		get_template_part( 'template-parts/page/content', 'download-cta' );
	endif;
	
	echo "</section>";

get_footer();