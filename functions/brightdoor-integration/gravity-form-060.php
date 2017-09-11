<?php
add_action( 'gform_after_submission_60', 'send_form_60_to_brightdoor' );
if( !function_exists('send_form_60_to_brightdoor') ){

	function send_form_60_to_brightdoor($entry, $form = NULL){

	    include( get_stylesheet_directory() . '/brightdoor-integration/campaign-ids.php' );

		$params = array(		
			'username' => 'webmaster@zendylabs.com',
			'password' => 'kuku1ula',
		    'clientID' => 1,
		    'centerID' => 1,
			'preferredEmail'=>$entry[2],
			'contactPassword'=>'',
			'firstName'=>$entry['1.3'],
			'lastName'=>$entry['1.6'],
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
			'primaryLeadSourceID'=>$primary_lead_source_id,
			'secondaryLeadSourceID'=>'0',
			'overwriteDuplicate'=>'TRUE',
			'addToTour'=>'FALSE',
			'interactionsData'=> ''
		);

        //var_dump($params);

		//die;

		send_to_brightdoor( $params );

	}
}