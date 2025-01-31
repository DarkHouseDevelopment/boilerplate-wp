<?php 
$logo = get_field( 'builder_logo' ); 
global $post;

$builder_args = array(
	'post_type' => 'homes',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'builder',
			'value' => $post->ID,
			'compare' => '='
		)
	)
);

$builder_children = get_children( array(
	'post_parent' => $post->ID,
	'post_type' => 'builders',
	'numberposts' => -1,
	'post_status' => 'publish'
) );

$builder_homes = get_posts( $builder_args );
$qmi_builder_counts = get_option( 'qmi_builder_counts' );
?>

<section id="builder_details" class="<?php echo !empty( $builder_children ) ? "has-children" : ""; ?>">
	<header>
		<a href="/builders/"><i class="icon-left-big"></i> View all builders</a>
	</header>
	<?php if( empty( $builder_children ) ): ?>
	<article>
		
		<div class="builder-info">
			<div class="location">
				<?php while(have_rows( 'builder_contact' )): the_row(); ?>
					<?php if(get_sub_field( 'street_address' ) && (get_sub_field( 'city' ) || get_sub_field( 'state' ) || get_sub_field( 'zipcode' ) || get_sub_field( 'phone' ))): ?>
					<address>
						<h4>Contact</h4>
						<?php echo get_sub_field( 'street_address' ) ? get_sub_field( 'street_address' )."<br />" : ""; ?>
						<?php echo get_sub_field( 'city' ) ? get_sub_field( 'city' )."," : ""; ?> <?php echo get_sub_field( 'state' ) ? get_sub_field( 'state' ) : ""; ?> <?php echo get_sub_field( 'zipcode' ) ? get_sub_field( 'zipcode' ) : ""; ?><?php echo get_sub_field( 'city' ) || get_sub_field( 'state' ) || get_sub_field( 'zipcode' ) ? "<br />" : ""; ?>
						<?php
							$builder_map_type = get_field( 'builder_map_type' );
							switch($builder_map_type){
								case 'address':
									echo "<a href=\"https://www.google.com/maps/search/?api=1&query=".urlencode(get_sub_field( 'street_address' )).",+".urlencode(get_sub_field( 'city' )).",+".urlencode(get_sub_field( 'state' ))."+".urlencode(get_sub_field( 'zipcode' ))."\" target=\"_blank\" rel=\"nofollow noopenner\">Map It<i class=\"icon-location\"></i></a>";
									break;
									
								case 'custom':
									echo "<a href=\"".get_field( 'custom_map_it_link' )."\" target=\"_blank\" rel=\"nofollow noopenner\">Get Directions<i class=\"icon-location\"></i></a>";
									break;
									
								case 'disable':
									break;
							}
						?>
						<?php echo get_sub_field( 'phone' ) ? "<a class='btn btn-teal-outline' href='tel:".get_sub_field( 'phone' )."'>".get_sub_field( 'phone' )."</a>" : ""; ?>
					</address>
					<?php endif; ?>
					<?php $builder_email = get_sub_field( 'email' ); ?>
				<?php endwhile; ?>
				
				<?php if(have_rows( 'builder_hours' )): ?>
				<div class="hours">
					<h4>Hours</h4>
					<ul>
					<?php while(have_rows( 'builder_hours' )): the_row(); ?>
						<li class="label"><?php echo get_sub_field( 'days' ); ?></li>
						<li class="value"><?php echo get_sub_field( 'hours' ); ?></li>
					<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; ?>
				
				<?php if($post->post_name == "cachet-homes" && !$post->post_parent): ?>
				<?php else: ?>
				<a href="javascript:void(0);" class="btn btn-teal sendinfo">Request More Info</a>
				<?php endif; ?>
			</div>
			<div class="builder-content">
				<?php echo get_field( 'builder_content' ); ?>
				<div class="builder-links">
					<a href="<?php echo get_field( 'builder_website' ); ?>" target="_blank" rel="nofollow noopenner">Visit <?php the_title(); ?> Website<i class="icon-right-big"></i></a><br>
					<?php if ( !empty($qmi_builder_counts[$post->ID]) ):
						echo "<a href='/quick-move-in-homes/?builder=".$post->ID."'>Quick Move-In Homes<i class='icon-right-big'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					endif; ?>
					<?php 
					while( have_rows( 'builder_site_plans' ) ): the_row();
						$site_plan = get_sub_field( 'site_plan' );
						echo "<br><a href='".$site_plan['url']."' target='_blank'>".(get_sub_field( 'site_plan_title' ) ?: "Download Site Plan")."<i class='icon-right-big'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					endwhile; 
					?>
				</div>
			</div>
		</div>
		<div class="builder-promo-block">
			<?php 
				$builder_intro_cta = get_field( 'builder_intro_ctas' );
				// if(!empty($builder_intro_cta)):
					while(have_rows( 'builder_intro_ctas' )): the_row();
						$exp_datetime = strtotime(get_sub_field( 'expiration_datetime' ));
						$current_time = strtotime(date( 'Y-m-d H:i:s' ));
						if($current_time <= $exp_datetime):
							$cta_block_styles = get_sub_field( 'cta_block_styles' );
							$cta_media = get_sub_field( 'cta_media' );
							echo "<div class='promo-block' style='background: ".$cta_block_styles['background_color']."; color: ".$cta_block_styles['text_color'].";'>";
							if($cta_media == 'video'):
								echo "<div class='promo-block--video'>";
								// get iframe HTML
								$iframe = get_sub_field( 'cta_video' );
												
								// use preg_match to find iframe src
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
																	
								// add extra params to iframe src
								$params = array(
									'rel' => 0,
									'title' => 0,
									'byline' => 0,
									'portrait' => 0,
								);
								
								$new_src = add_query_arg($params, $src);				
								$iframe = str_replace($src, $new_src, $iframe);
												
								// add extra attributes to iframe html
								$attributes = 'frameborder="0"';
								
								$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
									
								echo "<div class='video-wrapper'>$iframe</div>";
								echo "</div>";
							else:
								$cta_image = get_sub_field( 'cta_image' );
								$cta_image_link = get_sub_field( 'cta_image_link' );
								echo !empty($cta_image_link) ? "<a class='promo-block--image' href='$cta_image_link' target='_blank' rel='nofollow noopener'>" : "<div class='promo-block--image'>";
								echo wp_get_attachment_image( $cta_image, 'large' );
								echo !empty($cta_image_link) ? "</a>" : "</div>";
							endif;
							
							echo "<div class='promo-block--content'>";
							echo !empty(get_sub_field( 'cta_title' )) ? "<h4>".get_sub_field( 'cta_title' )."</h4>" : "";
							echo get_sub_field( 'cta_content' );
							if(get_sub_field( 'include_cta_button' )):
								while(have_rows( 'cta_button' )): the_row();
									include(get_stylesheet_directory()."/template-parts/page/content-dynamic-button.php");
								endwhile;
							endif;
							echo "</div>";
							echo "</div>";
						endif;
					endwhile;
				// endif;
			?>
		</div>
		
	</article>
	<?php endif; ?>
</section>

<div id="send_info_overlay" data-builder="<?php the_title(); ?>" data-builderemail="<?php echo $builder_email; ?>">
	<div class="overlay-bg"></div>
	<div class="overlay-content">
		<article>
			<h4>Send me info about <?php the_title(); ?> at Union Park at Norterra</h4>
			<?php echo do_shortcode( '[contact-form-7 id="546" title="Send Me Info"]' ); ?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</div>
