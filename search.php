<?php
require('includes.php');

try {

    $k = new translate("en", "search");

    $site = new site($k, "search");

}
catch (arException $ex) {
    $ex->renderHTML();
}

$site -> gen_opening();

?>

<?php $k -> _e("info"); ?>

<form action="search.php" method="GET">
    <div class="text-center">
    <label for="q"><?php $k -> _e("label") ?></label> <input type="text" name="q" id="q"<?php if (ISSET($_GET["q"])) {
  echo " value=\"" . $_GET["q"] . "\"" ?> class="input-xxlarge" />
    <?php if (!ISSET($_GET["adv"]) || !$_GET["adv"]): ?>
    <?php endif;
}
?>

    <?php if (ISSET($_GET["adv"]) && $_GET["adv"]):?>
        <?php $k -> _e("category") ?>

    <?php endif; ?>

    <table style="width:100%;">
        <tr>
            <td>
        <input type="reset" value="<?php $k -> _e("resetBtn"); ?>" class="btn btn-danger" />
            </td>
            <td>
        <input type="submit" id="submit" value="<?php $k -> _e("searchBtn"); ?>" class="btn btn-success" />
            </td>
        </tr>
    </table>
    
    <?php
    if (isset($_GET["q"])) {
        echo "Results for {$_GET['q']} here";
    }
    ?>

</div>

    </form>

<?php $site -> gen_closing(); ?>

