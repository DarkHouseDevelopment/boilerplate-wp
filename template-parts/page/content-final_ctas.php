<?php 
$bg_style = background_type(); 

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;

get_section_id();
?>

<section class="content-section cta" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if( get_sub_field( 'section_title' ) ): ?>
				<header class="intro">
					<?php
					if($section_title): 
						echo "<h2 style='color: $section_title_color;'>$section_title</h2>";
					endif; 
					
					if(get_sub_field( 'section_intro' )):
						echo "<p>".get_sub_field_sanitized( 'section_intro',false,false,'esc_html' )."</p>";
					endif; 
					?>
				</header>
			<?php endif; ?>
			<article>
				<?php	dynamic_buttons( 'ctas' ); ?>
			</article>
		</div>
	</div>
</section>
