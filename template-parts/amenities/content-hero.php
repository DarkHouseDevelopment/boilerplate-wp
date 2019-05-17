<?php 
	$amenities_page = get_page_by_path( 'near-norterra' );
	$hero_image = get_field( 'hero_image', $amenities_page->ID );
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo '<div class="hero-image" style="background: url('.$hero_image['url'].') center center no-repeat; background-size: cover;"></div>';
		endif;
	?>
	<div class="hero-circle <?php the_field( 'hero_circle_color', $amenities_page->ID ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<?php
				if( is_archive() ):
					$terms = get_the_terms( get_the_ID(), 'amenity_type' );
					echo '<span>'.$terms[0]->name.'</span>';
					echo the_field( 'hero_title_2', $amenities_page->ID );
				else:
			?>
				<span><?php the_field( 'hero_title_1', $amenities_page->ID ); ?></span>
				<?php the_field( 'hero_title_2', $amenities_page->ID ); ?>
				<span><?php the_field( 'hero_title_3', $amenities_page->ID ); ?></span>
			<?php endif; ?>
		</h1>
	</div>
</section>
