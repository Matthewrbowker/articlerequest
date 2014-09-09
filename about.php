<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,true,"about");

$site = new site($dev);

$site -> gen_opening($k -> returnKeys(), "about");

$k -> _e("content");

$site -> gen_closing();

?>