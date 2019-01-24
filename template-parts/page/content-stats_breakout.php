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

<section class="content-section stats breakout" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<div class="section-content">
			<?php
				$stat_type = get_sub_field( 'stat_type' );
				get_template_part( "template-parts/dynamic-charts/content", "stat-$stat_type" );
			?>
			<article>
				<p>
					<strong><?php the_sub_field( 'stat_description' ); ?></strong><br>
					<span><?php the_sub_field( 'stat_source' ); ?></span>
				</p>
			</article>
		</div>
	</div>
</section>

<link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-default.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>

<script type="text/javascript">
	
	jQuery(document).ready(function($){
		$(window).scroll(function() {
			$('.odometer').each(function(){
				var odTop = $(this).parents('.section-content').offset().top - 500;
				
				if ($(window).scrollTop() > odTop) {
					$(this).html($(this).attr('data-value'));
				}
			});		
		});
	});
</script>