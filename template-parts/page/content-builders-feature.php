
<section class="content-section builders-feature">
	<div class="wrap">
		<header>
			<?php if(get_sub_field( 'section_title' )):
				echo "<h3>".get_sub_field( 'section_title' )."</h3>";
			endif; ?>
		</header>
		<article id="builders_blocks">
			<?php				
				$args = array(
					'post_type' => 'builders',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'asc'
				);
				$builder_query = new WP_Query($args);
			?>
			<?php while ( $builder_query->have_posts() ) : $builder_query->the_post(); ?>
			
				<?php
				$logo = get_field( 'builder_logo' );
				$preview_image = get_field( 'builder_hero_image' );
				?>
			
				<div class="builder <?php the_field( 'builder_color' ); ?>">
					<div class="logo-block">
						<img src="<?php echo $logo['url'] ?>" alt="<?php the_title(); ?>" />
					</div>
					<div class="builder-info">
						<?php if (preg_match_all('/<h\d>([^<]*)<\/h\d>/iU', get_field( 'builder_content' ), $matches)):
					    //echo "<h4>".$matches[1][0]."</h4>";
						endif; ?>
						<?php while(have_rows( 'builder_contact' )): the_row(); ?>
						<address>
							<?php echo get_sub_field( 'street_address' ) ? get_sub_field( 'street_address' )."<br />" : ""; ?>
							<?php echo get_sub_field( 'city' ) ? get_sub_field( 'city' )."," : ""; ?> <?php echo get_sub_field( 'state' ) ? get_sub_field( 'state' ) : ""; ?> <?php echo get_sub_field( 'zipcode' ) ? get_sub_field( 'zipcode' ) : ""; ?><?php echo get_sub_field( 'city' ) || get_sub_field( 'state' ) || get_sub_field( 'zipcode' ) ? "<br />" : ""; ?>
							<?php echo get_sub_field( 'phone' ) ? "<a href='tel:".get_sub_field( 'phone' )."'>".str_replace(" ", ".", get_sub_field( 'phone' ))."</a><br />" : ""; ?>
							</address>
							<?php
								$builder_map_type = get_field( 'builder_map_type' );
								switch($builder_map_type){
									case 'address':
										echo "<a class=\"btn btn-white-outline\" href=\"https://www.google.com/maps/search/?api=1&query=".urlencode(get_sub_field( 'street_address' )).",+".urlencode(get_sub_field( 'city' )).",+".urlencode(get_sub_field( 'state' ))."+".urlencode(get_sub_field( 'zipcode' ))."\" target=\"_blank\" rel=\"nofollow noopenner\">Map It<i class=\"icon-location\"></i></a>";
										break;
										
									case 'custom':
										echo "<a class=\"btn btn-white-outline\" href=\"".get_field( 'custom_map_it_link' )."\" target=\"_blank\" rel=\"nofollow noopenner\">Get Directions<i class=\"icon-location\"></i></a>";
										break;
										
									case 'disable':
										break;
								}
							?>
						<?php endwhile; ?>
						
						<a href="<?php the_permalink(); ?>" class="btn btn-white">View Builder</a>
					</div>
				</div>
			<?php endwhile; ?>
		</article>