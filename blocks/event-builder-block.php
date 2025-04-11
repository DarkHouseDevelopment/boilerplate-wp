<?php

/**
 * Services Layout Block Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// show preview image if block being loaded as preview
if(!empty($block['data']['is_preview'])):
	echo "<img src='".get_stylesheet_directory_uri()."/assets/block-previews/event-builder-block.jpg' />";
	return;
endif;

global $is_kiosk, $kiosk_display;

// Create id attribute allowing for custom "anchor" value.
$id = 'event-builder-block-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-block event-builder-block';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$builder = get_field( 'builder' );
$builder_logo = get_field( 'builder_logo') ? wp_get_attachment_image( get_field( 'builder_logo' ), 'full' ) : tdc_get_builder_logo( $builder->ID );
$builder_link = get_the_permalink( $builder->ID );
$builder_contact = get_field( 'builder_contact', $builder->ID )[0];
$show_extra = get_field( 'show_extra_details' );
$extra_details = get_field( 'extra_details' );

if($show_extra):
	$className .= " show-extra";
endif;

$block_bg = ['css' => ''];
$builder_preview_img = "";
$block_bg_style = get_field( 'builder_block_background' );
$block_text_color = '#ffffff';
$button_colors = get_field( 'button_colors' );
$className .= " bg-".$block_bg_style;
if($block_bg_style == 'featured-image'):
	$builder_preview_img = tdc_get_builder_hero_image( $builder->ID );
elseif($block_bg_style == 'image'):
	$block_bg_image = get_field( 'builder_block_bg_image' );
	$builder_preview_img = wp_get_attachment_image( $block_bg_image, 'full' );
elseif($block_bg_style == 'color'):
	$block_bg['css'] = "background-color:".get_field( 'builder_block_bg_color' ).";";
	$block_text_color = get_field( 'builder_block_text_color' ) ?: '#ffffff';
endif;

if($is_kiosk && is_page('find-your-home')):
	// do nothing
else:
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="<?php echo $block_bg['css']; ?>">
	<?php echo $builder_preview_img; ?>
	<div class="builder-image">
		<div class="builder-block-logo"><?php echo $builder_logo; ?></div>
		<header>
			<?php if($show_extra): ?>
				<?php
					$image = get_field( 'builder_block_image' );
					$sf_range = get_field( 'sq_ft_range' );
					$starting_price = get_field( 'starting_price' );
				?>
				<?php if(in_array('image', $extra_details) && $image): ?>
					<div class="extra-image"><?php echo wp_get_attachment_image( $image, 'medium_large' ); ?></div>
				<?php endif; ?>
				<div class="extra-details" style="color:<?php echo $block_text_color; ?>;">
					<?php if(in_array('sf-range', $extra_details) && $sf_range): ?>
						<div class="sf-range"><?php echo $sf_range; ?> Sq Ft</div>
					<?php endif; ?>
					<?php if(in_array('price', $extra_details) && $starting_price): ?>
						<?php
							$price_range = explode("-", $starting_price);
							$price_range_display = count($price_range) > 1 ? $price_range[0] . " $" . $price_range[1] : $price_range[0];
							$starting_price_display = $price_range[0] == "tbd" ? "Pricing TBD" : "From the ".$price_range_display."'s";
							$starting_price_display = $price_range[0] == "1m" ? "Starting from $1M+" : $starting_price_display;
						?>
						<div class="starting-price"><?php echo $starting_price_display; ?></div>
					<?php endif; ?>
					<?php if(in_array('qmi-link', $extra_details)): ?>
						<a class="qmi-link" href="<?php echo is_admin() ? "javascript:void(0);" : "/quick-move-in-homes/?builder=".$builder->post_name; ?>">Quick Move-In Homes</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="builder-buttons">
			<?php if($show_extra): ?>
				<?php if(in_array('view-builder-btn', $extra_details)): ?>
					<a class="btn btn-primary <?php echo $button_colors !== "teal-orange" ? "color-{$button_colors}" : ""; ?>" href="<?php echo is_admin() ? "javascript:void(0);" : $builder_link; ?>" target="<?php echo is_admin() ? "" : "_blank"; ?>"><span>View Builder</span></a>
				<?php endif; ?>
				<?php if(in_array('smi-btn', $extra_details)): ?>
					<a class="btn btn-secondary event-sendinfo modal-trigger <?php echo $button_colors !== "teal-orange" ? "color-{$button_colors}-outline" : ""; ?>" href="javascript:void(0);" data-form="" data-builder="<?php echo $builder->post_title; ?>" data-builder-email="<?php echo $builder_contact['email']; ?>"><span>Send Me Info</span></a>
				<?php endif; ?>
			<?php else: ?>
				<a class="btn btn-secondary" href="<?php echo is_admin() ? "javascript:void(0);" : $builder_link; ?>"><span>Explore</span></a>
			<?php endif; ?>
			</div>
		</header>
	</div>
</div>
<?php endif; ?>
