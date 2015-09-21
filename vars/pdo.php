<?php

class wpPDO {
    private $link;
    private $resultSuccess;

    public function __construct() {
        try {
            $hostString = "mysql:host={$GLOBALS['db_host']};dbname={$GLOBALS['db_database']};charset=utf8";
            $this -> link = new PDO($hostString, $GLOBALS['db_user'],$GLOBALS['db_pass']);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this -> resultSuccess = true;
        }
        catch (PDOException $ex) {
            $this -> errorCatch($ex);
            $this -> resultSuccess = false;
        }
    }

    public function errorCatch($ex) {
        $this->errorCatchString($ex->getMessage());
    }

    public function errorCatchString($ex) {
        $this -> resultSuccess = false;

        echo "<div class=\"alert alert-danger\">An error has occured.";

        if ($GLOBALS["role"] == "test" || $GLOBALS["role"] == "staging") {
            echo "<br /><br />Error details: " . $ex[2] . "";
        }

        echo "</div>";

    }

    public function store($sSubject, $sDescription, $sCategory, $sUsername, $sSources) {

        try {
            $insertStmt = $this->link->prepare("INSERT INTO `requests` (`subject`, `Description`, `Category`, `Username`, `Sources`) VALUES(:subject, :description, :category, :username, :sources)");
            $insertStmt->bindValue(':subject', $sSubject);
            $insertStmt->bindValue(':description', $sDescription);
            $insertStmt->bindValue(':category', $sCategory);
            $insertStmt->bindValue(':username', $sUsername);
            $insertStmt->bindValue(':sources', $sSources);
            $insertStmt->execute();
        }
        catch (PDOException $ex) {
            $this -> resultSuccess = false;
            $this->errorCatch($ex);
        }
    }

    public function success() {
        return $this->resultSuccess;
    }

    public function __destruct() {
        $this->link = null;
    }
}
