<?php while(have_rows("pie_chart", $dynamic_chart)): the_row(); ?>
<?php 
	$chart_height = intval(get_sub_field( "chart_height" ));
	$offset = 0; 
	$default_pie_color = get_sub_field( "default_pie_color" );
?>
<div class="dynamic-chart chart-wrap pie">
	
	<h2 class="large-stat" style="font-size: <?php echo $chart_height / 4; ?>px;">
		<?php the_sub_field( "large_stat" ); ?>
	</h2>
	
	<?php /*
	<div class="pie-chart" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>
		<?php if(have_rows( "wedges" )):
			while(have_rows( "wedges" )): the_row(); 
				$percentage = get_sub_field( "percentage" );
				$wedge_color = get_sub_field( "wedge_color" );
				?>
				<div class="wedge" data-progress="<?php echo $percentage; ?>" data-offset="<?php echo $offset; ?>" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>
					<div class="circle">
						<div class="mask full">
							<div class="fill bg" style="background-color: <?php echo $wedge_color; ?>"></div>
						</div>
						<div class="mask half">
							<div class="fill bg" style="background-color: <?php echo $wedge_color; ?>"></div>
							<div class="fill bg fix" style="background-color: <?php echo $wedge_color; ?>"></div>
						</div>
					</div>
					<?php $offset += $percentage; ?>
				</div>
		<?php endwhile;
		endif; ?>
		
		<div class="wedge" data-progress="<?php echo 100 - $offset; ?>" data-offset="<?php echo $offset; ?>" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $default_pie_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $default_pie_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $default_pie_color; ?>"></div>
				</div>
			</div>
		</div>
	</div>
	*/ ?>
	
	<div class="svg-pie-chart">
		<svg viewBox="0 0 32 32" width="<?php echo $chart_height; ?>" height="<?php echo $chart_height; ?>" class="svg-pie">
			<?php if(have_rows( "wedges" )):
				while(have_rows( "wedges" )): the_row(); 
					$percentage = get_sub_field( "percentage" );
					$wedge_color = get_sub_field( "wedge_color" );
					$wedge_start_x = cos(($offset / 100) * pi() * 2);
					$wedge_start_y = sin(($offset / 100) * pi() * 2);
					$wedge_end_x = cos((($offset + $percentage) / 100) * pi() * 2);
					$wedge_end_y = sin((($offset + $percentage) / 100) * pi() * 2);
					$wedge_arc_flag = ($percentage / 100) > .5 ? 1 : 0;

					echo "<circle r='16' cx='16' cy='16' class='wedge' data-progress='$percentage' stroke-dashoffset='-$offset' stroke-dasharray='0 100' style='stroke: $wedge_color;' />";
					//echo "<path d='M $wedge_start_x $wedge_start_y A 1 1 0 $wedge_arc_flag 1 $wedge_end_x $wedge_end_y L 0 0' fill='$wedge_color'></path>";
					$offset += $percentage;
				endwhile;
				$final_wedge = 100 - $offset;
				$wedge_start_x = cos(($offset / 100) * pi() * 2);
				$wedge_start_y = sin(($offset / 100) * pi() * 2);
				$wedge_end_x = cos((($offset + $final_wedge) / 100) * pi() * 2);
				$wedge_end_y = sin((($offset + $final_wedge) / 100) * pi() * 2);
				$wedge_arc_flag = ($final_wedge / 100) > .5 ? 1 : 0;
				echo "<circle r='16' cx='16' cy='16' class='wedge' data-progress='$final_wedge' stroke-dashoffset='-$offset' stroke-dasharray='0 100' style='stroke: $default_pie_color;' />";
				//echo "<path d='M $wedge_start_x $wedge_start_y A 1 1 0 $wedge_arc_flag 1 $wedge_end_x $wedge_end_y L 0 0' fill='$default_pie_color'></path>";
			endif; ?>
		</svg>
	</div>
		
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>