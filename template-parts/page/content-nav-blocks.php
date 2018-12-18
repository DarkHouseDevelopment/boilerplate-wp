<?php
	if($nav_blocks == 'default'):
		$field_src = 'option';
		$section_title = get_field( 'section_title', 'option' );
	else:
		$field_src = $post->ID;
		$section_title = get_sub_field( 'section_title' );
	endif;
?>
<section class="content-section nav-blocks">
	<div class="wrap">
		<header>
			<h4><?php echo $section_title; ?></h4>
		</header>
		<nav class="image-block-nav" role="navigation">
			<?php 
				if(have_rows( 'nav_blocks', $field_src )):
					while(have_rows( 'nav_blocks', $field_src )): the_row();
						$block_img = get_sub_field( 'background_image' );
						$block_title = get_sub_field( 'circle_title' );
						$block_link_page = get_sub_field( 'block_link' );
						$block_link = get_permalink( $block_link_page->ID );
					
						echo "<a class='block' href='$block_link' style='background: url({$block_img['url']}) center center no-repeat; background-size: cover;'><div class='block-circle'><div class='hover-circle'><div class='hover-outer-circle'></div></div><span>$block_title</span></div></a>";
					
					endwhile;
				endif;
			?>
		</nav>
	</div>
</section>