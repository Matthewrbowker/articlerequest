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
