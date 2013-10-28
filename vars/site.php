<?php

class site {
	private $dev;
	private $page;
	
	function __construct($dev) {
		$this -> dev = $dev;
	}
	
	function gen_opening($keys = NULL, $page = "") {
		if ($keys == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");
		require('config.php');
		require('config.inc.php');
		
		$this -> page = $page;
		
		if ($page == "about") {
			$nav = "<li><a href=\"index.php\">" . $keys["home"] . "</a></li>
          <li class=\"active\"><a href=\"about.php\">" . $keys["about"] . "</a></li>
          <li><a href=\"//en.wikipedia.org/wiki/Main_Page\">" . $keys["return"] . "</a></li>";
		}
		else {  
			$nav = "<li class=\"active\"><a href=\"index.php\">" . $keys["home"] . "</a></li>
          <li><a href=\"about.php\">" . $keys["about"] . "</a></li>
          <li><a href=\"//en.wikipedia.org/wiki/Main_Page\">" . $keys["return"] . "</a></li>";
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

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
	  /* Custom hack for hiding stuff */ 
	  .hidden { display: none; }

	  .unhidden { display: inline; }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
</HEAD>
<BODY>
<div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
		<?php echo $nav ?>
        </ul>
		<h3 class="muted"><?php echo $keys["title"]; ?></h3>
      </div>

      <hr>

      <div class="row-fluid marketing">
	  <div class="span12">
	  
	 <?php 
	  
	if ($keys["message"] == "1") {
		echo "<div class=\"alert alert-warning\">" . $keys["message-text"] . "</div>";
	}
}

	
	function gen_closing() {
?>
        <br /><br /><small>Content pulled from the Wikipedia page "<a href="http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?>">User:Matthewrbot/Config/1/interface<?php if ($this ->dev) echo "/dev"; ?><?php if ($this -> page) echo "/" . $this -> page; ?></a>."</small>
        </div>
      </div>

      <hr>

      <div class="footer">
        <p style="text-align:center"><a href='http://validator.w3.org/check?uri=referer' target="_blank" ><img src='images/valid-html5.png' alt='Valid HTML 5' style="border:0;width:88px;height:31px"></a>
        <!-- a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="images/valid-css.gif" alt="Valid CSS!"></a -->
        <a href="http://www.anybrowser.org/campaign/" target="_blank"><img src="images/anybrowser.jpg" style="border:0;width:88px;height:31px" alt="Viewable With Any Browser"></a></p>
        <br />
        <br />
      </div>

    </div> <!-- /container -->
</BODY>
</HTML>
<?php
	}
}