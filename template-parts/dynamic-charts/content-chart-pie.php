<?php while(have_rows("pie_chart")): the_row(); ?>
<?php 
	$offset = 0; 
	$default_pie_color = get_sub_field( "default_pie_color" );
?>
<div class="dynamic-chart chart-wrap pie">
	
	<span class="large-stat">
		<?php the_sub_field( "large_stat" ); ?>
	</span>
	
	<div class="pie-chart">
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
		
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>
<?php endwhile; ?>