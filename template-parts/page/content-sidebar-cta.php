<section class="content-section full-width with-sidebar sidebar-cta <?php the_sub_field( 'section_layout' ); ?>">
	<div class="wrap">
		<article>
			<?php the_sub_field( 'section_content' ); ?>
		</article>
		<?php while(have_rows( 'sidebar_call_to_action' )): the_row();
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
		<aside class="content-section cta-section">
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
				<header>
					<?php echo get_sub_field( 'title_text' ) ? "<h3 style='color:".$text_color."'>".get_sub_field( 'title_text' )."</h3>" : ""; ?>
					<?php echo get_sub_field( 'subtitle_text' ) ? "<h4 style='color:".$text_color."'>".get_sub_field( 'subtitle_text' )."</h4>" : ""; ?>
					<?php 
						while(have_rows( 'cta_button' )): the_row();
							include("content-dynamic-button.php"); 
						endwhile;
					?>
				</header>
			</div>
		</aside>
		<?php endwhile; ?>
	</div>
</section>