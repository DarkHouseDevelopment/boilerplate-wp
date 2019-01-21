<?php
$resource_types = get_the_terms( $post, 'resource_type' );
$resource_type = $resource_types[0]->slug;
$button_text = "Read More";

if($resource_type == "video" || $resource_type == "webinar"):
	$button_text = "Watch Now";
endif;
?>

<article class="resource-result <?php echo $resource_type; ?>">
	<a href="<?php the_permalink(); ?>">
		<div class="resource-image">
			<?php
				if(has_post_thumbnail()):
					the_post_thumbnail( 'large' );
				else:
					$resource_image = get_field( "default_resource_image", "option" );
					echo wp_get_attachment_image($resource_image['ID'], 'large');
				endif;
			?>
			<div class="resource-icon"><?php echo wp_get_attachment_image($resource_icons[$resource_type]['ID'], 'thumbnail'); ?></div>
		</div>
		<strong><?php the_title(); ?></strong>
		<button class="btn btn-white"><?php echo $button_text; ?></button>
	</a>
</article>