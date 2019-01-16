<?php while(have_rows("time_chart", $dynamic_chart)): the_row(); ?>
<?php 
	$chart_height = intval(get_sub_field( "chart_height" ));
	$stopwatch_color = get_sub_field( "stopwatch_color" );
	$needle_color = get_sub_field( "needle_color" );
	$wedge_color = get_sub_field( "time_wedge_color" );
	$time_increment = get_sub_field( "time_increment" );
	$time_progress = $time_increment / 60 * 100;
?>
<div class="dynamic-chart chart-wrap time">
	
	<h2 class="large-stat" style="font-size: <?php echo $chart_height / 4; ?>px;">
		<?php the_sub_field( "large_stat" ); ?>
	</h2>
	
	<div class="time-chart" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>		
		<div class="wedge" data-progress="<?php echo $time_progress; ?>">
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $wedge_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $wedge_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $wedge_color; ?>"></div>
				</div>
			</div>
		</div>
		<div class="needle-container"><div class="needle" style="fill: <?php echo $needle_color; ?>"><?php echo file_get_contents(__DIR__."/../images/stopwatch_needle.svg"); ?></div></div>
	</div>
	
	<div class="stopwatch" style="fill: <?php echo $stopwatch_color; ?>; <?php echo $chart_height ? "height:{$chart_height}px; width:{$chart_height}px;" : ""; ?>"><?php echo file_get_contents(__DIR__."/../images/stopwatch.svg"); ?></div>
		
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>