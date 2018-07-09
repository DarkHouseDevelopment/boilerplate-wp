
	<footer role="contentinfo">
		<div class="wrap">
			<?php the_custom_logo(); ?>
			<p class="footer-copyright">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>
			<div class="footer-logos">
				<a href="http://sunbeltholdings.com" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-sunbelt-vertical.png" alt="Sunbelt Holdings" /></a>
				<a href="https://www.usrealco.com/" target="_blank" rel="nofollow noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-usaa-2-sm.png" alt="USAA Real Estate Company" /></a>
			</div>
		</div>
	</footer>
</div> <!-- end container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts-min.js"></script>
<?php wp_footer(); ?>

</body>
</html>