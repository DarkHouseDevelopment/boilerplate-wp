<?php

$bg_type = get_field( 'resources_archive_hero_background_type', 'option' );

if($bg_type == "color"):
	$bg_color = get_field( 'resources_archive_hero_background_color', 'option' );
	$bg_css = "background: ".esc_attr($bg_color).";";
else:
	$bg_image = get_field( 'resources_archive_hero_background_image', 'option' );
	$desktop_bg_image = $bg_image['desktop_background_image'];
	$mobile_bg_image = $bg_image['mobile_background_image'];
	$desktop_bg_image_url = esc_url($desktop_bg_image['url']);
	$mobile_bg_image_url = esc_url($mobile_bg_image['url']);
	$bg_style = esc_attr($bg_image['background_style']);
	$bg_pos = esc_attr($bg_image['background_position']);
	
	$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
	$bg_css = "background: url({$desktop_bg_image_url}) $bg_pos; $bg_style_css;";
endif;

$hero_content = get_field( 'resources_archive_hero_content', 'option' );
$hero_text_color = esc_attr($hero_content['hero_text_color']);
$hero_title = ecs_html($hero_content['hero_title']);
?>

<section class="content-section hero resources-archive" style="<?php echo $bg_css; ?>">
	<?php if($mobile_bg_image):
		echo "<div class='mobile-bg' style='background: url({$mobile_bg_image_url}) $bg_pos; $bg_style_css'></div>";	
	endif; ?>
	<div class="wrap">
		<div class="hero-content">
			<header>
				<h1 style="color: <?php echo $hero_text_color; ?>"><?php echo $hero_title; ?></h1>
			</header>
			<article>
				<ul class="resource-types iso-nav">
					<?php
						$resource_types = get_terms( array(
							'taxonomy' => 'resource_type',
							'hide_empty' => false,
							'orderby' => 'term_id'
						) );
						
						foreach($resource_types as $resource_type):
							echo "<li><a href='javascript:void(0);' class='iso-filter' style='color: $hero_text_color' data-filter='.{$resource_type->slug}'>{$resource_type->name}<span class='underline' style='background: $hero_text_color'></span></a>";
						endforeach;
					?>
					<li><a href="javascript:void(0);" class="iso-filter" style="color: <?php echo $hero_text_color; ?>" data-filter="*">All<span class='underline' style='background: <?php echo $hero_text_color; ?>'></span></a></li>
				</ul>
			</article>
		</div>
	</div>
</section>