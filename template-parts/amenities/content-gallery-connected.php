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
							<strong><?php echo get_sub_field( 'hours_title' ); ?></strong><br>
							<span><?php echo get_sub_field( 'hours_content' ); ?></span>
						</div>
					<?php endwhile;
					while(have_rows( 'contact_details', $contact_page )): the_row(); ?>
						<address>
							<?php echo get_sub_field( 'street_address' ); ?><br />
							<?php echo get_sub_field( 'city' ); ?>, <?php echo get_sub_field( 'state' ); ?> <?php echo get_sub_field( 'zipcode' ); ?><br />
							<?php echo get_sub_field( 'phone' ); ?><br />
							<a href='mailto:<?php echo get_sub_field( 'email_address' ); ?>'><?php echo get_sub_field( 'email_address' ); ?></a>
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