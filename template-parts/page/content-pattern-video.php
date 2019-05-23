<?php
	$pattern_color = get_sub_field( 'pattern_color' );	
?>
<section class="content-section pattern-video <?php the_sub_field( 'section_layout' ); ?>">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<div class="pattern-video-embed">		
			<?php
				// get iframe HTML
				$iframe = get_sub_field('video_embed');
								
				// use preg_match to find iframe src
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];
													
				// add extra params to iframe src
				$params = array(
					'rel' => 0,
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
		<div class="pattern-text">
			<h3><?php the_sub_field( 'callout_text' ); ?></h3>
		</div>
	</div>
</section>