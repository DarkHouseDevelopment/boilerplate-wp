<?php
	$bg_color = get_sub_field( 'background_color' );
	$bg_css = "background: $bg_color; color:".get_sub_field( 'text_color' );
?>
<section class="content-section upcoming-events" style="<?php echo $bg_css; ?>">
	<div class="wrap">
		<header>
			<h3><?php the_sub_field( 'section_title' ); ?></h3>
		</header>
		<div class="events-container">
			<?php 
				if(have_rows( 'upcoming_events' )):
					while(have_rows( 'upcoming_events' )): the_row();
						$event_img = get_sub_field( 'event_image' );
						$event_title = get_sub_field( 'event_title' );
						$event_description = get_sub_field( 'event_description' );
						$include_btn = get_sub_field( 'include_button' );
						$btn_output = "";
						
						if($include_btn):
							while(have_rows( 'cta_button' )): the_row();
								$btn_text = get_sub_field( 'button_text' );
								$btn_type = get_sub_field( 'button_link_type' );
								
								switch($btn_type){
									case "internal":
										$btn_link_page = get_sub_field( 'button_link_internal' );
										$btn_link = get_permalink($btn_link_page);
										$btn_target = "_self";
										break;
										
									case "external":
										$btn_link = get_sub_field( 'button_link_external' );
										$btn_target = "_blank";
										break;
										
									case "media":
										$btn_link_media = get_sub_field( 'button_link_media' );
										$btn_link = $btn_link_media['url'];
										$btn_target = "_blank";
										break;
										
									case "custom":
										$btn_link = get_sub_field( 'button_link_custom' );
										$btn_target = "_blank";
										break;
								}
								$btn_output = "<a href='$btn_link' class='btn' target='$btn_target'>$btn_text</a>";
							endwhile;
						endif;
						
						echo "<article class='event-block'>";
						echo "<div class='event-image'><img src='".$event_img['url']."' alt='".$event_img['alt']."' /></div>";
						echo "<div class='event-details'><div class='details-inner'><h4>$event_title</h4>$event_description $btn_output</div></div>";
						echo "</article>";
					endwhile;
				endif;
			?>
		</div>
	</div>
</section>