<?php 
	$hero_images = get_sub_field( 'hero_image_gallery' );
	$hero_logo = get_sub_field( 'hero_logo' );
?>
<section id="homepage_hero">
	<?php
		if($hero_images):
			echo "<div class='hero-gallery'>";
			
			foreach($hero_images as $image):
				echo "<div class='slide' style='background: url({$image['url']}) center center no-repeat; background-size: cover;'></div>";
			endforeach;
			
			echo "</div>";
		endif;
	?>
	<div class="wrap">
		<article>
			<img class="hero-logo" src="<?php echo $hero_logo['url']; ?>" alt="<?php echo $hero_logo['alt']; ?>" />
			
			<p class="hero-tagline">
				<?php the_sub_field( 'hero_tagline' ); ?>
			</p>
		</article>
	</div>
</section>
