<?php

// Set the UA string
ini_set('user_agent', "Article Request Tool - [[:w:en:User:Matthewrbowker]]");
define('USERAGENT', "Article Request Tool - [[:w:en:User:Matthewrbowker]]");


// Require all the files we need.
require('includes/config.php');

require('includes/translate.php');
require('includes/site.php');
require('includes/pdo.php');
require('includes/categories.php');
require('includes/sources.php');
require('includes/fileLoader.php');
require('includes/exception.php');

require('includes/oauth/loader.php');

if(file_exists('vendor/autoload.php')) {
    require_once('vendor/autoload.php');
}
else {
    die("<HTML><BODY>Required libraries not found, please run <kbd>composer install</kbd></BODY></HTML>");
}