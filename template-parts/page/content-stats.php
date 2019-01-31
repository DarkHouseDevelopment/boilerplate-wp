<?php $bg_style = background_type(); ?>

<section class="content-section stats" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' ) || get_sub_field( 'section_intro_text' )): ?>
				<header class="intro">
					<?php 
					if(get_sub_field( 'section_title' )): 
						echo "<h3>".get_sub_field_sanitized( 'section_title',false,false,'esc_html' )."</h3>";
					endif;
					
					if(get_sub_field( 'section_intro_text' )): 
						wp_kses(the_sub_field( 'section_intro_text' ),$allowed_html);
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
				
				if(get_sub_field( 'footer_text' )): ?>
					<footer>
						<p><?php the_sub_field_sanitized( 'footer_text',false,false,'esc_html' ); ?></p>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</div>
</section>
