<?php	
global $post;
$grid = $post->post_name;
?>
<section class="grid">
	<a class="grid-filter-toggle" href="javascript:void(0);"><span>Everything</span> <i class="fa fa-angle-down"></i></a>
	<div class="grid-filters">
		<div class="wrap">
			<div class="filters-list">
				<a href="javascript:void(0);" class="grid-filter active" data-filter="*">Everything</a>
				<?php
				$exclude_cats = $grid === "victory" ? array(89) : '';
				$grid_cats = get_terms( array(
				    'taxonomy' => 'grid_cat',
				    'hide_empty' => true,
				    'exclude' => $exclude_cats,
				) );
				$grid_classes_all = array();
				
				foreach($grid_cats as $grid_cat):
					echo "<a href='javascript:void(0);' class='grid-filter' data-filter='.".$grid_cat->slug."'>".$grid_cat->name."</a>";
					$grid_classes_all[] = $grid_cat->slug;
				endforeach;
				?>
			</div>
		</div>
	</div>
	
	<div class="grid-results">
		<?php
		$grid_position = str_replace('-','_',$grid)."_position";
		
		$args = array(
			'post_type' => 'page',
			'posts_per_page' => -1,
			'meta_key' => $grid_position,
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'tax_query' => array (
				array (
					'taxonomy' => 'grid_display',
					'field' => 'slug',
					'terms' => $grid
				)
			)
		);
		
		$iso_query = new WP_Query( $args );

		if( $iso_query->have_posts() ):
			while( $iso_query->have_posts() ): $iso_query->the_post();
				$grid_categories = get_the_terms( $post->ID, 'grid_cat' );
				$grid_classes = '';
				
				if($grid_categories):
					foreach($grid_categories as $grid_cat):
						$grid_classes .= $grid_cat->slug." ";
					endforeach;
				endif;
				
				if(get_field( 'content_sections' )):
					$content_sections = get_field( 'content_sections' );
					$first_layout = $content_sections[0]['acf_fc_layout'];
					//print_r($content_sections);

					switch($first_layout){
						case "default_page_content":
							$slider_images = $content_sections[0]['slider'];
							$image_doodle = $content_sections[0]['image_doodle'];
							//print_r($slider_images);
							if( $slider_images ):
								$grid_image = $slider_images[0]['slider_image']['sizes']['grid-thumbnail'];
							elseif( $image_doodle ):
								$grid_image = $image_doodle['sizes']['grid-thumbnail'];
							else:
								$grid_image = get_template_directory_uri()."/assets/img/grid-placeholder.png";
							endif;
							break;
							
						case "full_width_image_slider":
							$slider_images = $content_sections[0]['slider_images'];
							if($slider_images):
								$grid_image = $slider_images[0]['sizes']['grid-thumbnail'];
							else:
								$grid_image = get_template_directory_uri()."/assets/img/grid-placeholder.png";
							endif;
							break;
							
						case "business_info":
							$featured_image = $content_sections[0]['featured_image'];
							
							if($featured_image):
								$grid_image = $featured_image['sizes']['grid-thumbnail'];
							else: 								
								if(get_field( 'grid_image' )):
									$grid_image = get_field( 'grid_image' );
									$grid_image = $grid_image['sizes']['grid-thumbnail'];
								else:
									$grid_image = get_template_directory_uri()."/assets/img/grid-placeholder.png";
								endif;
							endif;
							break;
							
						default:
							if(get_field( 'grid_image' )):
								$grid_image = get_field( 'grid_image' );
								$grid_image = $grid_image['sizes']['grid-thumbnail'];
							else:
								$grid_image = get_template_directory_uri()."/assets/img/grid-placeholder.png";
							endif;
						
					}
					
					echo "<a href='".get_the_permalink()."' class='grid-block $grid_classes'>";
					echo "<div class='grid-image'>";
					echo "<img src='".$grid_image."' />";
					echo "<div class='grid-hover'><h3>".get_the_title()."</h3><i class='fa fa-arrow-circle-right'></i></div>";
					echo "</div>";
					echo "<span class='title'>".get_the_title()."</span>";
					echo "</a>";

				else:
					echo "<a href='".get_the_permalink()."' class='grid-block $grid_classes'>";
					echo "<div class='grid-image'>";
					
					if(get_field( 'grid_image' )):
						$grid_image = get_field( 'grid_image' );
						$grid_image = $grid_image['sizes']['grid-thumbnail'];
						echo "<img src='".$grid_image."' />";
					else:
						echo "<img src='".get_template_directory_uri()."/assets/img/grid-placeholder.png' />";
					endif;

					echo "<div class='grid-hover'><h3>".get_the_title()."</h3><i class='fa fa-arrow-circle-right'></i></div>";
					echo "</div>";
					echo "<span class='title'>".get_the_title()."</span>";
					echo "</a>";
				endif;
			
			endwhile;
			
			//echo "<div class='grid-block blank ".implode(" ", $grid_classes_all)."'></div>";
			//echo "<div class='grid-block blank ".implode(" ", $grid_classes_all)."'></div>";
			//echo "<div class='grid-block blank ".implode(" ", $grid_classes_all)."'></div>";
		else:
			echo "No posts under this grid";
		endif;
		
		wp_reset_query();
		?>
	</div>
</section>