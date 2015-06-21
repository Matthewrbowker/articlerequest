<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,"redirect");

$site = new site();

$site -> gen_opening($k, "redirect");

$db = new wpPDO();

?>

<script src="categories.php"></script>

<pre>
<?php $k -> _e("intro"); ?>

<?php $k -> _e("redirname"); ?>

<?php $k -> _e("targetname"); ?>

<?php $k -> _e("username"); ?>

<?php $k -> _e("reset"); ?>

<?php $k -> _e("submit"); ?>

</pre>

<?php $site -> gen_closing($k); ?>