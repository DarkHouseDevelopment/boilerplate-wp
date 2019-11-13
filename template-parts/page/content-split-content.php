<?php
	$bg_style = get_sub_field( 'background_style' );
	if($bg_style == 'pattern'):
		$pattern_color = get_sub_field( 'pattern_color' );
		$bg_css = "background: url(".get_template_directory_uri()."/assets/img/upan-pattern-$pattern_color.svg) center center repeat; background-size: 16rem;";
	elseif($bg_style == 'image'):
		$bg_image = get_sub_field( 'background_image' );
		$bg_css = "background: url(".$bg_image['url'].") center center no-repeat; background-size: cover;";
	else:
		$bg_color = get_sub_field( 'background_color' );
		$bg_css = "background: $bg_color;";
	endif;
	$bg_css = $bg_css." color:".get_sub_field( 'text_color' );
	
	$media_type = get_sub_field( 'media_type' );
?>
<section class="content-section split-content <?php echo $media_type; ?> <?php the_sub_field( 'section_layout' ); ?>" style="<?php echo $bg_style != "pattern" ? $bg_css : ""; ?>">
	<?php echo $bg_style == "pattern" ? "<div class='pattern-bg' style='$bg_css'></div>" : ""; ?>
	<div class="wrap">
		<div class="section-media">
			<?php 
			if($media_type == "image"):
				$image = get_sub_field( 'section_image' );
				echo "<img src='".$image['url']."' alt='".$image['alt']."' />";
			elseif($media_type == "gallery"): 
				$images = get_sub_field( 'gallery_images' );
				if( $images ): ?>
					<div class="slider-container">
						<div class="slider">
						<?php $image_index = 0;
				      foreach( $images as $image ): ?>
				        <div class="slide" data-index="<?php echo $image_index; ?>" title="<?php echo $image['alt']; ?>" style="background: url(<?php echo $image['sizes']['gallery']; ?>) center center no-repeat; background-size: cover;" /><a class="slider-next" href="javascript:void(0);"><i class="icon-angle-circled-right"></i></a></div>
				        <?php $image_index++;
					    endforeach; ?>
						</div>
					</div>
				<?php endif; 
			elseif($media_type == "video"):
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
			endif; ?>
		</div>
		<div class="section-content">
			<div class="content-inner">
				<h3><?php the_sub_field( 'section_title' ); ?></h3>
				<?php the_sub_field( 'section_content' ); ?>
			</div>
		</div>
	</div>
</section>