<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"");

$site = new site($dev);

$site -> gen_opening($k, "");

$db = new wpPDO();

?>

<script>

function updateCategory(cat,scat,sscat) {
    // this gets called from the popup window and updates the field with a new value
    var viewValue = cat + "->" + scat + "->" + sscat;
    var storValue = viewValue.replace("->", "::").replace("->", "::").trim();

    document.cookie="articlerequest_category=" . storValue;

    document.getElementById("categorySelect").value = storValue;
    document.getElementById("categorySpan").innerHTML = viewValue;
}

function loadCategory() {
	var name = "articlerequest_category=";
	var ca = document.cookie.split(';');
	var value = "";
	for(var i=0; i<ca.length; i++) {
  		var c = ca[i].trim();
  		if (c.indexOf(name)==0) value = c.substring(name.length,c.length);
	}
	
    var viewValue = value.replace("->", "::").replace("->", "::").trim();

    document.cookie="articlerequest_category=" . value;

    document.getElementById("categorySelect").value = value;
    document.getElementById("categorySpan").innerHTML = viewValue;
}

function saveSources(json) {
	document.getElementById("sourcesSelect").value = json;
	document.getElementById("sourcesSpan").className = "unhide";
}

function validate_checkbox() {
	var cb = document.getElementById("checkbox").checked;
	if (cb == false) {
		document.getElementById("btnSubmit").disabled = true;
		}
	else {
		document.getElementById("btnSubmit").disabled = false;
		}
}
</script>

<!-- script src="vars/validate.js" type="text/javascript"></script -->

<div class="alert alert-danger" style="display:none;" id="id_alert_error">
	<?php $k -> _e("error"); ?>
</div>

<br>

<?php $k -> _e("intro"); ?>
<br>
<br>

</div>

	<form method="post" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
<div class="col-md-3">
	&nbsp;
</div>
<div class="col-md-6">
	<div class="form-group" id="id_subject">
		<label class="control-label" for="subject"><?php $k->_e("subject"); ?></label>
		<input type="text" class="form-control" id="subject" name="subject">
	</div>
	<div class="form-group" id="id_comment">
		<label class="control-label" for="comment"><?php $k->_e("description"); ?></label><br />
		<!-- input type="text" class="form-control" id="inputError" -->
		<textarea id="comment" name="comment" class="form-control"><?php if (ISSET($_GET['description'])) echo $_GET['description']; ?></textarea>
	</div>
	<div class="form-group" id="id_username">
		<label class="control-label" for="inputError"><?php $k->_e("username"); ?></label>
		<input type="text" class="form-control" id="username" name="username">
	</div>
	<div class="form-group" id="id_category">
		<label class="control-label" for="categorySelect"><?php $k->_e("category"); ?></label>
		<input type="hidden" name="categorySelect" id="categorySelect" value="" /><!--a href="category.php" target=_new>[Select]</a -->
		<span id="categorySpan" class="text-muted">
			&nbsp;
		</span>
		<a href="category.php" onclick="javascript:void window.open('category.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a>
	<div class="form-group" id="sources">
		<label class="control-label" for="inputError"><?php $k->_e("sources"); ?></label>
		<input type="hidden" id="sourcesSelect" name="sourcesSelect" value ="" />
		<span id="sourcesSpan" class="hide">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		</span>
		<a href="sources.php" onclick="javascript:void window.open('sources.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a>
	</div>
	<div class="input-group">
		<span class="input-group-addon">
			<input type="checkbox" name="doublecheck" onchange="validate_checkbox()" class="checkbox-inline" id="checkbox" />
		</span>
		<span class="form-control">
			<?php $k -> _e("check"); ?>
		</span>
	</div>
	<p>&nbsp; <!-- for padding --></p>
	<div class="col-md-6">
		<input type="reset" value="<?php $k -> _e("reset"); ?>" class="btn btn-danger center-block" />
	</div>
	<div class="col-md-6">
		<input type="submit" id="btnSubmit" value="<?php $k -> _e("submit"); ?>" class="btn btn-success center-block" disabled/>
	</div>
</div>

</form>
<div class="col-md-3">
	&nbsp;
</div>
</div>
<div class="col-md-12">
	<? $site -> gen_closing(); ?>