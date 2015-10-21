<?php

class fileLoader {
    private $keys = [];
    public function __construct() {
        if ($GLOBALS["role"] == "autotest") { $files = ["tests/fileLoader.cnf"]; }
        else $files = ["../replica.my.cnf", "../database.my.cnf"];
        foreach ($files as $file) {
            $inistring = @file_get_contents($file) or die("UNABLE TO LOAD: $file");
            $this->keys = array_merge($this->keys, parse_ini_string($inistring));
        }
    }

    public function _r($key) {
        if (array_key_exists($key, $this->keys)) {return $this->keys[$key]; }
        else return NULL;
    }
}