<section class="verrado-maps">
	<div class="wrap">
		<div class="sm-12">
			<article class="feature">
				<header>
					<h1><?php the_sub_field("title"); ?></h1>
				</header>
					
				<?php the_sub_field("content"); ?>
				
				<?php
				if(have_rows( 'map_buttons' )):
					
					echo "<div class='map-buttons'>";
				
					while(have_rows( 'map_buttons' )): the_row();
						
						$map_file = get_sub_field( 'map_file' );
						$button_text = get_sub_field( 'button_text' );
						echo "<a href='{$map_file['url']}' class='btn btn-blue' target='_blank' rel='noopener noreferrer'>$button_text</a>";
						
					endwhile;
					
					echo "</div>";
					
				endif;
				?>
				
			</article>
		</div>
	</div>
</section>