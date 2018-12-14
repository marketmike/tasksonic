<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" height="97%">
	<form name="frmPage" action="{$smarty.server.PHP_SELF}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Home Page Content</td>
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
						Design your content. When you finish click <b>Save</b> to save the changes.
						Click <b>Cancel</b> to discard the changes.
					</td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="home_id" value="{$home_id}">
						<input type="hidden" name="Action" value="Edit">
					</td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldLabelRight">Page Content in English:</td>
					<td width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$En_Page_Editor}
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldLabelRight">Page Content in Gujarati:</td>
					<td width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$Gu_Page_Editor}
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="page_id" value="{$page_id}">
						<input type="hidden" name="Action" value="{$Action}">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>