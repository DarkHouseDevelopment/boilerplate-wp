<?php 
	$hero_image = get_field( 'nn_hero_image', 'option' );
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo "<div class='hero-image'><img src='{$hero_image['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php the_field( 'nn_hero_circle_color', 'option' ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php the_field( 'nn_hero_title_1', 'option' ); ?></span>
			<?php the_field( 'nn_hero_title_2', 'option' ); ?>
			<span><?php the_field( 'nn_hero_title_3', 'option' ); ?></span>
		</h1>
	</div>
</section>
