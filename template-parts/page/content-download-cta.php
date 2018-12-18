<?php
	$pattern_color = get_field( 'background_pattern_color', 'option' );
	
	$btn_text = get_field( 'button_text', 'option' );
	$btn_type = get_field( 'button_link_type', 'option' );
	
	switch($btn_type){
		case "internal":
			$btn_link_page = get_field( 'button_link_internal', 'option' );
			$btn_link = get_permalink($btn_link_page);
			$btn_target = "_self";
			break;
			
		case "external":
			$btn_link = get_field( 'button_link_external', 'option' );
			$btn_target = "_blank";
			break;
			
		case "media":
			$btn_link_media = get_field( 'button_link_media', 'option' );
			$btn_link = $btn_link_media['url'];
			$btn_target = "_blank";
			break;
			
		case "custom":
			$btn_link = get_field( 'button_link_custom', 'option' );
			$btn_target = "_blank";
			break;
	}
?>
<section class="pattern-section content-section download-cta">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<article>
			<header>
				<h3><?php the_field( 'cta_text', 'option' ); ?></h3>
			</header>
			
			<?php echo "<a href='$btn_link' class='btn' target='$btn_target'>$btn_text</a>"; ?>
		</article>
	</div>
</section>