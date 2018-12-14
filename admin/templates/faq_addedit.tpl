<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		FAQ Pages Manager [{$Action}]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmFaq" action="{$smarty.server.PHP_SELF}" method="post" enctype="multipart/form-data">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">FAQ Pages Manager [{$Action}] </td>
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
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmPage);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="faq_id" value="{$faq_id}">
						<input type="hidden" name="Action" value="{$Action}">
					</td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td width="25%" class="fieldLabelRight" valign="top">FAQ Question :</td>
					<td width="75%" class="fieldLabelLeft"><input type="text" name="faq_title" value="{$faq_title}" style="width:500px;"></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="25%">Status:</td>
					<td class="fieldLabelLeft">
					<input class="textbox" type="checkbox" name="status" value="1" {if $status ==1}checked{/if}/>&nbsp;Check to mark as active
					</td>
				</tr>				
			</table>
			
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldLabelLeft" colspan="2">FAQ Content :</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$EN_FAQ_Editor}
					</td>
				</tr>
			</table>

			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmFaq);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="faq_id" value="{$faq_id}">
						<input type="hidden" name="Action" value="{$Action}">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>