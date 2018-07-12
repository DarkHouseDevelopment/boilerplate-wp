
	<footer role="contentinfo">
		<div class="wrap">
			<div class="footer-logos">
				<a href="http://sunbeltholdings.com" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-sunbelt-vertical.png" alt="Sunbelt Holdings" /></a>
				<a class="logo" href="/"><?php echo file_get_contents(get_template_directory() . '/assets/img/union-park-logo.svg'); ?></a>
				<a href="https://www.usrealco.com/" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-usaa-2-sm.png" alt="USAA Real Estate Company" /></a>
			</div>
			<p class="footer-copyright">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?><sup>&trade;</sup></p>
			<nav id="footer_menu" role="navigation">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container_class' => 'footer-menu',
						)
					);
				?>
			</nav>
			<nav id="social_menu" role="navigation">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'container_class' => 'social-menu',
						)
					);
				?>
			</nav>
			<div class="hud-bug"><img src="<?php echo get_template_directory_uri() ?>/assets/img/footer-hud-bug.png" alt="Equal Housing Lender" width="24" /></div>
		</div>
	</footer>
</div> <!-- end container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>
<?php wp_footer(); ?>

</body>
</html>