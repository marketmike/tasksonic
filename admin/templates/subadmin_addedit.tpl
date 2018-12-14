<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Sub Admin Management [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSubadmin" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Sub Admin Management [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>{$Action} SubAdmin.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">User Login Id :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="user_login_id" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Password :</td>
					<td class="fieldLabelLeft">
						<input type="password" name="user_passwd" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
				<tr>
					<td width="50%" colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmSubadmin);">
							&nbsp;&nbsp;&nbsp;
							<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<br>
		</td>
	</tr>
	</form>
</table>