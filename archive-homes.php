<?php //header('Location: /homes-in-verrado/'); ?>

<?php get_header(); ?>

<section id="home_results" role="main">
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/verrado-2.0/assets/inc/find-a-home-elements.php'; ?>	
	<header id="header" class="freeform" style="background: url('<?php echo $bg_image['url']; ?>') center no-repeat; background-size:cover;">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/verrado-2.0/assets/inc/header-home-search.php'; ?>		
		<div class="trigger indicator"><img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-trigger-home.png" /></div>
	</header>
	
	<div class="section listing">
		<div class="wrap">		
			<?php
				$query_args = array(
					'post_type' => 'homes',
					'posts_per_page' => 20,
					'post_status' => 'publish',
					'orderby'=> 'title',
					'order'   => 'ASC'
				);
				$homes_query = new WP_Query($query_args);
	
				if ( $homes_query->have_posts() ):
					while ( $homes_query->have_posts() ) : $homes_query->the_post();
						include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/verrado-2.0/assets/inc/home-search-display.php';
				endwhile;
			endif; ?>
		</div>
	</div>	
</section>
<?php get_footer(); ?>