<?php
/*
Template Name: Print Quick Move-In
*/

$_SESSION['quick-move'] = 'yes';
global $post;
$current_page = $post->ID;
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="en">
<!--<![endif]-->

<head>	
    <meta charset="utf-8">

    <title><?php wp_title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cleartype" content="on">
    <link rel="shortcut icon" href="img/favicon.ico">
    
	<?php wp_head(); ?>
	
	<script src="https://use.typekit.net/chl0grr.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6262094/7919372/css/fonts.css" />
    
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-min.js"></script>
    <link rel='stylesheet' id='layout-css' href='<?php echo get_template_directory_uri(); ?>/assets/css/layout.css' type='text/css' media='all'>
    <link rel='stylesheet' id='styles-css' href='<?php echo get_template_directory_uri(); ?>/assets/css/print-qmi.css' type='text/css' media='all'>
    
	
	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond-min.js"></script>
	<![endif]-->
	
	<style>
	@page { size: auto;  margin: 4mm; }
	</style>

</head>

<body id="<?php echo $post->post_name; ?>" <?php body_class('print-qmi-page'); ?>>
		
    <div id="template_page-print-qmi" class="container">				
		<?php 			
		// filter
		function my_posts_where( $where ) {
			$where = str_replace("meta_key = 'qmi_homes_%", "meta_key LIKE 'qmi_homes_%", $where);
			return $where;
		}				
		add_filter('posts_where', 'my_posts_where');	
		
		$args['Verrado'] = array(
			'posts_per_page' => -1,
			'post_status' => array('publish', 'draft'),
			'post_type' => 'homes',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'quick_move',
					'value' => 'yes',
					'compare' => 'LIKE'
				),
				array(
					'key' => 'available_in',
					'value' => 'verrado',
					'compare' => 'LIKE'
				)
			),
			'meta_key' => 'builder',
			'orderby'=> 'meta_value',
			'order' => 'ASC'
		);
		
		$args['Victory'] = array(
			'posts_per_page' => -1,
			'post_status' => array('publish', 'draft'),
			'post_type' => 'homes',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'quick_move',
					'value' => 'yes',
					'compare' => 'LIKE'
				),
				array(
					'key' => 'available_in',
					'value' => 'victory',
					'compare' => 'LIKE'
				)
			),
			'meta_key' => 'builder',
			'orderby'=> 'meta_value',
			'order' => 'ASC'
		);
		
		foreach($args as $key => $arg_list):
			$qmi_loop = new WP_Query($arg_list);

			if ( $qmi_loop->have_posts() ) : ?>
				
				<?php if($key === "Verrado"): ?>
			        <header id="verrado_banner" role="banner">
			            <div class="wrap nav_wrap">
			            	<div class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="<?php bloginfo('name'); ?>" /></div>
			            	<div class="header-title">
				            	<h1 class="left">Quick Move-In</h1>
				            	<h1 class="right">Homes Available</h1>
			            	</div>
			            </div>
			        </header>
			    <?php else: ?>
			    	<header id="victory_banner" role="banner">
			            <div class="wrap nav_wrap">
			            	<div class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-victory-black-red.png" alt="Victory at Verrado" /></div>
			            	<div class="header-title">
				            	<h1 class="center"><span>Quick Move-In</span><br />Homes Available</h1>
			            	</div>
			            </div>
			        </header>
			    <?php endif; ?>
		
				<section id="<?php echo strtolower($key); ?>_results">
					<div class="wrap">
						<header <?php echo $key === "Two" ? "class='print-only'" : ""; ?>>
							<p class="date">Available as of <?php echo date("m.d.Y"); ?></p>
						</header>
					
						<table class="qmi_results" border="0" cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr bgcolor="#a7a9ac" class="thead">
									<td bgcolor="#a7a9ac">Builder/Series</th>
									<td bgcolor="#a7a9ac">Address</th>
									<td bgcolor="#a7a9ac">Plan</th>
									<td bgcolor="#a7a9ac">Lvl</th>
									<td bgcolor="#a7a9ac">Sq/Ft</th>
									<td bgcolor="#a7a9ac">Bed/Bath/Grg</th>
									<td bgcolor="#a7a9ac">Price*</th>
									<td bgcolor="#a7a9ac">Avail.</th>
								</tr>
								<?php while ( $qmi_loop->have_posts() ) : $qmi_loop->the_post(); ?>
									<?php 
										$builder = get_field('builder');
										$home_title = $post->post_title;
										$plan_name = preg_replace("/-[^-]*$/", "", $home_title); 

										// get quick move-in details
										if(have_rows("qmi_homes")):
											while(have_rows("qmi_homes")): the_row();	
												include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/verrado-2.0/assets/inc/qmi-home-variables.php'; ?>
												
												<tr>
													<td data-th="Builder/Series">
														<?php echo $builder->post_title ? $builder->post_title : $builder; echo !empty($builder_series) ? " - $builder_series" : ""; ?>
													</td>
													<td data-th="Address">
														<?php echo $street_address; ?>
													</td>
													<td data-th="Plan">
														<?php echo $post->post_status == 'draft' ? $plan_name : "<a href='".get_the_permalink()."' target='_blank'>$plan_name</a>"; ?>
													</td>
													<td data-th="Levels">
														<?php echo $levels; ?>
													</td>
													<td data-th="Sq/Ft">
														<?php echo $square_feet; ?>
													</td>
													<td data-th="Bed/Bath">
														<?php echo "$bedrooms / $bathrooms / $garages"; ?>
													</td>
													<td data-th="Price*">
														<?php 
															if($price_range):
																echo ucwords(str_replace('-',' $',$price_range)) . "K"; 
															else:
																echo "$".number_format($price);
															endif;
														?>
													</td>
													<td data-th="Available">
														<?php echo $available; ?>
													</td>
												</tr>
									<?php
											endwhile;
										endif;
									?>
								<?php endwhile; ?>
							</tbody>
				        </table>	
					</div>	<!-- end wrap -->
				</section>	
		        
			<?php else:  /*?>
				<section id="qmi_lists">
					<div class="wrap">
						<article>
							<header>
								<h1>Sorry, no quick move-in homes were found.</h1>
							</header>
		
							<div class="textarea">
								<h2>Please check back at a later date to see new quick move-in homes when they become available.</h2>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
							</div>
						</article>	
					</div>	<!-- end wrap -->
				</section>	
			<?php */ endif; ?>
			
	        <section id="<?php echo strtolower($key); ?>_footer" class="qmi_disclaimer print-only">
		        <div class="wrap">
			        <div class="copyright row">
				        <div class="text md-10">
					        <div class="blue"><?php echo get_field("footer_disclaimer", $current_page); ?></div>
					        <?php echo get_field("footer_copyright", $current_page); ?>
				        </div>
				        <div class="logo md-2 last">
					        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dmb-alt.png" />
				        </div>
			        </div>
		        </div>
	        </section>
			<div class='page-break'></div>

		<?php endforeach; ?>
		<?php wp_reset_query(); ?>
		
		<section class="qmi_disclaimer screen-only">
		    <div class="wrap">
		        <div class="copyright row">
			        <div class="text md-10">
				        <div class="blue"><?php echo get_field("footer_disclaimer", $current_page); ?></div>
				        <?php echo get_field("footer_copyright", $current_page); ?>
			        </div>
			        <div class="logo md-2 last">
				        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dmb-alt.png" />
			        </div>
		        </div>
		    </div>
		</section>
		
		<div class="overlay">
			<div id="print_modal">
				<p><strong>Select which Quick Move-In Homes you would like to print:</strong></p>
				<p>
					<a href="javascript:void(0);" onclick="printQMI('verrado');" class="btn">Verrado</a>
					<a href="javascript:void(0);" onclick="printQMI('victory');" class="btn">Victory</a>
					<a href="javascript:void(0);" onclick="printQMI('both');" class="btn">Both</a>
				</p>
				<a href="javascript:void(0);" onclick="printQMI('close');" class="close">Cancel</a>
			</div>
		</div>
        
        <?php get_footer(); ?>
