<?php

class Category {
	private $values;

	function __construct() {


		if ($GLOBALS["role"] == "test") $url = "{$GLOBALS['url']}/index.php?title=Article_request/category&action=raw";
		else if ($GLOBALS["role"] == "staging") $url="{$GLOBALS['url']}/User:Matthewrbot/Config/1/category/dev?action=raw";
		else $url = "{$GLOBALS['url']}/User:Matthewrbot/Config/1/category?action=raw";

		$this->values = parse_ini_string(file_get_contents($url), TRUE);
	}

	function __destruct() {
		unset($this->values);

	}

	function getCat() {
		//This is going to return them...
		return $this->values;
	}

	function echoCat() {
		// And this echos them for direct insertion into a form
		foreach (array_keys($this->values) as $value) {
			$formValue = str_replace(" ", "_", $value);
			echo "<option value = '{$formValue}'>{$value}</option>\r";
		}
	}

	function echoJavascript() {
		//This is for all of the Javascript!  
	}

	function echoSubJavascript() {
		//Only the sub-categories and sub-sub-categories are echoed here.
	}

	function echoValues() {

		echo "<pre>";
		$count1 = 1; //Because box 0 is blank

		foreach(array_keys($this->values) as $key1) {
			$key1 = trim($key1);
			echo "$count1: $key1\r";
			$count2 = 1;
			foreach(array_keys($this->values[$key1]) as $key2) {
				$key2 = trim($key2);
				echo "\t$count2: $key2\r";
				$count3 = 1;
				foreach(explode(";", $this->values[$key1][$key2]) as $key3) {
					$key3 = trim($key3);
					if ($key3 == "") {$key3 = "other"; }
					echo "\t\t$count3: $key3\r";
					$count3++;
				}	
				$count2++;
			}
			$count1++;
		}

		echo "</pre>";
	}
}