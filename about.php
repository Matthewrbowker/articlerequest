<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,"about");

$site = new site();

$site -> gen_opening($k, "about");

$k -> _e("content");

$site -> gen_closing();

?>