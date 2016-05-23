<?php
require("includes.php");
session_start();

$_SESSION["is_logged_in"] = true;
$_SESSION["username"] = "Matthewrbowker";

if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
	header("LOCATION: request.php");
	exit(0);
}

use MediaWiki\OAuthClient\ClientConfig;
use MediaWiki\OAuthClient\Consumer;
use MediaWiki\OAuthClient\Client;

$endpoint = 'http://localhost/w/index.php?title=Special:OAuth';
$redir = 'http://localhost/view/Special:OAuth?';
$consumerKey = 'your key here';
$consumerSecret = 'your shared secret here';

try {

	$conf = new ClientConfig( $endpoint );
	$conf->setRedirURL( $redir );
	$conf->setConsumer( new Consumer( $consumerKey, $consumerSecret ) );

	$client = new Client( $conf );
	$client->setCallback( 'http://localhost/oauth/callback.php' );

	// Step 1 = Get a request token
	list( $next, $token ) = $client->initiate();

	// Step 2 - Have the user authorize your app. Get a verifier code from
	// them. (if this was a webapp, you would redirect your user to $next,
	// then use the 'oauth_verifier' GET parameter when the user is redirected
	// back to the callback url you registered.
	echo "Point your browser to: $next\n\n";
	print "Enter the verification code:\n";
	$fh = fopen( 'php://stdin', 'r' );
	$verifyCode = trim( fgets( $fh ) );

	// Step 3 - Exchange the token and verification code for an access
	// token
	$accessToken = $client->complete( $token,  $verifyCode );

	// You're done! You can now identify the user, and/or call the API with
	// $accessToken

	// If we want to authenticate the user
	$ident = $client->identify( $accessToken );
	echo "Authenticated user {$ident->username}\n";

	// Do a simple API call
	echo "Getting user info: ";
	echo $client->makeOAuthCall(
		$accessToken,
		'http://localhost/wiki/api.php?action=query&meta=userinfo&uiprop=rights&format=json'
	);

}
catch (Exception $e) {
    try {
	    throw new arException($e->getMessage());
	}
	catch(arException $f) {
		$f->renderHTML();
	}
}

/*
// Make an Edit
$editToken = json_decode( $client->makeOAuthCall(
    $accessToken,
    'https://localhost/wiki/api.php?action=tokens&format=json'
) )->tokens->edittoken;

$apiParams = array(
    'action' => 'edit',
    'title' => 'Talk:Main_Page',
    'section' => 'new',
    'summary' => 'Hello World',
    'text' => 'Hi',
    'token' => $editToken,
    'format' => 'json',
);

$client->setExtraParams( $apiParams ); // sign these too

echo $client->makeOAuthCall(
    $accessToken,
    'https://localhost/wiki/api.php',
    true,
    $apiParams
);
*/
