
<?php
	$id = get_sub_field('section_id');
	$class = get_sub_field('section_class');
?>
<section id="<?php echo $id; ?>" class="cta-blocks cta-section interior content-section <?php echo $class; ?>">
	<?php if(have_rows('cta_blocks')): ?>
		<?php while(have_rows('cta_blocks')): the_row(); ?>
		<div class="cta-block">
			<?php
				$background_style = get_sub_field( 'background_style' );
				$text_color = get_sub_field( 'text_color' );
				$text_position = get_sub_field( 'text_position' );
				
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
				<?php 
					if($cta_type == "whole-banner"):
						while(have_rows( 'cta_banner' )): the_row();
							$banner_link_type = get_sub_field( 'banner_link_type' );
							$banner_link = get_sub_field( "banner_link_$banner_link_type" );
							$banner_target = get_sub_field( 'banner_target' );

							if($banner_link_type == "internal"):
								$banner_link = get_the_permalink( $banner_link->ID );
							endif;
							
							echo "<a href='$banner_link' class='banner-link' target='$banner_target'>";
						endwhile;
					endif; 
				?>
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
							<?php
								if(get_sub_field('icon')):
									echo wp_get_attachment_image( get_sub_field('icon')['id'], 'thumbnail' );
								endif;
							?>
							<?php echo get_sub_field( 'title_text' ) ? "<h3 style='color:".$text_color."'>".get_sub_field( 'title_text' )."</h3>" : ""; ?>
						</header>
						<?php echo get_sub_field( 'subtitle_text' ) ? "<p style='color:".$text_color."'>".get_sub_field( 'subtitle_text' )."</p>" : ""; ?>
						<?php
							if(have_rows('cta_buttons')):
								echo '<div class="button-group">';
									while(have_rows('cta_buttons')): the_row();
										$cta_type = get_sub_field( 'cta_type' );
										if($cta_type == "cta-btn"):
											while(have_rows( 'cta_button' )): the_row();
												include("content-dynamic-button.php");
											endwhile;
										endif;
									endwhile;
								echo '</div>';
							endif;
						?>
					</article>
				</div>
				<?php echo $cta_type == "whole-banner" ? "</a>" : ""; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>