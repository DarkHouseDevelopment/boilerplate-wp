<article id="home_results_list">
			
	<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'post_type' => 'qmi',
			'meta_key' => 'square_feet',
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

		//echo '<pre>';
		//print_r($loop);
		//echo '</pre>';

		$temp_query = $wp_query;
		$wp_query = NULL;
		$wp_query = $loop;

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();
			
				get_template_part( 'template-parts/homes/content', 'home-result' );

			endwhile;

			if(function_exists('wp_simple_pagination')) {
				echo '<footer class="pagination">';
				wp_simple_pagination();
				echo '</footer>';
			};

			$wp_query = NULL;
			$wp_query = $temp_query;
			wp_reset_query();
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