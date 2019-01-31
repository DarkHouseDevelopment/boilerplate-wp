<?php $bg_style = background_type(); ?>

<section class="content-section benefits-blocks" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' ) || get_sub_field( 'section_intro' )): ?>
			<header class="intro">
				<?php if(get_sub_field( 'section_title' )): ?>
					<h3><?php the_sub_field_sanitized( 'section_title',false,false,'esc_html' ); ?></h3>
				<?php endif; ?>
				<?php if(get_sub_field( 'section_intro' )): ?>
					<p><?php the_sub_field_sanitized( 'section_intro',false,false,'esc_html' ); ?></p>
				<?php endif; ?>
			</header>
			<?php endif; ?>
			<article>
				<?php
					$blocks_options = get_sub_field( 'blocks_options' );
					if($blocks_options):
						$blocks_per_row = esc_attr($blocks_options['blocks_per_row']);
						$content_style = esc_attr($blocks_options['content_style']);
					endif;
					if( have_rows( 'benefit_blocks' ) ):
						echo '<div class="blocks b-'.$blocks_per_row.' '.$content_style.'">';
						while( have_rows( 'benefit_blocks' ) ): the_row();
							$block_image = get_sub_field( 'block_image' );
							$block_image_url = esc_url($block_image['url']);
							$block_title = get_sub_field_sanitized( 'block_title',false,false,'esc_attr' );
							echo '<div class="block">';
								if($block_image):
									echo '<img src="'.$block_image_url.'" alt="'.$block_title.'" />';
								endif;
								if($block_title):
									echo '<p class="title">'.$block_title.'</p>';
								endif;
								if(get_sub_field( 'block_content' )):
									echo '<div class="block-content">';
										echo '<div class="block-content-wrap">';
											wp_kses(the_sub_field( 'block_content' ),$allowed_html);
										echo '</div>';
										echo '<div class="block-content-controls">';
											if($content_style == 'expanding'):
												echo '<span class="expand">More ></span>';
											endif;
											if($content_style == 'expanding'):
												echo '<span class="close">Close X</span>';
											endif;
										echo '</div>';
									echo '</div>';
								endif;
								
							echo '</div>';
						endwhile;
						
					endif;
				?>
			</article>
			<footer>
				<?php	dynamic_buttons( 'footer_ctas' ); ?>
			</footer>
		</div>
	</div>
</section>
	