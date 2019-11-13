<?php
	$ra_hero = get_field( 'ra_hero_image', 'option' );
	$nn_hero = get_field( 'nn_hero_image', 'option' );
?>
<section class="content-section nav-blocks">
	<div class="wrap">
		<?php if(get_sub_field( 'section_title' )): ?>
		<header>
			<h4><?php echo get_sub_field( 'section_title' ); ?></h4>
		</header>
		<?php endif; ?>
		<nav class="image-block-nav amenities" role="navigation">
			<a class='block' href='<?php echo get_post_type_archive_link( 'amenities' ); ?>' style='background: url(<?php echo $ra_hero['url']; ?>) center center no-repeat; background-size: cover;'><div class='block-circle'><div class='hover-circle'><div class='hover-outer-circle'></div></div><span>Resident Amenities</span></div></a>
			<a class='block' href='<?php echo get_post_type_archive_link( 'near-norterra' ); ?>' style='background: url(<?php echo $nn_hero['url']; ?>) center center no-repeat; background-size: cover;'><div class='block-circle'><div class='hover-circle'><div class='hover-outer-circle'></div></div><span>Around<br>Union Park</span></div></a>
		</nav>
	</div>
</section>