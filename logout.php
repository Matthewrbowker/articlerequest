<?php
require("includes.php");
session_start();

$_SESSION["is_logged_in"] = false;
$_SESSION["username"] = NULL;

session_unset();

header("LOCATION: index.php");
