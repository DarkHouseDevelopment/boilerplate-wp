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

$include_cob = get_sub_field( 'include_co-branding' );
if($include_cob):
	$cob_type = get_sub_field( 'co-branding_type' );
	if($cob_type == "text"):
		$cob_text = get_sub_field( 'co-branding_text' );
	elseif($cob_type == "logo"):
		$cob_logo = get_sub_field( 'co-branding_logo' );
	endif;
endif;

$hero_title = get_sub_field( 'hero_title' );
$hero_content = get_sub_field( 'hero_content' );

$hero_media = get_sub_field( 'hero_media' );
if($hero_media == "image"):
	$hero_image = get_sub_field( 'hero_image' );
elseif($hero_media == "video"):
	$hero_video_placeholder = get_sub_field( 'hero_video_placeholder' );
	$hero_video = get_sub_field( 'hero_video' );
	$hero_video = prepareVideo($hero_video);
endif;
?>

<section class="content-section hero" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<div class="hero-content">
			<header>
				<?php 
				if($include_cob):
					if($cob_type == "text"):
						echo "<strong>$cob_text</strong>";
					elseif($cob_type == "logo"):
						echo "<img src='{$cob_logo['url']}' alt='{$cob_logo['alt']}' />";
					endif;
				endif;
				?>
				<h1><?php echo $hero_title; ?></h1>
			</header>
			<article>
				<?php echo $hero_content; ?>
			</article>
		</div>
		<?php if($hero_media != "none"): ?>
		<div class="hero-media <?php echo $hero_media; ?>">
			<?php if($hero_media == "image"): 
				echo "<img src='{$hero_image['url']}' alt='{$hero_image['alt']}' />";
			elseif($hero_media == "video"):
				echo "<a href='javascript:void(0);' class='launch-overlay video'>";
				if($hero_video_placeholder):
					echo "<img src='{$hero_video_placeholder['url']}' alt='{$hero_video_placeholder['alt']}' />";
				endif;
				echo "</a>";
			endif; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php if($hero_media == "video"):
	echo "<div class='overlay video'><div class='overlay-content'>$hero_video</div></div>";
endif; ?>