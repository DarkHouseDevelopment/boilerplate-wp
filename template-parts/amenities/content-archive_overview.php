<section id="nn_breadcrumbs">	
	<div class="wrap">
		<a href="/live/">Live Connected</a> / Resident Amenities
	</div>
</section>

<section id="amenities_overview" role="main">
	<div class="wrap">
		<div class="section-content">
			<?php 
				$description = get_field( 'ra_page_overview', 'option' );
				echo "<p>$description</p>";
			?>
		</div>
	</div>
</section>