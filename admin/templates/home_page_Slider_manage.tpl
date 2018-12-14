<table border="0" cellpadding="0" cellspacing="1" width="95%" height="97%" class="stdTableBorder">
	<form name="frmPage" action="{$smarty.server.PHP_SELF}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Home Page Slider</td>
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
						Manage image slider for the Home Page.
					</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4" align="right"><a href="{$smarty.server.PHP_SELF}?Action=Add"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0"></a>&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle" width="20%">Slide Image URL</td>
					<td class="headTitle" width="15%">Action</td>
				</tr>
				{foreach name=pageInfo from=$Options item=Page}
				<tr class="{cycle values='list_A, list_B'}">
					<td class="varnormal">&nbsp;{$Page->slide_url}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$Page->slide_id}');">&nbsp;
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
			<input type="hidden" name="slide_id">
			<input type="hidden" name="status">
		</td>
	</tr>
	</form>
</table>