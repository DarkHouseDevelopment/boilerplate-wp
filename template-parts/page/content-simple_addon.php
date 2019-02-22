<?php 
$bg_style = background_type();
get_section_id();

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;
?>

<section class="content-section simple-add-on cta" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if($section_title): ?>
				<header>
					<h2 style="color: <?php echo $section_title_color; ?>"><?php echo $section_title; ?></h2>
				</header>
			<?php endif; ?>
			<article>
				<?php wp_kses_post(get_sub_field( 'section_content' ),$allowed_html); ?>
				<?php dynamic_buttons( 'ctas' ); ?>
			</article>
		</div>
	</div>
</section>
