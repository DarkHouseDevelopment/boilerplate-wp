<section class="default-content collage-content">
	<div class="wrap">
		<div class="sm-12">
			<article>
				<div class="content">
					<?php the_sub_field("section_content"); ?>
				</div>
				
				<?php				
					// Image Collage
					$collage_images = get_sub_field('collage_images');
					
					if( $collage_images ):					
						echo '<div class="collage">';
							foreach ( $collage_images as $collage_image ):								
								echo "<div class='collage-image'>";
								echo "<img src=\"".$collage_image['url']."\" />";
								echo "</div>";
							endforeach;
						echo '</div>';
					endif;
				?>
			</article>
		</div>
	</div>
</section>