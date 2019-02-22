<?php 
$bg_style = background_type(); 
get_section_id();

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;

while(have_rows("video_title")): the_row();
	$video_title_color = get_sub_field_sanitized( 'video_title_color',false,false,'esc_html' );
	$video_title = get_sub_field_sanitized( 'video_title_text',false,false,'esc_html' );
endwhile;
?>

<section class="content-section video-module" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if($section_title): ?>
				<header>
					<?php echo "<h2 style='color: $section_title_color;'>$section_title</h2>"; ?>
				</header>
			<?php endif; ?>
			<article>
				<?php
				$video = get_sub_field( 'video' );
				echo prepareVideo($video);
				?>
					
				<footer>
					<?php 
					if($video_title): 
						echo "<h4 style='color: $video_title_color;'>$video_title</h4>";
					endif;
					if(get_sub_field( 'video_description' )):
						echo wp_kses_post(get_sub_field( 'video_description' ),$allowed_html); 
					endif;
					?>
				</footer>
			</article>
		</div>
	</div>
</section>
