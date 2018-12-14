<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Other HP Pages Manager 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmPage" action="{$A_Action}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Other HP Pages Manager </td>
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
						Manage your website static contents.
					</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4" align="right"><a href="{$smarty.server.PHP_SELF}?Action=Add"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0"></a>&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle" width="20%">Page Title</td>
					<td class="headTitle" width="45%">Page URL</td>
					<td class="headTitle" width="15%">Action</td>
				</tr>
				{foreach name=pageInfo from=$Options item=Page}
				<tr class="{cycle values='list_A, list_B'}">
					<td class="varnormal">&nbsp;{$Page->page_title}</td>
					<td class="varnormal">&nbsp;<a href="{$Site_Root}page_{$Page->page_id}.html" class="actionLink" target="_blank">{$Site_Root}page_{$Page->page_id}.html</a></td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$Page->page_id}');">&nbsp;
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$Page->page_id}');">&nbsp;
					</td>
				</tr>
				{foreachelse}
				<tr>
					<td colspan="4" class="varnormal" align="center">No static page available.</td>
				</tr>
				{/foreach}
			</table>
			<br><br>
			<input type="hidden" name="Action">
			<input type="hidden" name="pid">
			<input type="hidden" name="status">
		</td>
	</tr>
	</form>
</table>