<?php

class site {
	private $dev;
	private $page;
  private $version;
  private $about;
	
	function __construct($dev) {
		$this -> dev = $dev;
	}
	
	function gen_opening($keys = NULL, $page = "") {
		if ($keys == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
		require('config.php');
		require('config.inc.php');

    $this -> version = $version;
		
		$this -> page = $page;

    $this -> about = $keys["about"];

    $nav = "";

    if ($keys["article_on"]) {
      if ($page == "") $nav .= "<li class=\"active\"><a href=\"index.php\">" . $keys["article"] . "</a></li>";
      else $nav .= "<li><a href=\"index.php\">" . $keys["article"] . "</a></li>";
    }

    if ($keys["about_on"]) {
      if ($page == "about") $nav .= "<li class=\"active\"><a href=\"about.php\">" . $keys["about"] . "</a></li>";
      else $nav .= "<li><a href=\"about.php\">" . $keys["about"] . "</a></li>";
    }

    if ($keys["redirect_on"]) {
      if ($page == "redirect") $nav .= "<li class=\"active\"><a href=\"redirect.php\">" . $keys["redirect"] . "</a></li>";
      else $nav .= "<li><a href=\"redirect.php\">" . $keys["redirect"] . "</a></li>";
    }

    if ($keys["search_on"]) {
      if ($page == "search") $nav .= "<li class=\"active\"><a href=\"search.php\">" . $keys["search"] . "</a></li>";
      else $nav .= "<li><a href=\"search.php\">" . $keys["search"] . "</a></li>";
    }

    if ($keys["return_on"]) {
      $nav .= "<li><a href=\"" . $keys["return_url"] . "\">" . $keys["return"] . "</a></li>";
    }
	?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
<?php echo $keys["title"]; ?>
</TITLE>
<meta charset="UTF-8">
<LINK REL="stylesheet" href="res/css/bootstrap.css" />
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

    </style>
</HEAD>
<BODY>
<div class="container">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10">

      <div class="page-header">
        <ul class="nav nav-pills pull-right">
		      <?php echo $nav ?>
        </ul>
		    <h1><?php echo $keys["title"]; ?></h1>
      </div>

      <div class="row marketing">
	  <div class="col-md-12">
    
    <?php
    if ($keys["message"]) {
      echo "<div class=\"alert alert-warning\">" . $keys["message-text"] . "</div>";
    }
    ?>
<noscript>
  <div class="alert alert-danger">
    <?php echo $keys["no-javascript"]; ?>
  </div>
</noscript>
	  
	 <?php 
}

function gen_opening_min($keys = NULL, $page = "") {
    if ($keys == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
    require('config.php');
    require('config.inc.php');

    $this -> version = $version;
    
    $this -> page = $page;

    $this -> about = $keys["about"];
    ?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>
<?php echo $keys["title"]; ?>
</TITLE>
<meta charset="UTF-8">
<script src="vars/validate.js" type="text/javascript"></script>
<LINK REL="stylesheet" href="res/css/bootstrap.css" />
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }
    </style>
</HEAD>
<BODY>
<div class="container">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10">

      <div class="page-header">
       <h3><?php echo $keys["page_title"]; ?></h3>
      </div>

      <div class="row marketing">
    <div class="col-md-12">
    
<noscript>
  <div class="alert alert-danger">
    <?php echo $keys["no-javascript"]; ?>
  </div>
</noscript>
    
   <?php 
}

	
	function gen_closing() {
?>
        <hr>

      <div class="footer">
        <p style="text-align:right"><small>Article request tool version <?php echo $this ->version ?> (<a href="about.php"><?php echo $this->about; ?></a>)<br />
          Content pulled from the Wikipedia page "<a href="http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?>" target=_blank>User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?></a>," and "<a href="http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?>/all" target=_blank>User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?>/all</a>"</small>
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

  
  function gen_closing_min() {
?>
        <hr>

      <div class="footer">
        <p style="text-align:right"><small>Article request tool version <?php echo $this ->version ?><br />
          Content pulled from the Wikipedia page "<a href="http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?>" target=_blank>User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?></a>"</small>
        </p>
        <br />
        <!--p style="text-align:center"><a href='http://validator.w3.org/check?uri=referer' target="_blank" ><img src='images/valid-html5.png' alt='Valid HTML 5' style="border:0;width:88px;height:31px"></a>
        <!- - a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="images/valid-css.gif" alt="Valid CSS!"></a ->
        <a href="http://www.anybrowser.org/campaign/" target="_blank"><img src="images/anybrowser.jpg" style="border:0;width:88px;height:31px" alt="Viewable With Any Browser"></a></p>
        <br / -->
      </div>
        </div>

    </div> <!-- /col-md-10 -->
    <div class="col-md-1">&nbsp;</div>

    </div> <!-- /container -->
</BODY>
</HTML>
<?php
  }

  function categoryForm() {
    echo "Category form to go here";
  }
}