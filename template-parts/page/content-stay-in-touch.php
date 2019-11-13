<section class="content-section stay-in-touch">
	<div class="wrap">
		<article>
			<h2><?php the_field( 'form_title' ); ?></h2>
			<?php echo do_shortcode( get_field( 'form_shortcode' ) ); ?>
			<?php //the_field( 'form_embed_code' ); ?>
			<p class="disclaimer"><?php the_field( 'form_disclaimer' ); ?></p>
		</article>
		<aside>
			<?php echo file_get_contents(get_template_directory() . '/assets/img/icon-tree.svg'); ?><br />
			<h3><?php bloginfo('name'); ?></h3>
			<?php if(get_field( 'include_directions_cta' )):
				while(have_rows( 'directions_cta' )): the_row();
					$button_text = get_sub_field( 'button_text' );
					$button_link = get_sub_field( 'button_link' );
					
					echo "<a href='$button_link' class='btn btn-teal directions' target='_blank' rel='nofollow noopenner'>$button_text</a>";
				endwhile;
			endif;
			while(have_rows( 'hours' )): the_row(); ?>
				<div class="hours">
					<strong><?php the_sub_field( 'hours_title' ); ?></strong><br>
					<span><?php the_sub_field( 'hours_content' ); ?></span>
				</div>
			<?php endwhile;
			while(have_rows( 'contact_details' )): the_row(); ?>
				<address>
					<?php echo do_shortcode( "[wpseo_address oneline=false show_country=false show_phone=false show_email=false hide_name=true]" ); ?>
					<span class="wpseo-phone"><a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_sub_field( 'phone' )); ?>" class="tel"><?php the_sub_field( 'phone' ); ?></a></span>
					<span class="wpseo-email"><a href='mailto:<?php the_sub_field( 'email_address' ); ?>'><?php the_sub_field( 'email_address' ); ?></a></span>
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
</section>