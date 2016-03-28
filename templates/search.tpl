{$info}

<form action="search.php" method="GET">
    <div class="text-center">
        <label for="q">{$label}</label> <input type="text" name="q" id="q" value="{$q}" class="input-xxlarge" />

        {if $adv}
            {$category}
        {/if}

        <table style="width:100%;">
            <tr>
                <td>
                    <input type="reset" value="{$resetBtn}" class="btn btn-danger" />
                </td>
                <td>
                    <input type="submit" id="submit" value="{$searchBtn}" class="btn btn-success" />
                </td>
            </tr>
        </table>

    {if $q != ""}
        Results for {$q} here!
    {/if}

    </div>

</form>