<?php

class config {
    private $config;

    private function errorMessage($message) {
        throw new arException($message);
    }

    public function __construct() {
        $dir = __DIR__;
        $this->config = array();

        $userConfig = array();

        $baseConfig = parse_ini_string(file_get_contents("$dir/config.ini")) or $this->errorMessage("Unable to get base config");
        if (file_exists("$dir/config.inc.ini")) {
            $userConfig = parse_ini_string(file_get_contents("$dir/config.inc.ini")) or $this->errorMessage("Unable to get user config");
        }

        $this -> config = array_merge($this->config, $baseConfig);
        $this -> config = array_merge($this->config, $userConfig);
    }

    public function dumpConfig() {
        var_dump($this->config);
    }

    public function get($key) {
        $retVal = 0;
        if(key_exists($key, $this->config)) {
            $retVal = $this->config[$key];
        }
        return $retVal;
    }

    public function set($key, $value) {
        $this->config[$key] = $value;
    }
}