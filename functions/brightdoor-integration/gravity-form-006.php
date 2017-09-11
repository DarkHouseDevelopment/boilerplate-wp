<?php
add_action( 'gform_after_submission_6', 'send_form_6_to_brightdoor' );
if( !function_exists('send_form_6_to_brightdoor') ){
	function send_form_06_to_brightdoor($entry, $form = NULL){
	
		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[8],
			'contactPassword'=>'',
			'firstName'=>$entry[14],
			'lastName'=>$entry[14],
			'address'=>'',
			'city'=>'',
			'state'=>'',
			'zip'=>'',
			'preferredPhone'=>$entry[9],
			'contactStatusID'=>'6',
			'contactTypeID'=>'1',
			'initialContactTypeID'=>'9',
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