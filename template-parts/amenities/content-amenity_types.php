<?php	if ( have_rows( 'amenity_types' ) ): ?>
	<section id="amenities" class="content-section">
		<div class="wrap">
			<div id="amenity_types" class="grid">
				<?php while ( have_rows( 'amenity_types' ) ): the_row(); ?>
				
					<div class="amenity">
						<?php
							$amenity = get_sub_field( 'amenity_type' );
							$image = get_sub_field( 'amenity_image' );
						?>
						<?php if( $image ): ?>
							<a class="amenity-image" href="<?php echo '/near-norterra/'.$amenity->slug; ?>" class="image" style="background: url(<?php echo $image['sizes']['floorplan-thumbnail']; ?>) center center no-repeat; background-size: cover;">
								<div class="hover"><div class="btn btn-white-outline"><?php echo $amenity->name; ?><br>Near Norterra</div></div>
							</a>
						<?php endif; ?>
						<div class="amenity-details">
							<h4><a href="<?php echo '/near-norterra/'.$amenity->slug; ?>"><?php echo $amenity->name; ?></a></h4>
						</div>
					
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>