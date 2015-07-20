<?php

class site {
	private $page;
	
	public function gen_opening(translate $k = NULL, $page = "") {
		if ($k == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
		
	$this -> page = $page;

    $nav = "";
	$navRight = "";

    if ($k->_r("article_on")) {
      if ($page == "") $nav .= "<li class=\"active\"><a href=\"index.php\">" . $k->_r("article") . "</a></li>";
      else $nav .= "<li><a href=\"index.php\">" . $k->_r("article") . "</a></li>";
    }

    if ($k->_r("redirect_on")) {
      if ($page == "redirect") $nav .= "<li class=\"active\"><a href=\"redirect.php\">" . $k->_r("redirect") . "</a></li>";
      else $nav .= "<li><a href=\"redirect.php\">" . $k->_r("redirect") . "</a></li>";
    }

    if ($k->_r("search_on")) {
      if ($page == "search") $nav .= "<li class=\"active\"><a href=\"search.php\">" . $k->_r("search") . "</a></li>";
      else $nav .= "<li><a href=\"search.php\">" . $k->_r("search") . "</a></li>";
    }

    if ($k->_r("about_on")) {
      if ($page == "about") $nav .= "<li class=\"active\"><a href=\"about.php\">" . $k->_r("about") . "</a></li>";
      else $nav .= "<li><a href=\"about.php\">" . $k->_r("about") . "</a></li>";
    }

    if ($k->_r("return_on")) {
      $navRight .= "<li><a href=\"" . $k->_r("return_url") . "\">" . $k->_r("return") . "</a></li>";
    }
	?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
<?php $k->_e("title"); ?>
</TITLE>
<meta charset="UTF-8">
<LINK REL="stylesheet" href="res/css/bootstrap.css" />
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
          <span class="navbar-brand"><?php $k->_e("title"); ?></span>
        </div>
        <div class="navbar=collapse navbar-right">
        	<ul class="nav navbar-nav">
      			<?php echo $navRight; ?>
            </ul>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php echo $nav; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container-fluid">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10">

      <!-- div class="page-header">
        <ul class="nav nav-pills pull-right">
		      <?php echo $nav ?>
        </ul>
		    <h1><?php $k->_e("title"); ?></h1>
      </div -->

      <div class="row marketing">
	  <div class="col-md-12">
    
    <?php
    if ($k->_r("message")) {
      echo "<div class=\"alert alert-warning\">" . $k->_r("message-text") . "</div>";
    }
    ?>
<noscript>
  <div class="alert alert-danger">
    <?php echo $k->_r("no-javascript"); ?>
  </div>
</noscript>
	  
	 <?php 
}

	
	public function gen_closing(translate $k = NULL) {
    if ($k == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
?>
        <hr>

      <div class="footer">
        <p style="text-align:right"><small>Article request tool version <?php echo $GLOBALS["version"] ?> (<a href="about.php"><?php $k->_e("about"); ?></a>)<br />
          Content pulled from the Wikipedia page "<a href="<?php $k -> _e("wp-url") ?>" target=_blank><?php $k -> _e("wp-page") ?></a>," and "<a href="<?php $k -> _e("wp-all-url") ?>" target=_blank><?php $k -> _e("wp-all-page") ?></a>"</small>
        </p>
      </div>
    </div>

    </div> <!-- /col-md-10 -->
    <div class="col-md-1">&nbsp;</div>

    </div> <!-- /container -->
</BODY>
</HTML>
<?php
	}
}