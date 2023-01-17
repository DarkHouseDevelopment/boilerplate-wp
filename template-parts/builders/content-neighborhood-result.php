<?php 
	$neighborhood = $args['neighborhood']; 
	$neighborhood_homes = get_posts( array( 'post_type' => 'homes', 'fields' => 'ids', 'meta_query' => array( array( 'key' => 'builder', 'value' => $neighborhood->post_parent, 'compare' => '=' ), array( 'key' => 'neighborhood', 'value' => $neighborhood->ID, 'compare' => '=' ) ) ) );
?>

<div class="home-result <?php echo $neighborhood->post_name . ' ' . ( empty( $neighborhood_homes ) ? 'coming-soon' : '' ); ?>">

	<?php if( has_post_thumbnail( $neighborhood->ID ) ): ?>
		<a class="model-image" href="<?php echo !empty($neighborhood_homes) ? get_the_permalink( $neighborhood->ID ) : 'javascript:void(0);'; ?>" class="image" style="background: url(<?php echo get_the_post_thumbnail_url( $neighborhood->ID, 'floorplan-thumbnail' ); ?>) center center no-repeat; background-size: cover;">
			<div class="hover"><div class="btn btn-white-outline"><?php echo !empty($neighborhood_homes) ? "View Details" : "Coming Soon"; ?></div></div>
		</a>
	<?php endif; ?>

	<div class="model-details">
		<h4><a href="<?php echo !empty($neighborhood_homes) ? get_the_permalink( $neighborhood->ID ) : 'javascript:void(0);'; ?>"><?php echo get_the_title( $neighborhood->ID ); ?></a><br /><span>// <?php echo get_the_title( $neighborhood->post_parent ); ?></span></h4>
	</div>

</div>