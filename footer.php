
	<footer role="contentinfo">
		<div class="wrap">
			<nav class="social">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'container_class' => 'menu',
						)
					);
				?>
			</nav>
			
			<nav id="footer_menu" role="navigation" class="footernav">
				<?php 
					$footer_menu = user_has_role('verrado') || user_has_role('victory') ? 'footer_resident' : 'footer';

				    wp_nav_menu(
						array(
							'theme_location' => $footer_menu,
							'container_class' => 'menu',
						) 
					);
				?>
			</nav>

			
			<div class="copy">&copy; <?php echo date('Y'); ?> DMB White Tank, LLC</div>
			
			<a class="logo_dmb_web" href="http://dmbinc.com/" target="_blank"><img class="logo_dmb" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dmb-ltgrey.png" /></a>
			
			<?php 
			if(!empty($_GET["ex"])):
				echo "<!-- Exponential Tracking Pixel -->";
				if($_GET["ex"] == 1):
					echo "<img src='http://a.tribalfusion.com/ti.ad?client=702403&ev=1&page=FindYourHome' width='1' height='1' border='0'>";
				elseif($_GET["ex"] == 2):
					echo "<img src='http://a.tribalfusion.com/ti.ad?client=702403&ev=2&page=EnjoyVictory' width='1' height='1' border='0'>";
				elseif($_GET["ex"] == 3):
					echo "<img src='http://a.tribalfusion.com/ti.ad?client=702403&ev=3&page=StayConnected' width='1' height='1' border='0'>";
				endif;
			endif; 
			?>
		</div>
	</footer>
</div> <!-- end container -->

<?php wp_footer(); ?>

</body>
</html>