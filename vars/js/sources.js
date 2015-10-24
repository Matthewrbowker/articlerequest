var count = 0; // TODO: use sources.length
var sources = {};

function randomValues() {
    return Math.random().toString(36).substring(2,9);
}

function modalDisplay(action, id = "") {
    var children = document.getElementById("sources-modal-body").children;
    for (var i = 0; i < children.length; i++) {
        children[i].className = " hide";
    }

    if (action == "type") {
        // Show only the type selecter
        document.getElementById("sourcesTypeButton").style.display = "block";
    }
    else {
        alert(id);
        // show the contents of var id
    }
    $('#sourcesModal').modal('show');
}

function toggleType(type) {
    document.getElementById("template_" + type).style.display = "block";
}


function addClick() {
    modalDisplay('type');
}

function editClick(randomins) {
    //
}

function saveClick() {
    $('#sourcesModal').modal('hide');
}

function deleteClick(randomins) {

}

function jsonify() {
    // This is the lifter method that prepares the JSON for the form.
    var parsed = JSON.stringify(sources);

    document.getElementById("sourcesSelect").value = parsed;

    alert(parsed);
}
