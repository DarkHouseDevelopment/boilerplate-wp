<?php
	global $post, $post_parent;
?>
<section class="showcase-content">
	<div class="wrap">
		<div class="sm-12">
			<article>
				<h1 class='page-title'><?php the_title(); ?></h1>
			</article>
		</div>
	</div>
</section>

<?php if(get_field( 'use_new_showcase_template' )): ?>

	<section class="showcase-content">
		<div class="wrap">
			<div class="sm-12">
				<article>
					<div class="featured-img">
						<div class="slider small">
							<?php
							$featured_images = get_field( 'featured_images' );
							if( $featured_images ):
						     	foreach( $featured_images as $image ): ?>
						            <div><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
						        <?php endforeach;
							endif; ?>
						</div>
					</div>
					
					<div class="section-content">
						<h2><?php the_field( 'model_name' ); ?></h2>
						<p>by <?php echo get_the_title( $post_parent ); ?></p>
						
						<?php
						if(get_field( 'sales_office' ) || get_field( 'sales_contact_name' )):
							echo "<p class='contact-info'>";
							
							if(get_field( 'sales_office' )):
								$sales_office = get_field( 'sales_office' );
								echo "<strong>Sales Office:</strong> <a href='tel:$sales_office'>$sales_office</a><br />";
							endif;
							
							if(get_field( 'sales_contact_title' )):
								echo "<strong>".get_field( 'sales_contact_title' ).":</strong> ";
							endif;
							if(get_field( 'sales_contact_name' )):
								echo get_field( 'sales_contact_name' );
							endif;
							
							echo "</p>";
						endif;
						?>
						
						<?php the_field( 'home_description' ); ?>
						
						<?php if(get_field('price_format') === 'exact'): ?>
							<h3><?php echo get_field( 'previous_price' ) ? 'WAS: $'.number_format(get_field( 'previous_price' )).' - ' : ''; ?><span>NOW: $<?php echo number_format(get_field( 'current_price' )); ?></span></h3>
						<?php else: ?>
							<?php $priceRange = explode("-", get_field('price_range')); ?>
							<h3><span>NOW: <?php echo ucfirst($priceRange[0]); ?> $<?php echo $priceRange[1]; ?>,000s</span></h3>
						<?php endif; ?>
						
						<?php if(have_rows( 'features_list' )): ?>
							<ul class="features-list">
								<?php while(have_rows( 'features_list' )): the_row(); ?>
									<li><?php the_sub_field( 'feature' ); ?></li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						
						<?php while(have_rows( 'primary_button' )): the_row();
							if(get_sub_field( 'button_text' ) && get_sub_field( 'button_link' )):
								echo "<a href='".get_sub_field( 'button_link' )."' class='btn' "; echo get_sub_field( 'new_window' ) ? "target='_blank' rel='noopener noreferrer'" : ""; echo ">".get_sub_field( 'button_text' )."</a>";
							endif;
						endwhile; ?>
						
						<?php while(have_rows( 'secondary_button' )): the_row();
							if(get_sub_field( 'button_text' ) && get_sub_field( 'button_link' )):
								echo "<a href='".get_sub_field( 'button_link' )."' class='btn btn-outline' "; echo get_sub_field( 'new_window' ) ? "target='_blank' rel='noopener noreferrer'" : ""; echo ">".get_sub_field( 'button_text' )."</a>";
							endif;
						endwhile; ?>
					</div>
				</article>
			</div>
		</div>
	</section>
	
	<section class="showcase-content">
		<div class="wrap">
			<div class="sm-12">
				<article>
					<div class="section-content">
						<?php the_field( 'additional_details' ); ?>
					</div>
					
					<div class="floorplans">
						<?php
						$floorplanImages = get_field('floorplan_images');
						$floorplanCount = 1;
				
						if($floorplanImages):
							echo "<h3>Floorplan:</h3>";
							foreach( $floorplanImages as $floorplan ): ?>
								<div class="floorplan">
									<a href="javascript:void(0);" id="zoom_floorplan<?php echo $floorplanCount; ?>" class="zoom"><i class="fa fa-search-plus"></i></a>
									<img src="<?php echo $floorplan[url]; ?>" alt="<?php the_title(); ?>" />
								</div>
				
								<div id="floorplan_overlay<?php echo $floorplanCount; ?>" class="overlay">
									<div class="wrap">
										<div class="actions">
											<a class="print" href="/print-floorplan/?f=<?php echo $floorplan[url]; ?>" target="_blank">Print</a>
											&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="close_floorplan" href="javascript:void(0);">Close</a>
										</div>
										<img src="<?php echo $floorplan[url]; ?>" alt="<?php the_title(); ?>" />
									</div>
								</div>
								<?php $floorplanCount++; ?>
							<?php endforeach; ?>
							<div class="floorplan placeholder"></div>
						<?php endif; ?>
					</div>
				</article>
			</div>
		</div>
	</section>

<?php else: ?>

	<section class="default-content">
		<div class="wrap">
			<div class="sm-12">
				<article>
					<div class="content">
						<?php the_field("fullwidth_content"); ?>
					</div>
				</article>
			</div>
		</div>
	</section>

<?php endif; ?>
