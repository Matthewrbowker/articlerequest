<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"");

$site = new site($dev);

$site -> gen_opening($k, "");

$db = new wpPDO();

?>

<script>

function updateCategory(cat,scat,sscat) {
    // this gets called from the popup window and updates the field with a new value
    var viewValue = cat + "->" + scat + "->" + sscat;
    var storValue = viewValue.replace("->", "::").replace("->", "::").trim();

    document.cookie="articlerequest_category=" . storValue;

    document.getElementById("categorySelect").value = storValue;
    document.getElementById("categorySpan").innerHTML = viewValue;
}

function loadCategory() {
	var name = "articlerequest_category=";
	var ca = document.cookie.split(';');
	var value = "";
	for(var i=0; i<ca.length; i++) {
  		var c = ca[i].trim();
  		if (c.indexOf(name)==0) value = c.substring(name.length,c.length);
	}
	
    var viewValue = value.replace("->", "::").replace("->", "::").trim();

    document.cookie="articlerequest_category=" . value;

    document.getElementById("categorySelect").value = value;
    document.getElementById("categorySpan").innerHTML = viewValue;
}

function saveSources(json) {
	document.getElementById("sourcesSelect").value = json;
	document.getElementById("sourcesSpan").className = "unhide";
}

function validate_checkbox() {
	var cb = document.getElementById("checkbox").checked;
	if (cb == false) {
		document.getElementById("btnSubmit").disabled = true;
		}
	else {
		document.getElementById("btnSubmit").disabled = false;
		}
}
</script>

<!-- Category -->
<script>
// JavaScript Document

// This document contains all of the scripting required to make index.php work.

// Category
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

<!-- Sources -->

