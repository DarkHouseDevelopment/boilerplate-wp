<?php

$bg_type = get_sub_field( 'background_type' );

if($bg_type == "color"):
	$bg_color = get_sub_field( 'background_color' );
	$bg_css = "background: $bg_color;";
else:
	$bg_image = get_sub_field( 'background_image' );
	$desktop_bg_image = $bg_image['desktop_background_image'];
	$mobile_bg_image = $bg_image['mobile_background_image'];
	$bg_style = $bg_image['background_style'];
	$bg_pos = $bg_image['background_position'];
	
	$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
	$bg_css = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css;";
endif;

$quote_type = get_sub_field( 'quote_type' );
?>

<section class="content-section quote <?php echo $quote_type; ?>" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<?php if($quote_type == "video"): ?>
			<?php if(get_sub_field( 'video_title' )): ?>
				<header>
					<h2><?php the_sub_field( 'video_title' ); ?></h2>
				</header>
			<?php endif; ?>
			<div class="section-content">
				<article>
					<?php
						$testimonial_video = get_sub_field( 'video_testimonial' );
						echo prepareVideo($testimonial_video);
					?>
				</article>
				<?php
				$footer_link = get_sub_field( 'footer_link' );
				
				if(!empty($footer_link['link_text']) && !empty($footer_link['link_url'])):
					echo "<footer>";
					
					echo "<a href='{$footer_link['link_url']}'><strong>{$footer_link['link_text']}</strong></a>";
					
					echo "</footer>";
				endif;
				?>
			</div>
		<?php else: ?>
			<div class="section-content">
				<article>
					<?php the_sub_field( 'quote_text' ); ?>
				</article>
				<?php 
				$quote_author = get_sub_field( 'quote_author' ); 
				
				if(!empty($quote_author['name']) || !empty($quote_author['title']) || !empty($quote_author['company'])):
					echo "<footer>";
					
					if($quote_author['name']):
						echo "<strong>{$quote_author['name']}</strong><br>";
					endif;
					if($quote_author['title']):
						echo "<strong>{$quote_author['title']}</strong><br>";
					endif;
					if($quote_author['company']):
						echo "<strong>{$quote_author['company']}</strong>";
					endif;
					
					echo "</footer>";
				endif;
				?>
			</div>
			<?php if($quote_type == "text-image"): ?>
			<div class="section-media">
				<?php 
					$quote_image = get_sub_field( 'quote_image' );
					if($quote_image):
						echo "<img src='{$quote_image['url']}' alt='{$quote_image['alt']}' />";
					endif;
				?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
