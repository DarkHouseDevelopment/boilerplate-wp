<?php 
	$amenity_type = get_queried_object();
	$hero_image = get_field( 'hero_image', $amenity_type ) ? get_field( 'hero_image', $amenity_type ) : get_field( 'nn_hero_image', 'option' );
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo "<div class='hero-image'><img src='{$hero_image['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php the_field( 'hero_circle_color', $amenity_type ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<?php
				echo '<span>'.get_field( 'nn_hero_title_1', 'option' ).'</span>';
				echo get_field( 'nn_hero_title_2', 'option' );
				echo '<span>'.$amenity_type->name.'</span>';
			?>
		</h1>
	</div>
</section>
