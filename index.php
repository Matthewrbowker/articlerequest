<?php
require('includes.php');
session_start();

if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
	header("LOCATION: request.php");
	exit(0);
}

if (ISSET($_REQUEST['lang'])) {
  $lang = $_REQUEST['lang'];
} else {
  $lang = 'en';
}

try {
    $fi = new fileLoader();

    $k = new translate($lang, "index");

    $site = new site($k, "");

    $db = new wpPDO($fi);

    $site->gen_opening();
}
catch (arException $ex) {
    $ex->renderHTML();
}

$site->assign("challengeMessage", $k->_r("challengeMessage"));
$site->assign("loginMsg", $k->_r("loginMsg"));

$site->Display("index");

print "<pre>";
var_dump(get_declared_classes());
print "</pre>";

$site->gen_closing();
