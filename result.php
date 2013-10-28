<?php
require('includes.php');

$site = new site();

$site -> gen_opening();

echo "<pre>";

var_dump($_GET);

echo "</pre>";

$site -> gen_closing();
?>