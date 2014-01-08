<?php
require('includes.php');

$site = new site($dev);

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"result");

$pdo = new wpPDO();

$site -> gen_opening($k->returnKeys(), "result");

@$pdo -> store($_REQUEST['subject'], $_REQUEST['comment'], $_REQUEST['category'], $_REQUEST['subcat'], $_REQUEST['subsubcat'], $_REQUEST['username'], $_REQUEST['sources']);

if ($pdo->success()) {
	echo "<div class=\"alert alert-success\">";
	echo $k->_e("success");
	echo "</div>";
}
else {
	echo "<div class=\"alert alert-danger\">";
	echo $k->_e("failure");
	echo "</div>";
}

if ($dev) :
?>
<hr />
<?php echo $k->_e("dev"); ?>
<pre>
	<ul>
	<?php
		while($element = current($_REQUEST)) {
    		echo "<li>" . key($_REQUEST) . " = {$element}</li>";
    		next($_REQUEST);
		}
	?>
</pre>

<?
endif;

if ($pdo->success()) {
	echo "<form action=\"http://en.wikipedia.org\"><input type=\"submit\" class=\"btn btn-success\" value=\"{$k->_e("done")}\" /></form>";

}
else {
	echo "<form action=\"index.php\">";

	while($element = current($_REQUEST)) {
    	echo "<input type=\"hidden\" name=\"" . key($_REQUEST) . "\" value=\"{$element}\" />";
    	next($_REQUEST);
	}

	echo "<input type=\"submit\" class=\"btn btn-danger\" value=\"{$k->_e("go_back")}\" /></form>";
}

$site -> gen_closing();
?>