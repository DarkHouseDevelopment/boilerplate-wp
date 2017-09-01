<a name="videos"></a>
<div id="<?php the_sub_field( 'gallery_style' ); ?>-gallery">
	<div id="video_gallery" class="gallery-section">
		<div class="wrap">
			<?php if(get_sub_field( 'gallery_title' )): 
				$gallery_title = get_sub_field( 'gallery_title' );
				echo "<h2>$gallery_title <span>Videos</span></h2>";
			endif; ?>
	
			<?php if(get_sub_field('gallery_videos')):
				echo "<div class='gallery'>";
				
				while(has_sub_field('gallery_videos')):
					
					// get iframe HTML
					$iframe = get_sub_field('video');
									
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
									
					// add extra params to iframe src
					$params = array(
					    'rel'    => 0,
					    'hd'        => 1
					);
					
					$new_src = add_query_arg($params, $src);				
					$iframe = str_replace($src, $new_src, $iframe);
									
					// add extra attributes to iframe html
					$attributes = 'frameborder="0"';
					
					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
									
					echo "<div class='gallery-block video'>";
					echo "<div class='video-wrapper'>$iframe</div>";
					the_sub_field( 'video_title' );
					echo "</div>";
					
					
				endwhile;
				
				echo "</div>";
			endif; ?>
		</div>
	</div>
</div>