<?php
require('includes.php');

try {
    $con = new config();

    $k = new translate($con);

    $site = new site($con, $k, "view");

    if (isset($_GET['id'])) $txt = $_GET['id'];
    else throw new arException("Error getting proper ID");
}
catch (arException $ex) {
    $ex->renderHTML();
}

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
