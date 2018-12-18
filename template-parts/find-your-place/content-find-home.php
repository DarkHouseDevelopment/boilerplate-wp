<?php
	$btn_text = get_field( 'footer_link_text' );
	
	if(get_field( 'include_footer_link' )):
		$btn_type = get_field( 'footer_link_type' );
		
		switch($btn_type){
			case "internal":
				$btn_link_page = get_field( 'footer_link_internal' );
				$btn_link = get_permalink($btn_link_page);
				$btn_target = "_self";
				break;
				
			case "media":
				$btn_link_media = get_field( 'footer_link_media' );
				$btn_link = $btn_link_media['url'];
				$btn_target = "_blank";
				break;
				
			case "external":
				$btn_link = get_field( 'footer_link_external' );
				$btn_target = "_blank";
				break;
				
			case "custom":
				$btn_link = get_field( 'footer_link_custom' );
				$btn_target = get_field( 'button_target' );
				break;
		}
	endif;
?>
<section class="content-section">
	<div class="wrap">
		<div class="homesearch-findahome">
			<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-darkteal.svg) center center repeat; background-size: 16rem;"></div>
			<article>
				<header>
					<h3><?php the_field( 'home_search_title' ); ?></h3>
					<?php if(get_field( 'home_search_intro' )):
						echo get_field( 'home_search_intro' );
					endif; ?>
				</header>
				
				<?php get_template_part( 'template-parts/homes/content', 'find-a-home-form' ); ?>
				
				<?php if(get_field( 'include_footer_link' )): ?>
				<footer>
					<?php echo "<a href='$btn_link' target='$btn_target'>$btn_text <i class='icon-right-big'></i></a>"; ?>
				</footer>
				<?php endif; ?>
			</article>
		</div>
		
		<div class="browse-builders">
			<article>
				<header>
					<h4><?php the_field( 'builders_title' ); ?></h4>
				</header>
				
				<div class="builders">
					<?php
						$args = array(
							'posts_per_page' => -1,
							'post_type' => 'builders',
							'post_status' => 'publish',
							'ordeerby' => 'post_title',
							'order' => 'ASC'
						);
						$builder_query = new WP_Query($args);
						
						if($builder_query->have_posts()):
							while($builder_query->have_posts()): $builder_query->the_post();
								$builder_logo = get_field( 'builder_logo' );
								$builder_coming_coon = get_field( 'coming_soon' );
								
								echo "<div class='builder'>";
								if($builder_coming_coon == true):
									echo "<div class='coming-soon'><img src='".$builder_logo['url']."' alt='".get_the_title()."' /></div>";
								else:
									echo "<a href='".get_the_permalink()."'><img src='".$builder_logo['url']."' alt='".get_the_title()."' /></a>";
								endif;
								echo "</div>";
							endwhile;
						endif;
						
						wp_reset_query();
					?>
				</div>
			</article>
		</div>
	</div>
</section>