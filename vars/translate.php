<?php

class translate {

private $keys;

	function __construct($lang = 'en', $dev = false, $page = "") {
		$wpPage = "User:Matthewrbot/Config/1/interface";

		if ($lang != 'en') $wpPage .= "/$lang";

		if ($dev) $wpPage .= "/dev";
		
		$allPage = $wpPage . "/all"; // Gotta save this first so we don't confuse anything...
		
		if ($page != "") $wpPage .= "/" . $page;
		
		$url = "https://en.wikipedia.org/w/index.php?title=" . urlencode($wpPage) . "&action=raw";
		
		$allURL = "https://en.wikipedia.org/w/index.php?title=" . urlencode($allPage) . "&action=raw";
		
		@$wpKeys = parse_ini_string(file_get_contents($url)) or die("Error getting page config");
		
		@$allKeys = parse_ini_string(file_get_contents($allURL)) or die("Error getting all config");
		
		$this -> keys = array_merge($allKeys, $wpKeys);
		
	}
		
	
	function _e($key) {
		if (array_key_exists($key, $this ->keys)) {
			$string = str_replace("{star}", "<i class=\"glyphicon glyphicon-star\"></i>", $this-> keys[$key]);
			return $string;
		}
		else {
			echo "<div class=\"alert alert-danger\">Key \"" . $key . "\" not found in the configuration file.  Please re-add it.</div>";
			return "";
		}
	}
	
	function returnKeys() {
		return $this -> keys;
	}
}