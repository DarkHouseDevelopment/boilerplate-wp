<section id="nn_breadcrumbs">	
	<div class="wrap">
	<?php if(is_tax( 'nn_category' )): ?>
		<a href="/live/">Live Connected</a> / <a href="/live/near-norterra/">Around Union Park</a> / <?php echo single_term_title(); ?>
	<?php else: ?>
		<a href="/live/">Live Connected</a> / Around Union Park
	<?php endif; ?>
	</div>
</section>

<section id="amenities_overview" role="main">
	<div class="wrap">
		<div class="section-content">
			<?php 
				$description = is_tax( 'nn_category' ) ? term_description() : get_field( 'nn_page_overview', 'option' );
				echo "<p>$description</p>";
			?>
		</div>
	</div>
</section>