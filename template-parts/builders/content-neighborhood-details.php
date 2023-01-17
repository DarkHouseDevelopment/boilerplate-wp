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
		<a href="/builders/"><i class="icon-left-big"></i> View all builders</a>
	</header>
	<article>
		
		<?php if( $neighborhood_website ):
			echo "<a class='logo-block ".get_field( 'builder_color', $builder_id )."' href='".$neighborhood_website."' target='_blank' rel='nofollow noopenner'>";
		else:
			echo "<div class='logo-block ".get_field( 'builder_color', $builder_id )."'>";
		endif; ?>
			<img src="<?php echo $logo['url'] ?>" alt="<?php the_title(); ?>" />
		<?php if( $neighborhood_website ):
			echo "</a>";
		else:
			echo "</div>";
		endif; ?>
		<div class="builder-info">
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
			<div class="location">
				<?php
				if(!empty( $neighborhood_contact )):
					if(!empty( $neighborhood_contact['street_address'] ) && (!empty( $neighborhood_contact['city'] ) || !empty( $neighborhood_contact['state'] ) || !empty( $neighborhood_contact['zipcode'] ) || !empty( $neighborhood_contact['phone'] ))): ?>
						<address>
							<h4>Contact</h4>
							<?php echo !empty( $neighborhood_contact['street_address'] ) ? $neighborhood_contact['street_address']."<br />" : ""; ?>
							<?php echo !empty( $neighborhood_contact['city'] ) ? $neighborhood_contact['city']."," : ""; ?> <?php echo !empty( $neighborhood_contact['state'] ) ? $neighborhood_contact['state'] : ""; ?> <?php echo !empty( $neighborhood_contact['zipcode'] ) ? $neighborhood_contact['zipcode'] : ""; ?><?php echo !empty( $neighborhood_contact['city'] ) || !empty( $neighborhood_contact['state'] ) || !empty( $neighborhood_contact['zipcode'] ) ? "<br />" : ""; ?>
							<?php echo !empty( $neighborhood_contact['phone'] ) ? "<a class='btn btn-teal-outline' href='tel:".$neighborhood_contact['phone']."'>".$neighborhood_contact['phone']."</a><br />" : ""; ?>
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
		</div>
		
	</article>
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
