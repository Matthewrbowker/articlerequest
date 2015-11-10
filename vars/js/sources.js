var count = 2;
var sources = {'a': 'b', 'c': 'd'};
var canDoSave = false;
var lastType = "none";

function randomValues() {
    return Math.random().toString(36).substring(2,9);
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
}

function saveClick() {
    var randomins = randomValues();
    alert(randomins);
    jsonify();
    fillBullets();
    $('#sourcesModal').modal('hide');
}

function deleteClick(randomins) {
    // Delete
}

function jsonify() {
    // This is the lifter method that prepares the JSON for the form.
    var parsed = JSON.stringify(sources);

    document.getElementById("sourcesSelect").value = parsed;

    alert(parsed);
}

function fillBullets() {
    var children = document.getElementById("sourcesStaging").children;
    for (var i = 0; i < children.length; i++) {
        children[i].parentNode.removeChild(children[i]);
    }

    Object.keys(sources).forEach(function (key) {
        var value = sources[key]
        var tmp = document.createElement("li");
        tmp.innerHTML = value;
        document.getElementById("sourcesStaging").appendChild(tmp);
    })
}