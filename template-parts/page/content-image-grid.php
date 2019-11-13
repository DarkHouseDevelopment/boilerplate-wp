<section class="content-section image-grid">
	<div class="wrap">
		<header>
			<h3><?php the_sub_field( 'section_title' ); ?></h3>
		</header>
		<div class="image-grid-container">
			<?php 
				$images = get_sub_field( 'grid_images' );
				$size = 'full';
				
				foreach($images as $image):
					echo "<div class='grid-image'>".wp_get_attachment_image( $image['ID'], $size )."</div>";
				endforeach;
			?>
		</div>
		<article class="image-grid-content">
			<?php the_sub_field( 'section_content' ) ?>
		</article>
	</div>
</section>