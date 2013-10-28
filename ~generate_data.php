<?php

$f = fopen('data.txt',r);
$cur = 0;
$dataold = file_get_contents("data.txt");

$data = explode("\n",$dataold);
sort($data);

echo "document.mainform.subsubcat.options[0] = new Option(\"Please choose one\",\"none\", true, false);<br>";
while ($cur < count($data)) {
	$data[$cur] = trim($data[$cur]);
	$one = $data[$cur];
	$two = $data[$cur];
	$two = strtolower($two);
	$two = str_replace(' ','-',$two);
	$two = str_replace(',','',$two);
	$cur++;
	echo "document.mainform.subsubcat.options[$cur] = new Option(\"$one\",\"$two\", false, false);<br>";
}