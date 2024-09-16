<?php 
include( get_template_directory() . '/template-parts/homes/script-qmi-variables.php' );

$smi_button_label = get_field( 'send_me_info_button_label', 'option' );
$smi_popup_intro = get_field( 'send_me_info_popup_intro', 'option' );
$smi_popup_form = get_field( 'send_me_info_popup_form', 'option' );
?>

<section id="model_details" class="content-section">
	<div class="wrap">
		<header>
			<h2>
				<?php the_title(); ?> - Quick Move-In
				<small>Available: <?php echo $available; ?></small>
				<small>Address: <?php echo $address; ?></small>
				<small>Model: <a href="<?php echo get_the_permalink( $floorplan->ID ); ?>"><?php echo $floorplan->post_title; ?></a> by <a href="<?php echo get_the_permalink( $builder->ID ); ?>"><?php echo $builder->post_title; ?></a></small>
				<?php if(!empty($site_plan)):
					echo "<small><br><a href='".$site_plan['url']."' target='_blank'>Download Builder Site Plan<i class='icon-right-big'></i></a></small>";
				endif; ?>
			</h2>
			<div class="actions">
				<?php echo $floorplan_file ? '<a class="btn-outline" href="'.$floorplan_file['url'].'">Download Floorplan</a>' : '' ?>
				<a class="btn sendinfo" href="javascript:void(0);"><?php echo $smi_button_label; ?></a>
			</div>
		</header>
		
		<article>
			<?php echo get_field( 'floorplan_description' ); ?>
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
							<?php echo $virtual_tour ? '<a class="virtual-tour btn-teal" href="'.$virtual_tour.'" target="_blank" rel="nofollow noopenner">Virtual Tour <i class="icon-angle-circled-right"></i></a>' : '' ?>
							<a href="javascript:void(0);" id="zoom_floorplan<?php echo $floorplanCount; ?>" class="zoom btn-teal"><i class="icon-zoom-in"></i> View Floorplan</a>
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
				<div class="value"><?php echo $price; ?></div>
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
			<h4><?php echo str_replace('[model]', get_the_title(), str_replace('[builder]', $builder->post_title, $smi_popup_intro)); ?></h4>
			<?php echo do_shortcode( $smi_popup_form ); ?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</div>