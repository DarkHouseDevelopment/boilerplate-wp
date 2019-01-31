<?php 
	
/**
 * Update allowed HTML to include iframes for videos
 *
 * @param array $allowed_html - allowed html tags
 */
function filter_allow_iframes( $allowed_html ) {
	// Only change for users who can publish posts
	if ( !current_user_can( 'publish_posts' ) ) return $allowed_html;
	// Allow iframes and the following attributes
	$allowed_html['iframe'] = array(
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
	);
	return $allowed_html;
}
add_filter( 'wp_kses_allowed_html', 'filter_allow_iframes' );