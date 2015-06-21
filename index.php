<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,"");

$site = new site();

$site -> gen_opening($k, "");

$db = new wpPDO();

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
        <?php

$opt=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

if ($GLOBALS["role"] == "test") $url = "{$GLOBALS['url']}/index.php?title=Article_request/category&action=raw";
else if ($GLOBALS["role"] == "staging") $url="{$GLOBALS['url']}/User:Matthewrbot/Config/1/category/dev?action=raw";
else $url = "{$GLOBALS['url']}/User:Matthewrbot/Config/1/category?action=raw";

$values = parse_ini_string(file_get_contents($url), TRUE);

// Small function to quickly fix the category names-
function parseCatName($string) {
	$string = str_replace(" ", "_", $string);
	$string = str_replace("&", "&amp;", $string);
	return $string;
}
?>
        <form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()">
          <input type="hidden" name="category"  id="category" value="" />
          <input type="hidden" name="subcategory" id="subcategory" value="" />
          <input type="hidden" name="subsubcategory" id="subsubcategory" value="" />
          <h3 class="text-muted hide" id="text_cat">
            <?php $k->_e("cat"); ?>
            <span id="catStore">
            <input type="button" name="catStoreBtn" id="catStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span><!--input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" /--></h3>
          <h3 class="text-muted hide" id="text_scat">
            <?php $k->_e("subcat"); ?>
            <span id="scatStore">
            <input type="button" name="scatStoreBtn" id="scatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span><!-- input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" / --></h3>
          <h3 class="text-muted hide" id="text_sscat">
            <?php $k->_e("subsubcat"); ?>
            <span id="sscatStore">
            <input type="button" name="sscatStoreBtn" id="sscatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span><!-- input type="button" name="catEditBtn" value="Edit Category" class="btn btn-warning" / --></h3>
          <?php

$catBuffer = "<div class='well' id='well_cat'>\r\n";
$catBuffer .= "<h3>";
$catBuffer .= $k->_r("cat");
$catBuffer .= "</h3>\r\n";


//Initialize the other ones.
$subCatBuffer = "";
$subSubCatBuffer = "";

foreach(array_keys($values) as $key1) {
	$key1 = trim($key1);
	$key1_u = parseCatName($key1);
	$catBuffer .= "<input type='button' name='btn_category_{$key1_u}' value='{$key1}' class='btn btn-info'  onClick=\"onClickCategory('cat','{$key1}');\" /><br />\r\n"; //onClick='set(\"cat\", \"{$key1_u}\")'
	
	// Sub Category Stuff now
	$subCatBuffer .= "<div class='well hide' id='well_sub_{$key1_u}'>\r\n";
	$subCatBuffer .= "<h3>";
	$subCatBuffer .= $k->_r("subcat");
	$subCatBuffer .= "</h3>\r\n";

	foreach(array_keys($values[$key1]) as $key2) {
		$key2 = trim($key2);
		$key2_u = parseCatName($key2);
		$subCatBuffer .= "<input type='button' name='btn_sub_{$key2_u}' value='{$key2}' class='btn btn-info' onClick='set(\"scat\", \"{$key2_u}\", \"{$key1_u}\")' /><br />\r\n";

		$subSubCatBuffer .= "<div class='well hide' id='well_subsub_{$key2_u}'>\r";
		$subSubCatBuffer .= "<h3>";
		$subSubCatBuffer .= $k->_r("subsubcat");
		//$subSubCatBuffer .= "<span id=\"sscatStore\"></span>";
		$subSubCatBuffer .= "</h3>\r\n";		
		foreach(explode(";", $values[$key1][$key2]) as $key3) {
			$key3 = trim($key3);
			if ($key3 == "") {$key3 = "other"; }
			$key3_u = parseCatName($key3);
			$subSubCatBuffer .= "<input type='button' name='btn_sub_sub_{$key3_u}' value='{$key3}' class='btn btn-info' onClick='set(\"sscat\", \"{$key3_u}\" , \"{$key2_u}\")' /><br />\r\n";
		}
		$subSubCatBuffer .= "</div>\r\n\r\n";
	}
	$subCatBuffer .= "</div>\r\n\r\n";
}
$catBuffer .= "</div>";

?>
          <?php echo $catBuffer; ?> <?php echo $subCatBuffer; ?> <?php echo $subSubCatBuffer; ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
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
      <div class="modal-body">
        <div class="panel panel-warning">
          <div class="panel-heading"> Add another source: </div>
          <div class="panel-body">
            <center>
              <?php
			foreach (array_keys($values) as $one) {
				echo "<input type=\"button\" name=\"sources_{$values[$one]['shorthand']}_add\" value=\"{$values[$one]['label']}\" class=\"btn btn-warning\" onClick=\"addSource('{$values[$one]['shorthand']}')\" />\r\n";
			}
			?>
            </center>
          </div>
        </div>
        <hr />
        <div id="sources_container"> Here's the sources you have so far: </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- script src="vars/validate.js" type="text/javascript"></script -->

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
      <label class="control-label" for="subject">
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
    <div class="form-group" id="id_category">
      <label class="control-label" for="categorySelect">
        <?php $k->_e("category"); ?>
      </label>
      <input type="hidden" name="categorySelect" id="categorySelect" value="" />
      <!--a href="category.php" target=_new>[Select]</a --> 
      <span id="categorySpan" class="text-muted"> &nbsp; </span> 
      <!-- a href="category.php" onclick="javascript:void window.open('category.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a --> 
      <a href="#" data-toggle="modal" data-target="#categoryModal">[Select]</a>
      <div class="form-group" id="sources">
        <label class="control-label" for="inputError">
          <?php $k->_e("sources"); ?>
        </label>
        <input type="hidden" id="sourcesSelect" name="sourcesSelect" value ="" />
        <span id="sourcesSpan" class="hide"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </span> 
        <!-- a href="sources.php" onclick="javascript:void window.open('sources.php','1395353426095','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">[Select]</a --> 
        <a href="#" data-toggle="modal" data-target="#sourcesModal">[Select]</a> </div>
      <div class="input-group"> <span class="input-group-addon">
        <input type="checkbox" name="doublecheck" onchange="validate_checkbox()" class="checkbox-inline" id="checkbox" />
        </span> <label for="dobulecheck" class="form-control" style="display: block;text-align: left;width: 100%; height:100%; white-space: normal;">
        <?php $k -> _e("check"); ?>
        </label> </div>
      <p>&nbsp; <!-- for padding --></p>
      <div class="col-md-6">
        <input type="reset" value="<?php $k -> _e("reset"); ?>" class="btn btn-danger center-block" />
      </div>
      <div class="col-md-6">
        <input type="submit" id="btnSubmit" value="<?php $k -> _e("submit"); ?>" class="btn btn-success center-block" disabled="disabled" />
      </div>
    </div>
  </form>
  <div class="col-md-3"> &nbsp; </div>
</div>
<div class="col-md-12">
<script src="res/js/jquery-2.1.3.js" type="text/javascript"></script> 
<script src="res/js/bootstrap.js" type="text/javascript"></script> 
<script src="vars/js/category.js.php" type="text/javascript"></script> 
<script src="vars/js/sources.js.php" type="text/javascript"></script> 
<!-- script src="vars/js/index.js" type="text/javascript"></script -->
<?php $site -> gen_closing($k); ?>
