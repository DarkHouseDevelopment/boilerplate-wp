<?php while(have_rows("bar_chart")): the_row(); ?>
<?php $chart_height = get_sub_field_sanitized( "chart_height",false,false,'esc_attr' ); ?>
<div class="dynamic-chart chart-wrap columns">
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px'" : ""; ?>>
		<div class="column-chart">
			<?php 
			$bar_width = get_sub_field_sanitized( "bar_width",false,false,'esc_attr' );
			
			if(have_rows( "chart_data" )):
				while(have_rows( "chart_data" )): the_row();
					$bar_color = get_sub_field_sanitized( "bar_color",false,false,'esc_attr' );
					$bar_metric = get_sub_field_sanitized( "metric",false,false,'esc_attr' );
					$bar_value = get_sub_field_sanitized( "value",false,false,'esc_attr' );
				
					echo "<div class='column' data-progress='$bar_value' data-label='$bar_metric' style='background-color:$bar_color; width:{$bar_width}px;'></div>";
				endwhile;
			endif; ?>
		</div>
	</div>
	<h4 class="chart-title"><?php the_sub_field_sanitized( 'chart_title',false,false,'esc_html' ); ?></h4>
</div>
<?php endwhile; ?>