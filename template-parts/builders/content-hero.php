<?php 
	$builder_page = get_page_by_path( 'meet-our-builders' );
	if(is_post_type_archive( 'builders' )):
		$hero_image = get_field( 'hero_image', $builder_page->ID );
	elseif( !empty( $post->post_parent ) ):
		$neighborhood_hero = get_field( 'neighborhood_hero_image', $post->ID );
		$hero_image = $neighborhood_hero ? $neighborhood_hero : get_field( 'builder_hero_image', $post->post_parent );
	else:
		$hero_image = get_field( 'builder_hero_image', $post->ID );
	endif;

	$builder_id = $post->post_parent ? $post->post_parent : $post->ID;
?>
<section id="page_hero">
	<?php
		if($hero_image):
			echo "<div class='hero-image'><img src='{$hero_image['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php echo is_singular ( 'builders' ) ? get_field( 'builder_color', $builder_id ) : get_field( 'hero_circle_color', $builder_page->ID ); ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<?php if( is_singular( 'builders' )):
				$logo = get_field( 'builder_logo', $builder_id ); 
				echo "<img src='{$logo['url']}' alt='".get_the_title( $builder_id )."' />";
			else: ?>
			<span><?php echo get_field( 'hero_title_1', $builder_page->ID ); ?></span>
			<?php echo get_field( 'hero_title_2', $builder_page->ID ); ?>
			<span><?php echo get_field( 'hero_title_3', $builder_page->ID ); ?></span>
			<?php endif; ?>
		</h1>
	</div>
</section>
