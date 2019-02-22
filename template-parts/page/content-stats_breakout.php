<?php 
$bg_style = background_type(); 
get_section_id();
?>

<section class="content-section stats breakout" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<?php
				$stat_type = get_sub_field_sanitized( 'stat_type',false,false,'esc_html' );
				get_template_part( "template-parts/dynamic-charts/content", "stat-$stat_type" );
			?>
			<article>
				<p>
					<strong><?php the_sub_field_sanitized( 'stat_description',false,false,'esc_html' ); ?></strong><br>
					<span><?php the_sub_field_sanitized( 'stat_source',false,false,'esc_html' ); ?></span>
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
				var odTop = $(this).parents('.section-content').offset().top + 100;
				
				if (($(window).scrollTop() + $(window).height()) > odTop) {
					$(this).html($(this).attr('data-value'));
				}
			});		
		});
	});
</script>