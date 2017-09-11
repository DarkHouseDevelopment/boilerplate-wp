<?php
add_action( 'gform_after_submission_11', 'send_form_11_to_brightdoor' );
if( !function_exists('send_form_11_to_brightdoor') ){
	function send_form_11_to_brightdoor( $entry, $form = NULL ){
		
		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[7],
			'contactPassword'=>'',
			'firstName'=>$entry['17.3'],
			'lastName'=>$entry['17.6'],
			'address'=>'',
			'city'=>'',
			'state'=>'',
			'zip'=>'',
			'preferredPhone'=>$entry[16],
			'contactStatusID'=>'6',
			'contactTypeID'=>'1',
			'initialContactTypeID'=>'9',
			'preferredCommunicationMethod'=>'',
			'interestIDs'=>'',
			'primaryLeadSourceID'=>'32',
			'secondaryLeadSourceID'=>'0',
			'overwriteDuplicate'=>'TRUE',
			'addToTour'=>'FALSE',
			'interactionsData'=> urlencode( 
				'Message from Contact=' . $entry[9] . '(Inquiry about '.$entry[18].')'
			)
		);
		
		send_to_brightdoor( $params );	
	}
}