<?php
/**
 * @link https://snippets.khromov.se/sanitizing-and-securing-advanced-custom-fields-output/
 * @link https://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data
 */

/**
 * Helper function to sanitize data output by the get_field() function also normalize values.
 *
 * @param $field_key
 * @param bool $post_id
 * @param bool $format_value
 * @param string $sanitization_method esc_html / esc_attr or NULL for none
 * @return array|bool|string
 */
function get_field_sanitized($field_key, $post_id = false, $format_value = true, $sanitization_method = 'esc_html') {
	$field = get_field($field_key, $post_id, $format_value);
	/* Check for null and falsy values and always return space */
	if($field === NULL || $field === FALSE):
		$field = '';
	endif;
	/* Handle arrays */
	if(is_array($field)):
		$field_sanitized = array();
		foreach($field as $key => $value):
			$field_sanitized[$key] = ($sanitization_method === NULL) ? $value : $sanitization_method($value);
		endforeach;
		return $field_sanitized;
	else:
		return ($sanitization_method === NULL) ? $field : $sanitization_method($field);
	endif;
}

/**
 * Wrapper function for get_field_sanitized() that echoes the value isntead of returning it.
 *
 * @param $field_key
 * @param bool $post_id
 * @param bool $format_value
 * @param string $escape_method esc_html / esc_attr or NULL for none
 */
function the_field_sanitized($field_key, $post_id = false, $format_value = true, $escape_method = 'esc_html') {
	//Get field
	$value = get_field_sanitized($field_key, $post_id, $format_value, $escape_method );
	
	//Print arrays as comma-separated strings, as per get_field() behaviour.
	if( is_array($value) ):
		$value = @implode( ', ', $value );
	endif;
	
	//Echo result
	echo $value;
}

/**
 * Helper function to sanitize data output by the get_sub_field() function also normalize values.
 *
 * @param $field_key
 * @param bool $post_id
 * @param bool $format_value
 * @param string $sanitization_method esc_html / esc_attr or NULL for none
 * @return array|bool|string
 */
function get_sub_field_sanitized($field_key, $post_id = false, $format_value = true, $sanitization_method = 'esc_html') {
	$field = get_sub_field($field_key, $post_id, $format_value);
	/* Check for null and falsy values and always return space */
	if($field === NULL || $field === FALSE):
		$field = '';
	endif;
	/* Handle arrays */
	if(is_array($field)):
		$field_sanitized = array();
		foreach($field as $key => $value):
			$field_sanitized[$key] = ($sanitization_method === NULL) ? $value : $sanitization_method($value);
		endforeach;
		return $field_sanitized;
	else:
		return ($sanitization_method === NULL) ? $field : $sanitization_method($field);
	endif;
}

/**
 * Wrapper function for get_sub_field_sanitized() that echoes the value isntead of returning it.
 *
 * @param $field_key
 * @param bool $post_id
 * @param bool $format_value
 * @param string $escape_method esc_html / esc_attr or NULL for none
 */
function the_sub_field_sanitized($field_key, $post_id = false, $format_value = true, $escape_method = 'esc_html') {
	//Get field
	$value = get_sub_field_sanitized($field_key, $post_id, $format_value, $escape_method );
	
	//Print arrays as comma-separated strings, as per get_field() behaviour.
	if( is_array($value) ):
		$value = @implode( ', ', $value );
	endif;
	
	//Echo result
	echo $value;
}
