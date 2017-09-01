<section id="home_video">
	<div class="overlay-content">
		<?php echo get_sub_field("video_overlay_title") ? "<h1 class='script'>".get_sub_field("video_overlay_title")."</h1>": ""; ?>
	</div>
	
	<?php if(get_sub_field( 'hero_video' )): ?>
		<div class="video-container fullscreen video-container-overlay hide-on-mobile">
			<video autoplay="autoplay" loop="loop" muted="muted">
				<source src="<?php the_sub_field( 'hero_video' ); ?>" type="video/mp4" />
			</video>
		</div>
	<?php endif; ?>
	
	<?php $fallback_image = get_sub_field("video_fallback_image"); ?>
	<div class="hide-on-desktop mobile-fallback fullscreen fixed video-container-overlay" style="background: url('<?php echo $fallback_image['url']; ?>') top no-repeat; background-size: cover;"></div>
</section>