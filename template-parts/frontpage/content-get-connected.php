<?php
	$bg_color = get_sub_field( 'background_color' );
	$bg_image = get_sub_field( 'background_image' );
	
	if($bg_color != "#ffffff" || $bg_image):
		$section_class = "white-text";
	else:
		$section_class = "";
	endif;
	
	$btn_text = get_sub_field( 'button_text' );
?>
<section class="homepage-get-connected homepage-section <?php echo $section_class; ?>" style="background: <?php echo $bg_color; echo $bg_image ? " url(".$bg_image['url'].") center center / cover no-repeat" : ""; ?>;">
	<div class="wrap">
		<article>
			<?php the_sub_field( 'section_content' ); ?>
			
			<a class="btn btn-teal form-toggle" href="javascript:void(0);"><?php echo $btn_text; ?></a>
		</article>
	</div>
</section>
<section class="homepage-get-connected-form homepage-section">
	<div class="wrap">
		<article>
			<?php echo do_shortcode( get_sub_field( 'form_shortcode' ) ); ?>
			<p class="disclaimer"><?php the_sub_field( 'form_disclaimer' ); ?></p>
			<a class="close form-toggle" href="javascript:void(0);"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-close.png" alt="close" /></a>
		</article>
	</div>
</section>