<?php

class site {
    private $page;
    private $k;

    private function gen_header_link($page) {
        $retVal = "<li";
        if ($this->page == $page) {
            $retVal .= " class='active'";
        }
        $retVal .= "><a href=\"$page.php\">" . $this->k->_r($page) . "</a></li>";

        return $retVal;
    }

    private function gen_navbar() {
        $nav = "";
        $navRight = "";
        $retVal = "";

        if ($this->k->_r("redirect_on")) {
            $nav .= $this->gen_header_link("redirect");
        }

        if ($this->k->_r("search_on")) {
            $nav .= $this->gen_header_link("search");
        }

        if ($this->k->_r("about_on")) {
            $nav .= $this->gen_header_link("about");
        }

        if ($this->k->_r("return_on")) {
            $navRight .= "<li><a href=\"" . $this->k->_r("return_url") . "\">" . $this->k->_r("return") . "</a></li>";
        }

        $retVal .= <<<ENDL
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> {$this->k->_r("title")}</a>
        </div>
        <div class="navbar=collapse navbar-right">
            <ul class="nav navbar-nav">
                  {$navRight}
            </ul>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            {$nav}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
ENDL;

        return $retVal;

    }

    public function __construct(translate $k = NULL, $page = "") {
        if ($k == NULL) {
            throw new arException("Key file broken");
        }
        $this->k = $k;
        $this->page = $page;
    }
    public function gen_opening() {
    $onload = "";


        if ($this->page == "") {$onload = " onload='formParse()'"; }
echo <<<ENDL
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
{$this->k->_r("title")}
</TITLE>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      </style>
</HEAD>
<BODY$onload>
ENDL;
echo $this->gen_navbar();
echo <<<ENDL
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row marketing">
      <div class="col-md-12">
ENDL;

    if ($this->k->_r("message")) {
      echo "<div class=\"alert alert-warning\">" . $this->k->_r("message-text") . "</div>";
    }
print <<< ENDL
<noscript>
  <div class="alert alert-danger">
    {$this->k->_r("no-javascript")}
  </div>
</noscript>
ENDL;
}


    public function gen_closing() {
print <<< ENDL
        <hr>
      <div class="footer">
        <p style="text-align:right"><small>{$this->k->_r("footer")} &middot; Version {$GLOBALS['version']}<br />
          <a href="{$this->k -> _r("wp-url")}" target=_blank>{$this->k -> _r("edit")}</a> &middot; <a href="{$this->k -> _r("wp-all-url")}" target=_blank>{$this->k -> _r("edit-all")}</a> &middot; <a href="about.php"\>{$this->k -> _r("about")}</a> </small>
        </p>
      </div>
    </div>

    </div> <!-- /col-md-10 -->

    </div>

    </div> <!-- /container -->
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</BODY>
</HTML>
ENDL;
    }
}
