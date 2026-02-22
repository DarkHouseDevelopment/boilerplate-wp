<?php
// At the top of your file, after Composer autoload
require_once get_stylesheet_directory() . '/vendor/autoload.php'; // Adjust path as needed
use Verifalia\VerifaliaRestClient;

/*
 * Define default values for floorplan interest form
 */
add_filter( 'gform_pre_render', 'tdc_gf_deafult_product_values', 10, 3 );
function tdc_gf_deafult_product_values( $form ) {
	global $post;
  $builder_title = '';
  $model = '';
  $builder_email = 'brett@darkhouse.dev,kclifford@sunbeltholdings.com';

	if(is_singular( array( 'homes','rentals','qmi' ) )):
		$floorplan_id = is_singular( array( 'homes', 'rentals' ) ) ? $post->ID : get_field( 'floorplan' )->ID;
		$builder = get_field( 'builder', $floorplan_id );
    $builder_title = get_the_title( $builder );
    $model = get_the_title( $floorplan_id );
    $builder_contact = get_field( 'builder_contact', $builder->ID );
    $neighborhood_contact = get_field( 'neighborhood_contact', $builder->ID );
    $builder_email = !empty($neighborhood_contact['email']) ? $neighborhood_contact['email'] : $builder_contact[0]['email'];
    $builder_email = empty($builder_email) ? 'brett@darkhouse.dev,kclifford@sunbeltholdings.com' : $builder_email;
	elseif(is_singular( array( 'builders' ) )):
		if(!empty($post->post_parent)):
			$builder_id = $post->post_parent;
    else:
      $builder_id = $post->ID;
		endif;

    $builder_title = get_the_title( $builder_id );
    $builder_contact = get_field( 'builder_contact', $builder_id );
    $neighborhood_contact = get_field( 'neighborhood_contact', $builder_id );
    $builder_email = !empty($neighborhood_contact['email']) ? $neighborhood_contact['email'] : $builder_contact[0]['email'];
    $builder_email = empty($builder_email) ? 'brett@darkhouse.dev' : $builder_email;
	endif;

	foreach($form['fields'] as &$field):
		$default_value = '';
		// if($field->type == "hidden" && empty($field->defaultValue)){ echo "<pre>"; print_r($field); die(); }
  	if( $field->type == "hidden" && empty($field->defaultValue) && !empty($field->inputName) ):
  		global $post;
      if( 'builder' == $field->inputName ):
        $default_value = $builder_title;
      elseif( 'model' == $field->inputName ):
        $default_value = $model;
      elseif( 'builder_email' == $field->inputName ):
        $default_value = $builder_email;
      endif;

			$field->defaultValue = $default_value;
  	endif;
	endforeach;

  return $form;
}


/*
 * Define default fields array
 */
function gf_get_hubspot_submit_data( $entry, $form_id ){
	$hs_data = array(
    "fields" => array(
      array(
        "name" => "firstname",
        "value" => $entry['1.3']
      ),
      array(
        "name" => "lastname",
        "value" => $entry['1.6']
      ),
      array(
        "name" => "email",
        "value" => $entry['2']
      ),
      array(
        "name" => "phone",
        "value" => $entry['4']
      ),
      array(
        "name" => "city",
        "value" => $entry['6']
      ),
      array(
        "name" => "state",
        "value" => $entry['7']
      ),
      array(
        "name" => "zip",
        "value" => $entry['8']
      ),
    )
  );

  return json_encode($hs_data);
}


// Filter to conditionally send notifications based on city and email
add_filter('gform_notification', function($notification, $form, $entry) {
	$hs_data_json = gf_get_hubspot_submit_data($entry, $form['id']);
	$errors = gf_get_hubspot_errors($hs_data_json);

	if (!empty($errors)) {
		return false;
	}

	return $notification;
}, 10, 3);


/**
 * Check submission for custom error parameters
 */
