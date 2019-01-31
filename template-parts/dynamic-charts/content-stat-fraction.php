<?php
	$fraction = get_sub_field_sanitized( 'fraction_value',false,false,'esc_html' );
	$fraction_parts = explode('/', $fraction);
?>

<figure class="stat-fraction">
	<div class="odometer" data-value="<?php echo $fraction_parts[0]; ?>">0</div>/<div class="odometer" data-value="<?php echo $fraction_parts[1]; ?>">0</div>
</figure>