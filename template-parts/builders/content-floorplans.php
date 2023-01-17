<?php
	$neighborhoods = get_posts( array( 'post_type' => 'builders', 'numberposts' => -1, 'post_parent' => $post->ID, 'orderby' => 'title', 'order' => 'ASC' ) );

	if( empty( $neighborhoods ) ): ?>
	<section id="home_results">
		<div class="wrap">
			<header>
				<h3>View Floorplans</h3>
				<?php 
				if(get_field( 'neighborhood_availability' )):
					echo "<div class='neighborhood-availability'>";
					echo "<h4 class='".$post->post_name."'>".get_field( 'neighborhood_availability' )."</h4>";
					echo "</div>";
				endif;
				?>
			</header>
			<article id="home_results_list">
				
				<?php
					if( $post->post_parent ):
						$builder_query = array(
							'key' => 'builder',
							'value' => $post->post_parent,
							'compare' => '='
						);
						$neighborhood_query = array(
							'key' => 'neighborhood',
							'value' => $post->ID,
							'compare' => '='
						);
					else:
						$builder_query = array(
							'key' => 'builder',
							'value' => $post->ID,
							'compare' => '='
						);
						$neighborhood_query = array();
					endif;
				
					$args = array(
						'posts_per_page' => -1,
						'post_status' => 'publish',
						'post_type' => array('homes', 'rentals'),
						'meta_query' => array(
							'relation' => 'AND',
							$builder_query,
							$neighborhood_query
						),
						'meta_key' => 'square_footage',
						'orderby'=> 'meta_value_num',
						'order' => 'ASC'
					);
									
					$builder_query = new WP_Query($args);
	
					if ( $builder_query->have_posts() ) :
	
						while ( $builder_query->have_posts() ) : $builder_query->the_post();
						
							if($post->post_type == "homes"):
								get_template_part( 'template-parts/homes/content', 'home-result' );
							elseif($post->post_type == "rentals"):
								get_template_part( 'template-parts/homes/content', 'rental-result' );
							endif;
	
						endwhile;
	
					else: ?>
					<div class="no-results">
						<header>
							<h4>Sorry, this builder does not currently have any floorplans available to view.</h4>
						</header>
	
						<div class="textarea">
							<p>Please check back soon, as we are always adding new homes as soon as they are available.</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
						</div>
					</div>
				<?php 
					endif; 
					wp_reset_query();
				?>
			</article>
		</div>
	</section>
	<?php else: ?> 
	<section id="home_results">
		<div class="wrap">
			<header>
				<h3>Explore <?php the_title(); ?></h3>
			</header> 
			<article id="home_results_list" class="neighborhoods results-<?php echo count($neighborhoods); ?>">
				<?php foreach( $neighborhoods as $neighborhood ):
					
					get_template_part( 'template-parts/builders/content', 'neighborhood-result', array( 'neighborhood' => $neighborhood ) );
					
				endforeach; ?>
			</article>
		</div>
	</section>
	<?php endif; ?>