<?php
	$container_width = get_sub_field( 'container_width' );
	$background_style = get_sub_field( 'background_style' );
	$text_color = get_sub_field( 'text_color' );
	
	if($background_style == "image"):
		$background_image = get_sub_field( 'background_image' );
		$background_css = "background-image: url('{$background_image['url']}');";
		$background_overlay = get_sub_field( 'background_overlay' );
	elseif($background_style == "color"):
		$background_color = get_sub_field( 'background_color' );
		$background_css = "background: $background_color;";
	elseif($background_style == "pattern"):
		$pattern_color = is_singular( 'post' ) ? 'yellow' : get_sub_field( 'pattern_color' );
	endif;
	
?>
<section class="cta-section interior content-section <?php echo $container_width; ?>">
	<?php if($background_style == "pattern"): ?>
		<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<?php else: ?>
		<div class="cta-bg" style="<?php echo $background_css; ?>">
			<?php
			if(isset($background_overlay)):
				$opacity_dec = $background_overlay['overlay_opacity'] / 100;
				echo "<div class='bg-overlay' style='background: {$background_overlay['overlay_color']}; opacity: $opacity_dec;'></div>";
			endif;
			?>
		</div>
	<?php endif; ?>
	<div class="wrap">
		<article>
			<header>
				<?php echo get_sub_field( 'title_text' ) ? "<h3 style='color:".$text_color."'>".get_sub_field( 'title_text' )."</h3>" : ""; ?>
				<?php echo get_sub_field( 'subtitle_text' ) ? "<h4 style='color:".$text_color."'>".get_sub_field( 'subtitle_text' )."</h4>" : ""; ?>
				<?php include("content-dynamic-button.php"); ?>
			</header>
		</article>
	</div>
</section>