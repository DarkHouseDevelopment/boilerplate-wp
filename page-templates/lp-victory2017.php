<?php
/*
Template Name: LP - Victory 2017
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
    <link rel='stylesheet' id='styles-css' href='<?php echo get_template_directory_uri(); ?>/assets/css/lp-ev-2017-styles.css' type='text/css' media='all'>
    <link rel='shortlink' href='http://verrado.com/'>
    
<!--[if (lt IE 9) & (!IEMobile)]>
<script src="assets/js/respond-min.js"></script>
<![endif]-->

</head>

<body id="home" class="home page page-id-2 page-template page-template-page-home page-template-page-home-php desktop chrome lp-victory-2017">
		
    <div id="template_page-home" class="container">
        <header role="banner">
			<div id="logo_circle"></div>
            <div class="wrap full_wrap">
              <a class="logo" href="http://verrado.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Verrado"></a>
            </div>
        </header>

		<?php $header_bg = get_field('header_bg'); ?>
        <section id="find_a_home" class="victory form_pos_<?php the_field("form_position"); ?>" style="background-image: url(<?php echo $header_bg['url']; ?>);">
	        <?php if(get_field('victory_logo')): ?>
	        	<?php $victory_logo = get_field('victory_logo'); ?>
				<img id="victory-logo" src="<?php echo $victory_logo['url']; ?>" alt="Victory at Verrado" />
		    <?php endif; ?>
            <?php $form_selection = get_field( 'form_selection' ); ?>
            <div class="homesearch <?php echo $form_selection; ?>">
                <div class="wrap">
		            <?php if($form_selection == 'default' || !$form_selection): 
	                    get_template_part( 'template-parts/landing-pages/content', 'victory-crm-form' );
	                else:
		                echo do_shortcode( get_field( 'gravity_form' ) );
		            endif; ?>
                </div>
            </div>
        </section>

        <section id="explore">
            <div class="wrap">
                <header>
	                <?php if(get_field('body_title')):
	                    echo "<h2>".get_field('body_title')."</h2>";
	                endif; ?>

                    <?php the_field('body_text'); ?>
                </header>

                <div class="grid_blocks">
                    <div class="row">
                        <div class="block lg_square d_50">
	                        <?php
		                        $video_source = get_field('video_source');
		                        $video_id = get_field('video_id');
		                        
		                        if($video_id && $video_source):
		                    ?>
	                        <div class="video-wrapper">
		                        <?php if($video_source == 'youtube'):
			                        echo '<iframe src="https://www.youtube.com/embed/'.$video_id.'?rel=0" '.get_field('video_event_tracking').' frameborder="0" allowfullscreen></iframe>';
			                      elseif($video_source == 'vimeo'):
			                      	echo '<iframe src="https://player.vimeo.com/video/'.$video_id.'" '.get_field('video_event_tracking').' frameborder="0" allowfullscreen></iframe>';
			                      endif; ?>
	                        </div>
	                        <?php endif; ?>
                        </div>
												
						<?php
							$image_1 = get_field('image_block_1');
							$image_2 = get_field('image_block_2');
							$image_3 = get_field('image_block_3');
							$image_4 = get_field('image_block_4');
							
							if($image_1 && $image_2 && $image_3 && $image_4):
						?>
						<div class="block lg_square d_50">
	                        <div class="block lg_rectangle">
		                        <img src="<?php echo $image_1['url']; ?>" />
	                        </div>
	                        
	                        <div class="block sm_square last">
		                        <img src="<?php echo $image_2['url']; ?>" />
	                        </div>
	
	                        <div class="block sm_square">
		                        <img src="<?php echo $image_3['url']; ?>" />
	                        </div>
	
	                        <div class="block lg_rectangle last">
		                        <img src="<?php echo $image_4['url']; ?>" />
	                        </div>
						</div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>
