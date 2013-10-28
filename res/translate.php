<?php

class translate {

private $wikicode;
private $page;
private $keys;
private $json;
private $pageID;

	function __construct($lang = 'en', $dev = false, $page = "") {
		$this -> page = "User:Matthewrbot/Config/1/interface";
		if ($dev) $this -> page .= "/dev";
		if ($page != "") $this -> page .= "/" . $page;
		
		$url = "https://en.wikipedia.org//w/api.php?action=query&prop=revisions&format=json&rvprop=content&rvlimit=1&rvcontentformat=text%2Fx-wiki&titles=" . urlencode($this -> page);
		
		//$this -> json = file_get_contents("https://en.wikipedia.org//w/api.php?action=query&prop=revisions&format=json&rvprop=content&rvlimit=1&rvcontentformat=text%2Fx-wiki&titles=User%3AMatthewrbot%2FConfig%2F1%2Finterface");
		$this -> json = file_get_contents($url);
		
		$this -> wikicode = json_decode($this -> json, true);
		
		$flattened = $this -> flatten($this -> wikicode);
		
		$this -> keys = parse_ini_string($flattened[count($flattened) - 1]) or die("Error parsing strings");
		
	}
	
	function flatten($array) {
		
		$result = array();
		
    	if (!is_array($array)) {
        	// nothing to do if it's not an array
        	return array($array);
    	}
		
    	foreach ($array as $value) {
        	// explode the sub-array, and add the parts
        	$result = array_merge($result, $this -> flatten($value));
   		}
		
		return $result;
	}
		
	
	function _e($key) {
		if (array_key_exists($key, $this ->keys)) {
			return $this -> keys[$key];
		}
		else {
			echo "<div class=\"alert alert-error\">Key \"" . $key . "\" not found in the configuration file.  Please re-add it.</div>";
			return "";
		}
	}
	
	function page() {
		echo $page;
	}
	
	function json() {
		echo $this -> json;
	}
	
	function code() {
		echo "<pre>";
		var_dump($this -> wikicode);
		echo "</pre>";
	}
	
	function returnKeys() {
		return $this -> keys;
	}
}