<div class="wrap">
	<div class="builder-header">
		<?php
			$builder_logo = get_field('builder_logo');
			$builder_featured_img = get_field( 'featured_image' )	
		?>
		<aside class="builder-logo">
			<img src="<?php echo $builder_logo['url']; ?>" alt="<?php the_title(); ?>" />
		</aside>
		<div class="builder-image">
			<img src="<?php echo $builder_featured_img['url']; ?>" alt="" />
		</div>
	</div>
	
	<article class="builder-intro">
		<?php the_field('content'); ?>
	</article>
	
	<section id="home_results" class="builder-results">
		<?php
			$args = array(
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'post_type' => 'homes',
				'meta_key' => 'starting_price',
				'orderby'=> 'meta_value_num title',
				'order' => 'ASC',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'builder',
						'value' => $post->ID,
						'compare' => '='
					)
				)
			);
	
			$resultCount = 0;
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) :
	
				while ( $loop->have_posts() ) : $loop->the_post();
	
					get_template_part( 'template-parts/homes/content', 'home-result' );
	
				endwhile;
			else: ?>
			<article>
				<header>
					<h2>Sorry, this builder does not currently have any homes available in Verrado or Victory.</h2>
				</header>
	
				<div class="textarea">
					<p>Please try using our <a href="/find-a-home/">Find A Home</a> search to see more possible results.</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>
			</article>
		<?php endif; ?>
		</div>
	</section>
</div>