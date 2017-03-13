<?php
require('includes.php');
$oauth = new OAuth();

if ($oauth->isLoggedOn()) {
	header("LOCATION: request.php");
	exit(0);
}

try {
    $con = new config();

    $fi = new fileLoader($con);

    $k = new translate();

    $site = new site($con, $k, "", $oauth);

    $db = new wpPDO($fi);

    $site->gen_opening($oauth->getUsername());
}
catch (arException $ex) {
    $ex->renderHTML();
}

$site->assign("challengeMessage", $k->_r("challengeMessage"));
$site->assign("loginMsg", $k->_r("loginMsg"));

$site->Display("index");

/*
print "<pre>";
var_dump(get_declared_classes());
print "</pre>";
*/
$site->gen_closing();
