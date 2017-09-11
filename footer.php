
	<footer role="contentinfo">
		<div class="wrap">
			<article class="footer-content">
				<img class="footer-logo" src="<?php echo get_template_directory_uri() ?>/assets/img/kukuiula-logo-leaves-lightgreen.png" alt="" />
				<nav id="footer_menu" role="navigation">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container_class' => 'menu',
						)
					);
				?>
				</nav>
				<?php the_field( 'footer_text', 'option' ); ?>
			</article>
		</div>
	</footer>
</div> <!-- end container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts-min.js"></script>
<?php wp_footer(); ?>

</body>
</html>