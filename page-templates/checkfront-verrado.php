<?php
/*
Template Name: CheckFront - Verrado
*/
	
get_header(); ?>

<section role="main">
	<div class="wrap">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1 class='page-title' style='color: <?php the_field( 'page_title_color' ); ?>'><?php the_title(); ?></h1>
				
				<article class="row">
						<?php the_content(); ?>
						<!-- CHECKFRONT BOOKING PLUGIN v23-->
							<script type="text/javascript" src="//verrado.checkfront.com/lib/interface--30.js"></script>
							<div id="CHECKFRONT_WIDGET_01"><p id="CHECKFRONT_LOADER" style="background: url('//verrado.checkfront.com/images/loader.gif') left center no-repeat; padding: 5px 5px 5px 20px">Searching Availability...</p></div>
							<script>
							new CHECKFRONT.Widget ({
							host: 'verrado.checkfront.com',
							target: 'CHECKFRONT_WIDGET_01',
							style: 'color: 6e6259; font-family: Helvetica,Arial,sans-serif',
							provider: 'droplet'
							}).render();
							</script>
							<noscript><a href="https://verrado.checkfront.com/reserve/" style="font-size: 16px">Continue to Secure Booking System &raquo;</a></noscript>
						<!-- END CHECKFRONT BOOKING PLUGIN v23-->
				</article>
				
			<?php endwhile; ?>
		<?php endif; ?>	
	</div>
</section>

<?php get_footer(); ?>