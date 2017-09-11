<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<section id="home_video">
		<div class="overlay">
			<div class="overlay-content">
				<?php echo get_field("overlay_title") ? "<h1 class='script'>".get_field("overlay_title")."</h1>": ""; ?>
				<?php the_field("overlay_content"); ?>
			</div>
		</div>
		
		<?php if(get_field( 'background_video' )): ?>
			<div class="video-container fullscreen video-container-overlay hide-on-mobile">
				<?php
					// get iframe HTML
					$iframe = get_field('background_video');
									
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
														
					// add extra params to iframe src
					$params = array(
					    'background' => 1,
					    'autoplay' => 1,
					    'loop' => 1,
					    'color' => '6eceb2',
					    'title' => 0,
					    'byline' => 0,
					    'portrait' => 0,
					);
					
					$new_src = add_query_arg($params, $src);				
					$iframe = str_replace($src, $new_src, $iframe);
									
					// add extra attributes to iframe html
					$attributes = 'frameborder="0"';
					
					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
					echo "<div class='video-wrapper'>$iframe</div>";
				?>
			</div>
		<?php endif; ?>
		
		<?php $fallback_image = get_field("video_fallback_image"); ?>
		<div class="hide-on-desktop mobile-fallback fullscreen fixed video-container-overlay" style="background: url('<?php echo $fallback_image['url']; ?>') top no-repeat; background-size: cover;"></div>
	</section>
	
	<!--<div style="position:absolute; top:0; left:0; width:100%; height:100%; z-index: -1;"><div class="video-wrapper"><iframe src="https://player.vimeo.com/video/232694819?autoplay=1&loop=1&background=1&color=6eceb2&title=0&byline=0&portrait=0" width="" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>-->

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>