<?php 
	$amenity_hero = get_field( 'amenity_hero' );
?>
<section id="page_hero">
	<?php
		if($amenity_hero['hero_image']):
			echo "<div class='hero-image'><img src='{$amenity_hero['hero_image']['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php echo $amenity_hero['hero_circle_color']; ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php echo $amenity_hero['hero_title_1']; ?></span>
			<?php echo $amenity_hero['hero_title_2']; ?>
			<span><?php echo $amenity_hero['hero_title_3']; ?></span>
		</h1>
	</div>
</section>

<section id="amenities_back">	
	<div class="wrap">
		<a href="/live/">Live Connected</a> / <a href="/live/amenities/">Resident Amenities</a> / <?php the_title(); ?>
	</div>
</section>

<section id="amenities_overview" role="main">
	<div class="wrap">
		<div class="section-content">
			<?php the_field( 'amenity_content' ); ?>
		</div>
	</div>
</section>

<?php			
	if(have_rows( 'content_sections' )):
	
		echo "<section class='additional-content'>";
		
		while(have_rows( 'content_sections' )): the_row();
		
			$layout = get_row_layout();
				
			switch($layout){
				case 'full_width_text':
					get_template_part( 'template-parts/page/content', 'full-width-text' );
					break;
					
				case 'pattern_content':
					get_template_part( 'template-parts/page/content', 'pattern' );
					break;
					
				case 'split_content':
					get_template_part( 'template-parts/page/content', 'split-content' );
					break;
					
				case 'upcoming_events':
					get_template_part( 'template-parts/page/content', 'upcoming-events' );
					break;
					
				case 'content_sidebar':
					get_template_part( 'template-parts/page/content', 'sidebar' );
					break;
					
				case 'image_grid':
					get_template_part( 'template-parts/page/content', 'image-grid' );
					break;
					
				case 'call_to_action':
					get_template_part( 'template-parts/page/content', 'call-to-action' );
					break;
										
				case 'download_cta':
					get_template_part( 'template-parts/page/content', 'download-cta' );
					break;
			}
		
		endwhile;
		
		echo "</section>";
	
	endif;
?>

<section id="amenity_details" class="content-section">
	<div class="wrap">
		<div class="amenity-images <?php echo get_field( 'include_amenity_gallery' ) ? "" : "contact-only"; ?>">
			<?php if(get_field( 'include_amenity_gallery' )): ?>
			<div class="slider-container">
				<div class="slider">
					<?php 
					$images = get_field( 'amenity_gallery' );
					
					if( $images ): 
						$image_index = 0;
				        foreach( $images as $image ): ?>
				            <div class="slide" data-index="<?php echo $image_index; ?>" title="<?php echo $image['alt']; ?>" style="background: url(<?php echo $image['sizes']['large']; ?>) center center no-repeat; background-size: cover;">
					            <?php if($image['caption']): ?>
						            <div class="caption"><?php echo $image['caption']; ?></div>
						        <?php endif; ?>
				            	<a class="slider-next" href="javascript:void(0);"><i class="icon-angle-circled-right"></i></a>
				            </div>
				        <?php $image_index++;
					    endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			
			<div class="stay-in-touch">
				<aside>
					<?php $contact_page = get_page_by_path( 'directions' ); ?>
					<?php echo file_get_contents(get_template_directory() . '/assets/img/icon-tree.svg'); ?><br />
					<h3><?php bloginfo('name'); ?></h3>
					<?php if(get_field( 'include_directions_cta', $contact_page )):
						while(have_rows( 'directions_cta', $contact_page )): the_row();
							$button_text = get_sub_field( 'button_text' );
							$button_link = get_sub_field( 'button_link' );
							
							echo "<a href='$button_link' class='btn btn-teal directions' target='_blank' rel='nofollow noopenner'>$button_text</a>";
						endwhile;
					endif; 
					while(have_rows( 'hours', $contact_page )): the_row(); ?>
						<div class="hours">
							<strong><?php the_sub_field( 'hours_title' ); ?></strong><br>
							<span><?php the_sub_field( 'hours_content' ); ?></span>
						</div>
					<?php endwhile;
					while(have_rows( 'contact_details', $contact_page )): the_row(); ?>
						<address>
							<?php the_sub_field( 'street_address' ); ?><br />
							<?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?> <?php the_sub_field( 'zipcode' ); ?><br />
							<?php the_sub_field( 'phone' ); ?><br />
							<a href='mailto:<?php the_sub_field( 'email_address' ); ?>'><?php the_sub_field( 'email_address' ); ?></a>
						</address>
					<?php endwhile; ?>
					<nav id="sidebar_social_menu">
						<?php 
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'container_class' => 'social-menu',
								)
							);
						?>
					</nav>
				</aside>
			</div>
		</div>
	</div>
</section>

<?php
	if(get_field( 'nn_include_banner_cta', 'option' )):
		while(have_rows( 'nn_banner_cta', 'option' )): the_row();
			get_template_part( 'template-parts/page/content', 'call-to-action' );
		endwhile;
	endif;
?>