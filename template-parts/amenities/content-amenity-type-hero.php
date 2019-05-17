<?php 
	$amenity_type = get_queried_object();
	$amenities_page = get_page_by_path( 'near-norterra' );
	$hero_image = get_field( 'hero_image', $amenity_type ) ? get_field( 'hero_image', $amenity_type ) : get_field( 'hero_image', $amenities_page );
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo '<div class="hero-image" style="background: url('.$hero_image['url'].') center center no-repeat; background-size: cover;"></div>';
		endif;
	?>
	<div class="hero-circle <?php the_field( 'hero_circle_color', $amenity_type ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<?php
				echo get_field( 'hero_title_2', $amenities_page );
				echo '<span>'.$amenity_type->name.'</span>';
			?>
		</h1>
	</div>
</section>
