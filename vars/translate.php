<?php

class translate {

private $keys;

	function __construct($lang = 'en', $dev = false, $page = "") {
		$wpPage = "User:Matthewrbot/Config/1/interface";

		//$wpPage = "Article request/config";

		if ($lang != 'en') $wpPage .= "/$lang";

		if ($dev) $wpPage .= "/dev";
		
		$allPage = $wpPage . "/all"; // Gotta save this first so we don't confuse anything...
		
		if ($page != "") $wpPage .= "/" . $page;
		
		$url = "https://en.wikipedia.org/w/index.php?title=" . urlencode($wpPage) . "&action=raw";
		
		$allURL = "https://en.wikipedia.org/w/index.php?title=" . urlencode($allPage) . "&action=raw";

		//$url = "http://localhost/~wiki/index.php?title=" . urlencode($wpPage) . "&action=raw";

		//$allURL = "http://localhost/~wiki/index.php?title=" . urlencode($allPage) . "&action=raw";
		
		@$wpKeys = parse_ini_string(file_get_contents($url)) or $this->errorMessage("Unable to get page config");
		
		@$allKeys = parse_ini_string(file_get_contents($allURL)) or $this->errorMessage("Unable to get general config");
		
		$this -> keys = array_merge($allKeys, $wpKeys);
		
	}

	function errorMessage($message) {
		echo <<<END
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
$message
</TITLE>
<meta charset="UTF-8">
<LINK REL="stylesheet" href="res/css/bootstrap.css" />
<style type="text/css">
body {
padding-top: 20px;
padding-bottom: 40px;
}
</style>
</HEAD>
<BODY>
<div class="container">

	  <div class="col-md-12">
    
  <div class="alert alert-danger">
    <center>Error: $message
    <br />
    <br />
    For assistance on this error, please contact User:Matthewrbowker at his <a href="http://en.wikipedia.org/wiki/User_talk:Matthewrbowker" target=_blank>talk page</a>.</center>
  </div>

    </div> <!-- /col-md-12 -->

    </div> <!-- /container -->
</BODY>
</HTML>
END;
die();
	  
	}
		
	
	function _r($key) {
		if (array_key_exists($key, $this ->keys)) {
			$string = str_replace("{star}", "<i class=\"glyphicon glyphicon-star\"></i>", $this-> keys[$key]);
			return $string;
		}
		else {
			echo "<div class=\"alert alert-danger\">Key \"" . $key . "\" not found in the configuration file.  Please re-add it.</div>";
			return "";
		}
	}

	function _e($key) {
		echo $this->_r($key);
		return "<div class='alert alert-danger'>You're using echo with _e.  _e automatically echos, please fix this.</div>";
	}
	
	function returnKeys() {
		return $this -> keys;
	}
}