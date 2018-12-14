<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Manager [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">User Manager [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td colspan="4" align="left">
                      <input type="submit" name="Submit" value="Send" class="stdButton" onClick="Javascript: return Check_Details(this.form);">
					  &nbsp;
					  <input type="submit" name="Submit" value="Back" class="stdButton">
					  </td>
				</tr>
				<tr>
					<td width="23%" valign="top" class="fieldlabelRight">UserID :</td>
					<td width="77%" valign="top" class="fieldlabelLeft">{$user_mail_id} </td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Subject :</td>
					<td class="fieldlabelLeft" valign="top"> <input type="text" name="subject" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Content :</td>
					<td class="fieldlabelLeft" valign="top"> <textarea name="content" cols="50" rows="5"></textarea></td>
				</tr>
				<tr>
					<td colspan="4" align="left"><input type="submit" name="Submit" value="Send" class="stdButton" onClick="Javascript: return Check_Details(this.form);">
                      &nbsp;
					  <input type="submit" name="Submit" value="Back" class="stdButton">
					  </td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="user_mail_id" value="{$user_mail_id}"/>
			<br>
		</td>
	</tr>
	</form>
	</table>