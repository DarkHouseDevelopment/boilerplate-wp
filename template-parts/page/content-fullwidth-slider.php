<section class="fullwidth-slider">
	<div class="wrap">
		<div class="sm-12">
			<article class="feature">
				<?php
				$slider_images = get_sub_field('slider_images');
				
				if( $slider_images ):					
					echo '<div class="images">';
						echo '<div class="slider large">';
							foreach ( $slider_images as $slider_image ):								
								echo "<div class='image-slide'>";
								echo "<img src=\"".$slider_image['url']."\" />";
								echo "</div>";
							endforeach;
						echo '</div>';
					echo '</div>';
				endif;
				?>
			</article>
		</div>
	</div>
</section>