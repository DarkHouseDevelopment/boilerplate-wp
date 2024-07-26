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
			<?php echo get_sub_field('section_content') ? "<article class='intro-content'>".get_sub_field('section_content')."</article>" : ""; ?>
		</header>
		<nav class="image-block-nav" role="navigation">
			<?php 
				if(have_rows( 'nav_blocks', $field_src )):
					while(have_rows( 'nav_blocks', $field_src )): the_row();
						$block_img = get_sub_field( 'background_image' );
						$block_title = get_sub_field( 'circle_title' );
						$block_link_type = get_sub_field( 'block_link_type' );
						$block_link_target = "_self";
						
						if(empty($block_link_type) || $block_link_type == "internal"):
							$block_link_page = get_sub_field( 'block_link' );
							$block_link = get_permalink( $block_link_page->ID );
						elseif($block_link_type == "external"):
							$block_link_ext = get_sub_field( 'block_link_external' );
							$block_link = $block_link_ext['url'];
							$block_link_target = $block_link_ext['target'];
						elseif($block_link_type == "custom"):
							$block_link = get_sub_field( 'block_link_custom' );
						endif;
						
						$block_link_rel = $block_link_target == "_blank" ? "nofollow noopener" : "";
					
						echo "<a class='block' href='$block_link' target='$block_link_target' rel='$block_link_rel' style='background: url({$block_img['url']}) center center no-repeat; background-size: cover;'><div class='block-circle'><div class='hover-circle'><div class='hover-outer-circle'></div></div><span>$block_title</span></div></a>";
					
					endwhile;
				endif;
			?>
		</nav>
	</div>
</section>