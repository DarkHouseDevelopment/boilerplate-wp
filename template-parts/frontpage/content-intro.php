<?php
	$bg_color = get_sub_field( 'background_color' );
	$bg_image = get_sub_field( 'background_image' );
	
	if($bg_color != "#ffffff" || $bg_image):
		$section_class = "white-text";
	else:
		$section_class = "";
	endif;
	
	$include_btn = get_sub_field( 'include_button' );
	if($include_btn):
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
	endif;
?>
<section role="main" class="homepage-intro homepage-section <?php echo $section_class; ?>" style="background: <?php echo $bg_color; echo $bg_image ? " url(".$bg_image['url'].") center center / cover no-repeat" : ""; ?>;">
	<div class="wrap">
		<article>
			<header>
				<h2><?php the_sub_field( 'section_title' ); ?></h2>
			</header>
			
			<?php the_sub_field( 'section_content' ); ?>
			
			<?php echo $include_btn ? "<a class='btn' href='$btn_link' target='$btn_target'>$btn_text</a>" : ""; ?>
		</article>
	</div>
</section>