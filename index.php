<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$fi = new fileLoader();

$k = new translate($lang,"");

$site = new site($k, "");

$site -> gen_opening();

$db = new wpPDO($fi);

$c = new category($k);

$s = new sources();
?>

<!-- Modals for the Category and sources -->

<!-- Category -->

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <?php $k->_e("category-heading"); ?>
        </h4>
      </div>
      <div class="modal-body">
        <form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()"><span id="categoryForm">
          <!--input type="hidden" name="category"  id="category" value="" />
          <input type="hidden" name="subcategory" id="subcategory" value="" />
          <input type="hidden" name="subsubcategory" id="subsubcategory" value="" / -->
          <h3 class="text-muted hide" id="text_cat">
            <?php $k->_e("cat"); ?>
            <span id="catStore">
            <input type="button" name="catStoreBtn" id="catStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
          <h3 class="text-muted hide" id="text_scat">
            <?php $k->_e("subcat"); ?>
            <span id="scatStore">
            <input type="button" name="scatStoreBtn" id="scatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
          <h3 class="text-muted hide" id="text_sscat">
            <?php $k->_e("subsubcat"); ?>
            <span id="sscatStore">
            <input type="button" name="sscatStoreBtn" id="sscatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
        <?php
        $c->echoCat();
        $c->echoSubCat();
        $c->echoSubSubCat();
        ?>
        </form>
        </span>
      </div>
      <div class="modal-footer">
          <input type="button" name="resetBtn" value="<?php $k->_e("clearInfo") ?>" onClick = "resetCategory()" class="btn btn-warning" />
          <button type="button" class="btn btn-primary" onclick="sendValue()" data-dismiss="modal"><?php $k->_e("modalSave"); ?></button>
      </div>
    </div>
  </div>
</div>

<!-- sources -->
<div class="modal fade bs-example-modal-lg" id="sourcesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="categoryModalLabel">
          <?php $k->_e("sources-heading"); ?>
        </h4>
      </div>
      <div class="modal-body" style="max-height:420px; overflow-y:auto;">
        <div class="panel panel-warning">
          <div class="panel-heading"> Add another source: </div>
          <div class="panel-body">
              <?php $s -> echoButtonBuffer(); ?>
          </div>
        </div>
          <div class="hide">
              <?php $s ->echoDivBuffer(); ?>
          </div>
        <hr />
        Here's the sources you have so far:
        <div id="sources_container">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onClick="saveSources()" class="btn btn-primary" data-dismiss="modal"><?php $k->_e("modalSave") ?></button>
      </div>
    </div>
  </div>
</div>

<div class="alert alert-danger" style="display:none;" id="id_alert_error">
  <?php $k -> _e("error"); ?>
</div>
<br>
<?php $k -> _e("intro"); ?>
<br>
<br>
</div>
<div class="col-md-3"> &nbsp; </div>
<div class="col-md-6">
  <form method="post" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
    <div class="form-group" id="id_subject">
      <label class="control-label" for="subject" id="subjectLabel">
        <?php $k->_e("subject"); ?>
      </label>
      <input type="text" class="form-control" id="subject" name="subject">
    </div>
    <div class="form-group" id="id_comment">
      <label class="control-label" for="comment">
        <?php $k->_e("description"); ?>
      </label>
      <br />
      <!-- input type="text" class="form-control" id="inputError" -->
      <textarea id="comment" name="comment" class="form-control"><?php if (ISSET($_GET['description'])) echo $_GET['description']; ?>
</textarea>
    </div>
    <div class="form-group" id="id_username">
      <label class="control-label" for="inputError">
        <?php $k->_e("username"); ?>
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
      <label class="control-label" for="categorySelect">
        <?php $k->_e("category"); ?>
      </label>
      <input type="hidden" name="categorySelect" id="categorySelect" value="" />
      <span id="categorySpan" class="text-muted"> &nbsp; </span>
      <a href="#" data-toggle="modal" data-target="#categoryModal"><?php $k->_e('select'); ?></a>
      </div>
      <div class="form-group" id="id_sources">
        <label class="control-label" for="inputError">
          <?php $k->_e("sources"); ?>
        </label>
        <input type="hidden" id="sourcesSelect" name="sourcesSelect" value ="" />
        <span id="sourcesSpan" class="hide"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </span> 
        <a href="#" data-toggle="modal" data-target="#sourcesModal"><?php $k->_e('select'); ?></a> </div>
      <div class="input-group"> <span class="input-group-addon">
        <input type="checkbox" name="doublecheck_1" onchange="validate_checkbox()" class="checkbox-inline" id="checkbox_1" />
        </span> <label for="dobulecheck" class="form-control" style="display: block;text-align: left;width: 100%; height:100%; white-space: normal;">
        <?php $k -> _e("check_1"); ?>
        </label> </div>
    <div class="input-group"> <span class="input-group-addon">
        <input type="checkbox" name="doublecheck_2" onchange="validate_checkbox()" class="checkbox-inline" id="checkbox_2" />
        </span> <label for="dobulecheck" class="form-control" style="display: block;text-align: left;width: 100%; height:100%; white-space: normal;">
        <?php $k -> _e("check_2"); ?>
      </label> </div>
      <p>&nbsp; <!-- for padding --></p>
    <div class="col-md-6">
      <input type="submit" id="btnSubmit" value="<?php $k -> _e("submit"); ?>" class="btn btn-success center-block" disabled="disabled" />
    </div>
      <div class="col-md-6">
        <input type="reset" value="<?php $k -> _e("reset"); ?>" class="btn btn-danger center-block" />
      </div>
    </div>
  </form>
  <div class="col-md-3"> &nbsp; </div>
</div>
<div class="col-md-12">
<script src="vars/js/index.js" type="text/javascript"></script>
<script src="vars/js/category.js" type="text/javascript"></script>
<script src="vars/js/sources.js" type="text/javascript"></script>
<?php $site -> gen_closing(); ?>
