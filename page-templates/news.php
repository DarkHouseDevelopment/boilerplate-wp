<?php
/*
Template Name: News
*/

get_header(); 

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); ?>
		
		<section role='main'>
			<h1 class='page-title script'><?php the_title(); ?></h1>
			<div class="wrap">

				<div class="recent-news row section">
					<div class="recent-posts page md-lg-8 lg-9">
						<?php	
						$the_query = new WP_Query( 'posts_per_page=5' );

						if ( $the_query->have_posts() ) : 
							$postCount = 5;
							$currentPost = 1;
							
							while ( $the_query->have_posts() ) : $the_query->the_post();

					  			if($currentPost <= $postCount):
				  					if(is_sticky($post->ID)){ $postCount - 1; }; 
				  					
				  					get_template_part( 'template-parts/news/content', 'post-result' );

				  					$currentPost++;
				  				endif;

							endwhile;
							
							echo '<footer class="pagination"><a href="/category/news/" class="btn">See All News</a></footer>';

						else:
							echo "<p>" . _e( 'Sorry, no posts matched your criteria.' ) . "</p>";
						endif;
						wp_reset_postdata(); 
						?>
					</div>
					<?php get_sidebar(); ?>
				</div><!-- end news -->
			</div>
		</section>
		
	<?php endwhile;
endif; 
	
get_footer();