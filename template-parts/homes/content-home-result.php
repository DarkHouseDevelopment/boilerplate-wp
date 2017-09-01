<?php include( get_template_directory() . '/template-parts/homes/script-home-variables.php' ); ?>

<div class="home-result">

	<div class="property-image">
		<?php if( $images ): ?>
			<div class="image" style="background: url(<?php echo $images[0]['url']; ?>) center center no-repeat; background-size: cover;"></div>
		<?php endif; ?>
	</div>

	<div class="property-details">
		<h2>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

			<?php if(in_array('victory', $availableIn )):
				echo '<a href="/victory/" class="district-link indicator-'.$location.'"><img src="'.get_template_directory_uri().'/assets/img/icon-victory-red.png" /></a> ';
			endif; ?>

		</h2>
		<h3>by <a href="<?php echo get_permalink( $builder ); ?>"><?php echo $builder->post_title; ?></a></h3>
		<p class="contact-info">
			<strong>Sales Office:</strong> <a href="tel:<?php echo $sales_office; ?>"><?php echo $sales_office; ?></a><br />
			<strong>Designated Broker:</strong> <?php echo $broker; ?>
		</p>
		<div class="send-info">
			<a class="btn" href="<?php the_permalink();?>">View Model Details</a><br /><br />
			<a class="btn btn-outline sendinfo" href="javascript:void(0);">Send Me Info</a>
		</div>

		<div class="overlay sendinfo"></div>
		<?php include(locate_template('template-parts/homes/content-send-info-form.php')); ?>
	</div>

	<div class="property-specs">
		<ul class="row first">
			<li class="">
				<?php echo ucfirst('<div class="label top">'.$priceRange[0].'</div>') . ' <div class="number">$' . $priceRange[1] . ',000<span>s</span></div>'; ?>
			</li>
			<li class="">
				<div class="number"><?php echo $totalBeds; ?></div>
				<div class="label">beds</div>
			</li>
			<li class=" last">
				<div class="number"><?php echo $totalBaths; ?></div>
				<div class="label">baths</div>
			</li>
		</ul>
		<ul class="row last">
			<li class="">
				<div class="number"><?php echo $squareFootage; ?></div>
				<div class="label">approx. sq ft.</div>
			</li>
			<li class="">
				<div class="number"><?php echo $totalStories; ?></div>
				<div class="label"><?php echo ($totalStories > 1 ? 'Stories' : 'Story'); ?></div>
			</li>
			<li class=" last">
				<div class="number"><?php echo $totalCarGarage; ?></div>
				<div class="label">car garage</div>
			</li>
		</ul>
	</div>
	
	<?php echo $quick_movein === "yes" ? "<div class='corner-arrow quick-move'><span>Quick Move-In</span></div>" : ""; ?>

</div>