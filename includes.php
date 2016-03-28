<?php

// Require all the files we need.
require('includes/config.php');
if (file_exists('includes/config.inc.php')) { require('includes/config.inc.php'); }

require('includes/translate.php');
require('includes/site.php');
require('includes/pdo.php');
require('includes/categories.php');
require('includes/sources.php');
require('includes/fileLoader.php');
require('includes/exception.php');

if(file_exists('vendor/smarty/smarty/libs/Smarty.class.php')) {
    require_once('vendor/smarty/smarty/libs/Smarty.class.php');
}
else {
    die("<HTML><BODY>Smarty not found, please run <kbd>composer install</kbd></BODY></HTML>");
}

// Set the UA string
ini_set('user_agent', "Article Request Tool - [[:w:en:User:Matthewrbowker]] - {$GLOBALS['version']}");
