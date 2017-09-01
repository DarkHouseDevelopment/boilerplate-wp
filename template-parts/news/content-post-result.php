<div class="post-result">

	<?php 
		if(has_post_thumbnail()): 
			$image_link = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		else:
			$image_link = get_template_directory_uri() . "/assets/img/grid-placeholder.png";
		endif;
	?>
	
	<div class="post-image">
		<a class="image" href="<?php the_permalink(); ?>" style="background: url(<?php echo $image_link;?>) center center no-repeat; background-size: cover;"></a>
	</div>
	
	<div class="post-text">
	
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
		<?php the_excerpt(); ?>

		<a class="readmore btn-outline" href="<?php the_permalink(); ?>">Read more</a>
	</div>
</div>