<?php
/*
Template Name: Resident Homepage
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post();
		
		$title_class = get_field( 'script_font' ) === true ? "page-title script" : "page-title";
		
		echo "<section role='main'>";
		echo "<h1 class='$title_class' style='color: ".get_field( 'page_title_color' )."'>".get_the_title()."</h1>";
					
		$current_user = wp_get_current_user();
		$user_role = $current_user->roles;
		
		if(in_array('administrator', $user_role)):	
			get_template_part( 'template-parts/residents/content', 'verrado-slider' );
			get_template_part( 'template-parts/residents/content', 'verrado-content' );
			get_template_part( 'template-parts/residents/content', 'victory-slider' );
			get_template_part( 'template-parts/residents/content', 'victory-content' );
		elseif(in_array('verrado', $user_role)):	
			get_template_part( 'template-parts/residents/content', 'verrado-slider' );
			get_template_part( 'template-parts/residents/content', 'verrado-content' );
		elseif(in_array('victory', $user_role)):	
			get_template_part( 'template-parts/residents/content', 'victory-slider' );
			get_template_part( 'template-parts/residents/content', 'victory-content' );
		else:
			get_template_part( 'template-parts/residents/content', 'login' );
		endif;		
		
		echo "</section>";

	endwhile; 
endif; 

get_footer(); 
