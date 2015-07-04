<?php
header("content-type:text/javascript");

require("../../includes.php");
?>

function validate_checkbox() {
    var cb = document.getElementById("checkbox").checked;
    if (cb == false) {
        document.getElementById("btnSubmit").disabled = true;
    }
    else {
        document.getElementById("btnSubmit").disabled = false;
    }
}

function validate() {
    // TODO: Validate form submission and provide for a usable JSON value for submitting.
}

function resetForm() {
    // TODO: Form reset code
}