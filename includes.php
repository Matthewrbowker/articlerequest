<?php

// Require all the files we need.
require('vars/config.php');
require('vars/config.inc.php');
//require('vars/functions.php');
//require('vars/categories.php');

require('vars/translate.php');
require('vars/site.php');
require('vars/pdo.php');

// Set the UA string
ini_set('user_agent', 
  "Article_Request_Tool - Matthewrbowker - {$version}");
?>