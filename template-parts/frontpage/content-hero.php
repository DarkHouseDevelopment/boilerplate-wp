<?php 
	$hero_image = get_sub_field( 'hero_image' );
?>
<section id="homepage_hero">
	<?php
		if($hero_image):
			echo "<div class='hero-image'>";
			echo "<img src='{$hero_image['url']}' alt='Union Park at Norterra' />";
			echo "</div>";
		endif;
	?>
	<div class="hero-circle">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<?php echo get_sub_field( 'circle_text_1' ) ? "<span>".get_sub_field( 'circle_text_1' )."</span>" : ""; ?>
			<?php the_sub_field( 'circle_text_2' ); ?>
			<?php echo get_sub_field( 'circle_text_3' ) ? "<span>".get_sub_field( 'circle_text_3' )."</span>" : ""; ?>
		</h1>
	</div>
	<div class="down-arrows">››</div>
</section>
