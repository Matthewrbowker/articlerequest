<?php
require('includes.php');
session_start();

if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
	header("LOCATION: request.php");
	exit(0);
}

try {
    $con = new config();

    $fi = new fileLoader($con);

    $k = new translate();

    $site = new site($con, $k, "");

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
