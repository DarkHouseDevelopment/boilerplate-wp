<?php while(have_rows("bar_comparison_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_height = get_sub_field( "chart_height" ); ?>
<div class="dynamic-chart chart-wrap bars">
	<h2 class="large-stat" style="font-size: <?php echo $chart_height / 3; ?>px;"><?php the_sub_field( "large_stat" ); ?></h2>
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px'" : ""; ?>>
		<div class="bar-chart">
			<?php 
			$chart_data = get_sub_field( "chart_data" );
			$bar_height = get_sub_field( "bar_height" );
			$row_count = count($chart_data);
			$max_bar_height = (intval($chart_height) - (($row_count + 1) * 10)) / $row_count;
			$largest_value = max(array_column($chart_data, "value"));
			//$row_height = (100 - $gaps) / $row_count;
			if(have_rows( "chart_data" )):
				while(have_rows( "chart_data" )): the_row();
					$bar_color = get_sub_field( "bar_color" );
					$bar_metric = get_sub_field( "metric" );
					$bar_value = get_sub_field( "value" );
					$dotted = get_sub_field( "include_dotted_outline" );
					
					if($dotted):
						$inner_width = intval($bar_value) / intval($largest_value) * 100;
						echo "<div class='bar dotted' data-progress='$largest_value' data-label='$bar_metric' style='background-color:transparent; border: 1px dashed $bar_color; height: {$bar_height}px; max-height: {$max_bar_height}px;'><div class='inner' data-progress='$bar_value' data-label='' style='background-color:$bar_color; width: {$inner_width}%;'></div></div>";
					else:
						echo "<div class='bar' data-progress='$bar_value' data-label='$bar_metric' style='background-color:$bar_color; height: {$bar_height}px; max-height: {$max_bar_height}px;'></div>";
					endif;
				endwhile;
			endif; ?>
		</div>
	</div>
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>