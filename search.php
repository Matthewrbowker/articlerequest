<?php
require('includes.php');

try {
    $con = new config();

    $k = new translate();

    $site = new site($con, $k, "search");

}
catch (arException $ex) {
    $ex->renderHTML();
}

$site -> gen_opening();

if (isset($_GET["q"])) {
    $q = $_GET["q"];
}
else {
    $q = "";
}

if (isset($_GET["adv"])) {
    $adv = $_GET["adv"];
}
else {
    $adv = false;
}

$site->Assign("q", $q);
$site->Assign("adv", $adv);
$site->Assign("info", $k->_r("search-intro"));
$site->Assign("label", $k->_r("search-label"));
$site->Assign("category", $k->_r("category"));
$site->Assign("resetBtn", $k->_r("reset"));
$site->Assign("searchBtn", $k->_r("button-search"));

$site->Display("search");

$site -> gen_closing();
