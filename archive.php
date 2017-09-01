<?php

get_header(); 

if ( have_posts() ): ?>
		
	<section role='main'>
		
		<?php if ( is_day() ) : ?>
		<h1 class='page-title'>Archive: <?php echo  get_the_date( 'D F Y' ); ?></h1>
		<?php elseif ( is_month() ) : ?>
		<h1 class='page-title'>Archive: <?php echo  get_the_date( 'F Y' ); ?></h1>
		<?php elseif ( is_year() ) : ?>
		<h1 class='page-title'>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>
		<?php elseif ( is_category() ) : ?>
		<h1 class='page-title <?php echo is_category('victory-news') ? "victory" : "script"; ?>'><?php single_cat_title(); ?></h1>
		<?php else : ?>
		<h1 class='page-title'>Archive</h1>
		<?php endif; ?>
		
		<div class="wrap">

			<div class="recent-news row section">
				<div class="recent-posts page">
					<?php 
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/news/content', 'post-result' );
					endwhile;
							
					if(function_exists('wp_simple_pagination')):
						echo '<footer class="pagination">';
						wp_simple_pagination();
						echo '</footer>';
					endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div><!-- end news -->
		</div>
	</section>

<?php 

endif; 
	
get_footer();