<?php 
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	
	global $post;
	$homesList = $_SESSION['wp_query']->posts;
	$currentHome = null;
	$currentPostKey = null;
	
	foreach($homesList as $postKey => $homePost):
		if($post->ID === $homePost->ID):
			$currentHome = $homePost;
			$currentPostKey = $postKey;
			break;
		endif;
	endforeach;
	
	while(key($homesList) !== $currentPostKey) next($homesList);
	
	if($currentPostKey === 0):
		$prevHome = null;
		$nextHome = next($homesList);
	elseif($currentPostKey === (count($homesList) - 1)):
		$prevHome = prev($homesList);
		$nextHome = null;
	else:
		$prevHome = prev($homesList);
		$nextHome = next($homesList);
		$nextHome = next($homesList);
	endif;
	
		
	//echo '<pre>'; print_r($prevHome); echo '</pre>';
	//echo '<pre>'; print_r($nextHome); echo '</pre>';
	//echo '<pre>'; print_r($_SESSION['wp_query']->posts); echo '</pre>';
?>

<aside id="home_jump">
	<div class="wrap">
		<?php if(isset($prevHome)): ?>
			<?php
				$jumpPostID = $prevHome->ID;
				include( get_template_directory() . '/template-parts/homes/script-home-jump-variables.php' );
			?>
			<a id="jump_prev" href="<?php echo get_permalink($jumpPostID); ?>">
				<div class="label prev"><i class="fa fa-chevron-left"></i> View Previous Home</div>
				<img src="<?php echo $jumpImages[0]['url']; ?>" />
				<article>
					<h4><?php echo get_the_title($jumpPostID); ?></h4>
					<p>by <?php echo $jumpBuilder->post_title; ?></p>
					<p><strong><?php echo ucfirst($jumpPriceRange[0]) . ' $' . $jumpPriceRange[1] . ',000s'; ?></strong></p>
					<p><?php echo $jumpTotalBeds; ?> beds | <?php echo $jumpTotalBaths; ?> baths | <?php echo $jumpSquareFootage; ?> sq ft</p>
				</article>
			</a>
		<?php endif; ?>
		<?php if(isset($nextHome)): ?>
			<?php
				$jumpPostID = $nextHome->ID;
				include( get_template_directory() . '/template-parts/homes/script-home-jump-variables.php' );
			?>
			<a id="jump_next" href="<?php echo get_permalink($jumpPostID); ?>">
				<div class="label next">View Next Home <i class="fa fa-chevron-right"></i></div>
				<img src="<?php echo $jumpImages[0]['url']; ?>" />
				<article>
					<h4><?php echo get_the_title($jumpPostID); ?></h4>
					<p>by <?php echo $jumpBuilder->post_title; ?></p>
					<p><strong><?php echo ucfirst($jumpPriceRange[0]) . ' $' . $jumpPriceRange[1] . ',000s'; ?></strong></p>
					<p><?php echo $jumpMaxBeds; ?> beds | <?php echo $jumpMaxBaths; ?> baths | <?php echo $jumpSquareFootage; ?> sq ft</p>
				</article>
			</a>
		<?php endif; ?>
	</div>
</aside>