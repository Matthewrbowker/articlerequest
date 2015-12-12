<?php

// Require all the files we need.
require('includes/config.php');
@include('includes/config.inc.php');

require('includes/translate.php');
require('includes/site.php');
require('includes/pdo.php');
require('includes/categories.php');
require('includes/sources.php');
require('includes/fileLoader.php');

// Set the UA string
ini_set('user_agent', "Article Request Tool - [[:w:en:User:Matthewrbowker]] - {$GLOBALS['version']}");
