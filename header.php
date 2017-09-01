<?php
error_reporting(0);
ini_set('display_errors', '0');
	
if($_REQUEST['homes-in'] == "custom-homes" && is_page_template(array('page-templates/homes-results.php','page-templates/quick-move-results.php'))):
	$_SESSION['homes-in'] = '';
	header( 'Location: /custom-homes/' ) ;
endif;
?>
<!doctype html>
<html lang="en">
<head>

<title><?php is_front_page() ? bloginfo('name') : ''; ?><?php echo is_front_page() ? ' | ' : ''?><?php is_front_page() ? bloginfo('description') : wp_title()?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<?php wp_head(); ?>

</head>

<?php 
global $post;
$slug = $post->post_name;
$parent = $post->post_parent;
$parent_slug = get_post_field( 'post_name', $parent );

$preheader_menu = is_user_logged_in() ? 'preheader_resident' : 'preheader';

$main_menu = 'main';
$menu_class = 'menu';
if(user_has_role('verrado')):
	$main_menu = 'main_verrado_resident';
	$menu_class = 'menu residents';
elseif(user_has_role('victory')):
	$main_menu = 'main_victory_resident';
	$menu_class = 'menu residents';
endif;
?>
<body <?php body_class(); ?>>

<div <?php echo $slug == 'home' ? '' : 'id="'.$slug.'"'; ?> class="container <?php echo $parent ? "parent-".$parent_slug : ""; ?>">
	
	<nav id="mobile_main_menu" role="navigation">
		<div class="wrap">
			<?php 
				wp_nav_menu(
					array(
						'theme_location' => $main_menu,
						'container_class' => $menu_class,
					)
				);
			?>
			<nav id="mobile_pre_menu" role="navigation">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => $preheader_menu,
						'container_class' => 'menu',
					)
				);
			?>
			</nav>
		</div>
	</nav>
	
	<header role="banner" class="open">
		<div id="logo_circle"></div>
		
		<div class="wrap">
			<nav id="pre_menu" role="navigation">
			<?php 
				wp_nav_menu(
					array(
						'theme_location' => $preheader_menu,
						'container_class' => 'menu',
					)
				);
			?>
			</nav>
		</div>
		
		<a id="mobile_logo" href="<?php bloginfo('url'); ?>">Home</a>
		
		<a id="menu_btn" class="main-menu-toggle" href="javascript:void(0);"><span class="fa fa-bars"></span></a>
		
		<nav id="main_menu" role="navigation">
			<div class="wrap">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => $main_menu,
							'container_class' => $menu_class,
						)
					);
				?>
			</div>
		</nav>
	</header>
