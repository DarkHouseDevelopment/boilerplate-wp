<?php 
	$hero_image = get_field( 'hero_image' );
?>
<?php if($hero_image): ?>
<section id="page_hero">
	<div class='hero-image' style='background: url(<?php echo $hero_image['url']; ?>) center center no-repeat; background-size: cover;'></div>
	<div class="hero-circle <?php the_field( 'hero_circle_color' ) ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php the_field( 'hero_title_1' ); ?></span>
			<?php the_field( 'hero_title_2' ); ?>
			<span><?php the_field( 'hero_title_3' ); ?></span>
		</h1>
	</div>
</section>
<?php else: ?>
<div class="header-border"></div>
<?php endif; ?>
