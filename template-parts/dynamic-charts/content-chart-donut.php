<?php while(have_rows("donut_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_height = intval(get_sub_field( "chart_height" )); ?>
<div class="dynamic-chart chart-wrap ring single">
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>
		<?php
		$primary_color = get_sub_field( "primary_color" );
		$secondary_color = get_sub_field( "secondary_color" );
		$ring_pos = intval(get_sub_field( "donut_thickness" ));
		$ring_size = $ring_pos * 2;
		?>
		<div class="ring-chart background" data-progress="100">
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $secondary_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $secondary_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $secondary_color; ?>"></div>
				</div>
			</div>
			<div class="ring-fill bg" <?php echo $ring_pos ? "style='top:{$ring_pos}px; left:{$ring_pos}px; width:calc(100% - {$ring_size}px); height:calc(100% - {$ring_size}px);'" : ""; ?>></div>
		</div>
		
		<div class="ring-chart fill" data-progress="<?php the_sub_field( "donut_value" ); ?>">
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $primary_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $primary_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $primary_color; ?>"></div>
				</div>
			</div>
			<div class="ring-fill bg" <?php echo $ring_pos ? "style='top:{$ring_pos}px; left:{$ring_pos}px; width:calc(100% - {$ring_size}px); height:calc(100% - {$ring_size}px);'" : ""; ?>></div>
		</div>

		<h2 class="large-stat" style="font-size: <?php echo $chart_height / 4; ?>px;">
			<?php the_sub_field( "large_stat" ); ?>
		</h2>
	</div>
	
	<span class="metric-title"><?php the_sub_field( "metric_title" ); ?></span>
	
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>