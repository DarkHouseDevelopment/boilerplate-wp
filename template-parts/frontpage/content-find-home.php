<?php
	$btn_text = get_sub_field( 'footer_link_text' );
	$btn_type = get_sub_field( 'footer_link_type' );
	
	switch($btn_type){
		case "internal":
			$btn_link_page = get_sub_field( 'footer_link_internal' );
			$btn_link = get_permalink($btn_link_page);
			$btn_target = "_self";
			break;
			
		case "media":
			$btn_link_media = get_sub_field( 'footer_link_media' );
			$btn_link = $btn_link_media['url'];
			$btn_target = "_blank";
			break;
			
		case "external":
			$btn_link = get_sub_field( 'footer_link_external' );
			$btn_target = "_blank";
			break;
			
		case "custom":
			$btn_link = get_sub_field( 'footer_link_custom' );
			$btn_target = get_sub_field( 'button_target' );
			break;
	}
?>
<section class="homepage-findahome homepage-section">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-darkteal.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<article>
			<header>
				<h3><?php the_sub_field( 'title_text' ); ?></h3>
			</header>
			
			<?php get_template_part( 'template-parts/homes/content', 'findahome-form' ); ?>
			
			<footer>
				<?php echo "<a href='$btn_link' target='$btn_target'>$btn_text <i class='icon-right-big'></i></a>"; ?>
			</footer>
		</article>
	</div>
</section>