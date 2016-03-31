<?php

class site {
    private $page;
    private $k;
    private $smarty;

    private function gen_navbar() {
        $navs = [];
        $navsRight = [];

        if ($this->k->_r("redirect_on")) {
            array_push($navs, ["redirect.php", $this->k->_r("redirect")]);
        }

        if ($this->k->_r("search_on")) {
            array_push($navs, ["search.php", $this->k->_r("search")]);
        }

        if ($this->k->_r("about_on")) {
            array_push($navs, ["about.php", $this->k->_r("about")]);
        }

        if ($this->k->_r("return_on")) {
            array_push($navsRight, [$this->k->_r("return_url"), $this->k->_r("return")]);
        }

        $this->Assign("navs", $navs);
        $this->Assign("navsRight", $navsRight);

    }

    public function __construct(translate $k = NULL, $page = "") {
        if ($k == NULL) {
            throw new arException("Key file broken");
        }
        $this->k = $k;
        $this->page = $page;
        $this->smarty = new Smarty();

        // Setting up default variables
        // Heading
        $this->Assign("page", $page);
        $this->Assign("title", $this->k->_r("title"));
        $this->Assign("message", $this->k->_r("message"));
        $this->Assign("messagetext", $this->k->_r("message-text"));
        $this->Assign("nojavascript", $this->k->_r("no-javascript"));

        // Footer
        $this->assign("footer", $this->k->_r("footer"));
        $this->assign("version", $GLOBALS["version"]);
        $this->assign("wpurl", $this->k->_r("wp-url"));
        $this->assign("edit", $this->k->_r("edit"));
        $this->assign("wpallurl", $this->k->_r("wp-all-url"));
        $this->assign("editall", $this->k->_r("edit-all"));
        $this->assign("about", $this->k->_r("about"));

        $this->gen_navbar();

    }

    public function gen_opening() {
        $this->Display("heading");

    }

    public function gen_closing() {
        $this->Display("footer");
    }

    public function Display($pageName = "index") {
        try {
            $this->smarty->Display("$pageName.tpl");
        }
        catch (smartyException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function Assign($variable, $text) {
        $this->smarty->assign($variable, $text);
    }
}
