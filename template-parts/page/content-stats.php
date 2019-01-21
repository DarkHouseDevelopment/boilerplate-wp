<?php

$bg_type = get_sub_field( 'background_type' );

if($bg_type == "color"):
	$bg_color = get_sub_field( 'background_color' );
	$bg_css = "background: $bg_color;";
else:
	$bg_image = get_sub_field( 'background_image' );
	$desktop_bg_image = $bg_image['desktop_background_image'];
	$mobile_bg_image = $bg_image['mobile_background_image'];
	$bg_style = $bg_image['background_style'];
	$bg_pos = $bg_image['background_position'];
	
	$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
	$bg_css = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css;";
endif;

?>

<section class="content-section video-module" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<div class="section-content">
			<?php if(get_sub_field( 'section_title' ) || get_sub_field( 'section_intro_text' )): ?>
				<header>
					<?php 
					if(get_sub_field( 'section_title' )): 
						echo "<h3>".get_sub_field( 'section_title' )."</h3>";
					endif;
					
					if(get_sub_field( 'section_intro_text' )): 
						the_sub_field( 'section_intro_text' );
					endif;
					?>
				</header>
			<?php endif; ?>
			<article>
				<?php
				if(have_rows( 'charts' )):
					echo "<div class='charts'>";
					
					while(have_rows( 'charts' )): the_row();
						
						$chart_style = get_sub_field( 'chart_style' );
						get_template_part( "template-parts/dynamic-charts/content", "chart-$chart_style" );
						
					endwhile;
					
					echo "</div>";
				endif;
				
				if(get_sub_field( 'footer_text' )): ?>
					<footer>
						<p><?php the_sub_field( 'footer_text' ); ?></p>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</div>
</section>