function gf_get_hubspot_errors($hs_data_json) {
    $hs_data_arr = is_array($hs_data_json) ? $hs_data_json : json_decode($hs_data_json, true);

    $errors = [];
    $city = '';
    $email = '';
    $firstname = '';
    $phone = '';
    $state = '';
    if (!empty($hs_data_arr['fields'])) {
			foreach ($hs_data_arr['fields'] as $field) {
				if ($field['name'] === 'city') {
          $city = strtolower(trim($field['value']));
        }
        if ($field['name'] === 'email') {
          $email = trim($field['value']);
        }
        if ($field['name'] === 'firstname') {
          $firstname = trim($field['value']);
        }
        if ($field['name'] === 'phone') {
          $phone = preg_replace('/\D/', '', $field['value']); // digits only
        }
        if ($field['name'] === 'state') {
          $state = strtolower(trim($field['value']));
        }
			}
    }

    if ($city == 'new york' || $city == 'ny' || $city == 'arizona' ) {
        $errors['city'] = 'Sorry, we are not accepting submissions from this city.';
    }
    if ($email) {
        $parts = explode('@', $email);
        if (
            count($parts) === 2 &&
            strtolower($parts[1]) === 'gmail.com' &&
            strlen($parts[0]) < 6
        ) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif (
            count($parts) === 2 &&
            ( strtolower($parts[1]) === 'gamil.com' || strtolower($parts[1]) === 'gnail.com' || strtolower($parts[1]) === 'workgmail.com' )
        ) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif (
            count($parts) === 2 &&
            strtolower($parts[1]) === 'gmail.com' &&
            strlen($parts[0]) === 6 &&
            strpos($parts[0], 'tha') === 0
        ) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif (
            count($parts) === 2 &&
            strlen($parts[0]) === 6 &&
            strpos($parts[0], 'tha') === 0
        ) {
            $errors['email'] = 'Please enter a valid email address.';
        }
    }
		if ($firstname && strpos($firstname, ' ') !== false) {
        $errors['firstname'] = 'First name cannot contain spaces.';
    }
    if ($phone && $state) {
        $first3 = substr($phone, 0, 3);
        if ($first3 === '430' && !in_array($state, ['tx', 'texas'])) {
            $errors['phone'] = 'Please enter a valid phone number.';
        }
        if ($first3 === '321' && !in_array($state, ['fl', 'florida'])) {
            $errors['phone'] = 'Please enter a valid phone number.';
        }
    }

    return $errors;
}


add_filter('gform_validation', 'gf_custom_spam_validation');
function gf_custom_spam_validation($validation_result) {
    $form = $validation_result['form'];
    $entry = array();

    foreach ($form['fields'] as $field) {
        if (isset($_POST['input_' . $field->id])) {
            $entry[$field->id] = $_POST['input_' . $field->id];
        }
        if (is_array($field->inputs)) {
            foreach ($field->inputs as $input) {
                $input_id = str_replace('.', '_', strval($input['id']));
                if (isset($_POST['input_' . $input_id])) {
                    $entry[$input['id']] = $_POST['input_' . $input_id];
                }
            }
        }
    }

    $hs_data_json = gf_get_hubspot_submit_data($entry, $form['id']);
    $errors = gf_get_hubspot_errors($hs_data_json);

		// --- Verifalia email validation ---
    if ($entry['2'] && empty($errors['email'])) {
			$email = isset($entry['2']) ? trim($entry['2']) : ''; // Adjust '2' to your email field ID
			try {
				$verifalia = new Verifalia\VerifaliaRestClient([
					Verifalia\VerifaliaRestClientOptions::USERNAME => 'c4f98700a95d4a9dafc293bcbbaa90a0',
					Verifalia\VerifaliaRestClientOptions::PASSWORD => ''
				]);
				$result = $verifalia->emailValidations->submit($email);
				$status = $result->entries[0]->status;
				if ($status !== 'Success') {
					// Log the full result for debugging
					error_log('Verifalia result: ' . print_r($result, true));
					$errors['email'] = 'Please enter a valid email.';
				}
			} catch (Exception $e) {
				// Optionally log or handle API errors
				// Log the exception message for debugging
				error_log('Verifalia exception: ' . $e->getMessage());
				$errors['email'] = 'There was a problem verifying your email address. Please try again. '.$e->getMessage();
			}
    }
    // --- End Verifalia integration ---

    if (!empty($errors)) {
        $validation_result['is_valid'] = false;
        foreach ($form['fields'] as &$field) {
					if (isset($errors['city']) && $field->inputName == 'city') {
						$field->failed_validation = true;
						$field->validation_message = $errors['city'];
						// $field->validation_message = json_encode($form['fields']);
					}
					if (isset($errors['email']) && ($field->type == 'email' || $field->inputName == 'email')) {
						$field->failed_validation = true;
						$field->validation_message = $errors['email'];
					}
					if (isset($errors['firstname']) && $field->type == 'name' && is_array($field->inputs)) {
						$field->failed_validation = true;
						$field->validation_message = $errors['firstname'];
					}
          if (isset($errors['phone']) && ($field->type == 'tel' || $field->inputName == 'phone')) {
            $field->failed_validation = true;
            $field->validation_message = $errors['phone'];
          }
        }
        unset($field);
        $validation_result['form'] = $form;
    }

    return $validation_result;
}
