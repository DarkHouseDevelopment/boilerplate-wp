<?php 
/*
Template Name: Block Builder
*/

get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 

	get_template_part( 'template-parts/page/content', 'hero' );
	
	// get_template_part( 'template-parts/page/content', 'page' );

	the_content();
	
	endwhile; 
endif; 

?>
<div id="send_info_overlay" class="events-send-info" data-builder="" data-builderemail="">
	<div class="overlay-bg"></div>
	<div class="overlay-content">
		<article>
			<h4>Send me info about <span class='builder-title'></span> at Union Park at Norterra</h4>
			<?php echo do_shortcode( '[contact-form-7 id="546" title="Send Me Info"]' ); ?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</div>
<?php 
get_footer(); 