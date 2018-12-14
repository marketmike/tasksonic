<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Task Search Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchproject" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task Search Management </td>
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
						Manage project Search. Edit/Delete project Search.
						  <div align="right">Page Size:
					  		<select name="page_size" onChange="JavaScript: document.frmSearchproject.submit();">
								{$PageSize_List}
					  		</select>
						  </div>
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
					<td width="12%" align="center" class="headTitle">project Post By </td>
					<td width="12%" align="center" class="headTitle">project Post To </td>
					<td width="24%" align="center" class="headTitle">project Title</td>
					<td width="10%" class="headTitle" align="center">VIP Member(?)</td>
					<td class="headTitle" width="21%" align="center">Action</td>
				</tr>
				{if $Loop >0}
				{section name=frmProList loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
				  <td width="3%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$aprolist[frmProList].id}" align="middle"></td>
					<td class="bodytextblack" width="12%">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$aprolist[frmProList].auth_id_of_post_by}" class="actionLink" target="_blank">{$aprolist[frmProList].posted_by}</a></td>
					<td class="bodytextblack" width="12%">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$aprolist[frmProList].auth_id_of_post_to}" class="actionLink" target="_blank">{$aprolist[frmProList].posted_to}</a></td>
					<td class="bodytextblack" width="24%">&nbsp;
						{if $aprolist[frmProList].premium_project == 1}
 						   <img src="{$Templates_Image}premium_project.gif" border="0" />{$aprolist[frmProList].title|stripslashes}
						{else}
						   {$aprolist[frmProList].title|stripslashes}
						{/if}   
	   
					</td>
					<td class="bodytextblack" align="center" width="10%">&nbsp;{if $aprolist[frmProList].membership_id != 0} VIP Member{else} X {/if}</td>

				    <td align="center" width="21%">
						<a class="actionLink" href="project_list.php?Action=View&project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}view.gif" class="imgAction" title="View" border="0" /></a>&nbsp;
						<a class="actionLink" href="project_list.php?Action=Edit&project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" border="0" /></a><!-- onClick="JavaScript: Edit_Click('{$aprolist[frmProList].id}');"-->&nbsp;
					  	<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$aprolist[frmProList].id}');">&nbsp;
						<a href="view_bid_project.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}edit.gif"	class="imgAction" title="Bidding on project" border="0"></a>&nbsp;
						<a href="message_board.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}edit.gif"	class="imgAction" title="Message Board" border="0"></a>&nbsp;
						<a href="private_message.php?project_id={$aprolist[frmProList].id}"><img src="{$Templates_Image}edit.gif"	class="imgAction" title="Private Messages" border="0"></a>
				</tr>
				{/section}
				{else}
				<tr>
				    <td colspan="6">&nbsp;</td>
				</tr>
				<tr>
					<td class="successMsg" align="center" colspan="6">Search not available</td>
				</tr>
				{/if}
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