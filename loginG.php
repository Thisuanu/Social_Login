<?php
	include_once 'src/Google_Client.php';
	include_once 'src/contrib/Google_Oauth2Service.php';
	
	// Edit Following 3 Lines
	$clientId = '414621605455-2n7c4jhu5e0r9oarvbcemmndl4e5g7va.apps.googleusercontent.com'; //Application client ID
	$clientSecret = '0QGXuXbb5KoP6k-3psbK8THP'; //Application client secret
	$redirectURL = 'http://localhost/Social_login'; //Application Callback URL
	
	$gClient = new Google_Client();
	$gClient->setApplicationName('Your Application Name');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectURL);
	$google_oauthV2 = new Google_Oauth2Service($gClient);
?>