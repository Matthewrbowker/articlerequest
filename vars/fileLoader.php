<?php

class fileLoader {
    private $keys = [];
    public function __construct() {
        $files = ["../replica.my.cnf", "../database.my.cnf"];
        foreach($files as $file) {
            $this->keys = array_merge($this->keys,parse_ini_string(file_get_contents($file)));
        }
    }

    public function _r($key) {
        if (array_key_exists($key, $this->keys)) {return $this->keys[$key];}
        else return NULL   ;
    }
}