function addSource(type) {
	var buffer = "";
	var random = randomValues();

	if (type == "") {
		alert("Sorry, our script broke. \r\n\r\nPlease refresh the page.");
	}
	<?php
	foreach(array_keys($values) as $one) {
		echo <<<END
		else if(type == '$one') {
			var randomIns = "{$values[$one]['shorthand']}" + "_" + random;
			buffer = document.createElement("div");
			buffer.id = randomIns;
			buffer.className = "panel panel-info";
			buffer.innerHTML = "<a name='" + randomIns + "'></a><div class='panel-heading'><span class='pull-right'><input class='btn btn-danger' type='button' value='Remove this source' onClick='removeSource(" + randomIns + ")' /></span><label for='" + randomIns + "'>{$values[$one]['id']}</label></div><div class='panel-body'>";
END;
		$fields = explode("|", $values[$one]["fields"]);
		$headings = explode("|", $values[$one]["field_labels"]);
		//if ($fields != $headings) {
		//	echo "\r\t\talert('It appears there is a configuration error, the field labels are offset.  Please fix the configuration.')";
		//}
		for ($l = 0; $l < count($fields); $l++) {
			echo <<<END
			buffer.innerHTML += "<label>{$headings[$l]}:</label> <input type='text' class='form-control' name='{$fields[$l]}'><br />";

END;
		}
		/*
	</div><!-- /input-group -->
</div>*/
		echo "\t}\r\n";
	}
	?>
	//alert(buffer.innerHTML);
	document.getElementById("sources_container").appendChild(buffer);
}

function randomValues() {
	return Math.random().toString(36).substring(2,9);
}

function removeSource(name) {
	document.getElementById("sources_container").removeChild(name); 
}

function closeWindow() {
	window.close();
}

function createJSON(random) {
	// This function will grab the random value, and generate JSON code from it
	var parseValue = random.split("_");
	var type = parseValue[0];
	var id = parseValue[1];
	var inputs = document.getElementById(random).querySelectorAll("input[type=text]");
	var json = "\"" + random + "\" : {";

	//Setting the type first
	json += "\"type\" : \"" + type + "\", ";

	for (var i = 0; i < inputs.length; i++) {
		json += "\"" + inputs[i].name + "\" : \"" + inputs[i].value + "\", ";
	}

	json = json.substring(0, json.length - 2);

	json += "} ";

	return json;
}

function submitValue() {
	var divs = document.getElementById("sources_container").getElementsByClassName("panel");
	var finalJson = "{ \"Sources\" : {";
	for(var i = 0; i < divs.length; i++){
		finalJson += createJSON(divs[i].getAttribute("id")) + ", ";
	}

	finalJson = finalJson.substring(0, finalJson.length - 2);

	finalJson += "} }";
	window.opener.saveSources(finalJson);
	closeWindow();
}
</script>

<!-- Modals for the Category and sources -->

<!-- Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php $k->_e("category-heading"); ?></h4>
      </div>
      <div class="modal-body">
<?php

$opt=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

if ($dev) $url="http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category/dev?action=raw";
else $url = "http://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/category?action=raw";

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

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- sources -->
<div class="modal fade bs-example-modal-lg" id="sourcesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php $k->_e("sources-heading"); ?></h4>
      </div>
      <div class="modal-body">
        SOURCES!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- script src="vars/validate.js" type="text/javascript"></script -->

<div class="alert alert-danger" style="display:none;" id="id_alert_error">
	<?php $k -> _e("error"); ?>
</div>

<br>

<?php $k -> _e("intro"); ?>
<br>
<br>

</div>

	<form method="post" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
<div class="col-md-3">
	&nbsp;
</div>
<div class="col-md-6">
	<div class="form-group" id="id_subject">
		<label class="control-label" for="subject"><?php $k->_e("subject"); ?></label>
		<input type="text" class="form-control" id="subject" name="subject">
	</div>
	<div class="form-group" id="id_comment">
		<label class="control-label" for="comment"><?php $k->_e("description"); ?></label><br />
		<!-- input type="text" class="form-control" id="inputError" -->
		<textarea id="comment" name="comment" class="form-control"><?php if (ISSET($_GET['description'])) echo $_GET['description']; ?></textarea>
	</div>
	<div class="form-group" id="id_username">
		<label class="control-label" for="inputError"><?php $k->_e("username"); ?></label>
		<input type="text" class="form-control" id="username" name="username">
	</div>
	<div class="form-group" id="id_category">
		<label class="control-label" for="categorySelect"><?php $k->_e("category"); ?></label>
		<input type="hidden" name="categorySelect" id="categorySelect" value="" /><!--a href="category.php" target=_new>[Select]</a -->
		<span id="categorySpan" class="text-muted">
			&nbsp;
		</span>
		<!-- a href="category.php" onclick="javascript:void window.open('category.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a -->
        <a href="#" data-toggle="modal" data-target="#categoryModal">[Select]</a>
	<div class="form-group" id="sources">
		<label class="control-label" for="inputError"><?php $k->_e("sources"); ?></label>
		<input type="hidden" id="sourcesSelect" name="sourcesSelect" value ="" />
		<span id="sourcesSpan" class="hide">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		</span>
		<!-- a href="sources.php" onclick="javascript:void window.open('sources.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a -->
        <a href="#" data-toggle="modal" data-target="#sourcesModal">[Select]</a>
	</div>
	<div class="input-group">
		<span class="input-group-addon">
			<input type="checkbox" name="doublecheck" onchange="validate_checkbox()" class="checkbox-inline" id="checkbox" />
		</span>
		<span class="form-control">
			<?php $k -> _e("check"); ?>
		</span>
	</div>
	<p>&nbsp; <!-- for padding --></p>
	<div class="col-md-6">
		<input type="reset" value="<?php $k -> _e("reset"); ?>" class="btn btn-danger center-block" />
	</div>
	<div class="col-md-6">
		<input type="submit" id="btnSubmit" value="<?php $k -> _e("submit"); ?>" class="btn btn-success center-block" disabled/>
	</div>
</div>

</form>
<div class="col-md-3">
	&nbsp;
</div>
</div>
<div class="col-md-12">
<script src="res/js/jquery-2.1.3.js" type="text/javascript"></script>
<script src="res/js/bootstrap.js" type="text/javascript"></script>
<!-- script src="vars/js/index.js" type="text/javascript"></script -->
<? $site -> gen_closing(); ?>