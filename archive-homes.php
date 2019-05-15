<?php

if(!isset($_GET['s'])):
	header('Location: /home-search/');
endif;

session_start();

if((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))){	
	if(isset($_REQUEST['beds-min'])){
		$_SESSION['beds-min'] = $_REQUEST['beds-min'];
	} else {
		$_SESSION['beds-min'] = 0;
	}
	if(isset($_REQUEST['baths-min'])){
		$_SESSION['baths-min'] = $_REQUEST['baths-min'];
	} else {
		$_SESSION['baths-min'] = 0;
	}
	if(isset($_REQUEST['sqft-min'])){
		$_SESSION['sqft-min'] = $_REQUEST['sqft-min'];
	} else {
		$_SESSION['sqft-min'] = 0;
	}
	if(isset($_REQUEST['price-min'])){
		$_SESSION['price-min'] = $_REQUEST['price-min'];
	} else {
		$_SESSION['price-min'] = 0;
	}
	if(isset($_REQUEST['price-max'])){
		$_SESSION['price-max'] = $_REQUEST['price-max'];
	} else {
		$_SESSION['price-max'] = 600000;
	}
	if(isset($_REQUEST['quick-move'])){
		$_SESSION['quick-move'] = $_REQUEST['quick-move'];
	} else {
		$_SESSION['quick-move'] = 'no';
	}
	if(isset($_REQUEST['builder'])){
		$_SESSION['builder'] = $_REQUEST['builder'];
	} else {
		$_SESSION['builder'] = '';
	}
	$_SESSION['wp_query'] = null;
} else {
	// resetting quick move-in in case they land directly on these results with no POST
	$_SESSION['quick-move'] = 'no';
}
// echo '$_REQUEST = '; print_r($_REQUEST);
// echo '<br />$_SESSION = '; print_r($_SESSION);

$beds_min = $_SESSION['beds-min'];
$baths_min = $_SESSION['baths-min'];
$sqft_min = $_SESSION['sqft-min'];
$price_min = $_SESSION['price-min'];
$price_max = $_SESSION['price-max'];
$quick_move = $_SESSION['quick-move'];
$builder = $_SESSION['builder'];

if($quick_move == 'yes'){
	$quick_move_query = array(
		'key' => 'quick_move',
		'value' => 1,
		'compare' => '='
	);
} else {
	$quick_move_query = '';
}
if(!empty($builder)){
	$builder_query = array(
		'key' => 'builder',
		'value' => $builder,
		'compare' => '='
	);
} else {
	$builder_query = '';
}

get_header(); 

get_template_part( 'template-parts/homes/content', 'header-search' );

include(locate_template( 'template-parts/homes/content-results.php' ));

get_footer();