<?php $bg_style = background_type(); ?>

<section class="content-section video-module" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' )): ?>
				<header>
					<h3><?php the_sub_field_sanitized( 'section_title',false,false,'esc_html' ); ?></h3>
				</header>
			<?php endif; ?>
			<article>
				<?php
					$video = get_sub_field( 'video' );
					echo prepareVideo($video);
					
					if(get_sub_field( 'video_title' )): ?>
					<footer>
						<h4><?php the_sub_field_sanitized( 'video_title',false,false,'esc_html' ); ?></h4>
						<?php wp_kses(the_sub_field( 'video_description' ),$allowed_html); ?>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</div>
</section>
