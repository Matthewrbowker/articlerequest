//var count = 0;
var sources = {};
var canDoSave = false;
var lastType = "none";
var editingID = "";

function randomValues() {
    if (editingID != "") {
        return editingID;
    }
    else {
        return Math.random().toString(36).substring(2, 9);
    }
}

function modalDisplay(action, id = "") {
    var children = document.getElementById("sources-modal-body").children;
    for (var i = 0; i < children.length; i++) {
        children[i].style.display = "none";
    }

    if (action == "type") {
        // Show only the type selecter
        document.getElementById("sourcesTypeButton").style.display = "block";
        lastType = "none";
        editingID = "";
    }
    else if (action == "show" && typeof id != "undefined") {
        document.getElementById(id).style.display = "block";
        lastType = id;
    }
    else if (action == "edit") {
        editClick(id);
    }
    else if (action == "delete") {
        deleteClick(id)
    }
    else {
        alert("ERROR: Our script broke, please reload the page.");
    }
    $('#sourcesModal').modal('show');
}

function toggleType(type) {
    var children = document.getElementById("sources-modal-body").children;
    for (var i = 0; i < children.length; i++) {
        children[i].style.display = "none";
    }
    document.getElementById("sourcesTypeButton").style.display = "block";
    document.getElementById(type).style.display = "block";
    lastType = type;
}


function addClick() {
    modalDisplay('type');
}

function editClick(randomins) {
    // Edit
    alert("Edit: " + randomins);

    var typeDef = sources[randomins]["type"];

    var node = document.getElementById("sources_container_" + typeDef).getElementsByTagName("input");
    var i;

    sources[randomins]["type"] = lastType;

    for(i=0; i < node.length; i++) {
        // alert(node[i].name + ": " + node[i].value);
        if (typeof sources[randomins][node[i].name] != 'undefined') {
            node[i].value = sources[randomins][node[i].name];
        }
    }

    editingID = randomins;

    modalDisplay("show", typeDef);
}

function saveClick() {
    var randomins = randomValues();
    var node = document.getElementById("sources_container_" + lastType).getElementsByTagName("input");
    //var allNodes = document.getElementById("sources_modal_body").getElementsByTagName("input");
    var i;
    sources[randomins] = {};

    sources[randomins]["type"] = lastType;

    for(i=0; i < node.length; i++) {
        // alert(node[i].name + ": " + node[i].value);
        sources[randomins][node[i].name] = node[i].value;
    }

    //count++;

    //for(i=0; i < allNodes.length; i++) {
    //    allNodes[i].value = "";
    //}

    jsonify();
    fillBullets();
    $('#sourcesModal').modal('hide');
}

function deleteClick(randomins) {
    // Delete
    delete sources[randomins];

    jsonify();
    fillBullets();
}

function jsonify() {
    // This is the lifter method that prepares the JSON for the form.

    document.getElementById("sourcesSelect").value = JSON.stringify(sources);
}

function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function fillBullets() {
    /*var children = document.getElementById("sourcesStaging").children;
    for (var i = 0; i < children.length; i++) {
        alert(i);
        children[i].parentNode.removeChild(children[i]);
    }*/
    var ul = document.getElementById('sourcesStaging');
    if (ul) {
        while (ul.firstChild) {
            ul.removeChild(ul.firstChild);
        }
    }

    Object.keys(sources).forEach(function (key) {
        var value = "";
        value += "<li>" + ucfirst(sources[key]["type"]) + " Source" +
            " <a onclick=\"editClick('" + key + "')\" href=\"#\">[Edit]</a> "
            + "<a onclick=\"deleteClick('" + key + "')\" href=\"#\">[Delete]</a>";
        value += "<ul>";
        Object.keys(sources[key]).forEach(function (minikey) {
            if (minikey == "type") { return; }
            value += "<li>" + ucfirst(minikey) + ": " + sources[key][minikey] + "</li>\r\n";
        });
        value += "</ul>";
        var tmp = document.createElement("li");
        tmp.innerHTML = value;
        document.getElementById("sourcesStaging").appendChild(tmp);
    })
}