<?php 
$bg_style = background_type(); 
get_section_id();

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;
?>

<section class="content-section skills" style="<?php echo $bg_style['css']; ?>">
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
					if( have_rows( 'skills' ) ):
						echo '<div class="skills-grid">';
						while( have_rows( 'skills' ) ): the_row();
							$skill_image = get_sub_field( 'skill_image' );
							$skill_image_url = $skill_image['url'];
							while(have_rows("skill_title")): the_row();
								$skill_title_color = get_sub_field_sanitized( 'skill_title_color',false,false,'esc_html' );
								$skill_title = get_sub_field_sanitized( 'skill_title_text',false,false,'esc_html' );
							endwhile;
							echo '<div class="skill">';
								echo '<img src="'.$skill_image_url.'" alt="'.$skill_title.'" />';
								echo '<p style="color: '.$skill_title_color.';">'.$skill_title.'</p>';
							echo '</div>';
						endwhile;
						echo '</div>';
					endif;
				?>
				<?php	dynamic_buttons( 'ctas' ); ?>
			</article>
		</div>
	</div>
</section>
	