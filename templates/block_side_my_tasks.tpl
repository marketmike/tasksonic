{if $Loop1>0}
<div class="right-column-wrap">
<h3>My Open Tasks</h3>
<div style="padding:5px;font-weight:bold;">
<div style="float:right;margin-right:0px;width:60px;text-align:center;">Ave. Bid</div>
</div>
{section name=project_name loop=$Loop1}
<div class="{cycle values='list_D,list_C'}" style="padding:5px;font-weight:bold;">
<div style="float:left;min-height:24px;height:auto;width:210px;border:1px dotted #436200;padding:5px;"><a href="task_{$post_project[project_name].id}_{$post_project[project_name].clear_title}.html" class="footerlinkcommon2">{$post_project[project_name].project_Title|stripslashes}</a></div><div style="float:left;margin-left:5px;background:#436200;color:#fff;font-weight:bold;line-height:30px;font-size:14px;height:30px;width:40px;text-align:center;">{$lang_common.Curreny}&nbsp;{$post_project[project_name].bid}</div>
<div class="clear"></div>
</div>
{/section}
</div>
{/if}			