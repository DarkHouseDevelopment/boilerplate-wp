<?php
	$title_icon = get_sub_field( 'title_icon' );
?>
<section class="homepage-fullwidth homepage-section">
	<div class="wrap">
		<article>
			<header>
				<?php echo $title_icon ? "<img class='title-icon' src='{$title_icon['url']}' alt='{$title_icon['alt']}' />" : ""; ?>
				<h2><?php the_sub_field( 'title_text' ); ?></h2>
			</header>
			
			<?php the_sub_field( 'section_content' ); ?>
		</article>
	</div>
</section>