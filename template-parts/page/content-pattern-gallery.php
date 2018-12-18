<?php
	$pattern_color = get_sub_field( 'pattern_color' );
	$images = get_sub_field( 'gallery_images' );
?>
<section class="content-section pattern-gallery <?php the_sub_field( 'section_layout' ); ?>">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<div class="pattern-gallery-images">
			<div class="slider-container">
				<div class="slider">
					<?php if( $images ): 
						$image_index = 0;
				        foreach( $images as $image ): ?>
				            <div class="slide" data-index="<?php echo $image_index; ?>" style="background: url(<?php echo $image['sizes']['gallery']; ?>) center center no-repeat; background-size: cover;" /><a class="slider-next" href="javascript:void(0);"><i class="icon-angle-circled-right"></i></a></div>
				        <?php $image_index++;
					    endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="pattern-text">
			<h3><?php the_sub_field( 'callout_text' ); ?></h3>
		</div>
	</div>
</section>