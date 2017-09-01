<a name="lookbook"></a>
<div id="lookbook" class="gallery-section">
	<div class="wrap">
		<?php
			global $post;
			$parent = $post->post_parent;
		?>
		<h2><?php echo $parent === 68 ? "Victory" : "Verrado"; ?> <span>Lookbooks</span></h2>
		
		<?php if( have_rows('gallery_lookbooks') ):
			echo'<div class="gallery">';
				while ( have_rows('gallery_lookbooks') ) : the_row();
					$lookbook_title = get_sub_field( 'lookbook_title' );
					$lookbook_url = get_sub_field( 'lookbook_url' );
					$lookbook_image = get_sub_field( 'lookbook_image' );
		            echo "<a class='gallery-block lookbook' href='$lookbook_url' target='_blank'><img src='{$lookbook_image['sizes']['medium_large']}' alt='$lookbook_title' />$lookbook_title</a>";
				endwhile;
				echo "<div class='gallery-block placeholder'></div>";
			echo'</div>';
		endif; ?>
	</div>
</div>