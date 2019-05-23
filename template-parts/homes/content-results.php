<section id="home_results">
	<div class="wrap">
		<header>
			<h3>Search Results</h3>
		</header>
		<article id="home_results_list">
			
			<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				echo "<!-- beds_min = $beds_min -->";

				$args = array(
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'post_type' => 'homes',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'bedrooms',
							'value' => $beds_min,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'bathrooms',
							'value' => $baths_min,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'square_footage',
							'value' => $sqft_min,
							'compare' => '>='
						),
						$quick_move_query,
						$builder_query,
						array(
							'key' => 'starting_price',
							'value' => $price_min,
							'compare' => '>=',
							'type' => 'NUMERIC'
						),
						array(
							'key' => 'starting_price',
							'value' => $price_max,
							'compare' => '<=',
							'type' => 'NUMERIC'
						),
					),
					'meta_key' => 'square_footage',
					'orderby'=> 'meta_value_num',
					'order' => 'ASC',
					'paged' => $paged
				);
				
				$args_allresults = $args;
				$args_allresults['posts_per_page'] = -1;

				$resultCount = 0;
				
				$loop = new WP_Query($args);
				$allresults = new WP_Query($args_allresults);
				$_SESSION['wp_query'] = $allresults;

				//echo '<!-- ';
				//print_r($loop);
				//echo ' -->';

				$temp_query = $wp_query;
				$wp_query = NULL;
				$wp_query = $loop;

				if ( have_posts() ) :

					while ( have_posts() ) : the_post();
					
						$bedrooms_acf = get_field( 'bedrooms' );
						echo "<!-- bedrooms = "; print_r($bedrooms_acf); echo " -->";
						$bedroom_pm = unserialize(get_post_meta( 'bedrooms', true ));
						echo "<!-- bedrooms_pm = "; print_r($bedrooms_pm); echo " -->";
					
						get_template_part( 'template-parts/homes/content', 'home-result' );

					endwhile;

					if(function_exists('wp_simple_pagination')) {
						echo '<footer class="pagination">';
						wp_simple_pagination();
						echo '</footer>';
					};

					$wp_query = NULL;
					$wp_query = $temp_query;
				else: ?>
					<header>
						<h4>Sorry, no homes matched your search criteria.</h4>
					</header>

					<div class="textarea">
						<p>Please try expanding your search to see more possible results.</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
			<?php endif; ?>
		</article>
	</div>
</section>