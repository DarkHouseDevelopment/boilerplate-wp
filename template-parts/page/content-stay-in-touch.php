<section class="content-section stay-in-touch">
	<div class="wrap">
		<aside>
			<?php echo file_get_contents(get_template_directory() . '/assets/img/icon-tree.svg'); ?><br />
			<h3><?php bloginfo('name'); ?></h3>
			<?php while(have_rows( 'contact_details' )): the_row(); ?>
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
		<article>
			<h2><?php the_field( 'form_title' ); ?></h2>
			<?php echo do_shortcode( get_field( 'form_shortcode' ) ); ?>
			<?php //the_field( 'form_embed_code' ); ?>
			<p class="disclaimer"><?php the_field( 'form_disclaimer' ); ?></p>
		</article>
	</div>
</section>