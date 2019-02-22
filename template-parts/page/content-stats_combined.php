<?php 
$bg_style = background_type(); 
get_section_id();
?>

<section class="content-section stats combined" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<div class="section-content">
			<div class="breakout">
			<?php while(have_rows( 'breakout_stat' )): the_row(); ?>
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
			<?php endwhile; ?>
			</div>
			<?php if(have_rows( 'stat_blocks' )): ?>
			<div class="stat-blocks">
				<?php while(have_rows( 'stat_blocks' )): the_row();
					
					$stat_type = get_sub_field_sanitized( 'stat_type',false,false,'esc_html' );
					echo "<div class='stat-block'>";
					get_template_part( "template-parts/dynamic-charts/content", "stat-$stat_type" );
					
					if(get_sub_field( 'stat_description' ) || get_sub_field( 'stat_source' )){
						echo "<footer><p>";
						
						if(get_sub_field( 'stat_description' )):
							echo "<strong>".get_sub_field_sanitized( 'stat_description',false,false,'esc_html' )."</strong><br>";
						endif;
						
						if(get_sub_field( 'stat_source' )):
							echo "<span>".get_sub_field_sanitized( 'stat_source',false,false,'esc_html' )."</span>";
						endif;
						
						echo "</p></footer>";
					}
					
					echo "</div>";
					
				endwhile; ?>
			</div>
			<?php endif; ?>
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