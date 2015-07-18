<?php
header("content-type:text/javascript");

require("../../includes.php");
?>
function addSource(type) {
	var buffer = "";
	var random = randomValues();
    var randomIns = type + "_" + random;

	if (type == "") {
		alert("Sorry, our script broke. \r\n\r\nPlease refresh the page.");
	}
    else {
        buffer = document.createElement("div");
        buffer.id = randomIns;
        buffer.className = "panel panel-info";
        buffer.innerHTML = document.getElementById("template_" + type).innerHTML.replace("%RANDOMINS%", randomIns);
        document.getElementById("sources_container").appendChild(buffer);
    }
}

function randomValues() {
	return Math.random().toString(36).substring(2,9);
}

function removeSource(name) {
    var node = document.getElementById(name);
    node.parentNode.removeChild(node);
}

function saveSources() {
    var nodes = document.getElementById("sources_container").childNodes;
    var toConvertToJson = {};

    for(i=1; i < nodes.length; i++) {
        var inputs = nodes[i].getElementsByTagName("input");
        toConvertToJson[nodes[i].id] = {};
        for(j = 1; j < inputs.length; j++) {
            toConvertToJson[nodes[i].id][inputs[j].name] = inputs[j].value
            //alert(inputs[j].name + ": " + inputs[j].value);
        }
    }
    var parsed = JSON.stringify(toConvertToJson);

    alert(parsed);

    document.getElementById("sourcesSelect").value = parsed;
}