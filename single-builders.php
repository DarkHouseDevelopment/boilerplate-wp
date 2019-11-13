<?php  

get_header(); 

$args = array(
	'posts_per_page' => -1,
	'post_status' => array('publish'),
	'post_type' => 'qmi',
);

$qmi_loop = new WP_Query($args);
$qmi_floorplans = array();

while($qmi_loop->have_posts()): $qmi_loop->the_post();
	$floorplan = get_field( 'floorplan' );
	$qmi_floorplans[] = $floorplan->ID;
endwhile;

wp_reset_query();
$qmi_floorplans = array_unique($qmi_floorplans);

if ( have_posts() ):
	while ( have_posts() ) : the_post();
					
		get_template_part( 'template-parts/builders/content', 'hero' );
		
		echo "<section role='main'>";
		
		get_template_part( 'template-parts/builders/content', 'builder-details' );
		
		if(have_rows( 'builder_ctas' )):
			while(have_rows( 'builder_ctas' )): the_row();
				$exp_datetime = strtotime(get_sub_field( 'expiration_datetime' ));
				$current_time = strtotime(date( 'Y-m-d H:i:s' ));
				$active_ctas = 0;
				
				if($current_time <= $exp_datetime && $active_ctas == 0):
					$active_ctas++;
					get_template_part( 'template-parts/page/content', 'call-to-action' );
				endif;
			endwhile;
		endif;
		
		get_template_part( 'template-parts/builders/content', 'floorplans' );
		
		echo "</section>";
		
		if(get_field( 'enable_builder_pop-up', 'option' )):
			get_template_part( 'template-parts/builders/content', 'pop-up' );
		endif;
					
	endwhile;
endif; 
	
get_footer();