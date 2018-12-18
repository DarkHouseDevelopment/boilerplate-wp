<!doctype html>
<html lang="en">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<?php wp_head(); ?>

</head>

<?php 
global $post;
$slug = $post->post_name;
?>
<body <?php body_class(); ?>>


<div <?php echo $slug == 'home' ? '' : 'id="'.$slug.'"'; ?> class="container">

	<nav id="mobile_main_menu" class="main-menu-mobile" role="navigation">
		<?php 
			wp_nav_menu(
				array(
					'theme_location' => 'main',
					'container_class' => 'main-menu',
				)
			);
		?>
	</nav>
	<header role="banner">
		<div class="wrap">
			<a class="logo" href="/"><?php echo file_get_contents(get_template_directory() . '/assets/img/union-park-logo-reg.svg'); ?></a>
			<nav id="main_menu" role="navigation">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'main',
							'container_class' => 'main-menu',
						)
					);
				?>
			</nav>
			<div class="menu-toggle">
				<div class="menu-icon"><div class="menu-icon-inner"></div></div>
			</div>
		</div>
	</header>