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

	<header role="banner" class="nonav">
		<div class="wrap">
			<a class="logo" href="/"><?php echo file_get_contents(get_template_directory() . '/assets/img/union-park-logo-reg.svg'); ?></a>
		</div>
	</header>