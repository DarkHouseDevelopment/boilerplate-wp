<figure class="stat-number">
	<div class="odometer" data-value="<?php the_sub_field_sanitized( 'number_value',false,false,'esc_attr' ); ?>">0</div>
	<?php if(get_sub_field( 'number_label' )):
		echo "<label>".get_sub_field_sanitized( 'number_label',false,false,'esc_html' )."</label>";
	endif; ?>
</figure>