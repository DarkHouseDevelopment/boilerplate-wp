<?php 
	$blog_page = get_option( 'page_for_posts' );
	$hero_image = get_field( 'hero_image', $blog_page );
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo "<div class='hero-image'><img src='{$hero_image['url']}' alt='Be In The Know' /></div>";
		endif;
	?>
	<div class="hero-circle <?php the_field( 'hero_circle_color', $blog_page ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php the_field( 'hero_title_1', $blog_page ); ?></span>
			<?php the_field( 'hero_title_2', $blog_page ); ?>
			<span><?php the_field( 'hero_title_3', $blog_page ); ?></span>
		</h1>
	</div>
</section>
