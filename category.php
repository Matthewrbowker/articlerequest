<?php

require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"category");

$site = new site($dev);

$site -> gen_opening_min($k -> returnKeys(), "category");

//Testing
$dev = false;

if ($dev) $url="https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category/dev?action=raw";
else $url = "https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category?action=raw";

// TEMPORARY CHANGE - MOVE CONFIG LOCALLY
$url = "http://localhost/~wiki/index.php?title=Article_request/category&action=raw";

$values = parse_ini_string(file_get_contents($url), TRUE);

?>

<script type="text/javascript">
function sendValue(cat, scat, sscat) {
    window.opener.updateCategory(cat, scat, sscat);
    window.close();
}

function submitValue() {
	var category = document.getElementById("category").value;
	var subcategory = document.getElementById("subcategory").value;
	var subsubcategory = document.getElementById("subsubcategory").value;
	sendValue(category, subcategory, subsubcategory);
	return false;
}

function resetValue() {
	document.getElementById("category").value = "";
	document.getElementById("subcategory").value = "";
	document.getElementById("subsubcategory").value = "";
	return true;

}

function closeWindow() {
	window.close();
}

function setCat(temp) {
	alert("Category: " + temp);
}

function setSubCat(temp) {
	alert("Sub-Category: " + temp);
}

function setSubSubCat(temp) {
	alert("Sub-Category: " + temp);
}

function testSet(cat, subcat, subsubcat) {
	document.getElementById("category").value = cat;
	document.getElementById("subcategory").value = subcat;
	document.getElementById("subsubcategory").value = subsubcat;

}
</script>

<form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()">

<input type="hidden" name="category"  id="category" value="" />
<input type="hidden" name="subcategory" id="subcategory" value="" />
<input type="hidden" name="subsubcategory" id="subsubcategory" value="" />

<input type="button" name="test" value="test" class="btn" onClick="testSet('testing','testing','testing');" />

<div class="well">
<!-- Category -->
<h3 class="text-muted"><?php $k->_e("cat"); ?> <span id="catStore"><input type="button" name="catStoreBtn" value="Applied arts and sciences" class="btn btn-info btn-disabled" disabled /></span><input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" /></small></h3>
</div>

<?php

$catBuffer = "<div class='well'>\r\n";
$catBuffer .= "<h3>";
$catBuffer .= $k->_r("cat");
$catBuffer .= "<span id=\"catStore\"></span></h3>\r\n";

//Initialize the other ones.
$subCatBuffer = "";
$subSubCatBuffer = "";

foreach(array_keys($values) as $key1) {
	$key1 = trim($key1);
	$key1_u = str_replace(" ", "_", $key1);
	$catBuffer .= "<input type='button' name='category_{$key1_u}' value='{$key1}' class='btn btn-info' onClick='setCat(\"{$key1_u}\")' /><br />\r\n";
	
	// Sub Category Stuff now
	$subCatBuffer .= "<div class='well hide' id='well_sub_{$key1_u}'>\r\n";
	$subCatBuffer .= "<h3>";
	$subCatBuffer .= $k->_r("subcat");
	$subCatBuffer .= "<span id=\"scatStore\"></span></h3>\r\n";

	foreach(array_keys($values[$key1]) as $key2) {
		$key2 = trim($key2);
		$key2_u = str_replace(" ", "_", $key2);
		$subCatBuffer .= "<input type='button' name='sub_{$key2_u}' value='{$key2}' class='btn btn-info' onClick='setSubCat(\"{$key2_u}\")' /><br />\r\n";

		$subSubCatBuffer .= "<div class='well hide' id='well_subsub_{$key1_u}-{$key2_u}'>\r";
		$subSubCatBuffer .= "<h3>";
		$subSubCatBuffer .= $k->_r("subsubcat");
		$subSubCatBuffer .= "<span id=\"sscatStore\"></span></h3>\r\n";
		
		foreach(explode(";", $values[$key1][$key2]) as $key3) {
			$key3 = trim($key3);
			if ($key3 == "") {$key3 = "other"; }
			$key3_u = str_replace(" ", "_", $key3);
			$subSubCatBuffer .= "<input type='button' name='sub_sub_{$key3_u}' value='{$key3_u}' class='btn btn-info' onClick='setSubSubCat(\"{$key3}\")' /><br />\r\n";

		}
		$subSubCatBuffer .= "</div>\r\n\r\n";
	}
	$subCatBuffer .= "</div>\r\n\r\n";
}
$catBuffer .= "</div>";

?>

<?php echo $catBuffer; ?>

<?php echo $subCatBuffer; ?>

<?php echo $subSubCatBuffer; ?>

<input type="submit" name="submit" value="Save Sources" class="btn btn-success" style="width: 100%;" />

<input type="button" name="close" value="Close window" class="btn btn-danger" onClick="closeWindow()" style="width: 100%;" />

</form>
<? $site -> gen_closing_min(); ?>