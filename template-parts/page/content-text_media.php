<?php 
$bg_style = background_type(); 

$include_intro = get_sub_field( 'include_intro' );
$section_layout = get_sub_field_sanitized( 'section_layout',false,false,'esc_attr' );

while(have_rows("content_title")): the_row();
	$content_title_color = get_sub_field_sanitized( 'content_title_color',false,false,'esc_html' );
	$content_title = get_sub_field_sanitized( 'content_title_text',false,false,'esc_html' );
endwhile;

$section_media = get_sub_field_sanitized( 'media_type',false,false,'esc_attr' );
if($section_media == "image"):
	$section_image = get_sub_field( 'image' );
	$section_image_url = $section_image['url'];
	$section_image_alt = $section_image['alt'];
elseif($section_media == "video"):
	$section_video = get_sub_field( 'video' );
	$section_video = prepareVideo($section_video);
endif;

get_section_id();
?>

<section class="content-section text-media <?php echo $section_layout; ?>" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<?php if($include_intro): ?>
			<header class="intro">
				<?php 
				while(have_rows("section_title")): the_row();
					$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
					$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
				endwhile;

				if($section_title): 
					echo "<h2 style='color: $section_title_color;'>$section_title</h2>";
				endif; 
				if(get_sub_field( 'intro_text' )):
					echo wp_kses_post(get_sub_field( 'intro_text' ),$allowed_html);
				endif;
				?>
			</header>
		<?php endif; ?>
		<div class="section-content">
			<?php if($content_title): ?>
				<header>
					<?php echo "<h3 style='color: $section_title_color;'>$section_title</h3>"; ?>
				</header>
			<?php endif; ?>
			<?php if(get_sub_field( 'section_content' )): ?>
				<article>
					<?php echo wp_kses_post(get_sub_field( 'section_content' ),$allowed_html); ?>
				</article>
			<?php endif; ?>
		</div>
		<?php if($section_media != "none"): ?>
		<div class="section-media <?php echo $section_media; ?>">
			<?php if($section_media == "image"): 
				echo "<img src='{$section_image_url}' alt='{$section_image_alt}' />";
			elseif($section_media == "video"):
				echo $section_video;
			endif; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
