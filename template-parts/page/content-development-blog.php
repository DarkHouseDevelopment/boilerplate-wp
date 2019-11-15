<section class="development-blog content-section">
	<header>
		<div class="wrap">
			<?php if(get_sub_field( 'section_title' )):
				echo "<h3>".get_sub_field( 'section_title' )."</h3>";
			endif; ?>
		</div>
	</header>
	<div class="blog-results">
		<div class="wrap">
			<?php
				$args = array(
					'post_type'				=> 'post',
					'posts_per_page'	=> 6,
					'category_name' 	=> 'development-updates'
				);
				$blog_query = new WP_Query( $args );
				if ( $blog_query->have_posts() ): 
					while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
						<a class="blog-result" href="<?php esc_url( the_permalink() ); ?>">
							<div class="blog-image" style="background: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url( $post, 'blog-thumbnail' ) : $fallback_image['sizes']['blog-thumbnail']; ?>) center center no-repeat / cover">
								<div class="hover"><div class="btn btn-white-outline">View Blog</div></div>
							</div>
							<h4><?php the_title(); ?></h4>
							<footer><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'm/d/y' ); ?></time></footer>
						</a>
					<?php endwhile;
					echo "<div class='placeholder-blog'></div><div class='placeholder-blog'></div>";
				else: 
					echo "<h2>No posts to display</h2>";
				endif;
				wp_reset_query();
			?>
		</div>
	</div>
</section>