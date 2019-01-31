<?php $bg_style = background_type(); ?>

<section class="content-section slideshow learner-journey" style="<?php echo $bg_style['css']; ?>">
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
	