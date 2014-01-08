<?php
require("includes.php");

$s = new site($dev);

$s -> gen_opening(
	array(
		"page" => "Category test",
		"title" => "Category test",
		"message" => false,
		"home" => "Home",
		"search" => "Search",
		"about" => "About",
		"return" => "Return to the English Wikipedia"
		),
	"Category test"
	);

$values = parse_ini_string(file_get_contents("https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category/dev?action=raw"), TRUE);

echo "<pre>";

var_dump($values);

$count1 = 1; //Because box 0 is blank

foreach(array_keys($values) as $key1) {
	$key1 = trim($key1);
	echo "$count1: $key1\r";
	$count2 = 1;
	foreach(array_keys($values[$key1]) as $key2) {
		$key2 = trim($key2);
		echo "\t$count2: $key2\r";
		$count3 = 1;
		foreach(explode(";", $values[$key1][$key2]) as $key3) {
			$key3 = trim($key3);
			if ($key3 == "") {$key3 = "other"; }
			echo "\t\t$count3: $key3\r";
			$count3++;
		}	
		$count2++;
	}
	$count1++;
}

echo "</pre>";


$s -> gen_closing();

?>