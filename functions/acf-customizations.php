<?php

// Adds client custom colors to WYSIWYG editor and ACF color picker. 
$client_colors = array(
    "21272e",  // black
    "9eb909",  // green
    "b23525",  // red
    "ce9640",  // orange
    "f3ec50",  // yellow
    "2aa9aa",  // teal
);

function change_acf_color_picker() {
	
	echo "<script>
		acf.add_filter('color_picker_args', function( args, field ){

		    // overwrite palette with custom colors
		    args.palettes = ['#9eb909', '#b23525', '#ce9640', '#f3ec50', '#2aa9aa', '#21272e', '#ffffff']		
		
		    // return
		    return args;
		
		});
	</script>";
	
}

add_action( 'acf/input/admin_head', 'change_acf_color_picker' );


// Add an Options page to the WP Admin area
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme-options'
	));
	
}


/*
 * Create custom Gutenberg block category
 *
 */
if(!function_exists('tdc_block_categories')):
	function tdc_block_categories( $categories, $post ) {
		return in_array('tdc-blocks', $categories) ? $categories : array_merge(
			array(
				array(
					'slug'			=> 'tdc-blocks',
					'title'			=> __( 'UPAN Blocks', 'tdc' ),
				),
			),
			$categories
		);
	}
	add_filter(	'block_categories',	'tdc_block_categories', 10, 2 );
endif;


/*
 * Register custom ACF blocks for use in Gutenberg
 *
 * @link https://developer.wordpress.org/resource/dashicons/
 */
function tdc_register_acf_block_types() {

  // register the add to calendar button
  acf_register_block_type(array(
    'name'              => 'add-to-calendar-button',
    'title'             => __('Add to Calendar Button'),
    'description'       => __('Displays a button to add an event to a calendar'),
    'render_template'   => 'blocks/add-to-calendar-button.php',
    'category'          => 'tdc-blocks',
    'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M128 0c13.3 0 24 10.7 24 24l0 40 144 0 0-40c0-13.3 10.7-24 24-24s24 10.7 24 24l0 40 40 0c35.3 0 64 28.7 64 64l0 16 0 48-16 0-32 0-48 0L48 192l0 256c0 8.8 7.2 16 16 16l220.5 0c12.3 18.8 28 35.1 46.3 48L64 512c-35.3 0-64-28.7-64-64L0 192l0-48 0-16C0 92.7 28.7 64 64 64l40 0 0-40c0-13.3 10.7-24 24-24zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16s16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0 0-48z"/></svg>',
    'keywords'          => array( 'standard', 'content', 'calendar', 'add', 'add to calendar', 'button' ),
    'supports'          => [ 'align' => false, 'spacing' => [ 'margin' => true, 'padding' => true ], 'anchor' => true ],
    'align'             => 'full',
    'enqueue_assets'		=> function(){
			// wp_enqueue_style( 'add-to-calendar', get_stylesheet_directory_uri().'/assets/css/blocks/add-to-calendar.css' );
			wp_enqueue_script( 'add-to-calendar', 'https://cdn.jsdelivr.net/npm/add-to-calendar-button@2', null, '2025-03-21', true );
    },
    'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'is_preview' => 1
				)
			)
		)
  ));

	// register the builder hero block.
	acf_register_block_type(array(
		'name'              => 'event-builder-block',
		'title'             => __('Event Builder Block'),
		'description'       => __('A featured block to display a builder and their neighborhoods with special Events features.'),
		'render_template'   => 'blocks/event-builder-block.php',
		'category'          => 'tdc-blocks',
		'icon'              => 'admin-multisite',
		'keywords'          => array( 'event', 'builders', 'neighborhoods', 'columns' ),
		'supports'          => [ 'align' => true, 'anchor' => true ],
		'align'             => 'full',
		// 'enqueue_style'     => get_stylesheet_directory_uri().'/assets/css/blocks/builders-columns.css',
		'enqueue_assets'		=> function(){
			wp_enqueue_style( 'event-builder-block', get_stylesheet_directory_uri().'/blocks/css/event-builder-block.css', null, filemtime( get_stylesheet_directory().'/blocks/css/event-builder-block.css' ) );
		},
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'is_preview' => 1
				)
			)
		)
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'tdc_register_acf_block_types');
}
