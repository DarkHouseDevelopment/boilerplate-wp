<?php $bg_style = background_type(); ?>

<section class="content-section cta" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' )): ?>
				<header>
					<h3><?php the_sub_field( 'section_title' ); ?></h3>
				</header>
			<?php endif; ?>
			<article>
				
			</article>
		</div>
	</div>
</section>
