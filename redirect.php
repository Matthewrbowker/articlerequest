<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"redirect");

$site = new site($dev);

$site -> gen_opening($k -> returnKeys(), "redirect");

$db = new wpPDO();

?>

<script src="categories.php"></script>

<?php echo $k -> _e("intro"); ?>


<?php echo $k -> _e("redirname"); ?>

<?php echo $k -> _e("targetname"); ?>

<?php echo $k -> _e("username"); ?>

<?php echo $k -> _e("reset"); ?>

<?php echo $k -> _e("submit"); ?>

<?php $site -> gen_closing(); ?>