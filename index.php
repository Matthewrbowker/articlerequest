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

    $c = new category($k);

    $s = new sources();

    $site->Assign("onload", "onload='formParse();'");

    $site->gen_opening();
}
catch (arException $ex) {
    $ex->renderHTML();
}

//Modals for the Category and sources

$site->Assign("modalClearInfo", $k->_r("clearInfo"));
$site->Assign("modalSaveInfo", $k->_r("modalSave"));

// Category

$site->Assign("categoryHeading", $k->_r("category-heading"));
$site->Assign("categoryCat", $k->_r("cat"));
$site->Assign("categorySubCat", $k->_r("subcat"));
$site->Assign("categorySubSubCat", $k->_r("subsubcat"));
$site->Assign("categoryCatBuffer", $c->getCat());
$site->Assign("categorySubCatBuffer", $c->getSubCat());
$site->Assign("categorySubSubCatBuffer", $c->getSubSubCat());

$site->Display("category");


// sources
$site->Assign("sourcesHeading", $k->_r("sources-heading"));
$site->Assign("sourcesButtonBuffer", $s->getButtonBuffer());
$site->Assign("sourcesDivBuffer", $s->getDivBuffer());

$site->Display("sources");

// Main content
$site->Assign("select", $k->_r("select"));
$site->Assign("editInfo", $k->_r("editInfo"));
$site->Assign("error", $k->_r("error"));
$site->Assign("intro", $k->_r("intro"));
$site->Assign("subject", $k->_r("subject"));
$site->Assign("description", $k->_r("description"));
$site->Assign("username", $k->_r("username"));
$site->Assign("category", $k->_r("category"));
$site->Assign("sources", $k->_r("sources"));
$site->Assign("check1", $k->_r("check_1"));
$site->Assign("check2", $k->_r("check_2"));
$site->Assign("submit", $k->_r("submit"));
$site->Assign("reset", $k->_r("reset"));

$site->Display("index");

$site -> gen_closing();

