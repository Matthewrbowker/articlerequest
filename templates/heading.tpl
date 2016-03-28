<!-- heading.tpl -->
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE>
        {$title}
    </TITLE>
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
</HEAD>
{if isset($onload)}
    <BODY {$onload}>
    {else}
    <BODY>
{/if}
<!-- echo $this->gen_navbar(); -->
{include file="navbar.tpl"}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row marketing">
                <div class="col-md-12">
                    {if $message}
                    <div class="alert alert-warning">{$messagetext}</div>
                    {/if}
                <noscript>
                    <div class="alert alert-danger">
                        {$nojavascript}
                    </div>
                </noscript>
