<?php include( get_template_directory() . '/template-parts/homes/script-home-variables.php' ); ?>

<div class="column column-left">
	<div class="property-details">
		<h1><?php the_title(); ?></h1>
		<h3>by <a href="<?php echo get_permalink( $builder ); ?>"><?php echo $builder->post_title; ?></a></h3>
		<p class="contact-info">
			<strong>Sales Office:</strong> <a href="tel:<?php echo $sales_office; ?>"><?php echo $sales_office; ?></a><br />
			<strong>Designated Broker:</strong> <?php echo $broker; ?><br />
			<?php if($builder_website != ''): ?>
				<a class="link" href="<?php echo $builder_website; ?>" target="_blank"><strong>View Builder Website</strong></a>
			<?php endif; ?>
		</p>

		<div class="buttons">
			<a class="btn sendinfo" href="javascript:void(0);">Send Me Info</a>
			<?php echo $floorplan_file ? '<a class="btn-outline" href="'.$floorplan_file['url'].'">Download Floorplan</a>' : '' ?>
			<a class="btn-outline" href="javascript:void();" onclick="window.print();">Print</a>
			<div class="overlay sendinfo"></div>
			<?php include(locate_template('template-parts/homes/content-send-info-form.php')); ?>
		</div>
	</div>

	<div class="property-specs">
		<ul class="first">
			<li>
				<?php echo ucfirst('<div class="label top">'.$priceRange[0].'</div>') . ' <div class="number">$' . $priceRange[1] . ',000<span>s</span></div>'; ?>
			</li>
			<li>
				<div class="number"><?php echo $totalBeds; ?></div>
				<div class="label">beds</div>
			</li>
			<li>
				<div class="number"><?php echo $totalBaths; ?></div>
				<div class="label">baths</div>
			</li>
		</ul>
		<ul>
			<li>
				<div class="number"><?php echo $squareFootage; ?></div>
				<div class="label">approx. sq ft.</div>
			</li>
			<li>
				<div class="number"><?php echo $totalStories; ?></div>
				<div class="label"><?php echo ($totalStories > 1 ? 'Stories' : 'Story'); ?></div>
			</li>
			<li>
				<div class="number"><?php echo $totalCarGarage; ?></div>
				<div class="label">car garage</div>
			</li>
		</ul>
	</div>
	
	<?php if(get_field('details')): ?>
	<article class="details">
		<?php the_field('details'); ?>
	</article>
	<?php endif; ?>
</div>
<div class="column column-right">
	<div class="slider small">
		<?php if( $images ): ?>
	        <?php foreach( $images as $image ): ?>
	            <div><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
	        <?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="floorplans">
		<?php
		$floorplanImages = get_field('floorplan_images');
		$floorplanCount = 1;

		if($floorplanImages):
			echo "<h3>Floorplan</h3>";
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
</div>