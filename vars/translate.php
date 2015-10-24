<?php

class translate {

private $keys;

    public function __construct($lang = 'en', $page = "") {
        $urlArray = array();
        $wpPage = "{$GLOBALS["basePage"]}/interface";

        if ($lang != 'en') {
          $wpPage .= "/$lang";
        }

        if ($GLOBALS["role"] == "staging") {
          $wpPage .= "/dev";
        }

        $allPage = $wpPage . "/all";

        if ($page != "") {
          $wpPage .= "/" . $page;
        }

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

        $this->keys = $urlArray;

        @$wpKeys = parse_ini_string(file_get_contents($url)) or $this->errorMessage("Unable to get page config");

        @$allKeys = parse_ini_string(file_get_contents($allURL)) or $this->errorMessage("Unable to get general config");

        $this -> keys = array_merge($this->keys, $wpKeys);
        $this -> keys = array_merge($this->keys, $allKeys);

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
<LINK REL="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
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
END;
        if ($GLOBALS["role"] == "test" || $GLOBALS["role"] == "staging") {
            print "<pre>";
            print <<< ENDL
            Main configuration page: {$this->keys["wp-page"]}
            Global configuration page: {$this->keys["wp-all-page"]}
            Main configuration URL: {$this->keys["wp-url"]}
            Global configuration URL: {$this->keys["wp-all-url"]}
ENDL;
            print "</pre>";
        }
    echo <<<END

    </div> <!-- /col-md-12 -->

    </div> <!-- /container -->
</BODY>
</HTML>
END;
        if ($GLOBALS["role"] != "autotest") exit(1);

    }


    public function _r($key) {
        if (isset($_GET["keys"]) && $_GET["keys"] == "1") {
            return "{{{$key}}}";
        }
        else if (array_key_exists($key, $this ->keys)) {
            $string = str_replace("{star}", "<i class=\"glyphicon glyphicon-star\"></i>", $this-> keys[$key]);
            if (array_key_exists("about", $this->keys)) {$string = str_replace("{a}", $this->keys["about"], $string); }
            else {$string = str_replace("{a}", "{{about}}", $string); }
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
