<?php 
	$amenity_hero = get_field( 'amenity_hero' );
?>
<section id="page_hero">
	<?php
		if($amenity_hero['hero_image']):
			echo "<div class='hero-image'><img src='{$amenity_hero['hero_image']['url']}' alt='".get_the_title()."' /></div>";
		endif;
	?>
	<div class="hero-circle <?php $amenity_hero['hero_circle_color']; ?>">
		<div class="hero-outer-circle"></div>		
		<h1 class="hero-tagline">
			<span><?php echo $amenity_hero['hero_title_1']; ?></span>
			<?php echo $amenity_hero['hero_title_2']; ?>
			<span><?php echo $amenity_hero['hero_title_3']; ?></span>
		</h1>
	</div>
</section>

<?php
if ( function_exists( 'yoast_get_primary_term_id' ) && yoast_get_primary_term_id( 'nn_category', $post ) ) {
  $primary_term_id    = yoast_get_primary_term_id( 'nn_category', $post );
  $postTerm           = get_term( $primary_term_id );
  $category_name      = $postTerm->name;
  $category_id        = $primary_term_id;
} else {
  $cats = get_the_terms( $post->ID, 'nn_category' );
  $top_cats = array();
  if(!empty($cats) && is_array($cats)):
    foreach($cats as $cat) {
	    if ($cat->parent == 0) {
	    	$top_cats[] = $cat;
	    }
    }
  else :
    $top_cats = "";
  endif;

  $category_name = $top_cats[0]->name;
  $category_id = $top_cats[0]->term_id;
}
?>
<section id="nn_breadcrumbs">	
	<div class="wrap">
		<a href="/live/">Live Connected</a> / <a href="/live/near-norterra/">Around Union Park</a> / <a href="<?php echo get_term_link( $category_id ); ?>"><?php echo $category_name; ?></a> / <?php the_title(); ?>
	</div>
</section>

<section id="amenities_overview" role="main">
	<div class="wrap">
		<div class="section-content">
			<?php the_field( 'amenity_content' ); ?>
		</div>
	</div>
</section>

<?php			
	if(have_rows( 'content_sections' )):
	
		echo "<section class='additional-content'>";
		
		while(have_rows( 'content_sections' )): the_row();
		
			$layout = get_row_layout();
				
			switch($layout){
				case 'full_width_text':
					get_template_part( 'template-parts/page/content', 'full-width-text' );
					break;
					
				case 'pattern_content':
					get_template_part( 'template-parts/page/content', 'pattern' );
					break;
					
				case 'split_content':
					get_template_part( 'template-parts/page/content', 'split-content' );
					break;
					
				case 'upcoming_events':
					get_template_part( 'template-parts/page/content', 'upcoming-events' );
					break;
					
				case 'content_sidebar':
					get_template_part( 'template-parts/page/content', 'sidebar' );
					break;
					
				case 'image_grid':
					get_template_part( 'template-parts/page/content', 'image-grid' );
					break;
					
				case 'call_to_action':
					get_template_part( 'template-parts/page/content', 'call-to-action' );
					break;
										
				case 'download_cta':
					get_template_part( 'template-parts/page/content', 'download-cta' );
					break;
			}
		
		endwhile;
		
		echo "</section>";
	
	endif;
?>

<section id="amenity_details" class="content-section">
	<div class="wrap">		
		<div class="amenity-images">
			<div class="slider-container">
				<div class="slider">
					<?php 
					$images = get_field( 'amenity_gallery' );
					
					if( $images ): 
						$image_index = 0;
				        foreach( $images as $image ): ?>
				            <div class="slide" data-index="<?php echo $image_index; ?>" title="<?php echo $image['alt']; ?>" style="background: url(<?php echo $image['sizes']['large']; ?>) center center no-repeat; background-size: cover;">
					            <?php if($image['caption']): ?>
						            <div class="caption"><?php echo $image['caption']; ?></div>
						        <?php endif; ?>
				            	<a class="slider-next" href="javascript:void(0);"><i class="icon-angle-circled-right"></i></a>
				            </div>
				        <?php $image_index++;
					    endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="stay-in-touch">
				<aside>
					<?php $contact_page = get_page_by_path( 'directions' ); ?>
					<?php echo file_get_contents(get_template_directory() . '/assets/img/icon-tree.svg'); ?><br />
					<h3><?php bloginfo('name'); ?></h3>
					<?php if(get_field( 'include_directions_cta', $contact_page )):
						while(have_rows( 'directions_cta', $contact_page )): the_row();
							$button_text = get_sub_field( 'button_text' );
							$button_link = get_sub_field( 'button_link' );
							
							echo "<a href='$button_link' class='btn btn-teal directions' target='_blank' rel='nofollow noopenner'>$button_text</a>";
						endwhile;
					endif; ?>
					<?php while(have_rows( 'contact_details', $contact_page )): the_row(); ?>
						<address>
							<?php the_sub_field( 'street_address' ); ?><br />
							<?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?> <?php the_sub_field( 'zipcode' ); ?><br />
							<?php the_sub_field( 'phone' ); ?><br />
							<a href='mailto:<?php the_sub_field( 'email_address' ); ?>'><?php the_sub_field( 'email_address' ); ?></a>
						</address>
					<?php endwhile; ?>
					<nav id="sidebar_social_menu">
						<?php 
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'container_class' => 'social-menu',
								)
							);
						?>
					</nav>
				</aside>
			</div>
		</div>
	</div>
</section>

<section id="other_amenities">
	<div class="wrap">
		<?php 
		$nn_categories = get_terms( array(
			'taxonomy' => 'nn_category',
			'hide_empty' => true,
			'parent' => 0
		) );
		
		if ( !empty( $nn_categories ) ): ?>
			<a href="javascript:void(0);" class="other-amenities-toggle"><span>Other Amenities</span> <i class="fa fa-angle-down"></i></a>
			<div class="amenities-nav">
				<ul class="amenities-list">
					<?php /* <li><a href="<?php echo get_post_type_archive_link( 'near-norterra' ); ?>">All Amenities</a></li> */ ?>
					<?php foreach($nn_categories as $category): 
						echo '<li><a href="'.get_term_link($category->term_id, 'nn_category').'" class="grid-filter" data-filter=".'.$category->slug.'">'.$category->name.'</a></li>';
					endforeach;	?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php 
if(get_field( 'nn_include_banner_cta', 'option' )):
	while(have_rows( 'nn_banner_cta', 'option' )): the_row();
		get_template_part( 'template-parts/page/content', 'call-to-action' );
	endwhile;
endif;
?>