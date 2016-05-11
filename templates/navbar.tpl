<!-- BEGIN: navbar.tpl -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> {$title}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {foreach from=$navs item=item}
                    <li{if $page == $item[0]} class="active"{/if}><a href="{$item[0]}">{$item[1]}</a></li>
                {/foreach}
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- END: navbar.tpl -->