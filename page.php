<?php get_header();

if ( have_posts() ): 
	while ( have_posts() ) : the_post(); 
	
	$logo_sliders = 0;

	echo "<section role='main'>";
			
	if(have_rows( 'content_sections' )):
		while(have_rows( 'content_sections' )): the_row();
		
			$layout = get_row_layout();
			
			if($layout == "logos"):
				$logo_sliders++;
			endif;
				
			get_template_part( 'template-parts/page/content', $layout );
		
		endwhile;
	else:
	
		get_template_part( 'template-parts/page/content', 'page' );
	
	endif;
	
	echo "</section>";

	endwhile; 
endif; 


if($logo_sliders > 0): ?>
	
<script type="text/javascript">
	jQuery(document).ready(function($){
		var animated = $('.logos-container').data('animated');
		
		$('.logos-container.animated').slick({
			autoplay: animated,
			arrows: false,
			dots: false,
			slide: '.logo',
			slidesToShow: 6,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 4
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2
					}
				}
			]
		});
	});
</script>
	
<?php endif;


get_footer(); 