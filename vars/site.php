<?php

class site {
	private $page;
	private $k;

	public function __construct(translate $k = NULL, $page = "") {
		if ($k == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
	    $this->k = $k;
	    $this->page = $page;
	}
	
	public function gen_opening() {

    $nav = "";
	$navRight = "";

    if ($this->k->_r("article_on")) {
      if ($this->page == "") $nav .= "<li class=\"active\"><a href=\"index.php\">" . $this->k->_r("article") . "</a></li>";
      else $nav .= "<li><a href=\"index.php\">" . $this->k->_r("article") . "</a></li>";
    }

    if ($this->k->_r("redirect_on")) {
      if ($this->page == "redirect") $nav .= "<li class=\"active\"><a href=\"redirect.php\">" . $this->k->_r("redirect") . "</a></li>";
      else $nav .= "<li><a href=\"redirect.php\">" . $this->k->_r("redirect") . "</a></li>";
    }

    if ($this->k->_r("search_on")) {
      if ($this->page == "search") $nav .= "<li class=\"active\"><a href=\"search.php\">" . $this->k->_r("search") . "</a></li>";
      else $nav .= "<li><a href=\"search.php\">" . $this->k->_r("search") . "</a></li>";
    }

    if ($this->k->_r("about_on")) {
      if ($this->page == "about") $nav .= "<li class=\"active\"><a href=\"about.php\">" . $this->k->_r("about") . "</a></li>";
      else $nav .= "<li><a href=\"about.php\">" . $this->k->_r("about") . "</a></li>";
    }

    if ($this->k->_r("return_on")) {
      $navRight .= "<li><a href=\"" . $this->k->_r("return_url") . "\">" . $this->k->_r("return") . "</a></li>";
    }
print <<<ENDL
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
{$this->k->_r("title")}
</TITLE>
<meta charset="UTF-8">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      </style>
</HEAD>
<BODY>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand">{$this->k->_r("title")}</span>
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
<div class="container-fluid">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10">

      <!-- div class="page-header">
        <ul class="nav nav-pills pull-right">
		      {$nav}
        </ul>
		    <h1>{$this->k->_r("title")}</h1>
      </div -->

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
        <p style="text-align:right"><small>Article request tool version {$GLOBALS["version"]} (<a href="about.php">{$this->k->_r("about")}</a>)<br />
          Content pulled from the Wikipedia page "<a href="{$this->k -> _r("wp-url")}" target=_blank>{$this->k -> _r("wp-page")}</a>," and "<a href="{$this->k -> _r("wp-all-url")}" target=_blank>{$this->k -> _r("wp-all-page")}</a>"</small>
        </p>
      </div>
    </div>

    </div> <!-- /col-md-10 -->
    <div class="col-md-1">&nbsp;</div>

    </div> <!-- /container -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</BODY>
</HTML>
ENDL;
	}
}