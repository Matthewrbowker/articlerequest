<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

$k = new translate($lang,$dev,"");

$site = new site($dev);

$site -> gen_opening($k -> returnKeys());

$db = new wpPDO();

?>
<noscript>
	<div class="alert alert-danger">
		<?php echo $k -> _e("no-javascript"); ?>
	</div>
</noscript>

<script src="categories.php"></script>

<br>

<?php echo $k -> _e("intro"); ?>
<br>
<br>

<div class="form">
	<form method="post" action="result.php" name="mainform" onsubmit="return validate();" onreset="resetform();">
		<table style="width: 100%">
			<tr>
				<td>
					<?php echo $k -> _e("subject") ?></div>
				</td>
				<td>
					<input type="text" name="subject" <?php if (ISSET($_GET['subject'])) echo "value=\"{$_GET['subject']}\" "; ?> class="form-control input-sm" />
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $k -> _e("description"); ?>
				</td>
				<td>
					<textarea name="comment" class="form-control"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<div id="category1" class="black"><i class="icon-star"></i> 
						<?php echo $k -> _e("category"); ?></div>
					</td>
					<td>
						<!-- TODO: Convert to PHP - read array from Wikipedia -->
						<select name="category" onchange="parseform();" class="form-control">
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
						<div id="subcat1" class="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i> 
							<?php echo $k -> _e("sub-category"); ?></div>
						</td>
						<td>
							<div id="subcat2" class="hidden"><select name="subcat" onchange="parseform();" class="form-control" >
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="subsubcat1" class="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i> 
							<?php echo $k -> _e("sub-sub-category"); ?></div>
						</td>
						<td>
							<div id="subsubcat2" class="hidden"><select name="subsubcat" class="form-control">
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $k -> _e("username"); ?>
					</td>
					<td>
						<input type="text" name="username" onblur="checkusername()" class="form-control input-sm" /><div id="unameinfo"> </div>
					</td>
				</tr>
				<tr>
					<td>
						<i class="icon-star"></i> 
						<?php echo $k -> _e("sources"); ?>
					</td>
					<td>
						<textarea name="sources" class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="doublecheck" onchange="checkbox()" class="checkbox-inline"> <!-- I affirm that the article I'm submitting for creation follows all of Wikipedia's guidelines.<br>I've checked <a href="http://en.wikipedia.org/wiki/Wikipedia:Requested_articles" target=_blank>the request list</a> and I'm not submitting a duplicate.-->
							</span>
							<span class="form-control">
								<?php echo $k -> _e("check"); ?>
							</span>
						</div>
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