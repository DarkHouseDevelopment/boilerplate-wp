<?php
add_action( 'gform_after_submission_34', 'send_form_34_to_brightdoor' );
if( !function_exists('send_form_34_to_brightdoor') ){
	function send_form_34_to_brightdoor( $entry, $form = NULL ){
		
		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[5],
			'contactPassword'=>'',
			'firstName'=>$entry[1],
			'lastName'=>$entry[1],
			'address'=>'',
			'city'=>'',
			'state'=>'',
			'zip'=>'',
			'preferredPhone'=>$entry[3],
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
				'Message from Contact=' . $entry[4]
			)
		);
		
		send_to_brightdoor( $params );	
	}
}