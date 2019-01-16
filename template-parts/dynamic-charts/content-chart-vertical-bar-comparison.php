<?php while(have_rows("bar_comparison_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_height = get_sub_field( "chart_height" ); ?>
<div class="dynamic-chart chart-wrap columns">
	<h2 class="large-stat" style="font-size: <?php echo $chart_height / 3; ?>px;"><?php the_sub_field( "large_stat" ); ?></h2>
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px'" : ""; ?>>
		<div class="column-chart">
			<?php 
			$chart_data = get_sub_field( "chart_data" );
			$bar_width = get_sub_field( "bar_width" );
			$row_count = count($chart_data);
			$largest_value = max(array_column($chart_data, "value"));
			//$row_height = (100 - $gaps) / $row_count;
			if(have_rows( "chart_data" )):
				while(have_rows( "chart_data" )): the_row();
					$bar_color = get_sub_field( "bar_color" );
					$bar_metric = get_sub_field( "metric" );
					$bar_value = get_sub_field( "value" );
					$dotted = get_sub_field( "include_dotted_outline" );
					
					if($dotted):
						$inner_height = intval($bar_value) / intval($largest_value) * 100;
						echo "<div class='column dotted' data-progress='$largest_value' data-label='$bar_metric' style='background-color:transparent; border: 1px dashed $bar_color; width: {$bar_width}px;'><div class='inner' data-progress='$bar_value' data-label='' style='background-color:$bar_color; height: {$inner_height}%;'></div></div>";
					else:
						echo "<div class='column' data-progress='$bar_value' data-label='$bar_metric' style='background-color:$bar_color; width: {$bar_width}px;'></div>";
					endif;
				endwhile;
			endif; ?>
		</div>
	</div>
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>