{include file="header.tpl" title={$title} type={$type} search={$search} }
<div id="primary">
    <div class="button-group" style="margin-top: 30px;">
        {section name=i loop=$button}
            <a href="{$button[i][3]}" id="{$button[i][0]}" class="{$button[i][2]}">{$button[i][1]}</a>
        {/section}
    </div>
    <hr>
    <div class="table-responsive">
        <table id="showTable" class="tablesorter">
            <thead>
            <tr>
                {section name=i loop=$thead}
                    <th>{$thead[i]}</th>
                {/section}
            </tr>
            </thead>
            <tbody>
            {section name=i loop=$tbody}
                <tr>
                    {section name=j loop=$tbody[i]}
                        <td title="{$thead[j]}">
                            {if {$type} == "ships" and $smarty.section.j.index == 1}
                                <a target="_blank"
                                   href="https://zh.moegirl.org/zh/%E8%88%B0%E9%98%9FCollection:{$tbody[i][22]}">
                                    {$tbody[i][j]}
                                </a>
                            {elseif {$type} == "equip" and $smarty.section.j.index == 1}
                                <a target="_blank"
                                   href="https://zh.moegirl.org/zh/%E8%88%B0%E9%98%9FCollection:{$tbody[i][j]}">
                                    {$tbody[i][j]}
                                </a>
                            {else}
                                {$tbody[i][j]}
                            {/if}
                        </td>
                    {/section}
                </tr>
            {/section}
            </tbody>
        </table>
    </div>
</div>
{include file="footer.tpl"}