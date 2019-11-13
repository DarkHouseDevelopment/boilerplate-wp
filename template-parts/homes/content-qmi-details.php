<?php include( get_template_directory() . '/template-parts/homes/script-qmi-variables.php' ); ?>

<section id="model_details" class="content-section">
	<div class="wrap">
		<header>
			<h2>
				<?php the_title(); ?> - Quick Move-In
				<small>Available: <?php echo $available; ?></small>
				<small>Address: <?php echo $address; ?></small>
				<small>Model: <a href="<?php echo get_the_permalink( $floorplan->ID ); ?>"><?php echo $floorplan->post_title; ?></a> by <a href="<?php echo get_the_permalink( $builder->ID ); ?>"><?php echo $builder->post_title; ?></a></small>
			</h2>
			<div class="actions">
				<?php echo $floorplan_file ? '<a class="btn-outline" href="'.$floorplan_file['url'].'">Download Floorplan</a>' : '' ?>
				<a class="btn sendinfo" href="javascript:void(0);">Send Me Info</a>
			</div>
		</header>
		
		<article>
			<?php the_field( 'floorplan_description' ); ?>
		</article>
		
		<div class="model-images">
			<div class="slider-container">
				<div class="slider">
					<?php if( $images ): 
						$image_index = 0;
				        foreach( $images as $image ): ?>
				            <div class="slide" data-index="<?php echo $image_index; ?>" style="background: url(<?php echo $image['sizes']['gallery']; ?>) center center no-repeat; background-size: cover;">
					            <?php if($image['caption']): ?>
						            <div class="caption"><?php echo $image['caption']; ?></div>
						        <?php endif; ?>
				            	<a class="slider-next" href="javascript:void(0);"><i class="icon-angle-circled-right"></i></a>
				            </div>
				        <?php $image_index++;
					    endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="floorplans">
				<?php
				$floorplanCount = 1;
		
				if($floorplan_images):
					foreach( $floorplan_images as $floorplan ): ?>
						<div class="floorplan">
							<img src="<?php echo $floorplan['url']; ?>" alt="<?php the_title(); ?>" />
							<a href="javascript:void(0);" id="zoom_floorplan<?php echo $floorplanCount; ?>" class="zoom"><i class="icon-zoom-in"></i></a>
						</div>
		
						<div id="floorplan_overlay<?php echo $floorplanCount; ?>" class="overlay">
							<div class="wrap">
								<div class="overlay-content">
									<div class="actions">
										<a class="print" href="/print-floorplan/?f=<?php echo $floorplan['url']; ?>" target="_blank">Print</a>
										&nbsp;&nbsp;|&nbsp;&nbsp;
										<a class="close_floorplan" href="javascript:void(0);">Close</a>
									</div>
									<img src="<?php echo $floorplan['url']; ?>" alt="<?php the_title(); ?>" />
								</div>
							</div>
						</div>
						<?php $floorplanCount++; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		
		<ul class="model-numbers">
			<li>
				<div class="label">Price</div>
				<div class="value">$<?php echo number_format($price); ?></div>
			</li>
			<li>
				<div class="label">Approx. Sq Ft.</div>
				<div class="value"><?php echo $squareFootage; ?></div>
			</li>
			<li>
				<div class="label">Beds</div>
				<div class="value"><?php echo $totalBeds; ?></div>
			</li>
			<li>
				<div class="label">Baths</div>
				<div class="value"><?php echo $totalBaths; ?></div>
			</li>
			<li>
				<div class="label">Car Garage</div>
				<div class="value"><?php echo $totalCarGarage; ?></div>
			</li>
			<li>
				<div class="label">Stories</div>
				<div class="value"><?php echo $totalStories; ?></div>
			</li>
		</ul>
	</div>
</section>

<div id="send_info_overlay" data-builder="<?php echo $builder->post_title; ?>" data-builderemail="<?php echo $builder_email; ?>" data-model="<?php the_title(); ?>">
	<div class="overlay-bg"></div>
	<div class="overlay-content">
		<article>
			<h4>Send me info about <?php the_title(); ?> by <?php echo $builder->post_title; ?></h4>
			<?php echo do_shortcode( '[contact-form-7 id="546" title="Send Me Info"]' ); ?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</div>