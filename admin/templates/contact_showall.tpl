<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Contact Us Management				
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmContactUs" action="{$smarty.section.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Contact Us Management </td>
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
						Manage Contact Us. View/Update Status/Delete Contacts.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmContactUs.submit();">
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
					<td width="3%" class="headTitle"></td>
					<td class="headTitle" width="20%">User Name </td>
					<td class="headTitle" width="20%">Subject </td>
					<td class="headTitle" width="20%">Reason </td>
					<td class="headTitle" width="30%">Action</td>
					
				</tr>
				{section name=contact loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$arr_contact[contact].contact_id}"></td>
					<td class="bodytextblack">&nbsp;{$arr_contact[contact].user_name}</td>
					<td class="bodytextblack">&nbsp;{$arr_contact[contact].contact_subject}</td>
					<td class="bodytextblack">&nbsp;{$arr_contact[contact].contact_reason}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$arr_contact[contact].contact_id}');">&nbsp;&nbsp;
					  	<img src="{$Templates_Image}delete.gif"	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$arr_contact[contact].contact_id}');">&nbsp;&nbsp;</td>
				</tr>
				{sectionelse}
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="4" align="center" class="bodytextblack">No Contact Us inserted yet.</td>
				</tr>
				{/section}
			</table>
			{if $smarty.section.contact.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click();">
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
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="contact_id" />
	</form>
</table>