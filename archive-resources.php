
<?php get_header(); ?>

	<?php get_template_part( "template-parts/resources/content", "hero" ); ?>
	
	<div class="fixed-iso-nav">	
		<div class="wrap">
			<ul class="resource-types iso-nav">
				<?php
					$resource_types = get_terms( array(
						'taxonomy' => 'resource_type',
						'hide_empty' => false,
						'orderby' => 'term_id'
					) );
					
					foreach($resource_types as $resource_type):
						echo "<li><a href='javascript:void(0);' class='iso-filter' data-filter='.{$resource_type->slug}'>{$resource_type->name}<span class='underline'></span></a>";
					endforeach;
				?>
				<li><a href="javascript:void(0);" class="iso-filter" data-filter="*">All<span class='underline'></span></a></li>
			</ul>
		</div>
	</div>
	
	<?php
	$bg_type = get_field( 'resources_archive_background_type', 'option' );
	
	if($bg_type == "color"):
		$bg_color = get_field( 'resources_archive_background_color', 'option' );
		$bg_css = "background: $bg_color;";
	else:
		$bg_image = get_field( 'resources_archive_background_image', 'option' );
		$desktop_bg_image = $bg_image['desktop_background_image'];
		$mobile_bg_image = $bg_image['mobile_background_image'];
		$bg_style = $bg_image['background_style'];
		$bg_pos = $bg_image['background_position'];
		
		$bg_style_css = $bg_style == "stretch" ? "background-size: cover;" : "background-repeat: repeat;";
		$bg_css = "background: url({$desktop_bg_image['url']}) $bg_pos; $bg_style_css;";
	endif;
	?>

	<section class="content" role="main" style="<?php echo $bg_css; ?>">
		<?php if($mobile_bg_image):
			echo "<div class='mobile-bg' style='background: url({$mobile_bg_image['url']}) $bg_pos; $bg_style_css'></div>";	
		endif; ?>
		
		<div class="wrap">

			<?php 
			$args =array(
				'posts_per_page' => -1,
				'post_type' => 'resources'
			);
			$resources_query = new WP_Query($args);
			
			$resource_icons = get_field( 'resource_icons', 'option' );
			$default_image = get_field( 'resource_default_image', 'option' );
			
			if ( $resources_query->have_posts() ): 
			
				echo "<div class='resources-grid'>";
			
				while ( $resources_query->have_posts() ) : $resources_query->the_post(); 
				
					include(locate_template( "template-parts/resources/content-resource-loop.php" ));
				
				endwhile;				
				
				echo "</div>";
				
			endif; 
			?>
		
		</div>	
	</section>

<?php get_footer(); ?>