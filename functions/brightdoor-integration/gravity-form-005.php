<?php
add_action( 'gform_after_submission_5', 'send_form_5_to_brightdoor' );
if( !function_exists('send_form_5_to_brightdoor') ){
	function send_form_5_to_brightdoor( $entry, $form = NULL ){
		
		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[3],
			'contactPassword'=>'',
			'firstName'=>$entry[4],
			'lastName'=>$entry[5],
			'address'=>'',
			'city'=>'',
			'state'=>'',
			'zip'=>'',
			'preferredPhone'=>'',
			'contactStatusID'=>'6',
			'contactTypeID'=>'1',
			'initialContactTypeID'=>'16',
			'preferredCommunicationMethod'=>'',
			'interestIDs'=>'',
			'primaryLeadSourceID'=>'32',
			'secondaryLeadSourceID'=>'0',
			'overwriteDuplicate'=>'TRUE',
			'addToTour'=>'FALSE',
			'interactionsData'=> ''
		);
		
		send_to_brightdoor( $params );	
	}
}