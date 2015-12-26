<?php

class arException extends exception {
    public function renderHTML() {
        echo <<<END
<HTML>
<HEAD>
<TITLE>{$this->getMessage()}</TITLE>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      </style>
<BODY>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row marketing">
      <div class="col-md-12">
END;
        $this->renderBanner();
        if ($GLOBALS["role"] == "staging" || $GLOBALS["role"]== "test" || $GLOBALS["role"] == "autotest") {
            echo "<pre>";
            echo $this->getTraceAsString();
            echo "</pre>";
        }
        $url = "https://phabricator.wikimedia.org/maniphest/task/create/";
        $urlTitle = urlencode("{$this->getMessage()}");
        $urlAssigned = urlencode("matthewrbowker");
        $urlPriority = urlencode("75");
        $urlProject = urlencode("Tool-labs-tools-article-request");
        $urlDescription = urlencode("An error occured in Article Request: Line {$this->getLine()}: {$this->getMessage()}\r\n\r\n```\r\n{$this->getTraceAsString()}\r\n```");
        echo <<<END
        If you continue seeing this error, please
        <a href='$url?title=$urlTitle&assign=$urlAssigned&priority=$urlPriority&projects=$urlProject&description=$urlDescription' target=_blank>Report it to Phabricator</a>
        (requires a phabricator account).
      </div>
    </div>

    </div> <!-- /col-md-10 -->

    </div>

    </div> <!-- /container -->
</BODY>
</HTML>
END;
        if ($GLOBALS["role"] != "autotest") {die(1);}
        else {die(0);}

    }

    public function renderBanner() {
        echo "<div class=\"alert alert-danger\">\r\nLine {$this->getLine()} - {$this->getMessage()}</div>";

    }
}