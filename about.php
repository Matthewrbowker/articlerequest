<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) {
    $lang = $_REQUEST['lang'];
} else {
    $lang = 'en';
}
try {
    $k = new translate($lang, "about");

    $site = new site($k, "about");
}
catch (arException $ex) {
    $ex->renderHTML();
}

$site -> gen_opening();

$k -> _e("content");

$site -> gen_closing();
