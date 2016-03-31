
<div class="alert alert-{$alertDiv}">{$alertMessage}</div>

{if ($showMsg)}
    {$devMsg}
    <ul>
        {foreach from=$request key=key item=item}
            <li>{$key} = {$item}</li>
        {/foreach}
    </ul>
{/if}

<a href="{$url}" class="btn btn-{$alertDiv} center-block">{$buttonMsg}</a>