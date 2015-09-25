function validate_checkbox() {
    var cb1 = document.getElementById("checkbox_1").checked;
    var cb2 = document.getElementById("checkbox_2").checked;
    if (cb1 == true && cb2 == true) {
        document.getElementById("btnSubmit").disabled = false;
    }
    else {
        document.getElementById("btnSubmit").disabled = true;
    }
}

function clearerror() {
    document.getElementById("id_alert_error").style.display = "none";
    document.getElementById("id_subject").className='form-group';
    document.getElementById("id_category").className='form-group';
    document.getElementById("id_sources").className='form-group';
}


function validate() {
    clearerror();
    var retVal = true;
    var subj=document.forms["mainform"]["subject"].value;
    var cat=document.forms["mainform"]["categorySelect"].value;
    var source=document.forms["mainform"]["sourcesSelect"].value;
    if (subj==null || subj=="") {
        //alert("Subject must be filled out!");
        document.getElementById("id_subject").className='form-group has-error';
        retVal = false;
    }
    else if (cat==null || cat=="" || cat==">>" || cat=="::::") {
        //alert("Please choose an article category!");
        document.getElementById("id_category").className='form-group has-error';
        retVal = false;
    }
    else if (source==null || source=="") {
        //alert("Please choose sources!");
        document.getElementById("id_sources").className='form-group has-error';
        retVal = false;
    }
    else {
        // Do nothing
    }

    if (!retVal) {
        document.getElementById("id_alert_error").style.display = "block";
    }

    return retVal;
}

function resetForm() {
    // TODO: Form reset code
}

function formParse() {
    validate_checkbox()
    document.getElementById("id_email").style.display = 'none';
}
