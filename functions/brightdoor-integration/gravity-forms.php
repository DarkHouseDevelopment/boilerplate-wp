<?php

function send_to_brightdoor( $params ){

	$url = 'http://kukuiula.brightdoor.com/brightbase/wsbrightdoor.asmx/AddContactRecord';

	foreach($params as $key=>$value) 
    { 
        $params_string .= $key.'='.$value.'&'; 
    }

	rtrim($params_string, '&');

	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL, $url);

	curl_setopt($ch,CURLOPT_POST, count($params));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);

	$result = curl_exec($ch);

    curl_close($ch);

}
include( 'gravity-form-005.php' );
include( 'gravity-form-011.php' );
include( 'gravity-form-018.php' );
include( 'gravity-form-024.php' );
include( 'gravity-form-026.php' );
include( 'gravity-form-027.php' );
include( 'gravity-form-031.php' );
include( 'gravity-form-032.php' );
include( 'gravity-form-033.php' );
include( 'gravity-form-034.php' );
include( 'gravity-form-036.php' );
include( 'gravity-form-038.php' );
include( 'gravity-form-040.php' );
include( 'gravity-form-041.php' );
include( 'gravity-form-042.php' );
include( 'gravity-form-043.php' );
include( 'gravity-form-046.php' );
include( 'gravity-form-048.php' );
include( 'gravity-form-049.php' );
include( 'gravity-form-051.php' );
include( 'gravity-form-052.php' );
include( 'gravity-form-058.php' );
include( 'gravity-form-059.php' );
include( 'gravity-form-060.php' );