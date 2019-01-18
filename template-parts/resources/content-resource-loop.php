<?php
$resource_types = get_the_terms( $post, 'resource_type' );
$resource_type = $resource_types[0]->slug;
?>

<article class="resource-result <?php echo $resource_type; ?>">
	<?php echo wp_get_attachment_image($resource_icons[$resource_type]['ID'], 'thumbnail'); ?>
</article>