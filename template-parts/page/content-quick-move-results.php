<section id="home_results">
	<div class="wrap">
		<header>
			<h3><?php the_sub_field( 'section_title' ); ?></h3>
			
			<h4 class="message print-qmi">
				<a href="/print-quick-move-in-homes/" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i> <?php the_sub_field( 'print_qmi_link_text' ); ?></a>
			</h4>
		</header>
		<?php
			$results_format = get_sub_field( 'results_format' );
			get_template_part( 'template-parts/homes/content', 'qmi-results-'.$results_format );
		?>
	</div>
</section>