<?php
$nn_categories = get_terms( array(
	'taxonomy' => 'nn_category',
	'hide_empty' => true,
	'parent' => 0
) );

if ( !empty( $nn_categories ) ): ?>
	<section id="amenities" class="content-section">
		<div class="wrap">
			<div id="amenity_types" class="grid">
				<?php foreach($nn_categories as $category): ?>				
					<div class="amenity grid-block">
						<?php if( get_field( 'hero_image', $category ) ): ?>
							<?php $image = get_field( 'hero_image', $category ); ?>
							<a class="amenity-image" href="<?php echo get_term_link($category->term_id, 'nn_category'); ?>" class="image" style="background: url(<?php echo $image['sizes']['floorplan-thumbnail']; ?>) center center no-repeat; background-size: cover;">
								<div class="hover"><div class="btn btn-white-outline"><?php echo $category->name; ?><br>Around Union Park</div></div>
							</a>
						<?php endif; ?>
						<div class="amenity-details">
							<h4><a href="<?php echo get_term_link($category->term_id, 'nn_category'); ?>"><?php echo $category->name; ?></a></h4>
						</div>
					
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>