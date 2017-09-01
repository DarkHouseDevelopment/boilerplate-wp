<section class="default-content">
	<div class="wrap">
		<div class="sm-12">
			<article>			
				<div class="content">
					<div class="recent-news section">
						<div class="recent-posts page">
							<h2>Verrado News</h2>
							<?php 
							$args = array(
								'posts_per_page' => 3,
								'category_name' => 'verrado-residents'
							);
							$news_query = new WP_Query($args);
							
							if($news_query->have_posts()):
								while ( $news_query->have_posts() ) : $news_query->the_post(); 
									get_template_part( 'template-parts/news/content', 'post-result' );
								endwhile;
										
								echo "<footer class='pagination'><a href='/category/verrado-residents/' class='btn'>See All News</a></footer>";
							endif;
							?>
						</div>
						<aside class="sidebar" role="complementary">
							<?php dynamic_sidebar('verrado-resident-sidebar-calendar'); ?>
							<?php dynamic_sidebar('verrado-resident-sidebar-social'); ?>
						</aside>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>