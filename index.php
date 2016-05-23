<?php
require('includes.php');

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

$site->gen_closing();
