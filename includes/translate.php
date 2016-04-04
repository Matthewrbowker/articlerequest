<?php

class translate {

private $keys;

    public function __construct($lang = 'en', $page = "index") {
        $this->keys = array();
        $path = "includes/translate";

        $path .= "/$lang";

        $wpPage = "$path/$page.xml";
        $wpAllPage = "$path/all.xml";

        $wpKeys = parse_ini_string(file_get_contents($wpPage)) or $this->errorMessage("Unable to get page config");

        $allKeys = parse_ini_string(file_get_contents($wpAllPage)) or $this->errorMessage("Unable to get general config");

        $this -> keys = array_merge($this->keys, $wpKeys);
        $this -> keys = array_merge($this->keys, $allKeys);
    }

    public function errorMessage($message) {
            throw new arException($message);
    }


    public function _r($key) {
        if (isset($_GET["keys"]) && $_GET["keys"] == "1") {
            return "{{{$key}}}";
        }
        else if (array_key_exists($key, $this ->keys)) {
            $string = str_replace("{star}", "<i class=\"glyphicon glyphicon-star\"></i>", $this-> keys[$key]);
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
