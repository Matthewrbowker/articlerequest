<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,"result");

$site = new site($k, "result");

if (!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "http://tools.wmflabs.org/articlerequest/index.php"){die();}

$site -> gen_opening();

$pdo = new wpPDO();
$pdo->store($_REQUEST['subject'], $_REQUEST['comment'], $_REQUEST['categorySelect'], $_REQUEST['username'], $_REQUEST['sourcesSelect']);

if ($pdo->success()) {
    echo "<div class=\"alert alert-success\">";
    $k->_e("success");
    echo "</div>";
}
else {
    echo "<div class=\"alert alert-danger\">";
    $k->_e("failure");
    echo "</div>";
}

    print $_SERVER["HTTP_REFERER"];

if ($GLOBALS["role"] == "test" || $GLOBALS["role"] == "staging") :
?>
<hr />
<?php $k->_e("dev"); ?>
<pre>
    <ul>
    <?php
        while($element = current($_REQUEST)) {
            echo "<li>" . key($_REQUEST) . " = {$element}</li>";
            next($_REQUEST);
        }
    ?>
</pre>

<?php
endif;

if ($pdo->success()) {
    echo "<form action=\"{$GLOBALS['url']}\"><input type=\"submit\" class=\"btn btn-success\" value=\"{$k->_r("done")}\" /></form>";

}
else {
    echo "<form action=\"index.php\">";

    while($element = current($_REQUEST)) {
        echo "<input type=\"hidden\" name=\"" . key($_REQUEST) . "\" value=\"{$element}\" />";
        next($_REQUEST);
    }

    echo "<input type=\"submit\" class=\"btn btn-danger\" value=\"{$k->_r("go_back")}\" /></form>";
}

$site -> gen_closing();
?>

