<?php

/**
 * Company: INTERACTIVE REALM
 * Developer Name(s): Jason Etzel
 * Date Last Updated: 1/13/2017
 *
 * These functions add roles and provide the code to restrict content 
 * for certain roles.
 */


/*
=====================
ADD CUSTOM USER ROLES
=====================
*/

add_role('verrado', 'Verrado Resident', array(
	'read' => true,
	'edit_posts' => false,
	'delete_posts' => false,
));

add_role('victory', 'Victory Resident', array(
	'read' => true,
	'edit_posts' => false,
	'delete_posts' => false,
));

// remove unneeded roles
remove_role('resident-verrado');
remove_role('resident-victory');


/*
============================================
CHECK CURRENT USER ROLE VS ROLE VIEWER ROLES
============================================
*/

// gets the current user roles
function irealm_get_current_roles() {
	global $current_user;

	get_currentuserinfo();

	if (!empty($current_user)) {
		$user_info = get_userdata( $current_user->ID );
		return $user_info->roles;
	}

	return null;
}

// user_has_role('verrado') or user_has_role('verrado,victory')
// pass the name of a role or roles comma separated
// and the function will return true if current user
// has any of the roles passed.

function irealm_check_user_role($role) {
	$role_found = 0;
	$roles = explode(',', trim($role));
	$user_roles = irealm_get_current_roles();

	//  only if user is availble
	if ($user_roles) {
		
		// for each role passed
		for ($i = 0; $i < count($roles); $i++) {

			// for each user role
			for ($j = 0; $j < count($user_roles); $j++) {

				// check if matching roles
				if ($roles[$i] == $user_roles[$j]) {

					$role_found = 1;
				}
			}
		}
	}

	return $role_found;
}

function user_has_role($args) {
	return apply_filters('user_has_role', $args);
}
add_filter('user_has_role', 'irealm_check_user_role', 10, 1);


// [role_viewer role="verrado"]content[/role_viewer] or
// [role_viewer role="verrado,victory"]content[/role_viewer]
// pass the name of a role or roles comma separated
// and the function will return the content if current
// user has any of the roles pass or is admin.

function irealm_role_viewer($atts, $content = "") {
	$atts = shortcode_atts(array(
		'role' => 'administrator'
	), $atts, 'role_viewer');
	
	$role_found = 0;
	$roles = explode(',', trim($atts['role']));
	$user_roles = irealm_get_current_roles();

	//  only if user is availble
	if ($user_roles) {
		
		// for each role passed
		for ($i = 0; $i < count($roles); $i++) {

			// for each user role
			for ($j = 0; $j < count($user_roles); $j++) {
				
				// check if matching roles or
				// if passed role is verrado and user role is victory
				if ($roles[$i] == $user_roles[$j] /*||
					($roles[$i] == 'verrado' && $user_roles[$j] == 'victory')*/) {

					$role_found = 1;
				}
			}
		}
	}

	// use hook function to check role
	if (!$role_found) {
		$content = '';
	}

	return do_shortcode($content);
}
add_shortcode('role_viewer', 'irealm_role_viewer');


/*
=====================================
ADD CUSTOM ROLE VIEWER TOOLBAR BUTTON
=====================================
*/

add_action('admin_head', 'roleviewer_shortcodes_btn');

function roleviewer_shortcodes_btn() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') && !current_user_can('edit_tribe_events') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page', 'tribe_events') ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "roleviewer_shortcodes_tinymce_plugin");
        add_filter('mce_buttons', 'roleviewer_shortcodes_register');
        roleviewer_admin_head();
    }
}

function roleviewer_shortcodes_tinymce_plugin($plugin_array) {
    $plugin_array['role_viewer_shortcodes'] = get_template_directory_uri() . '/functions/role-viewer.js';
    return $plugin_array;
}

function roleviewer_shortcodes_register($buttons) {
   array_push($buttons, "role_viewer_shortcodes");
   return $buttons;
}

// pass roles to javascript
function roleviewer_admin_head() {
	/*global $wp_roles;
	
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();
	
	implode("','", $wp_roles->get_names());*/
?>
<!-- Role Viewer TinyMCE Shortcode Plugin -->
<script type='text/javascript'>
	var role_viewer_shortcodes = {
		'roles' : ['victory','verrado','administrator']
	};
</script>
<?php
}
?>