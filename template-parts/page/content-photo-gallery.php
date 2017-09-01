<a name="photos"></a>
<div id="image_gallery" class="gallery-section">
	<div class="wrap">
		<?php
			global $post;
			$parent = $post->post_parent;
		?>
		<h2><?php echo $parent === 68 ? "Victory" : "Verrado"; ?> <span>Photos</span></h2>
		
		<?php if( have_rows('photo_galleries') ):
			echo'<div class="gallery">';
				while ( have_rows('photo_galleries') ) : the_row();
					$images = get_sub_field('gallery_images');
					$gallery_data = array();
					foreach($images as $image_array):
						$gallery_data[] = array(
							'url' => $image_array['url'],
							'width' => $image_array['width'],
							'height' => $image_array['height'],
						);
					endforeach;
					$images_data = json_encode($gallery_data);
					$title = get_sub_field('gallery_title');

					if( $images ): 
						//echo "<pre>"; print_r($images[0]); echo "</pre>";
			            echo "<a class='gallery-block photo' href='javascript:void(0)' data-gallery='$images_data'><img src='{$images[0]['sizes']['grid-thumbnail']}' alt='{$images[0]['alt']}' />$title</a>";
					endif;
				endwhile;
				echo "<div class='gallery-block placeholder'></div>";
			echo'</div>';
		endif; ?>
	</div>
</div>