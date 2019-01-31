<?php
$bg_style = background_type();

$include_intro = get_sub_field( 'include_intro' );
if($include_intro):
	$intro_title = get_sub_field_sanitized( 'intro_title',false,false,'esc_html' );
	$intro_text = get_sub_field( 'intro_text' );
endif;

$section_layout = get_sub_field_sanitized( 'section_layout',false,false,'esc_attr' );
$section_title = get_sub_field( 'section_title' );

$section_media = get_sub_field_sanitized( 'media_type',false,false,'esc_attr' );
if($section_media == "image"):
	$section_image = get_sub_field( 'image' );
	$section_image_url = $section_image['url'];
	$section_image_alt = $section_image['alt'];
elseif($section_media == "video"):
	$section_video = get_sub_field( 'video' );
	$section_video = prepareVideo($section_video);
endif;
?>

<section class="content-section text-media <?php echo $section_layout; ?>" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<?php if($include_intro): ?>
			<header class="intro">
				<h3><?php echo $intro_title; ?></h3>
				<?php
					if(the_sub_field( 'intro_text' )):
						wp_kses(the_sub_field( 'intro_text' ),$allowed_html);
					endif;
				?>
			</header>
		<?php endif; ?>
		<div class="section-content">
			<?php if($section_title): ?>
				<header>
					<h3><?php echo $section_title; ?></h3>
				</header>
			<?php endif; ?>
			<?php if(get_sub_field( 'section_content' )): ?>
				<article>
					<?php echo wp_kses(the_sub_field( 'section_content' ),$allowed_html); ?>
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
