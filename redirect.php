<?php
require('includes.php');

try {
    $con = new config();

    $fi = new fileLoader($con);

    $k = new translate();

    $site = new site($con, $k, "redirect");

    $db = new wpPDO($fi);
}
catch(arException $ex) {
    $ex->renderHTML();
}

$site->gen_opening();
?>

<script src="categories.php"></script>

<pre>
<?php echo $k -> _r("redirect-intro"); ?>

<?php echo $k -> _r("redirname"); ?>

<?php echo $k -> _r("targetname"); ?>

<?php echo $k -> _r("username"); ?>

<?php echo $k -> _r("reset"); ?>

<?php echo $k -> _r("submit"); ?>

</pre>

<?php $site -> gen_closing(); ?>

