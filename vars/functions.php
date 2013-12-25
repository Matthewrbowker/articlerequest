<?php

function load_ini($lang = "en") { // LANGUAGE VARIABLE FOR FUTURE USE
	$wikicode = json_decode(file_get_contents("https://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&titles=User:Matthewrbot/Config/1/interface&format=json"), true) or die("<HTML><BODY><div class=\"alert alert-error\">Error retrieving text from Wikipedia!</div></body></html>");
	$interface = parse_ini_string($wikicode["query"]["pages"]["40838996"]["revisions"][0]["*"]);
	return $interface;
}