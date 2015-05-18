<?php
header("content-type:text/javascript");

require("../../includes.php");

?>
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

alert("it worked!");