<section class="faq-section content-section">
	<div class="wrap">
		<header>
			<h3><?php the_sub_field( 'section_title' ); ?></h3>
		</header>
		<?php
			if( have_rows( 'faqs' ) ):
				echo '<div class="faqs">';
				while( have_rows( 'faqs' ) ): the_row();
					echo '<div class="faq">';
						echo '<h4>'.get_sub_field( 'question' ).'<span>+</span></h4>';
						echo '<p>'.get_sub_field( 'answer' ).'</p>';
					echo '</div>';
				endwhile;
				echo '</div>';
			endif;
		?>
	</div>
</section>