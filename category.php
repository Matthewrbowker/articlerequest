<?php

require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"category");

$site = new site($dev);

$site -> gen_opening_min($k , "category");

//Testing
$dev = false;

if ($dev) $url="https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category/dev?action=raw";
else $url = "https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category?action=raw";

// TEMPORARY CHANGE - MOVE CONFIG LOCALLY
//$url = "http://localhost/~wiki/index.php?title=Article_request/category&action=raw";

$values = parse_ini_string(file_get_contents($url), TRUE);


// Small function to quickly fix the category names-
function parseCatName($string) {
	$string = str_replace(" ", "_", $string);
	$string = str_replace("&", "&amp;", $string);
	return $string;
}
?>

<script type="text/javascript">
function sendValue(cat, scat, sscat) {
    window.opener.updateCategory(cat, scat, sscat);
    window.close();
}

function submitValue() {
	var category = document.getElementById("catStoreBtn").value;
	var subcategory = document.getElementById("scatStoreBtn").value;
	var subsubcategory = document.getElementById("sscatStoreBtn").value;
	sendValue(category, subcategory, subsubcategory);
	return false;
}

function resetValue() {
	document.getElementById("catStorebtn").value = "";
	document.getElementById("scatStoreBtn").value = "";
	document.getElementById("sscatStoreBtn").value = "";
	return true;
}

function closeWindow() {
	window.close();
}
function setField(type, cat) {
	cat = cat.replace(/_/g, " ");

	catBtn = type + "StoreBtn";

	document.getElementById(type + "StoreBtn").value = cat;
}

function set(type, curCat, prevCat) {
	// type - cat, scat, sscat
	// curCat - the current category
	// prevCat - The previous category
	var currentWell; //The current well to be hidden
	var newWell; // The new well to unhide
	var newText; // The new text to unhide

	if (type == "cat") {
		currentWell = "well_cat";
		newWell = "well_sub";
		newText = "text_cat";
	}
	else if (type == "scat") {
		currentWell = "well_sub";
		newWell = "well_subsub";
		newText = "text_scat";
	}
	else if (type == "sscat") {
		currentWell = "well_subsub";
		newWell = "well_submit";
		newText = "text_sscat";
	}

	if (prevCat != null && prevCat != "") {
		prevCat = prevCat.replace(/ /g, "_");
		currentWell = currentWell + "_" + prevCat;
	}

	if (curCat != null && curCat != "") {
		curCat = curCat.replace(/ /g, "_");
		newWell = newWell + "_" + curCat;
	}

	if (newWell.match(/^well_submit_/)) {
		newWell = "well_submit";
	}


	setField(type, curCat);
	document.getElementById(currentWell).className = "well hide";
	document.getElementById(newWell).className = "well unhide";
	document.getElementById(newText).className = "text-muted unhide"
}

function testSet(cat, subcat, subsubcat) {
	document.getElementById("category").value = cat;
	document.getElementById("subcategory").value = subcat;
	document.getElementById("subsubcategory").value = subsubcat;

}
</script>

<?php $k->_e("introduction"); ?>

<form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()">

<input type="hidden" name="category"  id="category" value="" />
<input type="hidden" name="subcategory" id="subcategory" value="" />
<input type="hidden" name="subsubcategory" id="subsubcategory" value="" />

<h3 class="text-muted hide" id="text_cat"><?php $k->_e("cat"); ?> <span id="catStore"><input type="button" name="catStoreBtn" id="catStoreBtn" value="" class="btn btn-info btn-disabled" disabled /></span><!--input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" /--></h3>
<h3 class="text-muted hide" id="text_scat"><?php $k->_e("subcat"); ?> <span id="scatStore"><input type="button" name="scatStoreBtn" id="scatStoreBtn" value="" class="btn btn-info btn-disabled" disabled /></span><!-- input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" / --></h3>
<h3 class="text-muted hide" id="text_sscat"><?php $k->_e("subsubcat"); ?> <span id="sscatStore"><input type="button" name="sscatStoreBtn" id="sscatStoreBtn" value="" class="btn btn-info btn-disabled" disabled /></span><!-- input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" / --></h3>

<?php

$catBuffer = "<div class='well' id='well_cat'>\r\n";
$catBuffer .= "<h3>";
$catBuffer .= $k->_r("cat");
$catBuffer .= "</h3>\r\n";


//Initialize the other ones.
$subCatBuffer = "";
$subSubCatBuffer = "";

foreach(array_keys($values) as $key1) {
	$key1 = trim($key1);
	$key1_u = parseCatName($key1);
	$catBuffer .= "<input type='button' name='btn_category_{$key1_u}' value='{$key1}' class='btn btn-info' onClick='set(\"cat\", \"{$key1_u}\")' /><br />\r\n";
	
	// Sub Category Stuff now
	$subCatBuffer .= "<div class='well hide' id='well_sub_{$key1_u}'>\r\n";
	$subCatBuffer .= "<h3>";
	$subCatBuffer .= $k->_r("subcat");
	$subCatBuffer .= "</h3>\r\n";

	foreach(array_keys($values[$key1]) as $key2) {
		$key2 = trim($key2);
		$key2_u = parseCatName($key2);
		$subCatBuffer .= "<input type='button' name='btn_sub_{$key2_u}' value='{$key2}' class='btn btn-info' onClick='set(\"scat\", \"{$key2_u}\", \"{$key1_u}\")' /><br />\r\n";

		$subSubCatBuffer .= "<div class='well hide' id='well_subsub_{$key2_u}'>\r";
		$subSubCatBuffer .= "<h3>";
		$subSubCatBuffer .= $k->_r("subsubcat");
		//$subSubCatBuffer .= "<span id=\"sscatStore\"></span>";
		$subSubCatBuffer .= "</h3>\r\n";		
		foreach(explode(";", $values[$key1][$key2]) as $key3) {
			$key3 = trim($key3);
			if ($key3 == "") {$key3 = "other"; }
			$key3_u = parseCatName($key3);
			$subSubCatBuffer .= "<input type='button' name='btn_sub_sub_{$key3_u}' value='{$key3}' class='btn btn-info' onClick='set(\"sscat\", \"{$key3_u}\" , \"{$key2_u}\")' /><br />\r\n";
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
<div class="well hide" id="well_submit" name="well_submit">
<input type="submit" name="submit" value="Save Sources" class="btn btn-success" style="width: 100%;" />
</div>

<input type="button" name="close" value="Close window" class="btn btn-danger" onClick="closeWindow()" style="width: 100%;" />

</form>
<? $site -> gen_closing_min(); ?>