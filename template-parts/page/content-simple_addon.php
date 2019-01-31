<?php $bg_style = background_type(); ?>

<section class="content-section simple-add-on cta" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' )): ?>
				<header>
					<h3><?php the_sub_field_sanitized( 'section_title',false,false,'esc_html' ); ?></h3>
				</header>
			<?php endif; ?>
			<article>
				<?php wp_kses(the_sub_field( 'section_content' ),$allowed_html); ?>
				<?php	dynamic_buttons( 'ctas' ); ?>
			</article>
		</div>
	</div>
</section>
