<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Message_Board} ({$citycurrent})</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">{$lang.Message_Board2}</label>
				</div>
			</div>
			<div class="clear"></div>			
			<div class="clear"></div>
			<div class="body_shim">
				<div class="clear"></div>
					  <table width="100%"  border="0" align="center">
					  
						{if $Loop1 > 0}
						 <tr>
						  <td colspan="2">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
						  	<tr>
								<td align="left" class="tbheadinng" width="60%" height="20"><strong>Task Name</strong></td>
								<td align="center" class="tbheadinng" width="15%"><strong>Messages</strong></td>
								<td align="center" class="tbheadinng" width="25%"><strong>Action</strong></td>
							</tr>
							  
							  {section name=project_name loop=$Loop1}
							  <tr class="{cycle values='list_A, list_B'}">
								<td align="left" class="bodytextblack" width="60%" height="20">&nbsp;&nbsp;<span class="span_title"><a href="task_{$post_project[project_name].id}_{$post_project[project_name].clear_title}.html" class="footerlinkcommon2">{$post_project[project_name].project_Title|stripslashes}</a></span></td>
								<td align="center" class="bodytextblack" width="15%"><strong>{$post_project[project_name].message_count}</strong></td>
								<td align="center" class="bodytextblack" width="25%"><div class="button-no" style="margin-top:10px"><a href="#" onclick="JavaScript: popupWindowURL('message_board.php?project_id={$post_project[project_name].id}&project_creator={$post_project[project_name].task_owner}&id=4&pop_up=true','','650','500','','true','true');" class="footerlinkcommon2">{$lang.Click_Message_Board}</a></div></td>
							  </tr>
							  {/section}
							</table></td>
						</tr>
					  {else}
							<tr>
								<td align="center" class="successMsg">{$lang.Msg}</td>
							</tr>
						{/if}
					  </table>
				<div class="clear"></div>
			<div><ul class="paginator">{$Page_Link}</ul></div>
		   </div>
		   <div class="clear"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>			
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>			
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->