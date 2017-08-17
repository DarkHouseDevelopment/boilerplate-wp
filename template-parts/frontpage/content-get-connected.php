<section role="main" id="homepage_intro">
	<div class="wrap">
		<article>
			<header>
				<h2><?php the_sub_field( 'intro_title' ); ?></h2>
			</header>
			
			<?php the_sub_field( 'intro_content' ); ?>			
		</article>
		
		<div class="cta-boxes">
			<?php while(have_rows( 'intro_cta_boxes' )): the_row(); 
				$cta_image = get_sub_field( 'cta_box_image' );
				$cta_link = get_sub_field( 'cta_box_link' );
				$overlay_color = get_sub_field( 'cta_box_color_overlay' );
				$overlay_rgb = implode(', ', hex2rgb($overlay_color));
				
				echo "<a href='".get_permalink($cta_link->ID)."' class='cta-box' style='background-image: url({$cta_image['url']})'>";
					echo "<div class='box-cover'>";
					the_sub_field( 'cta_box_title' );
					echo "</div>";
				echo "</a>";
				
			endwhile; ?>
		</div>
	</div>
</section>