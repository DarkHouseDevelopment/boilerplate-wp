<?php
/*
Template Name: Homes Builder
*/

global $post;
$post_parent = $post->post_parent;
?>

<?php get_header(); ?>

<section role="main">
	<?php if ( have_posts() ): 
		while ( have_posts() ) : the_post();

			if($post->post_parent):
				get_template_part( 'template-parts/builders/content', 'showcase' );
			else:
				get_template_part( 'template-parts/builders/content' );
			endif;

		endwhile;
	endif; ?>
</section>


<?php 
	if($post_parent):
		echo "<nav id='back_nav'><div class='wrap'><div class='sm-12'><a href='".get_permalink( $post_parent )."'><i class='fa fa-arrow-left'></i> Back to ".get_the_title( $post_parent )."</a></div></div></nav>";
		
		echo "<footer class='disclaimer-text'><div class='wrap'><div class='sm-12'>".get_field( 'disclaimer_text', 'option' )."</div></div></footer>";
	endif;
?>

<?php get_footer(); ?>