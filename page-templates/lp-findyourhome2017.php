<?php
/*
Template Name: LP - Find Your Home 2017
*/
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
    <link rel="pingback" href="http://verrado.com/xmlrpc.php">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-min.js"></script>
	<script src="https://use.typekit.net/chl0grr.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6262094/7919372/css/fonts.css" />
    
    <?php wp_head(); ?>
    
    <link rel='stylesheet' id='layout-css' href='<?php echo get_template_directory_uri(); ?>/assets/css/layout.css' type='text/css' media='all'>
    <link rel='stylesheet' id='styles-css' href='<?php echo get_template_directory_uri(); ?>/assets/css/lp-fyh-2017-styles.css' type='text/css' media='all'>
    <link rel='shortlink' href='http://verrado.com/'>
    
<!--[if (lt IE 9) & (!IEMobile)]>
<script src="assets/js/respond-min.js"></script>
<![endif]-->

</head>

<body id="home" class="home page page-id-2 page-template page-template-page-home page-template-page-home-php desktop chrome lp-fyh-2017">
    <div id="template_page-home" class="container">
        <header role="banner">
			<div id="logo_circle"></div>
            <div class="wrap full_wrap">
              <a class="logo" href="http://verrado.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Verrado"></a>
            </div>
        </header>
				
				<?php $header_bg = get_field('header_bg'); ?>
        <section id="find_a_home" style="background-image: url(<?php echo $header_bg['url']; ?>)">
            <div class="homesearch">
                <div class="wrap">
                    <form class="lp_form" id="powf_CC02A5A94477E3118A7F78E3B50834A9" action="https://cloud.crm.powerobjects.net/powerWebFormV3/PowerWebFormData.aspx?t=D04YyiAnFwXb3oS9OoO98NxY4Lcsg5t2qxaownU4MeM36izGd9p%2buM6Uuxj1IHGZhBbxCkvr2OgVS5UrCq8sCDmOE87MikuYqriSruZZhmTqQ8Bs9sC7J8rGG6cC3bX2IB%2fKvmrE8cUK%2fg8dJbHPbbzBrNf%2beMam%2bJ1QuwpwvSY%3d&formId=powf_CC02A5A94477E3118A7F78E3B50834A9" method="post">
                        <h1>Find a home in Verrado.</h1>

                        <div class="row">
                            <div class="input-field">
                                <p class="input"><label for="fullname">Full Name*</label><input id="fullname" type="text" class="req" name="fullname" /></p>
                                
                                <input id="hidden_fname" type="hidden" class="req" name="powf_ce02a5a94477e3118a7f78e3b50834a9" />
                                <input id="hidden_lname" type="hidden" class="req" name="powf_cd02a5a94477e3118a7f78e3b50834a9" />
                            </div>

                            <div class="input-field">
								<p class="last input"><label for="powf_a972dca94477e311b68478e3b5107e67">Email*</label><input type="email" class="req" name="powf_a972dca94477e311b68478e3b5107e67" /></p>
                            </div>

                            <div class="input-field short">
								<p class="input"><label for="powf_a772dca94477e311b68478e3b5107e67">Zip*</label><input id="zip" type="text" class="req" name="powf_a772dca94477e311b68478e3b5107e67" /></p>
                            </div>

                            <div class="select input-field">
                                <p class="styled-select">
	                            <label>Moving time frame</label>
	                            <select name="powf_d202a5a94477e3118a7f78e3b50834a9">
                                    <option disabled="disabled" selected="selected"></option>

                                    <option value="Ready Now">
                                        Ready Now
                                    </option>

                                    <option value="1-2 months">
                                        1-2 months
                                    </option>

                                    <option value="3-6 months">
										3-6 months
                                    </option>

                                    <option value="6-12 months">
										6-12 months
                                    </option>

                                    <option value="More Than a Year">
										More Than a Year
                                    </option>
                                </select></p>
                            </div>
							
							<!-- Web Lead IP -->
							<input type="hidden" id="ip-address" name="powf_aa72dca94477e311b68478e3b5107e67" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
							<!-- Lead Source -->
							<input type="hidden" id="lead-source" name="powf_a872dca94477e311b68478e3b5107e67" value="<?php the_field('lead_source'); ?>" />
							<!-- Initial Contact Method -->
							<input type="hidden" id="init-contact-type" name="powf_d002a5a94477e3118a7f78e3b50834a9" value="Internet" />
							<!-- new_communityid -->
							<input type="hidden" id="community" name="powf_cf02a5a94477e3118a7f78e3b50834a9" value="{ED24C862-AE7D-E011-8CE8-78E7D1622FE5}" />
							<!-- websiteurl -->
							<input type="hidden" id="referring-url" name="powf_d102a5a94477e3118a7f78e3b50834a9" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
		
							<input type="hidden" name="ignore_submitmessage" value="" />
							<input type="hidden" name="ignore_linkbuttontext" value="" />
							<input type="hidden" name="ignore_redirecturl" value="<?php the_field('form_redirect'); ?>" />
							<input type="hidden" name="ignore_redirectmode" value="Auto" />

                            <div class="button input-field">
                                <p><input type="submit" id="homesearch-submit" value="<?php the_field('submit_button_text'); ?>" <?php the_field('submit_button_event_tracking'); ?>></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="explore">

            <div class="wrap">
                <header>
                    <h2><?php the_field('body_title'); ?></h2>

                    <?php the_field('body_text'); ?>
                </header>

                <div class="grid_blocks">
                    <div class="row">
                        <div class="block lg_square d_50">
	                        <?php
		                        $video_source = get_field('video_source');
		                        $video_id = get_field('video_id');
		                      ?>
	                        <div class="video-wrapper">
		                        <?php if($video_source == 'youtube'):
			                        echo '<iframe src="https://www.youtube.com/embed/'.$video_id.'?rel=0" '.get_field('video_event_tracking').' frameborder="0" allowfullscreen></iframe>';
			                      elseif($video_source == 'vimeo'):
			                      	echo '<iframe src="https://player.vimeo.com/video/'.$video_id.'" '.get_field('video_event_tracking').' frameborder="0" allowfullscreen></iframe>';
			                      endif; ?>
	                        </div>
                        </div>
												
						<?php
							$image_1 = get_field('image_block_1');
							$image_2 = get_field('image_block_2');
							$image_3 = get_field('image_block_3');
							$image_4 = get_field('image_block_4');
						?>
						<div class="block lg_square d_50">
	                        <div class="block sm_square">
		                        <img src="<?php echo $image_1['url']; ?>" />
	                        </div>
	
	                        <div class="block lg_rectangle last">
		                        <img src="<?php echo $image_2['url']; ?>" />
	                        </div>
	
	                        <div class="block lg_rectangle">
		                        <img src="<?php echo $image_3['url']; ?>" />
	                        </div>
	
	                        <div class="block sm_square last">
		                        <img src="<?php echo $image_4['url']; ?>" />
	                        </div>
						</div>
                    </div>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>
