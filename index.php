<?php 

get_header();

get_template_part( 'template-parts/blog/content', 'blog-hero' ); 

$blog_page = get_option( 'page_for_posts' );
$fallback_image = get_field( 'blog_fallback_image', $blog_page );

echo "<section role='main'>";
echo "<header><div class='wrap'>";
echo "<h3 class='blog-title'>".get_field( 'blog_title', $blog_page )."</h3>";
echo "</div></header>";

if ( have_posts() ): 
	echo "<section class='content-section blog-results'>";
	echo "<div class='wrap'>";
	while ( have_posts() ) : the_post(); ?>
			<a class="blog-result" href="<?php esc_url( the_permalink() ); ?>">
				<div class="blog-image" style="background: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url( $post, 'blog-thumbnail' ) : $fallback_image['sizes']['blog-thumbnail']; ?>) center center no-repeat / cover">
					<?php //echo has_post_thumbnail() ? get_the_post_thumbnail( $post, 'blog-thumbnail' ) : "<img src='{$fallback_image['sizes']['blog-thumbnail']}' />"; ?>
					<div class="hover"><div class="btn btn-white-outline">View Blog</div></div>
				</div>
				
				<h4><?php the_title(); ?></h4>
				
				<footer><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'm/d/y' ); ?></time></footer>
			</a>
	<?php endwhile;
	echo "<div class='placeholder-blog'></div><div class='placeholder-blog'></div>";
	echo "</div>";
	echo "</section>";
else: 
	echo "<h2>No posts to display</h2>";
endif; 

echo "</section>";

get_footer();