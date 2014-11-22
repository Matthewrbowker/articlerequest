<?php
require("includes.php");

$s = new site($dev);

$s -> gen_opening(
	array(
		"page" => "Category test",
		"title" => "Category test",
		"message" => false,
		"home" => "Home",
		"redirect" => "Request Redirect",
		"search" => "Search",
		"about" => "About",
		"return" => "Return to the English Wikipedia"
		),
	"Category test"
	);

$cat = new Category(false);

?>

<select name="category">
<? $cat -> echoCat(); ?>
</select>

<?

$s -> gen_closing();

?>