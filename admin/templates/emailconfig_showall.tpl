<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Configurations Management 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmMail" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Email Configurations Management </td>
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
						Manage Email Configurations. Add/Edit/Delete Email Configurations.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmMail.submit();">
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
					<td colspan="4">{$navigationLink}</td>
				</tr>
				<tr>
					<td colspan="4" align="right"><a class="actionLink" href="{$smarty.server.PHP_SELF}?Action=Add"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0" /></a>
				<tr>
					<td width="5%" class="headTitle"></td>
					<td class="headTitle" align="center">Name </td>
					<td class="headTitle" align="center">Email Address</td>
					<td class="headTitle" width="23%" align="center">Action</td>
				</tr>
				{section name=emailadd loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$aemail[emailadd].id}" align="middle"></td>
					<td width="30%" class="bodytextblack">&nbsp;{$aemail[emailadd].title}</td>
					<td width="42%" class="bodytextblack">&nbsp;{$aemail[emailadd].emailaddress}</td>
				    <td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$aemail[emailadd].id}');">&nbsp;&nbsp;
					  	<img src="{$Templates_Image}delete.gif" 	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$aemail[emailadd].id}');">&nbsp;&nbsp;
				</tr>
			{/section}
			</table>
			{if $smarty.section.emailadd.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$aemail[emailadd].id}');">
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
	<input type="hidden" name="email_id" />
	</form>
</table>