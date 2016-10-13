
<!-- BEGIN: request.tpl -->
<div class="alert alert-danger" style="display:none;" id="id_alert_error">
    {$error}
</div>
<br>
{$intro}
<br>
<br>
<!-- /div -->
<div class="col-md-6 col-md-offset-3">
    <form method="post" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
        <div class="form-group" id="id_subject">
            <label class="control-label" for="subject" id="subjectLabel">
                <i class=\"glyphicon glyphicon-star\"></i>{$subject}
            </label>
            <input type="text" class="form-control" id="subject" name="subject">
        </div>
        <div class="form-group" id="id_comment">
            <label class="control-label" for="comment">
                {$description}
            </label>
            <br />
            <!-- input type="text" class="form-control" id="inputError" -->
      <textarea id="comment" name="comment" class="form-control">
</textarea>
        </div>
        <div class="form-group" id="id_username">
            <label class="control-label" for="username">
                {$username}
            </label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group" id="id_email">
            <label class="control-label" for="email" id="emailLabel">
                E-Mail
            </label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group" id="id_category">
            <label class="control-label"><!-- for="categorySelect" -->
                <i class=\"glyphicon glyphicon-star\"></i>{$category}
            </label>
            <input type="hidden" name="categorySelect" id="categorySelect" value="" />
            <span id="categorySpan" class="text-muted"> &nbsp; </span>
            <a href="#" data-toggle="modal" data-target="#categoryModal" id="category_select_add">{$select}</a>
            <a href="#" data-toggle="modal" data-target="#categoryModal" id="category_select_edit" style="display: none; ">{$editInfo}</a>
        </div>
        <div class="form-group" id="id_sources">
            <label class="control-label"> <!-- for="inputError" -->
                <i class=\"glyphicon glyphicon-star\"></i>{$sources}
            </label>
            <input type="hidden" id="sourcesSelect" name="sourcesSelect" value ="" />
            <span id="sourcesSpan" class="hide"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </span>
            <a href="#" onclick="addClick()">{$select}</a>
            <ul id="sourcesStaging">
                <!-- will be populated by Javascript -->
            </ul></div>
        <div class="checkbox checkbox-success">
            <input type="checkbox" id="checkbox_1" name="doublecheck_1" onchange="validate_checkbox()" class="styled"> <label for="checkbox_1"><i class=\"glyphicon glyphicon-star\"></i>{$check1}</label>
        </div>
        <div class="checkbox checkbox-success">
            <input type="checkbox" id="checkbox_2" name="doublecheck_2" onchange="validate_checkbox()" class="styled"> <label for="checkbox_2">{$check2}</label>
        </div>
        <p>&nbsp; <!-- for padding --></p>
        <div class="row">
            <div class="col-md-6">
                <input type="submit" id="btnSubmit" value="{$submit}" class="btn btn-success center-block" disabled="disabled" />
            </div>
            <div class="col-md-6">
                <input type="reset" value="{$reset}" class="btn btn-danger center-block" />
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <script src="includes/js/index.js" type="text/javascript"></script>
        <script src="includes/js/category.js" type="text/javascript"></script>
        <script src="includes/js/sources.js" type="text/javascript"></script>
</div>
    </div>
<!-- END: request.tpl -->
