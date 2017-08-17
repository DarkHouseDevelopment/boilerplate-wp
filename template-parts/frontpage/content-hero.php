<?php 
	$hero_bg = get_sub_field( 'hero_image' ); 
	$btn_type = get_sub_field( 'hero_button_link_type' );
	
	switch($btn_type){
		case "internal":
			$btn_link_page = get_sub_field( 'hero_button_link_internal' );
			$btn_link = get_permalink($btn_link_page);
			$btn_target = "_self";
			break;
			
		case "external":
			$btn_link = get_sub_field( 'hero_button_link_external' );
			$btn_target = "_blank";
			break;
			
		case "custom":
			$btn_link = get_sub_field( 'hero_button_link_custom' );
			$btn_target = get_sub_field( 'hero_button_target' );
			break;
	}
?>
<section id="homepage_hero" style="background-image: url(<?php echo $hero_bg['url']; ?>);">
	<div class="wrap">
		<article>
			<i class="icon-quote start"></i>
			<h1><?php the_sub_field( 'title_quote' ); ?></h1>
			<i class="icon-quote end"></i>
			
			<div class="hero-cta">
				<a class="btn icon" href="<?php echo $btn_link; ?>" target="<?php echo $btn_target; ?>"><img class="btn-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-home.png" alt="" /><?php the_sub_field( 'hero_button_text' ); ?></a>
			</div>
		</article>
	</div>
		
	<div class="hero-scroll">
		<span>Scroll</span>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-scroll-down.png" alt="" />
	</div>
</section>
