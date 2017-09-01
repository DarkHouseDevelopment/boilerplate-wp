<section class="stay-connected">
	<div class="wrap">
		<div class="sm-12">
			<article class="feature">
				
				<?php
					
					$sc_title = get_field( 'sc_title', 'option' );
					$sc_button_link = get_field( 'sc_button_link', 'option' );
					$sc_button_text = get_field( 'sc_button_text', 'option' );
					
					if($sc_title):
						echo "<h2>$sc_title</h2>";
					endif;
					
					the_field('sc_content', 'option');
					
					echo "<a href='$sc_button_link' class='btn btn-large'>$sc_button_text</a>";
				?>
				
			</article>
		</div>
	</div>
</section>