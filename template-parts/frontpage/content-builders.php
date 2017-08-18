<?php
	$bg_color = get_sub_field( 'background_color' );
	$bg_image = get_sub_field( 'background_image' );
	
	if($bg_color != "#ffffff" || $bg_image):
		$section_class = "white-text";
	else:
		$section_class = "";
	endif;
	
	$title_icon = get_sub_field( 'section_title_icon' );
	
	$btn_text = get_sub_field( 'button_text' );
	$btn_type = get_sub_field( 'button_link_type' );
	
	switch($btn_type){
		case "internal":
			$btn_link_page = get_sub_field( 'button_link_internal' );
			$btn_link = get_permalink($btn_link_page);
			$btn_target = "_self";
			break;
			
		case "media":
			$btn_link_media = get_sub_field( 'button_link_media' );
			$btn_link = $btn_link_media['url'];
			$btn_target = "_blank";
			break;
			
		case "external":
			$btn_link = get_sub_field( 'button_link_external' );
			$btn_target = "_blank";
			break;
			
		case "custom":
			$btn_link = get_sub_field( 'button_link_custom' );
			$btn_target = get_sub_field( 'button_target' );
			break;
	}
?>
<section class="homepage-builders homepage-section <?php echo $section_class; ?>" style="background: <?php echo $bg_color; echo $bg_image ? " url(".$bg_image['url'].") center center / cover no-repeat" : ""; ?>;">
	<div class="wrap">
		<article>
			<header>
				<h3 class="section-title"><?php the_sub_field( 'section_title' ); ?></h3>
			</header>
			
			<?php
				if(have_rows( 'builders' )):
					echo "<div class='builders-flex-container'>";
					
					while(have_rows( 'builders' )): the_row();
						$builder_logo = get_sub_field( 'builder_logo' );
						$builder_link = get_sub_field( 'builder_link' );
						
						echo "<div class='builder-block'>";
						echo $builder_link ? "<a href='$builder_link' target='_blank' rel='noopener noreferrer'><div class='builder-logo' style='background: url({$builder_logo['url']}) center center / contain no-repeat;'></div></a>" : "<div class='disabled'><div class='builder-logo' style='background: url({$builder_logo['url']}) center center / contain no-repeat;'></div><h4>Coming Soon</h4></div>";
						echo "</div>";
					endwhile;
					
					echo "</div>";
				endif;
			?>
		</article>
	</div>
</section>