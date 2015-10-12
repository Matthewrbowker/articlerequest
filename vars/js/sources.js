var count = 0; // TODO: use sources.length
var sources = {};

function modalDisplay(action) {
    if (action == "type") {
        alert("type");
    }
    $('#sourcesModal').modal('show');
}

function addClick() {
    modalDisplay('type');
}

function editClick(randomins) {
    //
}

function jsonify() {
    // This is the lifter method that prepares the JSON for the form.
    alert(sources);
}
