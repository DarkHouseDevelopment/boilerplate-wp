<?php while(have_rows("bar_chart")): the_row(); ?>
<?php $chart_height = get_sub_field( "chart_height" ); ?>
<div class="dynamic-chart chart-wrap columns">
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px'" : ""; ?>>
		<div class="column-chart">
			<?php 
			$bar_width = get_sub_field( "bar_width" );
			
			if(have_rows( "chart_data" )):
				while(have_rows( "chart_data" )): the_row();
					$bar_color = get_sub_field( "bar_color" );
					$bar_metric = get_sub_field( "metric" );
					$bar_value = get_sub_field( "value" );
				
					echo "<div class='column' data-progress='$bar_value' data-label='$bar_metric' style='background-color:$bar_color; width:{$bar_width}px;'></div>";
				endwhile;
			endif; ?>
		</div>
	</div>
	<h4 class="chart-title"><?php the_sub_field( 'chart_title' ); ?></h4>
</div>
<?php endwhile; ?>