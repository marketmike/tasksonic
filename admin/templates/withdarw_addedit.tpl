<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Withdraw Money [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmwithdrawl" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Withdraw Money [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>{$Action} Withdraw Money.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">User Name :</td>
					<td class="fieldLabelLeft">{$user_name}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">User's Paypal EmailAddress :</td>
					<td class="fieldLabelLeft">{$paypal_email}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Amount Requested :</td>
					<td class="fieldLabelLeft"><span class="fieldlabelLeft">$</span>&nbsp;{$amount}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Amount to Paid :</td>
					<td class="fieldLabelLeft"><span class="fieldlabelLeft">$</span>&nbsp;{$amount_rec}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Requested Date :</td>
					<td class="fieldLabelLeft">{$requested_date}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Estimate Date :</td>
					<td class="fieldLabelLeft">{$estimate_date}</td>
				</tr>
				{if $status_chk != '1'}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Status :</td>
					<td class="fieldLabelLeft">
						<input type="checkbox" name="with_status" value="1" class="stdCheckBox" {$with_status}>					</td>
				</tr>
				{else}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Status :</td>
					<td class="fieldLabelLeft">Payment Finished Successfully.</td>
				</tr>
				{/if}
				<tr>
				  <td colspan="2" align="center">&nbsp;
				  {if $status_chk != '1'}
							<input type="submit" name="Submit" value="Save" class="stdButton">
				    &nbsp;&nbsp;&nbsp;{/if}
				    <input type="submit" name="Submit" value="Cancel" class="stdButton" />
					</td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="ww_id" value="{$ww_id}" />
			<input type="hidden" name="user_auth_id" value="{$user_auth_id}" />
			<input type="hidden" name="user_name" value="{$user_name}" />
			<input type="hidden" name="amount" value="{$amount}" />
			<input type="hidden" name="amount_rec" value="{$amount_rec}" />
			<input type="hidden" name="requested_date" value="{$requested_date}" />
			<input type="hidden" name="trans_type" value="{$trans_type}" />
			<input type="hidden" name="details" value="{$details}" />
			<input type="hidden" name="estimate_date" value="{$estimate_date}" />
			<input type="hidden" name="paypal_email" value="{$paypal_email}" />
			<br>
		</td>
	</tr>
	</form>
</table>