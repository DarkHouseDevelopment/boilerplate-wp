<section class="fullwidth-video">
	<div class="wrap">
		<div class="sm-12">
			<article class="feature">
				<?php
				if(get_sub_field( 'feature_video' )):				
					// get iframe HTML
					$iframe = get_sub_field('feature_video');
									
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
					
					// get autoplay setting
					$autoplay = get_sub_field( 'autoplay_video' );
					if(get_sub_field( 'video_placeholder' ) && !$autoplay):
						$autoplay = true;
						$placeholder = get_sub_field( 'video_placeholder' );
					endif;
									
					// add extra params to iframe src
					$params = array(
					    'rel' => 0,
					    'vq' => 'HD1080',
					    'autoplay' => $autoplay
					);
					
					$new_src = add_query_arg($params, $src);				
					$iframe = str_replace($src, $new_src, $iframe);
									
					// add extra attributes to iframe html
					$attributes = 'frameborder="0"';
					
					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
					echo $placeholder ? "<div class='video-placeholder'><img src='{$placeholder['url']}' alt='Play Video' /></div>" : "<div class='video-wrapper'>$iframe</div>";
				endif;
				?>
			</article>
		</div>
	</div>
</section>

<script>
    $('.video-placeholder').on('click', function() {
		$(this).html('<?php echo $iframe; ?>')
		.addClass('video-wrapper')
		.removeClass('video-placeholder');
	});
</script>