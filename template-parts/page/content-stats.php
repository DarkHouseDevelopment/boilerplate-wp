<?php

$bg_type = get_sub_field( 'background_type' );

if($bg_type == "color"):
	$bg_color = get_sub_field( 'background_color' );
	$bg_css = "background: $bg_color;";
else:
	$bg_image = get_sub_field( 'background_image' );
	$desktop_bg_image = $bg_image['desktop_background_image'];
	$mobile_bg_image = $bg_image['mobile_background_image'];
	$bg_style = $bg_image['background_style'];
	$bg_pos = $bg_image['background_position'];
	
	$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
	$bg_css = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css;";
endif;

?>

<section class="content-section video-module" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'video_title' )): ?>
				<header>
					<h3><?php the_sub_field( 'section_title' ); ?></h3>
				</header>
			<?php endif; ?>
			<article>
				<?php
					$video = get_sub_field( 'video' );
					echo prepareVideo($video);
					
					if(get_sub_field( 'video_title' )): ?>
					<footer>
						<h4><?php the_sub_field( 'video_title' ); ?></h4>
						<?php the_sub_field( 'video_description' ); ?>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</div>
</section>
