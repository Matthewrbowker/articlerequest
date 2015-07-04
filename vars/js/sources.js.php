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
        buffer.className = "pannel panel-info";
        buffer.innerHTML = document.getElementById("template_" + type).innerHTML.replace("%RANDOMINS%", randomIns);
        document.getElementById("sources_container").appendChild(buffer);
    }
}

function randomValues() {
	return Math.random().toString(36).substring(2,9);
}

function removeSource(name) {
    document.getElementById("sources_container").removeChild(name);
    alert(name);
}