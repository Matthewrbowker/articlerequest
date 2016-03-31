<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) {
  $lang = $_REQUEST['lang'];
} else {
  $lang = 'en';
}

try {
    $fi = new fileLoader();

    $k = new translate($lang, "result");

    $site = new site($k, "result");
}
catch(arException $ex) {
    $ex->renderHTML();
}

if (!empty($_SERVER['HTTP_REFERER']) && preg_match_all("/(http:\/\/|https:\/\/)(tools\.wmflabs\.org|localhost)\/(articlerequest.*)/i", $_SERVER["HTTP_REFERER"]) <= 0) {
    die();
}

if ($_REQUEST["email"] != "") {
  die();
}

$site -> gen_opening();

$pdo = new wpPDO($fi);
$pdo->store($_REQUEST['subject'], $_REQUEST['comment'], $_REQUEST['categorySelect'], $_REQUEST['username'], $_REQUEST['sourcesSelect']);

if ($pdo->success()) {
    $alertDiv = "success";
    $alertMessage = $k->_r("success");
    $url = $k->_r("return_url");
    $buttonMsg = $k->_r("done");
} else {
    $alertDiv = "danger";
    $alertMessage = $k->_r("failure");
    $url = "index.php";
    $buttonMsg = $k->_r("failure");
}

$request = [];

while ($element = current($_REQUEST)) {
    $request[key($_REQUEST)] = $element;
    next($_REQUEST);
}

$showMsg = $GLOBALS["role"] == "live" ? false : true;

$site->Assign("showMsg", $showMsg);
$site->Assign("devMsg", $k->_r("dev"));
$site->Assign("alertDiv", $alertDiv);
$site->Assign("alertMessage", $alertMessage);
$site->Assign("request", $request);
$site->Assign("success", $pdo->success());
$site->Assign("url", $url);
$site->Assign("buttonMsg", $buttonMsg);

$site->Display("result");

$site -> gen_closing();

