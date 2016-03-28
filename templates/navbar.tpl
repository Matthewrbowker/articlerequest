<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand{if $page == 'index' || $page == ""} active{/if}"><span class="glyphicon glyphicon-home"></span> {$title}</a>
        </div>
        <div class="navbar=collapse navbar-right">
            <ul class="nav navbar-nav">
                {foreach from=$navsRight item=item}
                    <li{if $page == $item[0]} class="active"{/if}><a href="{$item[0]}.php">{$item[1]}</a></li>";
                {/foreach}
            </ul>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {foreach from=$navs item=item}
                    <li{if $page == $item[0]} class="active"{/if}><a href="{$item[0]}.php">{$item[1]}</a></li>";
                {/foreach}
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>