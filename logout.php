<?php
require("includes.php");

$oauth = new OAuth();

$oauth->logout();

header("LOCATION: index.php");
