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