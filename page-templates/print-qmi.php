<?php
/*
Template Name: Print Quick Move-In
*/

$_SESSION['quick-move'] = 1;

get_header();
?>
		
    <div id="template_page-print-qmi" class="container">				
		<?php 			
		
		$args = array(
			'posts_per_page' => -1,
			'post_status' => array('publish'),
			'post_type' => 'homes',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'quick_move',
					'value' => 1,
					'compare' => 'LIKE'
				),
			)
		);
		
		$qmi_loop = new WP_Query($args);

		if ( $qmi_loop->have_posts() ) : ?>
		
			<?php
				$ordered_results = array();
				$current_result = 0;
									
				while( $qmi_loop->have_posts() ): $qmi_loop->the_post();
					
					global $post;
					$builder = get_field( 'builder' );	
					$home_title = $post->post_title;
					$plan_name = preg_replace("/-[^-]*$/", "", $home_title); 					
	
					if(have_rows("qmi_homes")):
						while(have_rows("qmi_homes")): the_row();
							$ordered_results[$current_result]['id'] = $post->ID;
							$ordered_results[$current_result]['status'] = $post->post_status;
							$ordered_results[$current_result]['builder'] = $builder->post_title ? $builder->post_title : $builder;
							$ordered_results[$current_result]['model'] = $plan_name;
							$ordered_results[$current_result]['street_address'] = get_sub_field("street_address");
							$ordered_results[$current_result]['lot_number'] = get_sub_field("lot_number");
							$ordered_results[$current_result]['square_feet'] = get_sub_field("square_feet");
							$ordered_results[$current_result]['stories'] = get_sub_field("stories");
							$ordered_results[$current_result]['bedrooms'] = get_sub_field("bedrooms");
							$ordered_results[$current_result]['bathrooms'] = get_sub_field("bathrooms");
							$ordered_results[$current_result]['garages'] = get_sub_field("garage");						
							$ordered_results[$current_result]['price'] = get_sub_field("price");						
							$ordered_results[$current_result]['available'] = get_sub_field("available");
					
							$current_result++;
						endwhile;
					endif;
				
				endwhile;
				
				usort($ordered_results, function($a, $b) {
				    $retval = strcmp($a['builder'], $b['builder']);
				    if($retval == 0){
					    $retval = $a['price'] - $b['price'];
				    }
				    return $retval;
				});
			?>
	
			<section id="qmi_print_results">
				<div class="wrap">
					<header class="date">
						Available as of <?php echo date("m.d.Y"); ?>
					</header>
					
					<table class="qmi-results" border="0" cellspacing="0" cellpadding="0" width="100%">
						<tbody>
							<tr bgcolor="#a7a9ac" class="thead">
								<th bgcolor="#a7a9ac">Builder</th>
								<th bgcolor="#a7a9ac">Model</th>
								<th bgcolor="#a7a9ac">Address</th>
								<th bgcolor="#a7a9ac">Lot #</th>
								<th bgcolor="#a7a9ac">Stories</th>
								<th bgcolor="#a7a9ac">Sq/Ft</th>
								<th bgcolor="#a7a9ac">Bed/Bath/Grg</th>
								<th bgcolor="#a7a9ac">Price*</th>
								<th bgcolor="#a7a9ac">Avail.</th>
							</tr>
							<?php foreach($ordered_results as $result): ?>									
								<tr>
									<td data-th="Builder">
										<?php echo $result['builder']; ?>
									</td>
									<td data-th="Model">
										<?php echo "<a href='".get_the_permalink($result['id'])."' target='_blank'>".$result['model']."</a>"; ?>
									</td>
									<td data-th="Address">
										<?php echo $result['street_address']; ?>
									</td>
									<td data-th="Lot #">
										<?php echo $result['lot_number']; ?>
									</td>
									<td data-th="Stories">
										<?php echo $result['stories']; ?>
									</td>
									<td data-th="Sq/Ft">
										<?php echo number_format($result['square_feet']); ?>
									</td>
									<td data-th="Bed/Bath/Grg">
										<?php echo $result['bedrooms']." / ".$result['bathrooms']." / ".$result['garages']; ?>
									</td>
									<td data-th="Price*">
										<?php echo "$".number_format($result['price']); ?>
									</td>
									<td data-th="Available">
										<?php echo $result['available']; ?>
									</td>
								</tr>
							<?php endforeach; ?>							
						</tbody>
			        </table>	
				</div>	<!-- end wrap -->
			</section>	
		        
		<?php else: ?>
			<section id="qmi_lists">
				<div class="wrap">
					<article>
						<header>
							<h1>Sorry, no quick move-in homes were found.</h1>
						</header>
	
						<div class="textarea">
							<h2>Please check back at a later date to see new quick move-in homes when they become available.</h2>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
						</div>
					</article>	
				</div>	<!-- end wrap -->
			</section>	
		<?php endif; ?>

		<?php wp_reset_query(); ?>
			
        <section id="qmi_print_footer" class="qmi_disclaimer print-only">
	        <div class="wrap">
		        <div class="copyright row">
			        <div class="text md-10">
				        <div class="blue"><?php echo get_field("footer_disclaimer"); ?></div>
				        <?php echo get_field("footer_copyright"); ?>
			        </div>
		        </div>
	        </div>
        </section>
		
		<section class="qmi_disclaimer screen-only">
		    <div class="wrap">
		        <div class="copyright row">
			        <div class="text md-10">
				        <div class="blue"><?php echo get_field("footer_disclaimer"); ?></div>
				        <?php echo get_field("footer_copyright"); ?>
			        </div>
		        </div>
		    </div>
		</section>
    </div>

<script type="text/javascript">
	window.print();
</script>

<?php get_footer(); ?>