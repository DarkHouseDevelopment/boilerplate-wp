<?php while(have_rows("people_chart", $dynamic_chart)): the_row(); ?>
<?php $chart_columns = get_sub_field( "chart_columns" ); ?>
<div class="dynamic-chart chart-wrap people">
	<h2 class="large-stat"><?php the_sub_field( "large_stat" ); ?></h2>
	<div class="chart">
		<div class="people-chart col-<?php echo $chart_columns; ?>">
			<?php 
			$empty_icon = get_sub_field( "chart_empty_icon" );
			$full_icon = get_sub_field( "chart_full_icon" );
			$total_icon_count = get_sub_field( "total_icon_count" );
			$full_icon_count = get_sub_field( "full_icon_count" );
			$full_icon_count_array = explode(".", $full_icon_count);
			if(isset($full_icon_count_array[1])):
				$icon_count_decimal = "0.".$full_icon_count_array[1];
				$final_icon_width = round((float)$icon_count_decimal * 100);
			else:
				$final_icon_width = 100;
			endif;
			
			for($i = 0; $i < ceil($total_icon_count); $i++):
				if((ceil($full_icon_count) - 1) == $i):
					$full_icon_with = $final_icon_width;
				elseif($i >= $full_icon_count):
					$full_icon_with = 0;
				else:
					$full_icon_with = 100;
				endif;
				echo "<div class='chart-icon' data-fillwidth='$full_icon_with'>";
					echo "<div class='empty-icon'>";
					echo "<img src='{$empty_icon['url']}' />";
					echo "</div>";
					echo "<div class='full-icon'>";
					echo "<img src='{$full_icon['url']}' />";
					echo "</div>";
				echo "</div>";
			endfor;
			?>
		</div>
	</div>
	<h4 class="chart-title"><?php echo get_the_title( $dynamic_chart ); ?></h4>
</div>

<?php endwhile; ?>