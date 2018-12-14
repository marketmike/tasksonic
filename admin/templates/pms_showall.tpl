<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		PM Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmNewPm" action="{$A_Action}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">PM Management </td>
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
						Manage PM. Add/Edit/Delete PM.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmNewPm.submit();">
							{$PageSize_List}
					  </select></div>
				  </td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="90%">
				<tr>
					<td class="headTitle" align="center" width="38%">Send by User </td>
					<td class="headTitle" align="center" width="38%">Send to User </td>
					<td class="headTitle" width="24%" align="center">Action</td>
				</tr>
				{section name=bad loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack" align="center">{$arr_bid[bad].sender_login_id}</td>
					<td class="bodytextblack" align="center">{$arr_bid[bad].recevier_login_id}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$arr_bid[bad].id}','{$arr_bid[bad].project_id}');">&nbsp;&nbsp;
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
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="pm_id" />
</form>
</table>