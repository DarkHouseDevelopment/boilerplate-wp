<?php
/*
Template Name: Homes Search Results
*/

$district = get_field('home_district');
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
	if(isset($_REQUEST['homes-in']) && $_REQUEST['homes-in'] != ''){
		if($_REQUEST['homes-in'] === 'quick-move'){
			$_SESSION['quick-move'] = 'yes';
		} else {
			$_SESSION['quick-move'] = 'no';
		}
		$_SESSION['homes-in'] = $_REQUEST['homes-in'];
	} else {
		$_SESSION['homes-in'] = array('heritage','main-street','verrado','victory');
		$_SESSION['quick-move'] = 'no';
	}
	$_SESSION['wp_query'] = null;
} else {
	// resetting quick move-in in case they land directly on these results with no POST
	$_SESSION['quick-move'] = 'no';
}
//echo '$_POST = '; print_r($_POST);
//echo '<br />$_SESSION = '; print_r($_SESSION);

$beds_min = $_SESSION['beds-min'];
$baths_min = $_SESSION['baths-min'];
$sqft_min = $_SESSION['sqft-min'];
$price_min = $_SESSION['price-min'];
$price_max = $_SESSION['price-max'];

if($_SESSION['homes-in'] === 'quick-move'){
	$homes_in = array('heritage','main-street','verrado','victory');;
	$_SESSION['quick-move'] = 'yes';
} else {
	$homes_in = $_SESSION['homes-in'];
}

$quick_move = $_SESSION['quick-move'];

if($quick_move == 'yes'){
	$quick_move_query = array(
		'key' => 'quick_move',
		'value' => $quick_move,
		'compare' => 'LIKE'
	);
} else {
	$quick_move_query = '';
}

//print_r($_POST);

get_header(); ?>

<section id="home_results" role="main">

	<?php get_template_part( 'template-parts/homes/content', 'header-home-search' ); ?>

	<div class="section listing">
		<div class="wrap">
			<?php if(isset($_GET['sent']) && $_GET['sent'] == 1): ?>
			<div class="sendinfo-thankyou">
				<h3>Thank you.</h3>
				<p>Your submission has been received for more information about the <?php echo urldecode($_GET['model']); ?> model at Verrado.<br />A representative from <?php echo urldecode($_GET['builder']); ?> will contact you shortly.</p>
			</div>
			<?php endif; ?>
			
			<?php if($_SESSION['quick-move'] === 'yes'): ?>
			<div class="message print_qmi">
				<h3><a href="/print-quick-move-in-homes/" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i> Print our list of Quick Move-In Homes.</a></h3>
			</div>
			<?php endif; ?>	
			
			<?php if(isset($_GET['lp'])): ?>
			<?php $community = $_GET['lp'] == 2 ? "Victory" : "Verrado"; ?>
			<div class="lp-thankyou message success">
				<h3>Thank you for your interest in <?php echo $community; ?>.</h3>
				<p>You will start receiving <?php echo $community; ?> updates in your inbox soon. Enjoy the many homes <?php echo $community; ?> has to offer below.</p>
			</div>
			<?php endif; ?>
			
			<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

				$args = array(
					'posts_per_page' => 10,
					'post_status' => 'publish',
					'post_type' => 'homes',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'min_beds',
							'value' => $beds_min,
							'compare' => '>='
						),
						array(
							'key' => 'min_baths',
							'value' => $baths_min,
							'compare' => '>='
						),
						array(
							'key' => 'square_footage',
							'value' => $sqft_min,
							'compare' => '>='
						),
						array(
							'key' => 'available_in',
							'value' => $homes_in,
							'compare' => 'LIKE'
						),
						$quick_move_query,
						array(
							'key' => 'starting_price',
							'value' => $price_min,
							'compare' => '>=',
							'type' => 'NUMERIC'
						),
						array(
							'key' => 'starting_price',
							'value' => $price_max,
							'compare' => '<=',
							'type' => 'NUMERIC'
						),
					),
					'meta_key' => 'starting_price',
					'orderby'=> 'meta_value_num',
					'order' => 'ASC',
					'paged' => $paged
				);
				
				$args_allresults = $args;
				$args_allresults['posts_per_page'] = -1;

				$resultCount = 0;
				
				//if(isset($_SESSION['wp_query'])):
				//	$loop = $_SESSION['wp_query'];
				//else:
					$loop = new WP_Query($args);
					$allresults = new WP_Query($args_allresults);
					$_SESSION['wp_query'] = $allresults;
				//endif;

				//echo '<pre>';
				//print_r($loop);
				//echo '</pre>';

				$temp_query = $wp_query;
				$wp_query = NULL;
				$wp_query = $loop;

				if ( have_posts() ) :

					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/homes/content', 'home-result' );

					endwhile;

					if(function_exists('wp_simple_pagination')) {
						echo '<footer class="pagination">';
						wp_simple_pagination();
						echo '</footer>';
					};

					$wp_query = NULL;
					$wp_query = $temp_query;
				else: ?>
				<article>
					<header>
						<h1>Sorry, no homes matched your search criteria.</h1>
					</header>

					<div class="textarea">
						<h2>Please try expanding your search to see more possible results.</h2>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
				</article>
			<?php endif; ?>
		</div>	<!-- end wrap -->
	</div>	<!-- end listing -->
</section>

<?php get_footer(); ?>