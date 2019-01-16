<?php while(have_rows("donut_comparison_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_height = intval(get_sub_field( "chart_height" )); ?>
<div class="dynamic-chart chart-wrap ring">
	<div class="chart" <?php echo $chart_height ? "style='height:{$chart_height}px; width:{$chart_height}px;'" : ""; ?>>
		<?php
		$primary_color = get_sub_field( "primary_color" );
		$secondary_color = get_sub_field( "secondary_color" );
		$big_ring_pos = intval(get_sub_field( "donut_thickness" ));
		$big_ring_size = $big_ring_pos * 2;
		$small_ring_pos = $big_ring_pos * 1.5 + 1;
		$small_ring_size = $small_ring_pos * 2;
		$mini_ring_pos = $small_ring_pos * 2 + 1;
		$mini_ring_size = $mini_ring_pos * 2;
		?>
		<div class="ring-chart" data-progress="<?php the_sub_field( "primary_donut_value" ); ?>">
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $primary_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $primary_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $primary_color; ?>"></div>
				</div>
			</div>
			<div class="ring-fill bg" <?php echo $big_ring_pos ? "style='top:{$big_ring_pos}px; left:{$big_ring_pos}px; width:calc(100% - {$big_ring_size}px); height:calc(100% - {$big_ring_size}px);'" : ""; ?>></div>
		</div>
		<div class="small ring-chart" data-progress="<?php the_sub_field( "secondary_donut_value" ); ?>" <?php echo $big_ring_pos ? "style='top:{$small_ring_pos}px; left:{$small_ring_pos}px; width:calc(100% - {$small_ring_size}px); height:calc(100% - {$small_ring_size}px);'" : ""; ?>>
			<div class="circle">
				<div class="mask full">
					<div class="fill bg" style="background-color: <?php echo $secondary_color; ?>"></div>
				</div>
				<div class="mask half">
					<div class="fill bg" style="background-color: <?php echo $secondary_color; ?>"></div>
					<div class="fill bg fix" style="background-color: <?php echo $secondary_color; ?>"></div>
				</div>
			</div>
			<div class="ring-fill bg" <?php echo $big_ring_pos ? "style='top:{$big_ring_pos}px; left:{$big_ring_pos}px; width:calc(100% - {$big_ring_size}px); height:calc(100% - {$big_ring_size}px);'" : ""; ?>></div>
		</div>

		<div class="chart-metric">
			<h2 class="large-stat" style="font-size: <?php echo $chart_height / 4; ?>px;">
				<?php the_sub_field( "large_stat" ); ?>
				<span class="metric-title"><?php the_sub_field( "metric_title" ); ?></span>
			</h2>
		</div>
	</div>
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>