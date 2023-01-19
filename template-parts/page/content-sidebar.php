<?php
	$id = get_sub_field('section_id');
	$class = get_sub_field('section_class');
?>
<section id="<?php echo $id; ?>" class="content-section full-width with-sidebar <?php the_sub_field( 'section_layout' ); ?> <?php echo $class; ?>">
	<div class="wrap">
		<article>
			<?php the_sub_field( 'section_content' ); ?>
		</article>
		<aside>
			<?php the_sub_field( 'sidebar_content' ); ?>
		</aside>
	</div>
</section>