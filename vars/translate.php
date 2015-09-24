<?php

class translate {

private $keys;

    public function __construct($lang = 'en', $page = "") {
        $urlArray = array();
        $wpPage = "User:Matthewrbot/Config/1/interface";

        if ($lang != 'en') $wpPage .= "/$lang";

        if ($GLOBALS["role"] == "staging") $wpPage .= "/dev";

        $allPage = $wpPage . "/all";

        if ($page != "") $wpPage .= "/" . $page;

        $urlArray["wp-page"] = $wpPage;
        $urlArray["wp-all-page"] = $allPage;

        $url = "{$GLOBALS['url']}/index.php?title=" . urlencode($wpPage);
        $allURL = "{$GLOBALS['url']}/index.php?title=" . urlencode($allPage);

        $urlArray["wp-url"] = $url;
        $urlArray["wp-all-url"] = $allURL;

        $url .= "&action=raw";
        $allURL .= "&action=raw";

        if ($GLOBALS["role"] == "autotest") {
            $url = explode("?", $url)[0];
            $allURL = explode("?", $allURL)[0];

        }

        @$wpKeys = parse_ini_string(file_get_contents($url)) or $this->errorMessage("Unable to get page config");

        @$allKeys = parse_ini_string(file_get_contents($allURL)) or $this->errorMessage("Unable to get general config");

        $this -> keys = array_merge($allKeys, $wpKeys);

        $this->keys = array_merge($this -> keys, $urlArray);

    }

    public function errorMessage($message) {
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
    For assistance on this error, please contact User:Matthewrbowker at his <a href="{$GLOBALS['url']}/User_talk:Matthewrbowker" target=_blank>talk page</a>.</center>
  </div>

    </div> <!-- /col-md-12 -->

    </div> <!-- /container -->
</BODY>
</HTML>
END;
exit(1);

    }


    public function _r($key) {
        if (isset($_GET["keys"]) && $_GET["keys"] == "1") {
            return "{{{$key}}}";
        }
        else if (array_key_exists($key, $this ->keys)) {
            $string = str_replace("{star}", "<i class=\"glyphicon glyphicon-star\"></i>", $this-> keys[$key]);
            if (array_key_exists("about", $this->keys)) {$string = str_replace("{a}", $this->keys["about"], $string);}
            else {$string = str_replace("{a}", "{{about}}", $string);}
            if (!defined($GLOBALS["version"])) { $string = str_replace("{v}", $GLOBALS["version"], $string); }
            return $string;
        }
        else {
            echo "<div class=\"alert alert-danger\">Key \"" . $key . "\" not found in the configuration file.  Please re-add it.</div>";
            return "{{" . $key . "}}";
        }
    }

    public function _e($key) {
        echo $this->_r($key);
    }
}
