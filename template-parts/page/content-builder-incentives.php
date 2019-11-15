<section class="content-section builder-incentives">
	<div class="wrap">
		<header>
			<?php if(get_sub_field( 'section_title' )):
				echo "<h3>".get_sub_field( 'section_title' )."</h3>";
			endif; ?>
		</header>
			<?php
				$args = array(
					'post_type' => 'builders',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'asc',
				);
				$builder_query = new WP_Query($args);
				if ( $builder_query->have_posts() ):
					echo '<div class="incentives">';
					while ( $builder_query->have_posts() ) : $builder_query->the_post();
						if(have_rows( 'builder_ctas' )):
							while(have_rows( 'builder_ctas' )): the_row();
								$exp_datetime = strtotime(get_sub_field( 'expiration_datetime' ));
								$current_time = strtotime(date( 'Y-m-d H:i:s' ));
								$active_ctas = 0;
								if($current_time <= $exp_datetime && $active_ctas == 0):
									$active_ctas++;
									echo '<div class="incentive '.get_field('builder_color').'">';
										$logo = get_field('builder_logo');
										echo '<a href="'.get_permalink().'"><img src="'.$logo['url'].'" alt="'.$logo['alt'].'" /></a>';
										echo '<p>'.get_sub_field( 'title_text' ).'</p>';
										echo '<p>'.get_sub_field( 'subtitle_text' ).'</p>';
										echo '<div class="btn-wrap">';
											include("content-dynamic-button.php");
										echo '</div>';
									echo '</div>';
								endif;
							endwhile;
						endif;
					endwhile;
					echo '</div>';
				endif;
				wp_reset_query();
			?>
	</div>
</section>