<?php
/*
Template Name: Calendar
*/
?>
<?php get_header(); ?>

<section role="main">
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article class="split_content row">
				<div class="wrap">
					<?php the_content(); ?>
				</div>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>