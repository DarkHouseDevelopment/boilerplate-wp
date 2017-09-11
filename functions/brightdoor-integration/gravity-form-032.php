<?php

add_action( 'gform_after_submission_32', 'send_form_32_to_brightdoor' );

if( !function_exists('send_form_32_to_brightdoor') ){

	function send_form_32_to_brightdoor($entry, $form = NULL){

        $hear_about_us = $entry[13];
        $contact_attributes = str_replace(",",";",$hear_about_us);
        
        if($hear_about_us != ""){
            $interactions_data = 'Message from Contact=' . $entry[4] . '&' . 'hearAboutUs=' . $contact_attributes;
        } else {
            $interactions_data = 'Message from Contact=' . $entry[4];
        }

		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[2],
			'contactPassword'=>'',
			'firstName'=>$entry[7],
			'lastName'=>$entry[8],
			'address'=>'',
			'city'=>'',
			'state'=>'',
			'zip'=>'',
			'preferredPhone'=>$entry[10],
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
				$interactions_data
			)
		);
		
		send_to_brightdoor( $params );

	}
}