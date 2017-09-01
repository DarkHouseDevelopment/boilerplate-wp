<?php session_start(); ?>
<?php get_header(); ?>
<section id="home_details" role="main">

	<?php get_template_part( 'template-parts/homes/content', 'header-home-search' ); ?>

	<div class="section details">
		<div class="wrap">			
			<?php if ( have_posts() ):
				echo "<div class='home-details'>";
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/homes/content', 'home-details' );
					
				endwhile;
				echo "</div>";
				
				$back_link = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "/homes-in-verado/";
				echo "<nav id='back_nav'><a href='$back_link'><i class='fa fa-arrow-left'></i> Back to Results</a></nav>";
			endif; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/homes/content', 'jump-nav' ); ?>

<?php get_footer(); ?>