<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Manager 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchUsers" action="{$smarty.server.PHP_SELF}" method="post">
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
						Manage User Accounts.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmSearchUsers.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
<!--				<tr>
					<td class="successMsg" align="center">&nbsp;{$succMessage}</td>
				</tr>
-->			</table>
			{if $errorMessage}
			   <table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
				    <td width="3%" class="headTitle"></td>
					<td class="headTitle" width="10%">User ID</td>
					<td class="headTitle" width="18%">Name</td>
					<td class="headTitle" width="12%">Country</td>
					<td class="headTitle" width="25%">Action</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="successMsg" align="center" colspan="5">&nbsp;{$errorMessage}</td>
				</tr>
				</table>
			{else}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
				    <td width="3%" class="headTitle"></td>
					<td class="headTitle" width="10%">User ID</td>
					<td class="headTitle" width="18%">Name</td>
					<td class="headTitle" width="12%">Country</td>
					
					<td class="headTitle" width="25%">Action</td>
				</tr>
				{section name=userinfo loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$user_details[userinfo].mem_email}"></td>
					<td class="varnormal">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$user_details[userinfo].user_auth_id}" class="actionLink" target="_blank">{$user_details[userinfo].user_login_id}</a></td>
					<td class="varnormal">&nbsp;{$user_details[userinfo].mem_fname}&nbsp;{$user_details[userinfo].mem_lname}</td>
					<td class="varnormal" align="center">&nbsp;{$user_details[userinfo].country_name}&nbsp;</td>
					<td align="center">
						<img src="{$Templates_Image}view.gif" class="imgAction" title="View" onClick="JavaScript: View_Click('{$user_details[userinfo].user_auth_id}');">
				</td>
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