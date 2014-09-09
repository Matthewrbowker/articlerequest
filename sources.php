<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"sources");

$site = new site($dev);

$site -> gen_opening_min($k -> returnKeys(), "sources");

//Testing
$dev = false;

//OK, Time to process the on-wiki config.

if ($dev) $url="https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/sources/dev?action=raw";
else $url = "https://en.wikipedia.org/wiki/User:Matthewrbot/Config/1/sources?action=raw";

$url = "http://localhost/~wiki/index.php?title=Article_request/sources&action=raw";

$values = parse_ini_string(file_get_contents($url), TRUE);


//var_dump($values);

?>

<script>
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

function testRandom() {
	//var random = randomValues();
	//alert ("<input class='btn btn-danger' type='button' value='Remove this source' onClick='removeSource(\\\"web_\" + random + \"\\\")' />");
	alert("Depreciated function");
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

function submitValue() {
	var divs = document.getElementById("sources_container").getElementsByTagName("div");
	for(var i = 0; i < divs.length; i++){
		alert(divs[i].innerHTML);
	}
	closeWindow();
}

</script>

<?php $k->_e("intro"); ?>
<br />
<br />

<form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()">

<div class="panel panel-warning">
	<div class="panel-heading">
		Add another source:
	</div>
	<div class="panel-body">
		<center>
			<?php
			foreach (array_keys($values) as $one) {
				echo "<input type=\"button\" name=\"sources_{$values[$one]['shorthand']}_add\" value=\"{$values[$one]['label']}\" class=\"btn btn-warning\" onClick=\"addSource('{$values[$one]['shorthand']}')\" />\r\n";
			}4
			?>
		</center>
	</div>
</div>

<hr />

<div id="sources_container">

Here's the sources you have so far:

<!-- div class="panel panel-default" id="web_1">
	<div class="panel-heading">
		<div class="pull-right">
			<input class="btn btn-danger" type="button" value="Remove this source" onClick="removeSource('web_1')" />
		</div>
		<label for="source_1">Web Source 1</label>
	</div>
	<div class="panel-body">
		<input type="text" class="form-control">
	</div><!- - /input-group - 	->
</div -->

</div>

<input type="submit" value="Save Sources" class="btn btn-success" style="width: 100%;" /><!-- name="submit" -->

<input type="button" value="Close window" class="btn btn-danger" onClick="closeWindow()" style="width: 100%;" /><!-- name="close" -->
</form>

<? $site -> gen_closing_min(); ?>
