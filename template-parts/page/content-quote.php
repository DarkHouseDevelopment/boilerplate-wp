<?php 
$bg_style = background_type(); 
$quote_type = get_sub_field_sanitized( 'quote_type',false,false,'esc_attr' );

get_section_id();
?>
<section class="content-section quote <?php echo $quote_type; ?>" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<?php if($quote_type == "video"): ?>
			<?php if(get_sub_field( 'video_title' )): ?>
				<header>
					<h2><?php the_sub_field_sanitized( 'video_title',false,false,'esc_html' ); ?></h2>
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
				$footer_link_url = esc_url($footer_link['link_url']);
				$footer_link_text = esc_html($footer_link['link_text']);
				
				if(!empty($footer_link_text) && !empty($footer_link_url)):
					echo "<footer>";
					
					echo "<a href='{$footer_link_url}'><strong>{$footer_link_text}</strong></a>";
					
					echo "</footer>";
				endif;
				?>
			</div>
		<?php else: ?>
			<div class="section-content">
				<article>
					<?php wp_kses_post(get_sub_field( 'quote_text' ),$allowed_html); ?>
				</article>
				<?php 
				$quote_author = get_sub_field( 'quote_author' );
				$quote_author_name = esc_html($quote_author['name']);
				$quote_author_title = esc_html($quote_author['title']);
				$quote_author_company = esc_html($quote_author['company']);
				
				if(!empty($quote_author['name']) || !empty($quote_author['title']) || !empty($quote_author['company'])):
					echo "<footer>";
					
					if($quote_author['name']):
						echo "<strong>{$quote_author_name}</strong><br>";
					endif;
					if($quote_author['title']):
						echo "<strong>{$quote_author_title}</strong><br>";
					endif;
					if($quote_author['company']):
						echo "<strong>{$quote_author_company}</strong>";
					endif;
					
					echo "</footer>";
				endif;
				?>
			</div>
			<?php if($quote_type == "text-image"): ?>
			<div class="section-media">
				<?php 
					$quote_image = get_sub_field( 'quote_image' );
					$quote_image_url = esc_url($quote_image['url']);
					$quote_image_alt = esc_html($quote_image['alt']);
					
					if($quote_image):
						echo "<img src='{$quote_image_url}' alt='{$quote_image_alt}' />";
					endif;
				?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
