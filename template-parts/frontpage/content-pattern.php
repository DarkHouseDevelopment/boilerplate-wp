<?php
	$pattern_color = get_sub_field( 'pattern_color' );	
	$title_icon = get_sub_field( 'title_icon' );
?>
<section class="pattern-section content-section">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<article>
			<header>
				<?php echo $title_icon ? "<img class='title-icon' src='{$title_icon['url']}' alt='{$title_icon['alt']}' />" : ""; ?>
				<h3><?php the_sub_field( 'title_text' ); ?></h3>
			</header>
			
			<?php the_sub_field( 'section_content' ); ?>
		</article>
	</div>
</section>