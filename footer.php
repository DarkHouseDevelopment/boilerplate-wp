
	<footer role="contentinfo">
		<div class="wrap">
			<div class="footer-logos">
				<a href="http://sunbeltholdings.com" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-sunbelt-vertical.png" alt="Sunbelt Holdings" /></a>
				<a class="logo" href="/"><?php echo file_get_contents(get_template_directory() . '/assets/img/union-park-logo-reg.svg'); ?></a>
				<a href="https://www.usrealco.com/" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-usaa-2-sm.png" alt="USAA Real Estate Company" /></a>
			</div>
			<p class="footer-copyright">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?><sup>&reg;</sup></p>
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
			<nav id="social_menu">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'container_class' => 'social-menu',
						)
					);
				?>
			</nav>
			<div class="hud-bug"><a href="/terms-of-use/"><img src="<?php echo get_template_directory_uri() ?>/assets/img/footer-hud-bug.png" alt="Equal Housing Lender" width="24" /></a></div>
		</div>
	</footer>
</div> <!-- end container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>
<?php wp_footer(); ?>

<!-- Activity name for this tag: C1531_Union Park at Norterra View Thru -->
<!-- URL of the webpage where the tag will be placed: http://unionparkatnorterra.com/ -->
<script type='text/javascript'>
var axel = Math.random()+"";
var a = axel * 10000000000000;
document.write('<img src="https://pubads.g.doubleclick.net/activity;xsp=4397652;qty=1;cost=[revenue];ord=[order id]?" width=1 height=1 border=0/>');
</script>
<noscript>
<img src="https://pubads.g.doubleclick.net/activity;xsp=4397652;qty=1;cost=[revenue];ord=[order id]?" width=1 height=1 border=0/>
</noscript>

</body>
</html>