<!doctype html>
<html lang="en">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<?php wp_head(); ?>

</head>

<?php 
global $wp_query;
$post_id = $wp_query->post->ID;
$post = get_post( $post_id );
$slug = $post->post_name;
?>
<body <?php body_class(); ?>>

<div <?php echo $slug == 'home' ? '' : 'id="'.$slug.'"'; ?> class="container">
	
	<nav id="mobile_main_menu" role="navigation">
		<div class="wrap">
			<?php 
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container_class' => 'menu mobile main',
					)
				);
			?>
		</div>
		<nav id="mobile_pre_menu" role="navigation">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'preheader',
					'container_class' => 'menu mobile pre',
				)
			);
		?>
		</nav>
	</nav>
	
	<header role="banner" class="open">
		<a id="mobile_logo" href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/kukuiula-logo-leaves-white.png" alt="Kukui'ula" /></a>
		
		<a id="menu_btn" class="main-menu-toggle" href="javascript:void(0);"><span class="fa fa-bars"></span></a>
		
		<nav id="main_menu" role="navigation">
			<div class="wrap">
				<?php the_custom_logo(); ?>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main',
							'container_class' => 'menu main',
						)
					);
				?>
				<div id="pre_menu">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'preheader',
							'container_class' => 'menu pre',
						)
					);
				?>
				</div>
			</div>
		</nav>
	</header>
