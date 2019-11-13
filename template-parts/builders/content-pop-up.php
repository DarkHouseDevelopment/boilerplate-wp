<?php 
	$popup_trigger = get_field( 'pop-up_trigger', 'option' ) ? get_field( 'pop-up_trigger', 'option' ) : array(); 
	$builder_contact = get_field( 'builder_contact' );
?>
<section id="builder_popup_form" data-builder="<?php the_title(); ?>" data-builderemail="<?php echo $builder_contact[0]['email'] ?>" data-exit="<?php echo in_array('exit', $popup_trigger) ? "true" : ""; ?>" data-scroll="<?php echo in_array('scroll', $popup_trigger) ? "true" : ""; ?>" data-timed="<?php echo in_array('timed', $popup_trigger) ? "true" : ""; ?>" data-delay="<?php the_field( 'timed_delay', 'option' ); ?>" data-dismiss="<?php the_field( 'dismissed_timer', 'option' ); ?>">
	<div class="overlay-bg"></div>
	<div class="overlay-content">
		<article>
			<h4><?php the_field( 'pop-up_title', 'option' ); ?></h4>
			<a href="javascript:void(0);" class="toggle-btn btn"><?php the_field( 'pop-up_button_text', 'option' ); ?></a>
			<?php 
			if(get_field( 'pop-up_form', 'option' )):
				$popup_form = get_field( 'pop-up_form', 'option' );
				echo do_shortcode( '[contact-form-7 id="'.$popup_form->ID.'" title=""]' ); 
			endif;
			?>
			
			<a href="javascript:void(0);" class="close"><i class="icon-cancel"></i></a>
		</article>
	</div>
</section>