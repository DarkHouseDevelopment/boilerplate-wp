<?php 
$bg_style = background_type(); 
get_section_id();
?>

<section class="content-section logos" style="<?php echo $bg_style['css']; ?>">
	<?php echo $bg_style['mobile_html_css'] ? $bg_style['mobile_html_css'] : ''; ?>
	<div class="wrap">
		<?php if(get_sub_field( 'section_title' )): ?>
			<header class="<?php the_sub_field_sanitized( 'title_style',false,false,'esc_attr' ); ?>">
				<h3><?php the_sub_field_sanitized( 'section_title',false,false,'esc_html' ); ?></h3>
			</header>
		<?php endif; ?>
		<div class="section-content">
			<?php
				$logos = get_sub_field( 'logos' );
				$logo_count = count($logos);
				$animated = get_sub_field( 'logo_animation' ) ? "true" : "false";
				$logos_class = get_sub_field( 'logo_animation' ) ? "animated" : "static";
				
				if($logos):
					echo "<article class='logos-container $logos_class logo-count-$logo_count' data-animated='$animated'>";
					
					foreach($logos as $logo):
						
						echo "<div class='logo'>".wp_get_attachment_image( $logo['ID'], 'full' )."</div>";
						
					endforeach;
					
					echo "</article>";
				endif;
			?>
		</div>
	</div>
</section>
