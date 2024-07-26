<?php 
	$amenity_hero = get_field( 'amenity_hero' );
	$amenity_gallery_location = get_field( 'amenity_gallery_location' );
?>
<section id="page_hero">
	<?php
		if($amenity_hero['hero_image']):
			echo "<div class='hero-image'><img src='{$amenity_hero['hero_image']['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php echo $amenity_hero['hero_circle_color']; ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php echo $amenity_hero['hero_title_1']; ?></span>
			<?php echo $amenity_hero['hero_title_2']; ?>
			<span><?php echo $amenity_hero['hero_title_3']; ?></span>
		</h1>
	</div>
</section>

<section id="amenities_back">	
	<div class="wrap">
		<a href="/live/">Live Connected</a> / <a href="/live/amenities/">Resident Amenities</a> / <?php the_title(); ?>
	</div>
</section>

<section id="amenities_overview" role="main">
	<div class="wrap">
		<div class="section-content">
			<?php echo get_field( 'amenity_content' ); ?>
		</div>
	</div>
</section>

<?php 
	if($amenity_gallery_location == 'above-content'):
		get_template_part( 'template-parts/amenities/content', 'gallery-connected' );
	endif;
?>

<?php			
	if(have_rows( 'content_sections' )):
	
		echo "<section class='additional-content'>";
		
		while(have_rows( 'content_sections' )): the_row();
		
			$layout = get_row_layout();
				
			switch($layout){
				case 'full_width_text':
					get_template_part( 'template-parts/page/content', 'full-width-text' );
					break;
					
				case 'pattern_content':
					get_template_part( 'template-parts/page/content', 'pattern' );
					break;
					
				case 'split_content':
					get_template_part( 'template-parts/page/content', 'split-content' );
					break;
					
				case 'upcoming_events':
					get_template_part( 'template-parts/page/content', 'upcoming-events' );
					break;
					
				case 'content_sidebar':
					get_template_part( 'template-parts/page/content', 'sidebar' );
					break;
					
				case 'image_grid':
					get_template_part( 'template-parts/page/content', 'image-grid' );
					break;
					
				case 'call_to_action':
					get_template_part( 'template-parts/page/content', 'call-to-action' );
					break;
						
				case 'multiple_ctas':
					get_template_part( 'template-parts/page/content', 'multiple-ctas' );
					break;
										
				case 'download_cta':
					get_template_part( 'template-parts/page/content', 'download-cta' );
					break;
			}
		
		endwhile;
		
		echo "</section>";
	
	endif;

	if(empty($amenity_gallery_location) || $amenity_gallery_location == 'below-content'):
		get_template_part( 'template-parts/amenities/content', 'gallery-connected' );
	endif;

	if(get_field( 'nn_include_banner_cta', 'option' )):
		while(have_rows( 'nn_banner_cta', 'option' )): the_row();
			get_template_part( 'template-parts/page/content', 'call-to-action' );
		endwhile;
	endif;
?>