<?php 
global $post;
$builder_id = $post->post_parent;
$logo = get_field( 'builder_logo', $builder_id ); 

$builder_args = array(
	'post_type' => 'homes',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'builder',
			'value' => $builder_id,
			'compare' => '='
		),
		array(
			'key' => 'neighborhood',
			'value' => $post->ID,
			'compare' => '='
		)
	)
);

$builder_homes = get_posts( $builder_args );
$homes_array = array( 0 );

foreach($builder_homes as $home){
	$homes_array[] = $home->ID;
}

$homes_query = array(
	'key' => 'floorplan',
	'value' => $homes_array,
	'compare' => 'IN'
);

$args = array(
	'posts_per_page' => -1,
	'post_status' => array('publish'),
	'post_type' => 'qmi',
	'meta_query' => array(
		$homes_query
	)
);

$qmi_loop = new WP_Query($args);
$neighborhood_website = get_field( 'neighborhood_website' ) ?: get_field( 'builder_website', $builder_id );
$neighborhood_content = get_field( 'neighborhood_content' ) ?: get_field( 'builder_content', $builder_id );
$neighborhood_site_plans = get_field( 'neighborhood_site_plans' ) ?: get_field( 'builder_site_plans', $builder_id );
$neighborhood_contact = get_field( 'neighborhood_contact' );
$neighborhood_contact = !empty( $neighborhood_contact['street_address'] ) ? $neighborhood_contact : get_field( 'builder_contact', $builder_id );
$neighborhood_hours = get_field( 'neighborhood_hours' ) ?: get_field( 'builder_hours', $builder_id );
$neighborhood_map_type = get_field( 'neighborhood_map_type' ) == 'builder' ? get_field( 'builder_map_type', $builder_id ) : get_field( 'neighborhood_map_type' );
?>

<section id="builder_details">
	<header>
		<a href="<?php echo get_the_permalink( $builder_id ); ?>"><i class="icon-left-big"></i> Back to <?php echo get_the_title( $builder_id ); ?></a>
	</header>
	<article>
		<div class="builder-info">
			<div class="location">
				<?php
				if(!empty( $neighborhood_contact )):
					if(!empty( $neighborhood_contact['street_address'] ) && (!empty( $neighborhood_contact['city'] ) || !empty( $neighborhood_contact['state'] ) || !empty( $neighborhood_contact['zipcode'] ) || !empty( $neighborhood_contact['phone'] ))): ?>
						<address>
							<h4>Contact</h4>
							<?php echo !empty( $neighborhood_contact['street_address'] ) ? $neighborhood_contact['street_address']."<br />" : ""; ?>
							<?php echo !empty( $neighborhood_contact['city'] ) ? $neighborhood_contact['city']."," : ""; ?> <?php echo !empty( $neighborhood_contact['state'] ) ? $neighborhood_contact['state'] : ""; ?> <?php echo !empty( $neighborhood_contact['zipcode'] ) ? $neighborhood_contact['zipcode'] : ""; ?><?php echo !empty( $neighborhood_contact['city'] ) || !empty( $neighborhood_contact['state'] ) || !empty( $neighborhood_contact['zipcode'] ) ? "<br />" : ""; ?>
							<?php
								switch($neighborhood_map_type){
									case 'address':
										echo "<a href=\"https://www.google.com/maps/search/?api=1&query=".urlencode($neighborhood_contact['street_address']).",+".urlencode($neighborhood_contact['city']).",+".urlencode($neighborhood_contact['state'])."+".urlencode($neighborhood_contact['zipcode'])."\" target=\"_blank\" rel=\"nofollow noopenner\">Map It<i class=\"icon-location\"></i></a>";
										break;
										
									case 'custom':
										$custom_map_link = get_field( 'custom_map_it_link' ) ?: get_field( 'custom_map_it_link', $builder_id );
										echo "<a href=\"".$custom_map_link."\" target=\"_blank\" rel=\"nofollow noopenner\">Get Directions<i class=\"icon-location\"></i></a>";
										break;
										
									case 'disable':
										break;
								}
							?>
							<?php echo !empty( $neighborhood_contact['phone'] ) ? "<a class='btn btn-teal-outline' href='tel:".$neighborhood_contact['phone']."'>".$neighborhood_contact['phone']."</a>" : ""; ?>
						</address>
					<?php endif; ?>
					<?php $builder_email = $neighborhood_contact['email']; ?>
				<?php endif; ?>
				
				<?php if( !empty( $neighborhood_hours ) ): ?>
				<div class="hours">
					<h4>Hours</h4>
					<ul>
					<?php foreach( $neighborhood_hours as $hours ): ?>
						<li class="label"><?php echo $hours['days']; ?></li>
						<li class="value"><?php echo $hours['hours']; ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				
				<a href="javascript:void(0);" class="btn btn-teal sendinfo">Request More Info</a>
			</div>
			<div class="builder-content">
				<?php echo $neighborhood_content; ?>
				<div class="builder-links">
					<a href="<?php echo $neighborhood_website; ?>" target="_blank" rel="nofollow noopenner">Visit <?php echo get_the_title( $builder_id ); ?> Website<i class="icon-right-big"></i></a><br>
					<?php if ( $qmi_loop->have_posts() ):
						echo "<a href='/quick-move-in-homes/?builder=".$post->ID."'>Quick Move-In Homes<i class='icon-right-big'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					endif; ?>
					<?php 
					if(!empty( $neighborhood_site_plans )):
						foreach( $neighborhood_site_plans as $site_plan ):
							echo "<br><a href='".$site_plan['site_plan']['url']."' target='_blank'>".($site_plan['site_plan_title'] ?: "Download Site Plan")."<i class='icon-right-big'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						endforeach;
					endif; 
					?>
				</div>
			</div>
		</div>
		<div class="builder-promo-block">
			<?php 
				// $builder_intro_cta = get_field( 'neighborhood_intro_ctas' );
				// if(!empty($builder_intro_cta)):
					while(have_rows( 'neighborhood_intro_ctas' )): the_row();
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
</section>

<div id="send_info_overlay" data-builder="<?php the_title(); ?>" data-builderemail="<?php echo $builder_email; ?>">
	<div class="overlay-bg"></div>
	<div class="overlay-content">
		<article>
			<h4>Send me info about <?php the_title(); ?> at Union Park at Norterra</h4>
			<?php // echo do_shortcode( get_field( 'send_me_info_popup_form', 'option' ) ); ?>
			<?php 
			if(get_field( 'neighborhood_form', $post->ID )):
				$popup_form_id = get_field( 'neighborhood_form', $post->ID );
				echo do_shortcode( "[gravityform id='$popup_form_id' title='false' description='false' ajax='true']" );
			elseif(get_field( 'send_me_info_popup_form', 'option' )):
				$popup_form = get_field( 'send_me_info_popup_form', 'option' );
				echo do_shortcode( $popup_form ); 
			endif; 
			?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</div>
