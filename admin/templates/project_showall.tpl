<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Task Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmProList" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="varnormal">
						Manage Task. Edit/Delete project.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmProList.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td width="3%" class="headTitle">&nbsp;</td>
					<td width="8%" align="center" class="headTitle">Task Owner</td>
					<td width="8%" align="center" class="headTitle">Tasker</td>
					<td width="15%" align="center" class="headTitle">Task</td>
					<td width="9%" align="center" class="headTitle">Status</td>
					<td width="7%" align="center" class="headTitle">Open Date</td>
					<td width="7%" align="center" class="headTitle">Closed Date</td>
					<td width="8%" align="center" class="headTitle">City</td>					
					<td class="headTitle" width="28%" align="center">Action</td>
				</tr>
				{section name=frmProList loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
				  <td width="3%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$aprolist[frmProList].id}" align="middle"></td>
					<td class="bodytextblack">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$aprolist[frmProList].auth_id_of_post_by}" class="actionLink" target="_blank">{$aprolist[frmProList].posted_by}</a></td>
					<td class="bodytextblack">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$aprolist[frmProList].auth_id_of_post_to}" class="actionLink" target="_blank">{$aprolist[frmProList].posted_to}</a></td>
					<td class="bodytextblack">&nbsp;
						{if $aprolist[frmProList].premium_project == 1}
 						   <img src="{$Templates_Image}premium_project.gif" border="0" />{$aprolist[frmProList].title|stripslashes}
						{else}
						   {$aprolist[frmProList].title|stripslashes}
						{/if}   
	   
					</td>
					<td class="bodytextblack" align="center">&nbsp;
					{if $aprolist[frmProList].project_status == 1}Open{/if}
					{if $aprolist[frmProList].project_status == 2}Awarded{/if}
					{if $aprolist[frmProList].project_status == 3}Accepted{/if}
					{if $aprolist[frmProList].project_status == 4}Closed{/if}
					{if $aprolist[frmProList].project_status == 5}Marked Closed{/if} <!--This status allows bids already placed to be selected but does not allow bidding -->
					{if $aprolist[frmProList].project_status == 6}Completed</strong>{/if} <!--Not used yet but I will plan to tie to completed date if that makes sense -->
					{if $aprolist[frmProList].project_status == 7}Failed{/if} <!--This status actually closes the project -->							
					</td>
					<td class="bodytextblack" align="center">&nbsp;{$aprolist[frmProList].project_posted_date}</td>
					<td class="bodytextblack" align="center">&nbsp;{$aprolist[frmProList].project_closed_date}</td>
					<td class="bodytextblack" align="center">&nbsp;{$aprolist[frmProList].project_city}</td>					
				    <td align="center">
						<a class="actionLink" href="{$smarty.server.PHP_SELF}?Action=View&project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}view.gif" class="imgAction" title="View" border="0" /></a>
						<a class="actionLink" href="{$smarty.server.PHP_SELF}?Action=Edit&project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" border="0" /></a>
					  	<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Mail_Click('{$aprolist[frmProList].id}');">
						<a href="view_bid_project.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}b.gif"	class="imgAction" title="Bidding on Task" border="0"></a>
						<a href="message_board.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}m.gif"	class="imgAction" title="Message Board" border="0"></a>
						<a href="private_message.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}p.gif"	class="imgAction" title="Private Messages" border="0"></a>
						<img src="{$Templates_Image}sendmail.gif" class="imgAction" title="Email Task Owner" onClick="JavaScript: Mail_Click('{$aprolist[frmProList].id}');">
				</tr>
			{/section}
			</table>
			{if $smarty.section.frmProList.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$aprolist[frmProList].id}');">
					</td>
				</tr>
			</table>
			{/if}
			{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
					<td align="right">{$Page_Link}</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="project_id" />
	</form>
</table>