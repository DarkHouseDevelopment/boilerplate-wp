<figure class="stat-number">
	<div class="odometer" data-value="<?php the_sub_field( 'number_value' ); ?>">0</div>
	<?php if(get_sub_field( 'number_label' )):
		echo "<label>".get_sub_field( 'number_label' )."</label>";
	endif; ?>
</figure>