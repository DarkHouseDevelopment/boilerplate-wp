<?php	
	$args = array(
		'post_type'			=> 'amenities',
		'posts_per_page'	=> -1,
		'meta_key'			=> 'amenity_order',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC'
	);
	
	$amenity_query = new WP_Query( $args );
?>

<?php if ( $amenity_query->have_posts() ): ?>
	<div class="grid">		
		<section id="amenities" class="content-section">
			<div class="wrap">
				<div id="amenity_types" class="amenities-grid">
					<?php while ( $amenity_query->have_posts() ) : $amenity_query->the_post(); ?>
						<div class="amenity grid-block">
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
	</div>
<?php endif; ?>

<?php 
if(get_field( 'ra_include_banner_cta', 'option' )):
	while(have_rows( 'ra_banner_cta', 'option' )): the_row();
		get_template_part( 'template-parts/page/content', 'call-to-action' );
	endwhile;
endif;
?>