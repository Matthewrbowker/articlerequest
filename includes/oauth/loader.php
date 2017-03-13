<?php
/*
	Copyright (c) 2015-2017, Maximilian Doerr
*/

//Create a file named setpath.php in the same directory as this file and set the $path to the root directory containing the configuration file.
//$path = "../";
$path = "";

if( file_exists( 'setpath.php' ) ) require_once( 'setpath.php' );

/*
	This controls some OAuth settings like user language and wiki from the webpages
	Remove the session stuff if not needed as this will be accessible on every page loaded.
*/
session_start();
if( isset( $_GET['wiki'] ) ) {
    $_SESSION['setwiki'] = $_GET['wiki'];
}
if( isset( $_GET['lang'] ) ) {
    $_SESSION['setlang'] = $_GET['lang'];
}
if( isset( $_SESSION['setwiki'] ) ) {
    define( 'WIKIPEDIA', $_SESSION['setwiki'] );
}
session_write_close();

//PHP will complain without this.
date_default_timezone_set( "UTC" );

error_reporting( E_ALL );

//This is fetching the config file.  You'll want to define the constants CONSUMERKEY, CONSUMERSECRET, OAUTH, which points to the OAuth URL needed, and WIKIPEDIA, which is the wiki code where the oauth is happening.  If you're not doing wiki specific tasks, just point them to the meta url und use metawiki.
require_once( $path . 'config.php' );
//Set the path to the static location of the OAuth.php file.
require_once( 'OAuth.php' );