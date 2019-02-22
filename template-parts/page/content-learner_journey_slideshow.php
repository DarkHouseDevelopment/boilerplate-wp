<?php 
$bg_style = background_type(); 
get_section_id();

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;
?>

<section class="content-section slideshow learner-journey" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'intro_title' ) || get_sub_field( 'intro_text' )): ?>
			<header class="intro">
				<?php 
				if($section_title): 
					echo "<h2 style='color: $section_title_color;'>$section_title</h2>";
				endif; 
				if(get_sub_field( 'intro_text' )):
					echo wp_kses_post(get_sub_field( 'intro_text' ),$allowed_html);
				endif;
				?>
			</header>
			<?php endif; ?>
			<article>
				<?php
					if( have_rows( 'slides' ) ):
						echo '<div class="slider-learner-journey slides">';
						while( have_rows( 'slides' ) ): the_row();
							$slide_image = get_sub_field( 'slide_image' );
							$slide_image_url = esc_url($slide_image['url']);
							$slide_title = get_sub_field_sanitized( 'slide_title',false,false,'esc_html' );
							$slide_text = get_sub_field_sanitized( 'slide_text',false,false,'esc_html' );
							echo '<div class="slide">';
								echo '<img src="'.$slide_image_url.'" alt="'.$slide_title.': '.$slide_text.'" />';
								echo '<p class="title">'.$slide_title.'</p>';
								echo '<p>'.$slide_text.'</p>';
							echo '</div>';
						endwhile;
						echo '</div>';
					endif;
				?>
			</article>
		</div>
	</div>
</section>
	