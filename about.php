<?php
require('includes.php');

$k = new translate("en",true,"about");

$site = new site($dev);

if (ISSET($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

$site -> gen_opening($k -> returnKeys(), "about");

?>
<!-- 
Wikipedia article request tool written by <a href="http://en.wikipedia.org/wiki/User:Matthewrbowker" target=_blank>Matthew Bowker</a> and hosted on the Wikimedia Labs cluster.  The source code for this tool can be found <a href="http://github.com/Matthewrbowker/articlerequest" target=_blank>on GitHub</a>.
<br><br>
<a href="http://getbootstrap.com/2.3.2/" target=_blank>Twitter Bootstrap</a> licenced under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target=_blank>Apache Licence 2.0</a>.  
<br><br>
<a href="http://glyphicons.com/" target=_blank>Glyphicons Free</a> licenced under <a href="http://creativecommons.org/licenses/by/3.0/" target=_blank>CC-BY-SA</a>. -->

<?php echo $k -> _e("content"); ?>
<? $site -> gen_closing(); ?>