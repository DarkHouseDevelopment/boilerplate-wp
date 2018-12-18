<?php include( get_template_directory() . '/template-parts/homes/script-home-variables.php' ); ?>

<div class="home-result">

	<?php if( $images ): ?>
		<a class="model-image" href="<?php the_permalink(); ?>" class="image" style="background: url(<?php echo $images[0]['sizes']['floorplan-thumbnail']; ?>) center center no-repeat; background-size: cover;">
			<div class="hover"><div class="btn btn-white-outline">View Home Details</div></div>
			<?php echo $quick_movein ? "<div class='quick-move'><i class='icon-star'></i> Quick Move In</div>" : ""; ?>
		</a>
	<?php endif; ?>

	<div class="model-details">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br /><span>// <a href="<?php get_the_permalink($builder->ID); ?>"><?php echo $builder->post_title; ?></a></span></h4>
		
		<?php echo $squareFootage; ?> Sq Ft // <?php echo $totalBeds; ?> Beds // <?php echo $totalBaths; ?> Baths<br />
		Priced from <?php echo $priceRange[0]; ?> $<?php echo $priceRange[1]; ?>'s
	</div>

</div>