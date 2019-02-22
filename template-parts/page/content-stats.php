<?php 
$bg_style = background_type(); 
get_section_id();

while(have_rows("section_title")): the_row();
	$section_title_color = get_sub_field_sanitized( 'section_title_color',false,false,'esc_html' );
	$section_title = get_sub_field_sanitized( 'section_title_text',false,false,'esc_html' );
endwhile;

while(have_rows("footer_text")): the_row();
	$footer_text_color = get_sub_field_sanitized( 'footer_text_color',false,false,'esc_html' );
	$footer_text = get_sub_field_sanitized( 'footer_text_text',false,false,'esc_html' );
endwhile;
?>

<section class="content-section stats" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' ) || get_sub_field( 'section_intro_text' )): ?>
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
				$charts = get_sub_field( 'charts' );
				$chart_count = count($charts);
					
				if(have_rows( 'charts' )):
					echo "<div class='charts col-$chart_count'>";
					
					while(have_rows( 'charts' )): the_row();
						
						$chart_style = get_sub_field_sanitized( 'chart_style',false,false,'esc_html' );
						get_template_part( "template-parts/dynamic-charts/content", "chart-$chart_style" );
						
					endwhile;
					
					echo "</div>";
				endif;
				
				if($footer_text): ?>
					<footer>
						<p style="color: <?php echo $footer_text_color; ?>;"><?php echo $footer_text; ?></p>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</div>
</section>
