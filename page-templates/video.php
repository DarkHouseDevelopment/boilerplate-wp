<?php
/*
Template Name: Video
*/
?>
<?php get_header(); ?>

<section role="main">
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<h1 class="page-title" style="color: <?php get_field( 'page_title_color' ); ?>"><?php the_field('video_title'); ?></h1>
		
			<section class="fullwidth-video">
				<div class="wrap">
					<div class="sm-12">
						<article class="feature">
							<?php
								$iframe = get_field( 'video_embed' );
								$autoplay = get_field('autoplay_video');
												
								// use preg_match to find iframe src
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
												
								// add extra params to iframe src
								$params = array(
								    'rel'    => 0,
								    'hd'        => 1
								);
								
								if($autoplay === true && empty($_GET['ty'])){
									$params['autoplay'] = 1;
								}
								
								$new_src = add_query_arg($params, $src);				
								$iframe = str_replace($src, $new_src, $iframe);
												
								// add extra attributes to iframe html
								$attributes = 'frameborder="0"';
								
								$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
								
								echo "<div class='video-wrapper'>$iframe</div>";
							?>
						</article>
					</div>
				</div>
			</section>
			
			<?php if(get_field( 'include_form' ) === true):
				
				echo "<a id='video_form_content' name='video_form_content'></a>";
				get_template_part( 'template-parts/page/content', 'lead-form' );
				
			endif; ?>

		<?php endwhile; ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>