<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Membership Management [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmMemberShip" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Membership Management [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>{$Action} Membership.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
			{if $Action=='Edit'}
			    <tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Name :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_name" value="{$membership_name}"size="40" maxlength="50" class="textbox" tabindex="1">					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Time :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_time"  value="{$membership_time}" size="40" maxlength="50" class="textbox" tabindex="2">&nbsp;&nbsp;(in months)					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Fees :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_fee" value="{$membership_fee}" size="40" maxlength="50" class="textbox" tabindex="3">					</td>
				</tr>
			{else}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Name :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_name" size="40" maxlength="50" class="textbox" tabindex="1">					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Time :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_time" size="40" maxlength="50" class="textbox" tabindex="2">&nbsp;&nbsp;(in months)					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Fees :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="membership_fee" size="40" maxlength="50" class="textbox" tabindex="3">					</td>
				</tr>
			{/if}
			   <tr>
					<td class="fieldlabelRight" valign="top" width="30%">Membership Visible :</td>
					<td class="fieldLabelLeft">
						<input type="checkbox" name="membership_status" value="1" class="stdCheckBox" {$membership_status}>
					</td>
				</tr>
				<tr>
				  <td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmMemberShip);" tabindex="4">
				    &nbsp;&nbsp;&nbsp;
				    <input type="submit" name="Submit2" value="Cancel" class="stdButton" tabindex="5" /></td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="membership_id" value="{$membership_id}" />
			<br>
		</td>
	</tr>
	</form>
</table>