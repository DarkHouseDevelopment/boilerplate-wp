<?php
/*
Template Name: Find a Home
*/

session_start();

get_header(); 

if ( have_posts() ): 
	while ( have_posts() ) : the_post();
		$bg_image = get_field('background_image'); 
		?>
		<section role="main" style="background: url('<?php echo $bg_image['url']; ?>') center no-repeat; background-size:cover;">
			<?php 
				if(have_rows( 'content_sections' )):
					while(have_rows( 'content_sections' )): the_row();
					
						$layout = get_row_layout();
						
						switch($layout){
								
							case 'find_a_home_form':
								$form_title = get_sub_field( 'form_title' );
								$submit_btn_text = get_sub_field( 'submit_button_text' );
								get_template_part( 'template-parts/homes/content', 'find-a-home-form' );
								break;
						}
					
					endwhile;
				endif;
			?>
		</section>
	<?php endwhile;
endif;

get_footer();