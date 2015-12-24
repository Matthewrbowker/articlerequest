<?php

class fileLoader {
    private $keys = [];
    public function __construct() {
        if ($GLOBALS["role"] == "autotest") { $files = ["tests/fileLoader.cnf"]; }
        else $files = ["../replica.my.cnf", "../database.my.cnf"];
        try {
            foreach ($files as $file) {
                if (!file_exists($file)) {
                    throw new arException("Unable to find \"$file\"");
                    continue;
                }
                $inistring = file_get_contents($file);
                $this->keys = array_merge($this->keys, parse_ini_string($inistring));
            }
        }
        catch (arException $ex) {
            $ex->renderHTML();
        }
    }

    public function _r($key) {
        if (array_key_exists($key, $this->keys)) {return $this->keys[$key]; }
        else return NULL;
    }
}