<?php

// Require all the files we need.
require('vars/config.php');
require('vars/config.inc.php');

require('vars/translate.php');
require('vars/site.php');
require('vars/pdo.php');
require('vars/categories.php');

// Set the UA string
ini_set('user_agent', 
  "Article Request Tool - [[:w:en:User:Matthewrbowker]] - {$GLOBALS['version']}");
?>