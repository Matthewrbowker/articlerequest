<?php
header("content-type:text/javascript");

require("../../includes.php");

?>

category = "";
subCategory = "";
subSubCategory = "";

function onClickCategory(type, name) {
	if (type == "cat") {
    	category = name;
        document.getElementById("catStoreBtn").value = name;
        alert(category);
        well('cat','test',"");
    } else if (type == "scat") {
    	subCategory = name;
        document.getElementById("catStoreBtn").value = name;
        alert(category);
    } else if (type == "sscat") {
    	subSubCategory = name;
document.getElementById("catStoreBtn").value = name;
alert(category);
    } else {
    	alert("Something broke");
    }
}

function sendValue(cat, scat, sscat) {
    document.getElementById("categorySpan").innerHTML = category + " &lt; " + subCateogry + " &lt; " + subSubCategory;
}

function well(type, curCat, prevCat) {
	// type - category, scat, sscat
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

// OLD CODE HERE

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

// from index.html

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