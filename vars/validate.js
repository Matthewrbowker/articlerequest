
function clearerror() {
    var subj = subject.className;
    var cat = category1.className;
    var scat = subcat1.className;
    var sscat = subsubcat1.className;
    if (subj == 'red') { subject.className = ''; }
    if (cat == 'red') { category1.className = ''; }
    if (scat == 'red') { subcat1.className = ''; }
    if (sscat == 'red') { subsubcat1.className = ''; }
    }

function validate() {
    clearerror();
    var subj=document.forms["mainform"]["subject"].value;
    var cat=document.forms["mainform"]["category"].value;
    var subcat=document.forms["mainform"]["subcat"].value;
    var subsubcat=document.forms["mainform"]["subsubcat"].value;
    var uname=document.forms["mainform"]["username"].value;
    var check=document.forms["mainform"]["doublecheck"].checked;
    var retVal = true;
    if (subj==null || subj=="") {
        alert("Subject must be filled out!");
        subject.className='text-error';
        retVal = false;
    }
    if (cat==null || cat=="" || cat=="none") {
        alert("Please choose an article category!");
        category1.className='text-error';
        retVal = false;
    }
    if (subcat==null || subcat=="" || subcat=="none") {
        alert("Please choose an article sub-category!");
        subcat1.className='text-error';
        retVal = false;
    }
    if (subsubcat==null || subsubcat=="" || subsubcat=="none") {
        alert("Please choose an article sub-sub-category!");
        subsubcat1.className='text-error';
        retVal = false;
    }
    //else if (check == false || check==null || check=='') {
    //    alert("Please read and agree to the agreement.");
    //    return false;
    //}
    return retVal;
}

function checkbox() {
    var cb = document.mainform.doublecheck.checked;
    if (cb == false) {
        document.mainform.submit.disabled = true;
        }
    else{
        document.mainform.submit.disabled = false;
        }
    }

function checkusername() {
    var uname = document.mainform.username.value;
    uname = uname.replace(' ', '_');
    uname = uname.charAt(0).toUpperCase() + uname.slice(1);
    if (uname != '') {
        unameinfo.innerHTML = "<i class=\"icon-user\"></i><a href=\"http://en.wikipedia.org/wiki/User:" + uname + "\" target=_blank>" + uname + "</a> (<a href=\"http://en.wikipedia.org/wiki/User_talk:" + uname + "\" target=_blank>talk</a> &middot; <a href=\"http://en.wikipedia.org/wiki/Special:Contributions/" + uname + "\" target=_blank>contributions</a>)";
    }
    else {
        unameinfo.innerHTML = " ";
    }
}

function resetform() {
    clearerror();
    subcat1.className='hidden';
    subcat2.className='hidden';
    subsubcat1.className='hidden';
    subsubcat2.className='hidden';
    document.mainform.subcat.options.length=0;
    document.mainform.subsubcat.options.length=0;
    document.mainform.submit.disabled=true;
    document.mainform.doublecheck.checked = false;
    unameinfo.innerHTML = " ";
    }

function loading() {
    parseform();
    checkbox();
    clearerror();
    checkusername();
}