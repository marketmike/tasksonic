<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Management [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmEmailManagment" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Email Management [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>{$Action} Email Address.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Email Subject :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="en_email_subject" size="40" maxlength="50" value="{$en_email_subject}" class="textbox">
					</td>
				</tr>
				<!--<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Email Subject(In Italian) :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="it_email_subject" size="40" maxlength="50" value="{$it_email_subject}" class="textbox">
					</td>
				</tr>-->
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Email Sending :</td>
					<td class="fieldLabelLeft">
						<select name="email_send" class="textbox" tabindex="14">
							{$email_List}
						</select>
					</td>
				</tr>
				<tr>
					<td class="fieldLabelRight">Email Content:</td>
					<td class="fieldLabelLeft" width="50%">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldLabelLeft" colspan="2" align="center">
						{$Page_Editor}
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmEmailManagment);">
							&nbsp;&nbsp;&nbsp;
							<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="email_id" value="{$email_id}" />
			<br>
		</td>
	</tr>
	</form>
</table>