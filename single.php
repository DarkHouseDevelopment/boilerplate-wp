<?php get_header(); ?>

<section role="main">
	<div class="wrap">
		<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-title">
			<h1><?php the_title(); ?></h1>

			<p class="subhead">
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time><br />
				<span style="font-weight: bold">Related Categories: </span><?php the_category( ' | ', '', get_the_ID()); ?>
			</p>
		</header>
		<div class="post-content">
			<article>

				<?php if( have_rows('slider') ):
					echo '<div class="images">';
						echo '<div class="slider small">';
							while ( have_rows('slider') ) : the_row();
								$select_content = get_sub_field('select_slider_type');
								$slider_image = get_sub_field('slider_image');
								$video_id = get_sub_field('video_id');
							?>
								<div>
									<?php if($select_content == 'video') { ?>
										<div class="video-wrapper">
											<iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
										</div>
									<?php } else if($select_content == 'image') {?>
										<img src="<?php echo $slider_image['url']; ?>" />
									<?php } ?>
								</div>
							<?php endwhile;
						echo '</div>';
					echo '</div>';
				endif; ?>
				<?php the_content(); ?>

			</article>
			<?php get_sidebar(); ?>
		</div>

		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>