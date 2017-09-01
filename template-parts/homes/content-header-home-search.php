<?php 
	$bg_image = get_field( 'bg_image' ); 
	if(!$bg_image){
		$results_page = get_page_by_path( 'homes-in-verrado' );
		$bg_image = get_field( 'bg_image', $results_page ); 
	}
?>
<header id="header" class="freeform" style="background: url('<?php echo $bg_image["url"]; ?>') top -3rem center no-repeat; background-size:cover;">
	<?php
		$form_title = get_field( 'form_title' );
		$submit_btn_text = get_field( 'submit_button_text' );
		echo "<!-- $form_title -->";
	?>
	<?php get_template_part( 'template-parts/homes/content', 'find-a-home-form' ); ?>
	<div class="mobile-search-toggle">
		<a class="open-search btn" href="javascript:void(0);">Search Homes</a>
	</div>
</header>