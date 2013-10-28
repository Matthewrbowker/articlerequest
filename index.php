<?php
require('includes.php');

if (ISSET($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

$k = new translate("en",$dev,"");

$site = new site($dev);

$site -> gen_opening($k -> returnKeys());

?>
<noscript>
<div class="alert alert-error"><?php echo $k -> _e("no-javascript"); ?></div>
</noscript>

<script src="categories.js"></script>

<br>

<?php echo $k -> _e("intro"); ?>
<!-- If you would like to request an article be written on the English Wikipedia, please fill out the information below.  Fields with a <i class="icon-star"></i> are required. -->
<br>
<br>

<div class="form">
<form method="get" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
<table style="width: 100%">
<tr>
<td>
<div id="subject" class="black"><i class="icon-star"></i><!-- Subject (topic) of the article : --> <?php echo $k -> _e("subject") ?></div>
</td>
<td>
<input type="text" name="subject" />
</td>
</tr>
<tr>
<td>
<?php echo $k -> _e("description"); ?>
</td>
<td>
<textarea name="comment">
</textarea>
</td>
</tr>
<tr>
<td>
<div id="category1" class="black"><i class="icon-star"></i> 
<?php echo $k -> _e("category"); ?></div>
</td>
<td>
<!-- TODO: Convert to PHP - read array from Wikipedia -->
<select name="category" onchange="parseform();">
<option value="none">Please choose one</option>
<option value="Applied_arts_and_sciences">Applied arts and sciences</option>
<option value="Arts_and_entertainment">Arts and entertainment</option>
<option value="Biography">Biography</option>
<option value="Business_and_Economics">Business and economics</option>
<option value="Mathematcis">Mathematics</option>
<option value="Music">Music</option>
<option value="Natural_sciences">Natural sciences</option>
<option value="Philosophy">Philosophy</option>
<option value="Social_sciences">Social sciences</option>
<option value="Sport">Sport</option>
</select>
</td>
</tr>

<tr>
<td>
<div id="subcat1" class="hidden"><i class="icon-star"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- img src="../images/sublevel.jpg" alt="dots" --><i class="icon-chevron-right"></i> 
<?php echo $k -> _e("sub-category"); ?></div>
</td>
<td>
<div id="subcat2" class="hidden"><select name="subcat" onchange="parseform();">
</select>
</div>
</td>
</tr>
<tr>
<td>
<div id="subsubcat1" class="hidden"><i class="icon-star"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- img src="../images/sublevel.jpg" alt="dots" --><i class="icon-chevron-right"></i> 
<?php echo $k -> _e("sub-sub-category"); ?></div>
</td>
<td>
<div id="subsubcat2" class="hidden"><select name="subsubcat">
</select>
</div>
</td>
</tr>
<tr>
<td>
<?php echo $k -> _e("username"); ?>
</td>
<td>
<input type="text" name="username" onblur="checkusername()"><div id="unameinfo"> </div>
</td>
</tr>
<tr>
<td>
<i class="icon-star"></i> 
<?php echo $k -> _e("sources"); ?>
</td>
<td>
<textarea name="sources">
</textarea>
</td>
</tr>
<tr>
<td colspan="2">
<i class="icon-star"></i> <input type="checkbox" name="doublecheck" onchange="checkbox()"> <!-- I affirm that the article I'm submitting for creation follows all of Wikipedia's guidelines.<br>I've checked <a href="http://en.wikipedia.org/wiki/Wikipedia:Requested_articles" target=_blank>the request list</a> and I'm not submitting a duplicate.-->
<?php echo $k -> _e("check"); ?>
</td>
</tr>
<tr>
<td>
<p style="text-align: center">
<input type="reset" value="<?php echo $k -> _e("reset"); ?>" class="btn btn-danger" />
</p>
</td>
<td>
<p style="text-align: center">
<input type="submit" id="submit" value="<?php echo $k -> _e("submit"); ?>" class="btn btn-success" disabled/>
</p>
</td>
</tr>
</table>
</form>
</div>
<? $site -> gen_closing(); ?>