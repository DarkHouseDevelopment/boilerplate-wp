<section class="business-info">
	<div class="wrap">
		<div class="flex-stretch <?php echo get_sub_field( 'layout' ) == "image-right" ? "flex-reverse" : ""; ?>">
			<?php
			$featured_image = get_sub_field( 'featured_image' ); 
			$row_count++; 
			?>
					
			<div class="sm-12 md-lg-6">
				<div class="featured-image"><img src="<?php echo $featured_image['url']; ?>" /></div>
			</div>
			
			<div class="sm-12 md-lg-6">
				<article class="<?php echo $row_count % 2 === 0 ? "victory" : "verrado"; ?>">
					<h2><?php the_sub_field( 'section_title' ); ?></h2>
					<?php the_sub_field( 'section_content' ); ?>
					<ul class="contacts-list">
						<li><i class="fa fa-map-marker"></i> <?php the_sub_field( 'address' ); ?></li>
						<li><i class="fa fa-phone"></i> <?php the_sub_field( 'phone' ); ?></li>
						<li><i class="fa fa-globe"></i> <a href="<?php the_sub_field( 'website' ); ?>" target="_blank">Website</a></li>
					</ul>
				</article>
			</div>
		</div>
		<div class="sm-12"><div class="dotted-line"></div></div>
	</div>
</section>