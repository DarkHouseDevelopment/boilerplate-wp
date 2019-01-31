<?php $bg_style = background_type(); ?>

<section class="content-section skills" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'intro_title' ) || get_sub_field( 'intro_text' )): ?>
			<header class="intro">
				<?php if(get_sub_field( 'intro_title' )): ?>
					<h3><?php the_sub_field_sanitized( 'intro_title',false,false,'esc_html' ); ?></h3>
				<?php endif; ?>
				<?php if(get_sub_field( 'intro_text' )): ?>
					<p><?php the_sub_field_sanitized( 'intro_text',false,false,'esc_html' ); ?></p>
				<?php endif; ?>
			</header>
			<?php endif; ?>
			<article>
				<?php
					if( have_rows( 'skills' ) ):
						echo '<div class="skills-grid">';
						while( have_rows( 'skills' ) ): the_row();
							$skill_image = get_sub_field( 'skill_image' );
							$skill_image_url = $skill_image['url'];
							$skill_title = get_sub_field_sanitized( 'skill_title',false,false,'esc_html' );
							echo '<div class="skill">';
								echo '<img src="'.$skill_image_url.'" alt="'.$skill_title.'" />';
								echo '<p>'.$skill_title.'</p>';
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
	