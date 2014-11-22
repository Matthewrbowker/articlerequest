<?php

class wpPDO {
	private $link;
	private $resultSuccess;

	function __construct() {
		try {
			$this -> link = new PDO('mysql:host=localhost;dbname=articlerequest;charset=utf8', 'root', '');
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this -> resultSuccess = true;
		}
		catch (PDOException $ex) {
			$this -> errorCatch($ex);
			$this -> resultSuccess = false;
		}
	}

	function errorCatch($ex) {
		$this -> resultSuccess = false;

		require('config.inc.php');

		echo "<div class=\"alert alert-danger\">An error has occured.";

		if ($dev) {
			echo "<br /><br />Error details: " . $ex->getMessage() . "";
		}

		echo "</div>";
	}

	function errorCatchString($ex) {
		$this -> resultSuccess = false;

		require('config.inc.php');

		echo "<div class=\"alert alert-danger\">An error has occured.";

		if ($dev) {
			echo "<br /><br />Error details: " . $ex[2] . "";
		}

		echo "</div>";

	}

	function store($sSubject, $sDescription, $sCategory, $sUsername, $sSources) {

		try {
			//$num = $this->link->query("SELECT 'id' from 'requests' where 1;")->rowCount();
			//echo $num;
			$sql="SELECT count(*) FROM requests WHERE 1 ";
			$result = $this->link->query($sql) or $this->errorCatchString($this->link->errorInfo() );
			$row = $result->fetch(PDO::FETCH_NUM);
			$num = $row[0];

			$num = $num + 1;

			$insertStmt = $this->link->prepare("INSERT INTO `requests` (`id`, `subject`, `Description`, `Category`, `Sub-Category`, `Sub-Sub-Category`, `Username`, `Sources`) VALUES(:id, :subject, :description, :category, :subcategory, :subsubcategory, :username, :sources)");
			$insertStmt->bindValue(':id', $num);
			$insertStmt->bindValue(':subject', $sSubject);
			$insertStmt->bindValue(':description', $sDescription);
			$insertStmt->bindValue(':category', $sCategory);
			$insertStmt->bindValue(':subcategory', $sSubCategory);
			$insertStmt->bindValue(':subsubcategory', $sSubSubCategory);
			$insertStmt->bindValue(':username', $sUsername);
			$insertStmt->bindValue(':sources', $sSources);
			$insertStmt->execute();
		}
		catch (PDOException $ex) {
			$this -> resultSuccess = false;
			$this->errorCatch($ex);
		}

		//$this->link->prepare(INSERT INTO `messages` (name, email, subject, message) VALUES (':name', ':email', '$subj', '$msg');")
	}

	function get($target = "", $id = "") {
		if ($target == "rd"){
			$table = "";
		}
	}

	function success() {
		return $this->resultSuccess;
	}

	function __destruct() {
		$this->link = null;
	}
}