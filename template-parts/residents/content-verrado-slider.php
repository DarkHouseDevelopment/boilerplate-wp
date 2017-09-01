<section class="fullwidth-slider">
	<div class="wrap">
		<div class="sm-12">
			<article class="feature">
				<?php
				if( have_rows('verrado_feature_slider') ):
					echo '<div class="images">';
						echo '<div class="slider large">';
							while ( have_rows('verrado_feature_slider') ) : the_row();
								$slider_image = get_sub_field('slide_image');
								
								echo get_sub_field('link') ? "<div class='image-slide'><a href='".get_sub_field('link')."'>" : "<div class='image-slide'>";
								echo "<img src='{$slider_image['url']}' width='{$slider_image['width']}' />";
								echo get_sub_field('caption') ? "<div class='caption'>".get_sub_field('caption')."</div>" : "";
								echo get_sub_field('link') ? "</a></div>" : "</div>";
							endwhile;
						echo '</div>';
					echo '</div>';
				endif;
				?>
			</article>
		</div>
	</div>
</section>