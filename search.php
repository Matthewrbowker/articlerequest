<?php
require('includes.php');

$k = new translate("en",$dev,"search");

$site = new site($dev);

$site -> gen_opening($k -> returnKeys(), "search");

?>

<?php echo $k -> _e("info"); ?>

<form action="search_results.php" method="GET">
	<div class="text-center">	
	<label for="q"><?php echo $k -> _e("label") ?></label> <input type="text" name="q" id="q"<?php if (ISSET($_GET["q"])) echo " value=\"" . $_GET["q"] . "\"" ?> class="input-xxlarge" />
	<?php if (!ISSET($_GET["adv"]) || !$_GET["adv"]): ?>
	<?php endif; ?>

	<?php if(ISSET($_GET["adv"]) && $_GET["adv"]):?>
		<?php echo $k -> _e("category") ?> <?php $site -> categoryForm(); ?>

	<?php endif; ?>

	<table style="width:100%;">
		<tr>
			<td>
		<input type="reset" value="<?php echo $k -> _e("resetBtn"); ?>" class="btn btn-danger" />
			</td>
			<td>
		<input type="submit" id="submit" value="<?php echo $k -> _e("searchBtn"); ?>" class="btn btn-success" />
			</td>
		</tr>
	</table>

</div>

	</form>

<?php $site -> gen_closing(); ?>