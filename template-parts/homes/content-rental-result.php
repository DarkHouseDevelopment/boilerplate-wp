<?php include( get_stylesheet_directory() . '/template-parts/homes/script-rental-variables.php' ); ?>

<div class="home-result">

	<?php if( $images ): ?>
		<a class="model-image" href="<?php the_permalink(); ?>" class="image" style="background: url(<?php echo $images[0]['sizes']['floorplan-thumbnail']; ?>) center center no-repeat; background-size: cover;">
			<?php echo $model ? "<div class='model'><i class='icon-home'></i> Model</div>" : ""; ?>
			<div class="hover"><div class="btn btn-white-outline">View Home Details</div></div>
		</a>
	<?php endif; ?>

	<div class="model-details">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br /><span>// <a href="<?php echo get_the_permalink($builder->ID); ?>"><?php echo $builder->post_title; ?></a></span></h4>
		
		<?php echo $squareFootage; ?> Sq Ft // <?php echo $totalBeds; ?> Beds // <?php echo $totalBaths; ?> Baths<br />
		<?php
			if( !empty( $startingPrice ) && empty( $maxPrice ) ):
				echo 'Price from $'.number_format( $startingPrice ).'<span>/mo</span>'; 
			elseif( !empty( $startingPrice ) && !empty( $maxPrice ) ):
				echo 'Priced from $'.number_format( $startingPrice ).' - $'.number_format( $maxPrice ).'<span>/mo</span>'; 
			else:
				echo 'Price TDB';
			endif; 
		?>
	</div>

</div>