<?php while(have_rows("bar_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_height = get_sub_field( "chart_height" ); ?>
<div class="dynamic-chart chart-wrap bars">
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px'" : ""; ?>>
		<div class="bar-chart">
			<?php 
			$chart_data = get_sub_field( "chart_data" );
			$bar_height = get_sub_field( "bar_height" );
			$row_count = count($chart_data);
			$max_bar_height = (intval($chart_height) - (($row_count + 1) * 10)) / $row_count;
			//$row_height = (100 - $gaps) / $row_count;
			if(have_rows( "chart_data" )):
				while(have_rows( "chart_data" )): the_row();
					$bar_color = get_sub_field( "bar_color" );
					$bar_metric = get_sub_field( "metric" );
					$bar_value = get_sub_field( "value" );
				
					echo "<div class='bar' data-progress='$bar_value' data-label='$bar_metric' style='background-color:$bar_color; height: {$bar_height}px; max-height: {$max_bar_height}px;'></div>";
				endwhile;
			endif; ?>
		</div>
	</div>
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>