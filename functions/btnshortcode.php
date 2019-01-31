<?php
	// Add Shortcode
	function btn_shortcode( $atts , $content = null ) {
	
		// Attributes
		extract(shortcode_atts( array(
			'link' => 'https://www.lingolive.com',
			'new_window' => false,
			'style' => 'solid'
		), $atts ) );
		
		if (strpos($link, "http") !== 0 && substr($link, 0, 1) != "/") {
		    $link = "http://".$link;
		}
		
		if($new_window == "true"){
			$target = "_blank";
			$rel = 'rel="noopener"';
		} else {
			$target = "_self";
		}
	
		return "<a class='btn btn-$style' href='$link' target='$target' $rel>$content</a>";
	
	}
	add_shortcode( 'btn', 'btn_shortcode' );
	
	function add_button() {
		if(current_user_can('edit_posts') &&  current_user_can('edit_pages')){
			add_filter('mce_external_plugins', 'add_plugin');
			add_filter('mce_buttons', 'register_button');
		}
	}
	add_action('init', 'add_button');
	
	function register_button($buttons) {
		array_push($buttons, "btn");
		return $buttons;
	}
	function add_plugin($plugin_array) {
		$plugin_array['btn'] = get_bloginfo('template_url').'/assets/js/btn_shortcode.js';
		return $plugin_array;
	}