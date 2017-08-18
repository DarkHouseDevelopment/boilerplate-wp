<?php
	$bg_color = get_sub_field( 'background_color' );
	$bg_image = get_sub_field( 'background_image' );
	
	if($bg_color != "#ffffff" || $bg_image):
		$section_class = "white-text";
	else:
		$section_class = "";
	endif;
?>
<section class="homepage-callout homepage-section <?php echo $section_class; ?>" style="background: <?php echo $bg_color; echo $bg_image ? " url(".$bg_image['url'].") center center / cover no-repeat" : ""; ?>;">
	<div class="wrap">
		<article>
			<?php the_sub_field( 'section_content' ); ?>
		</article>
	</div>
</section>