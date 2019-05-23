<?php
	$amenities_page = get_page_by_path( 'near-norterra' );
	$tax = 'amenity_type';
	$tax_id = get_queried_object()->term_id;
	
	$args = array(
		'post_type'					=> 'amenities',
		'posts_per_page'		=> -1,
		'tax_query'					=> array(
			array(
				'taxonomy'			=> $tax,
				'field'					=> 'term_id',
				'terms'					=> array( $tax_id ),
			),
		),
	);
	
	$amenity_query = new WP_Query( $args );
	
?>

<?php if ( $amenity_query->have_posts() ): ?>
	<div class="grid">
		<?php
			$terms = get_term_children( $tax_id, 'amenity_type' );
			if( !empty( $terms ) ): ?>
			<section id="amenities_tags">
				<div class="wrap">
					<?php $amenity_terms = get_the_terms( get_the_ID(), 'amenity_type' ); ?>
					<a href="javascript:void(0);" class="grid-filter-toggle"><span>Everything</span> <i class="fa fa-angle-down"></i></a>
					<div class="grid-filters">
						<ul class="filter-list">
							<li><a href="javascript:void(0);" class="grid-filter active" data-filter="*">Everything</a></li>
								<?php
									foreach($terms as $term):
										$t = get_term_by( 'id', $term, $tax );
										echo '<li><a href="javascript:void(0);" class="grid-filter" data-filter=".'.$t->slug.'">'.$t->name.'</a></li>';
									endforeach;
								?>
						</ul>
					</div>
				</div>
			</section>
		<?php endif; ?>
		
		<section id="amenities" class="content-section">
			<div class="wrap">
				<div id="amenity_types" class="grid-results">
					<?php
						
					?>
					<?php while ( $amenity_query->have_posts() ) : $amenity_query->the_post(); ?>
						<?php
							$terms_list = wp_get_post_terms($post->ID, 'amenity_type', array("fields" => "slugs"));
							?>
						<div class="amenity grid-block <?php echo implode(" ", $terms_list); ?>">
							<?php
								$image = get_field( 'amenity_image' );
								$amenity_link = get_field( 'amenity_link' );
							?>
							<?php if( $image ): ?>
								<a class="amenity-image" href="<?php echo $amenity_link; ?>" target="_blank" rel="nofollow noopenner" class="image" style="background: url(<?php echo $image['sizes']['floorplan-thumbnail']; ?>) center center no-repeat; background-size: cover;">
									<div class="hover"><div class="btn btn-white-outline">Learn More</div></div>
								</a>
							<?php endif; ?>
							<div class="amenity-details">
								<h4><a href="<?php echo $amenity_link; ?>" target="_blank"><?php echo get_the_title(); ?></a></h4>
							</div>
						
						</div>
								
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		
		<section id="other_amenities">
			<div class="wrap">
				<?php if ( have_rows( 'amenity_types', $amenities_page ) ): ?>
					<a href="javascript:void(0);" class="other-amenities-toggle"><span>Other Amenities</span> <i class="fa fa-angle-down"></i></a>
					<div class="amenities-nav">
						<ul class="amenities-list">
							<li><a href="/near-norterra/">All Amenities</a></li>
							<?php while ( have_rows( 'amenity_types', $amenities_page ) ): the_row();
								$amenity = get_sub_field( 'amenity_type' );
								if($amenity->term_id != $tax_id): ?>
									<li><a class="amenity" href="<?php echo '/near-norterra/'.$amenity->slug; ?>"><?php echo $amenity->name; ?></a></li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
<?php endif; ?>

<?php 
if(get_field( 'include_banner_cta', $amenities_page )):
	while(have_rows( 'banner_cta', $amenities_page )): the_row();
		get_template_part( 'template-parts/page/content', 'call-to-action' );
	endwhile;
endif;
?>