<section class="visit-verrado">
	<div class="wrap">
		<div class="flex-stretch">
		<?php
		if(have_rows( 'visitor_centers' )):
			$row_count = 0;
			while(have_rows( 'visitor_centers' )): the_row(); 
				$featured_image = get_sub_field( 'featured_image' ); 
				$row_count++; ?>
						
				<div class="sm-12 md-lg-6">
					<article class="<?php echo $row_count % 2 === 0 ? "victory" : "verrado"; ?>">
						<h2><?php the_sub_field( 'title' ); ?></h2>
						<div class="featured-image"><img src="<?php echo $featured_image['url']; ?>" /></div>
						<h3><?php the_sub_field( 'subtitle' ); ?></h3>
						<?php the_sub_field( 'description' ); ?>
						<ul class="contacts-list">
							<li><i class="fa fa-map-marker"></i> <a href="https://www.google.com/maps/place/<?php echo urlencode( get_sub_field( 'address' ) ); ?>/" target="_blank" rel="noopener noreferrer"><?php the_sub_field( 'address' ); ?></a></li>
							<li><i class="fa fa-phone"></i> <a href="tel:<?php echo preg_replace("/[^0-9]/","", get_sub_field( 'phone' )); ?>"><?php the_sub_field( 'phone' ); ?></a></li>
							<li><i class="fa fa-envelope"></i> <a href="mailto:<?php the_sub_field( 'email' ); ?>"><?php the_sub_field( 'email' ); ?></a></li>
						</ul>
					</article>
				</div>
			
			<?php endwhile;
		endif; ?>
		</div>
	</div>
</section>