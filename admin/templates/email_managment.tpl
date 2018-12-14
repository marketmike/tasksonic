<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Management	
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmEmailManagment" action="{$smarty.section.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Email Management </td>
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
						Manage Email. Edit Email.
						<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmEmailManagment.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr>
					<td height="2">&nbsp;</td>
				</tr>
				<tr>
					<td height="2" align="center"><font size="+1">
If you want to change any email-template here than please contact technical team. Please do not try yourself.</font></td>
				</tr>
				<tr>
					<td height="2">&nbsp;</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="2" align="right">
					</td>
				</tr>
				<tr>
					<td class="headTitle"  width="50%" >Name </td>
					<td class="headTitle"   align="center">Email Send </td>
					<td class="headTitle"  >Action</td>
				</tr>
				{section name=emailmagamant loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="50%" class="bodytextblack">&nbsp;{$memail[emailmagamant].en_sub}</td>
					<td class="bodytextblack">&nbsp;{$memail[emailmagamant].emailsend}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$memail[emailmagamant].id}');">&nbsp;&nbsp;
					</td>	
				</tr>
				{/section}
			</table>
			{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
			{/if}
	 	  </td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="email_id" />
	</form>
</table>