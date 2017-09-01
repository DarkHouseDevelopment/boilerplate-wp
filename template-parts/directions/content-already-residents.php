<section class="already-residents">
	<div class="wrap">
		<div class="flex-stretch">
			<article class="featured-image sm-12 md-lg-6">
				<?php $featured_image = get_sub_field( 'featured_image' ); ?>
				<img src="<?php echo $featured_image['url']; ?>" />
			</article>
			
			<article class="resident-contacts sm-12 md-lg-6">
				<h3><?php the_sub_field( 'title' ); ?></h3>
				<?php
				if(have_rows( 'contacts' )):
					while(have_rows( 'contacts' )): the_row(); ?>
								
						<?php the_sub_field( 'content' ); ?>
						<ul class="contacts-list">
							<li><i class="fa fa-phone"></i> <a href="tel:<?php echo preg_replace("/[^0-9]/","", get_sub_field( 'phone' )); ?>"><?php the_sub_field( 'phone' ); ?></a></li>
							<li><i class="fa fa-envelope"></i> <a href="mailto:<?php the_sub_field( 'email' ); ?>"><?php the_sub_field( 'email' ); ?></a></li>
						</ul>
					
					<?php endwhile;
				endif; ?>
			</article>
		</div>
		<div class="sm-12"><div class="dotted-line"></div></div>
	</div>
</section>