<?php

class translate {

    private $intuition;

    public function __construct() {
        $path = __DIR__ . '/i18n';

        if (!file_exists("$path/en.json")) {
            throw new arException("Language directory doesn't exist: $path");
        }

        $this->intuition = new Intuition( 'articlerequest' );
        $this->intuition->registerDomain( 'articlerequest', $path );
    }

    public function errorMessage($message) {
            throw new arException($message);
    }


    public function _r($key) {
        return $this->intuition->msg($key);
    }

    public function footer() {
        $line= $this->intuition->getFooterLine();
        $line = str_replace("int-promobox", "int-promobox pull-right", $line);
        return $line;
    }
}
