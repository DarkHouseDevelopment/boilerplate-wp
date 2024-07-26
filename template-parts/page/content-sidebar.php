<?php
	$id = get_sub_field('section_id');
	$class = get_sub_field('section_class');
?>
<section id="<?php echo $id; ?>" class="content-section full-width with-sidebar <?php echo get_sub_field( 'section_layout' ); ?> <?php echo $class; ?>">
	<div class="wrap">
		<article>
			<?php echo get_sub_field( 'section_content' ); ?>
		</article>
		<aside>
			<?php echo get_sub_field( 'sidebar_content' ); ?>
		</aside>
	</div>
</section>