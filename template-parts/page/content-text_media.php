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

$include_intro = get_sub_field( 'include_intro' );
if($include_intro):
	$intro_title = get_sub_field( 'intro_title' );
	$intro_text = get_sub_field( 'intro_text' );
endif;

$section_layout = get_sub_field( 'section_layout' );
$section_title = get_sub_field( 'section_title' );
$section_content = get_sub_field( 'section_content' );

$section_media = get_sub_field( 'media_type' );
if($section_media == "image"):
	$section_image = get_sub_field( 'image' );
elseif($section_media == "video"):
	$section_video = get_sub_field( 'video' );
	$section_video = prepareVideo($section_video);
endif;
?>

<section class="content-section text-media <?php echo $section_layout; ?>" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<?php if($include_intro): ?>
			<header class="intro">
				<h3><?php echo $intro_title; ?></h3>
				<?php echo $intro_text; ?>
			</header>
		<?php endif; ?>
		<div class="section-content">
			<?php if($section_title): ?>
				<header>
					<h3><?php echo $section_title; ?></h3>
				</header>
			<?php endif; ?>
			<?php if($section_content): ?>
				<article>
					<?php echo $section_content; ?>
				</article>
			<?php endif; ?>
		</div>
		<?php if($section_media != "none"): ?>
		<div class="section-media <?php echo $section_media; ?>">
			<?php if($section_media == "image"): 
				echo "<img src='{$section_image['url']}' alt='{$section_image['alt']}' />";
			elseif($section_media == "video"):
				echo $section_video;
			endif; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
