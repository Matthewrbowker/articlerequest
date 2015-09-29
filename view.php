<?php
require('includes.php');

if (ISSET($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
else $lang = 'en';

if (isset($_GET['id'])) $txt = $_GET['id'];
else die("Error getting proper ID");

$k = new translate($lang, "view"); 

$site = new site($k, "view");

$site ->gen_opening();

# URL that generated this code:
# http://txt2re.com/index-php.php3?s=rd-1&4&-9&2

//$txt='ar-1000';

$re1 = '((?:[a-z][a-z]+))'; # Word 1
$re2 = '(-)'; # Any Single Character 1
$re3 = '(\\d+)'; # Integer Number 1
if ($c = preg_match_all("/" . $re1 . $re2 . $re3 . "/is", $txt, $matches)) {
    $word1 = $matches[1][0];
    $c1 = $matches[2][0];
    $int1 = $matches[3][0];
}

$word1 = strtolower($word1);
  
print "($word1) ($c1) ($int1) \n";
  
$site ->gen_closing();
