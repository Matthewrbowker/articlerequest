category = "";
subCategory = "";
subSubCategory = "";

function onClickCategory(type, cur, prev) {
    if (type == "cat") {
        category=cur;
        well(type, cur,"");
    } else if (type == "scat") {
        subCategory=cur;
        well(type, cur, prev);
    } else if (type == "sscat") {
        subSubCategory=cur;
        well(type, cur, prev);
    } else {
        alert("Something broke");
    }
}

function sendValue() {
    document.getElementById("categorySpan").innerHTML = category + " &gt; " + subCategory + " &gt; " + subSubCategory;
    document.getElementById("categorySelect").value = category + "::" + subCategory + "::" + subSubCategory;
    document.getElementById("category_select_add").style.display = "none";
    document.getElementById("category_select_edit").style.display = "inline";
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
    if (newWell != "well_submit") {    document.getElementById(newWell).className = "well unhide"; }
    document.getElementById(newText).className = "text-muted unhide"
}

function setField(type, cat) {
    cat = cat.replace(/_/g, " ");
    catBtn = type + "StoreBtn";
    document.getElementById(type + "StoreBtn").value = cat;
}

function resetCategory() {
    category = "";
    subCategory = "";
    subSubCategory = "";
    var children = document.getElementById("categoryForm").children;
    for (var i = 0; i < children.length; i++) {
        children[i].className = " hide";
        // Do stuff
    }
    document.getElementById("well_cat").className = "well unhide"
}
