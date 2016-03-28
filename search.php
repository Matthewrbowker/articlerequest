<?php
require('includes.php');

try {

    $k = new translate("en", "search");

    $site = new site($k, "search");

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
$site->Assign("info", $k->_r("info"));
$site->Assign("label", $k->_r("label"));
$site->Assign("category", $k->_r("category"));
$site->Assign("resetBtn", $k->_r("resetBtn"));
$site->Assign("searchBtn", $k->_r("searchBtn"));

$site->Display("search");

$site -> gen_closing();
