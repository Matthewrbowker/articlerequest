var count = 0; // TODO: use sources.length
var sources = {};

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
}


function addClick() {
    modalDisplay('type');
}

function editClick(randomins) {
    modalDisplay("edit", randomins);
}

function saveClick() {
    $('#sourcesModal').modal('hide');
}

function deleteClick(randomins) {
    modalDisplay("delete", randomins);
}

function jsonify() {
    // This is the lifter method that prepares the JSON for the form.
    var parsed = JSON.stringify(sources);

    document.getElementById("sourcesSelect").value = parsed;

    alert(parsed);
}
