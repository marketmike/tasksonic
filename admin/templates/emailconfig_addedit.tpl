<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Configurations [ {$Action} ]
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
					<td class="pagetitle" width="49%" height="25">Email Configurations [ {$Action} ]</td>
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
			{if $Action=='Edit'}
			    <tr>
					<td class="fieldlabelRight" valign="top" width="30%">Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="title"  value="{$email_title}" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Email Address :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="mail_address" size="40" maxlength="50" value="{$email_address}" class="textbox">
					</td>
				</tr>
			{else}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="title_name" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Email Address :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="email_address" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
			{/if}
				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmMail);">
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