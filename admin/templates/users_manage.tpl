<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		{$Type} User Manager
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="{$smarty.server.PHP_SELF}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">User Manager </td>
					<td class="pagetitle" width="50%" background="{$Templates_Image}title_bg.gif">&nbsp;</td>
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
						Manage Task Sonic Site Users.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmUsers.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr>
					<td class="successMsg" align="center">&nbsp;{$succMessage}</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="right" class="varnormal"> Search By User ID : &nbsp;</td>
					  <td align="left" class="varnormal"><input type="text" name="search_user"  size="40" maxlength="50" class="textbox" /></td>
				</tr>
				<tr>
					<td align="right" class="varnormal">Search By User Email-ID : &nbsp;</td>
					 <td align="left" class="varnormal"><input type="text" name="search_email"  size="40" maxlength="50" class="textbox" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" name="Submit" value="Search" class="stdButton" onclick="JavaScript: return Search(search_user.value);" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
				    <td width="3%" class="headTitle"></td>
					<td class="headTitle" width="10%">User ID</td>
					<td class="headTitle" width="18%">Name</td>
					<td class="headTitle" width="12%">Country</td>
					<td class="headTitle" width="5%">Notify</td>
					<td class="headTitle" width="5%">VIP</td>
					<td class="headTitle" width="10%">Special User(?)</td>
					<td class="headTitle" width="10%">Status</td>
					<td class="headTitle" width="25%">Action</td>
				</tr>
				{section name=userinfo loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$user_details[userinfo].mem_email}"></td>
					<td class="varnormal">&nbsp;{$user_details[userinfo].user_login_id}</td>
					<td class="varnormal">&nbsp;{$user_details[userinfo].mem_fname}&nbsp;{$user_details[userinfo].mem_lname}</td>
					<td class="varnormal" align="center">&nbsp;{$user_details[userinfo].country_name}&nbsp;</td>
					<td class="varnormal" align="center">
					{if $user_details[userinfo].mem_pro_notice==1}
						All
					{elseif $user_details[userinfo].mem_pro_notice==2}
						Area
					{elseif $user_details[userinfo].mem_pro_notice==3}	
					 None
					{/if}
					</td>
					<td class="varnormal" align="center">
					   {if $user_details[userinfo].membership_id != 0} 
					        YES
					   {else}
					        X  
					    {/if} 	 	
					</td>
					<td align="center" class="varnormal">
						<table border="0" cellpadding="1" cellspacing="1" width="95%">
							<tr>
								<td align="center" class="varnormal">
								{if $user_details[userinfo].special_user == 1}
									<strong>Yes</strong>
								{else}
									No
								{/if}
								{if $smarty.session.Admin_Perm == 'Admin'}
									{if $user_details[userinfo].special_user==1}
										(<a href="JavaScript: ToggleStatus_Click_Special('{$user_details[userinfo].user_auth_id}', '0');" class="actionLink">No</a>)
									{else}
										(<a href="JavaScript: ToggleStatus_Click_Special('{$user_details[userinfo].user_auth_id}', '1');" class="actionLink">Yes</a>)
									{/if}
								{/if}
								</td>
							</tr>
							{if $user_details[userinfo].special_user == 1}
							<tr align="left">
								<td align="left" class="varnormal">S.D :{$user_details[userinfo].special_start_date}</td>
							</tr>
							<tr align="left">
								<td align="left" class="varnormal">E.D :{$user_details[userinfo].special_end_date}</td>
							</tr>	
							{/if}
						</table>
					</td>
					<td align="center" class="varnormal">
						{if $user_details[userinfo].user_status == 1}
							<strong>Visible</strong>&nbsp;(<a href="JavaScript: ToggleStatus_Click('{$user_details[userinfo].user_auth_id}', '0');" class="actionLink">Block</a>)
						{else}
							<strong>Block</strong>&nbsp;(<a href="JavaScript: ToggleStatus_Click('{$user_details[userinfo].user_auth_id}', '1');" class="actionLink">Visible</a>)
						{/if}
					</td>
					<td align="center">
						<img src="{$Templates_Image}view.gif" class="imgAction" title="View" onClick="JavaScript: View_Click('{$user_details[userinfo].user_auth_id}');">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$user_details[userinfo].user_auth_id}');">
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$user_details[userinfo].user_auth_id}');">
						<img src="{$Templates_Image}sendmail.gif" class="imgAction" title="Send Mail" onClick="JavaScript: Mail_Click('{$user_details[userinfo].user_auth_id}');">
						<a href="view_messages.php?user_id={$user_details[userinfo].user_login_id}"><img src="{$Templates_Image}view.gif" class="imgAction" title="View Message Posted By User" border="0"></a>
						<a href="edit_seller_buyer.php?user_id={$user_details[userinfo].user_auth_id}"><img src="{$Templates_Image}view.gif" class="imgAction" title="Edit Buyer/Seller Profile Posted By User" border="0"></a>
<!--						<a class="actionLink" href="change_username.php?user_login_id={$user_details[userinfo].user_login_id}"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0" /></a>				
-->					</td>
				</tr>
				{sectionelse}
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="9" class="varnormal" align="center">There are no records found.</td>
				</tr>
				{/section}
			</table>	
			{if $smarty.section.userinfo.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}sendmail.gif" class="imgAction" title="Send Mail" onClick="JavaScript: Mail_To_ALL();">
					</td>
				</tr>
			</table>
			{/if}
						{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
			{/if}
			<br><br>
			<input type="hidden" name="Action">
			<input type="hidden" name="user_auth_id">
			<input type="hidden" name="status">
			<input type="hidden" name="yes_no">
		</td>
	</tr>			

	</form>
</table>