<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" height="97%">
	<form name="frmPage" action="{$smarty.server.PHP_SELF}" method="post" enctype="multipart/form-data">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Home Page Manager [{$Action}] </td>
					<td class="pagetitle" width="50%" background="{$Templates_Image}title_bg.gif">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmPage);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="page_id" value="{$page_id}">
						<input type="hidden" name="Action" value="{$Action}">
					</td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td width="25%" class="fieldLabelRight" valign="top">Page Title :</td>
					<td width="75%" class="fieldLabelLeft"><input type="text" name="home_title" value="{$home_title}"></td>
				</tr>
			</table>
			
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldLabelRight">Page Content:</td>
					<td width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$EN_Page_Editor}
					</td>
				</tr>
			</table>

			<!--<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldLabelRight">Page Content in Italian:</td>
					<td width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$IT_Page_Editor}
					</td>
				</tr>
			</table>-->

			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmPage);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="home_id" value="{$home_id}">
						<input type="hidden" name="Action" value="{$Action}">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>