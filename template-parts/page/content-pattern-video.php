<?php
	$pattern_color = get_sub_field( 'pattern_color' );	
?>
<section class="content-section pattern-video <?php the_sub_field( 'section_layout' ); ?>">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<div class="pattern-video-embed"><div class="video-wrapper"><?php the_sub_field( 'video_embed' ); ?></div></div>
		<div class="pattern-text">
			<h3><?php the_sub_field( 'callout_text' ); ?></h3>
		</div>
	</div>
</section>