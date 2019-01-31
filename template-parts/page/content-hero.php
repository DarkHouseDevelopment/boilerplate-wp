<?php
$bg_style = background_type();

$include_cob = get_sub_field( 'include_co-branding' );
if($include_cob):
	$cob_type = get_sub_field( 'co-branding_type' );
	if($cob_type == "text"):
		$cob_text = get_sub_field_sanitized( 'co-branding_text',false,false,'esc_html' );
	elseif($cob_type == "logo"):
		$cob_logo = get_sub_field( 'co-branding_logo' );
		$cob_logo_url = esc_url($cob['url']);
		$cob_logo_alt = esc_attr($cob['alt']);
	endif;
endif;

$hero_title = get_sub_field_sanitized( 'hero_title',false,false,'esc_html' );

$hero_media = get_sub_field_sanitized( 'hero_media',false,false,'esc_html' );
if($hero_media == "image"):
	$hero_image = get_sub_field( 'hero_image' );
	$hero_image_url = esc_url($hero_image['url']);
	$hero_image_alt = esc_attr($hero_image['alt']);
elseif($hero_media == "video"):
	$hero_video_placeholder = get_sub_field( 'hero_video_placeholder' );
	$hero_video_placeholder_url = esc_url($hero_video_placeholder['url']);
	$hero_video_placeholder_alt = esc_attr($hero_video_placeholder['alt']);
	$hero_video = get_sub_field( 'hero_video' );
	$hero_video = prepareVideo($hero_video);
endif;
?>

<section class="content-section hero" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="hero-content">
			<header>
				<?php 
				if($include_cob):
					if($cob_type == "text"):
						echo "<strong>$cob_text</strong>";
					elseif($cob_type == "logo"):
						echo "<img src='{$cob_logo_url}' alt='{$cob_logo_alt}' />";
					endif;
				endif;
				?>
				<h1><?php echo $hero_title; ?></h1>
			</header>
			<article>
				<?php wp_kses(the_sub_field('hero_content'),$allowed_html); ?>
			</article>
		</div>
		<?php if($hero_media != "none"): ?>
		<div class="hero-media <?php echo $hero_media; ?>">
			<?php if($hero_media == "image"): 
				echo "<img src='{$hero_image_url}' alt='{$hero_image_alt}' />";
			elseif($hero_media == "video"):
				echo "<a href='javascript:void(0);' class='launch-overlay video'>";
				if($hero_video_placeholder):
					echo "<img src='{$hero_video_placeholder_url}' alt='{$hero_video_placeholder_alt}' />";
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