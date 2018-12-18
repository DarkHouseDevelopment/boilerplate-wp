<?php
	$pattern_color = is_singular( 'post' ) ? 'yellow' : get_sub_field( 'pattern_color' );
	$title_icon = get_sub_field( 'title_icon' );
?>
<section class="pattern-section interior content-section">
	<div class="pattern-bg" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/img/upan-pattern-<?php echo $pattern_color; ?>.svg) center center repeat; background-size: 16rem;"></div>
	<div class="wrap">
		<article>
			<header>
				<?php echo $title_icon ? "<img class='title-icon' src='{$title_icon['url']}' alt='{$title_icon['alt']}' />" : ""; ?>
				<h3><?php the_sub_field( 'title_text' ); ?></h3>
				<?php echo get_sub_field( 'subtitle_text' ) ? "<h4>".get_sub_field( 'subtitle_text' )."</h4>" : ""; ?>
			</header>
		</article>
	</div>
</section>