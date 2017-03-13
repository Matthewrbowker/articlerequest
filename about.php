<?php
require('includes.php');

$oauth = new OAuth();

if (!$oauth->isLoggedOn()) {
    header("Location: index.php");
    exit(0);
}

try {
    $con = new config();

    $k = new translate($con);

    $site = new site($con, $k, "about", $oauth);
}
catch (arException $ex) {
    $ex->renderHTML();
}

$site -> gen_opening();

$site->Assign("aboutContent", $k -> _r("about-content"));
$site->Assign("aboutBug", $k -> _r("about-bug"));
$site->Assign("aboutBootstrap", $k -> _r("about-bootstrap"));
$site->Assign("aboutGlyphicon", $k -> _r("about-glyphicon"));

$site->Display("about");

$site -> gen_closing();
