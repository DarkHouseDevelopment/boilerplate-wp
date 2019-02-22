<?php 
$bg_style = background_type(); 
get_section_id();
?>

<section class="content-section content" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<article>
				<?php the_sub_field( 'content' ); ?>
			</article>
		</div>
	</div>
</section>
