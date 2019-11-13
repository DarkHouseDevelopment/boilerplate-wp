<?php
	$tax = 'nn_category';
	
	if(is_tax( $tax )):
		$tax_id = get_queried_object()->term_id;
		$tax_query = array(
			array(
				'taxonomy'	=> $tax,
				'field'		=> 'term_id',
				'terms'		=> array( $tax_id ),
			)
		);
	else:
		$tax_id = 0;
		$tax_query = array();
	endif;
	
	$args = array(
		'post_type'			=> 'near-norterra',
		'posts_per_page'	=> -1,
		'tax_query'			=> $tax_query
	);
	
	$amenity_query = new WP_Query( $args );
	
?>

<?php if ( $amenity_query->have_posts() ): ?>
	<div class="grid">
		<?php
			$terms = get_term_children( $tax_id, $tax );
			if( !empty( $terms ) ): ?>
			<section id="amenities_tags">
				<div class="wrap">
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
						<?php $terms_list = wp_get_post_terms($post->ID, $tax, array("fields" => "slugs")); ?>
						<div class="amenity grid-block <?php echo implode(" ", $terms_list); ?>">
							<?php
								$amenity_type = get_field( 'amenity_type' );
								
								if($amenity_type == 'page'):
									$amenity_hero = get_field( 'amenity_hero' );
									$image = $amenity_hero['hero_image'];
									$amenity_link = get_the_permalink();
									$amenity_target = 'target="_self"';
								else:
									$image = get_field( 'amenity_image' );
									$amenity_link = get_field( 'amenity_link' );
									$amenity_target = 'target="_blank" rel="nofollow noopenner"';
								endif;
							?>
							<?php if( $image ): ?>
								<a class="amenity-image" href="<?php echo $amenity_link; ?>" <?php echo $amenity_target; ?> class="image" style="background: url(<?php echo $image['sizes']['large']; ?>) center center no-repeat; background-size: cover;">
									<div class="hover"><div class="btn btn-white-outline">Learn More</div></div>
								</a>
							<?php endif; ?>
							<div class="amenity-details">
								<h4><a href="<?php echo $amenity_link; ?>" target="_blank" class="title"><?php echo get_the_title(); ?></a></h4>
							</div>
						
						</div>
								
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		
		<section id="other_amenities">
			<div class="wrap">
				<?php 
				$nn_categories = get_terms( array(
					'taxonomy' => 'nn_category',
					'hide_empty' => true,
					'parent' => 0
				) );
				
				if ( !empty( $nn_categories ) ): ?>
					<a href="javascript:void(0);" class="other-amenities-toggle"><span>Other Amenities</span> <i class="fa fa-angle-down"></i></a>
					<div class="amenities-nav">
						<ul class="amenities-list">
							<?php /*<li><a href="<?php echo get_post_type_archive_link( 'near-norterra' ); ?>">All Amenities</a></li>*/ ?>
							<?php foreach($nn_categories as $category): 
								$category_class = $category->term_id != $tax_id ? "grid-filter" : "active grid-filter";
								echo '<li><a href="'.get_term_link($category->term_id, 'nn_category').'" class="'.$category_class.'" data-filter=".'.$category->slug.'">'.$category->name.'</a></li>';
							endforeach;	?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
<?php endif; ?>

<?php 
if(get_field( 'nn_include_banner_cta', 'option' )):
	while(have_rows( 'nn_banner_cta', 'option' )): the_row();
		get_template_part( 'template-parts/page/content', 'call-to-action' );
	endwhile;
endif;
?>