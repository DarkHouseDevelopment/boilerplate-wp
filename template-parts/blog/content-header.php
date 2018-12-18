<?php 
	$featured_image = get_field( 'featured_image' );
?>
<section id="post_header" class="content-section <?php echo $featured_image ? "with-featured-image" : ""; ?>">
	<?php if($featured_image): ?>
		<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-yellow.svg) center center repeat; background-size: 16rem;"></div>
		<div class='featured-image'><img src="<?php echo $featured_image['sizes']['blog-featured']; ?>" /></div>
	<?php endif; ?>
	<header>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'm/d/y' ); ?></time>
		<h2><?php the_title(); ?></h2>
	</header>
</section>
