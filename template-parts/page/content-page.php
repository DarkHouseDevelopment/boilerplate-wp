<section class="default-content">
	<div class="wrap">
		<div class="sm-12">
			<article>				
				<?php if(get_sub_field("image_feature")): 
					$image_feature = get_sub_field("image_feature");
					
					// Image Slider
					if($image_feature == "slider" || in_array("slider", $image_feature)):
						if( have_rows('slider_images') ):
							echo '<div class="image-feature slider">';
								echo '<div class="slider small">';
									while ( have_rows('slider_images') ) : the_row();
										$slider_image = get_sub_field('image');
										
										echo get_sub_field('link') ? "<div><a href='".get_sub_field('link')."'>" : "<div>";
										echo "<img src='{$slider_image['url']}' width='{$slider_image['width']}' />";
										echo get_sub_field('caption') ? "<div class='caption'>".get_sub_field('caption')."</div>" : "";
										echo get_sub_field('link') ? "</a></div>" : "</div>";
									endwhile;
								echo '</div>';
							echo '</div>';
						endif;
					endif; 
					
					// Image/Doodle
					if($image_feature == "image" || in_array("image", $image_feature)):					
						if(get_sub_field( 'image_doodle' )):
							$image = get_sub_field( 'image_doodle' );
							$image_position = get_sub_field( 'image_doodle_position' );
							echo "<div class='image-feature image $image_position'>";
								echo "<img src='{$image['url']}' />";
							echo "</div>";
						endif;
					endif;					
					
					// Video Player	
					if($image_feature == "video" || in_array("video", $image_feature)):
						echo '<div class="image-feature video">';
						if(get_sub_field( 'video_embed' )):							
							// get iframe HTML
							$iframe = get_sub_field('video_embed');
											
							// use preg_match to find iframe src
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];
											
							// add extra params to iframe src
							$params = array(
							    'rel'    => 0,
							    'vq'     => 'HD1080'
							);
							
							$new_src = add_query_arg($params, $src);				
							$iframe = str_replace($src, $new_src, $iframe);
											
							// add extra attributes to iframe html
							$attributes = 'frameborder="0"';
							
							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
											
							echo "<div class='video-wrapper'>$iframe</div>";
						endif;
						echo "</div>";
					endif;
						
					// In The News Slider
					if($image_feature == "news" || in_array("news", $image_feature)):
						echo '<div class="image-feature news">';
						if( have_rows('news_slider') ):
							echo '<div class="in_news">';
								echo '<h2>In The News</h2>';
								echo '<div class="news_articles">';
									while ( have_rows('news_slider') ) : the_row();
										$news_source = get_sub_field('news_source');
										$news_logo = get_sub_field('news_logo');
										$article_title = get_sub_field('article_title');
										$article_preview = get_sub_field('article_preview');
										$article_link_target = get_sub_field('article_link_type');
										
										if($article_link_target == "_self"):
											$article_link = get_sub_field('article_link_internal');
										elseif($article_link_target = "_blank"):
											$article_link = get_sub_field('article_link_external');
										else:
											$article_link = "";
										endif;
										
										echo "<div class='article t_6 d_4'>";
										echo "<a class='news_logo m_4' href='$article_link' target='$article_link_target'><img src='{$news_logo['url']}' alt='$news_source' /></a>";
										echo "<div class='news_article m_8 last'>";
										echo "<small>$news_source:</small>";
										echo "<p><a href='$article_link' target='$article_link_target'>$article_title</a></p>";
										//echo $article_preview."<p><a href='".$article_link."' target='".$article_link_target."'>Read more</a></p>";
										echo "</div>";
										echo "</div>";
									endwhile;
								echo '</div>';
							echo '</div>';
						endif;
						echo "</div>";
					endif;
				endif; ?>
				
				<div class="content">
					<?php the_sub_field("section_content"); ?>
				</div>
			</article>
		</div>
	</div>
</section>