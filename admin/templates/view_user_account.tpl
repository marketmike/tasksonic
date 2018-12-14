<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Payment
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmEscrow" action="{$smarty.section.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">User Payment</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
				
				
	<tr>
	   <td valign="top" align="center">
		
		<table border="0" cellpadding="3" cellspacing="1" width="95%">
				
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle" colspan="5">Paypal Account Transactions</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				{if $Loop != ''}
				<tr>
					<td class="headTitle">User Name</td>
					<td class="headTitle">Description</td>
					<td class="headTitle">Ammount</td>
					<td class="headTitle">Payment Type</td>
					<td class="headTitle">Date</td>
				</tr>
				
				{section name=pay_account loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$paypal_account[pay_account].user_login_id|stripslashes}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$paypal_account[pay_account].description|stripslashes}</td>
					<td width="10%" class="bodytextblack" align="center">&nbsp;{$paypal_account[pay_account].amount|stripslashes}</td>
					<td width="15%" class="bodytextblack" align="center">
					&nbsp;{$paypal_account[pay_account].trans_type}
					</td>
					
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$paypal_account[pay_account].date}</td>
				{/section}	
				{else}
				<tr><td class="successMsg" align="center">&nbsp;{$msg}</td></tr>
				{/if}				
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				
		 </table>
		</td>
	</tr>
	
	<tr>
	   <td valign="top" align="center">
		
		<table border="0" cellpadding="3" cellspacing="1" width="95%">
				
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle" colspan="5">Moneybooker Account Transactions</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				{if $Loop1 != ''}
				<tr>
					<td class="headTitle">User Name</td>
					<td class="headTitle">Description</td>
					<td class="headTitle">Ammount</td>
					<td class="headTitle">Status</td>
					<td class="headTitle">Pending Date</td>
				</tr>
				
				{section name=money_account loop=$Loop1}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$moneybooker_account[money_account].user_login_id|stripslashes}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$moneybooker_account[money_account].description|stripslashes}</td>
					<td width="10%" class="bodytextblack" align="center">&nbsp;{$moneybooker_account[money_account].amount}</td>
					<td width="15%" class="bodytextblack" align="center">
					&nbsp;{if $moneybooker_account[money_account].status == 0}Complete{else}Incomplete{/if}
					</td>
					
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$moneybooker_account[money_account].pending_date}</td>
				{/section}	
				{else}
				<tr><td class="successMsg" align="center">&nbsp;{$msg}</td></tr>
				{/if}				
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				
		 </table>
		</td>
	</tr>
	
	<tr>
	   <td valign="top" align="center">
		
		<table border="0" cellpadding="3" cellspacing="1" width="95%">
				
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle" colspan="6">Escrow Account Transactions</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				{if $Loop2 != ''}
				<tr>
					<td class="headTitle">Sender Name</td>
					<td class="headTitle">Ammount</td>
					<td class="headTitle">Payment Type</td>
					<td class="headTitle">Reciver Name</td>
					<td class="headTitle">Date</td>
				</tr>
				{section name=escrow_account loop=$Loop2}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$escrow_account[escrow_account].from_user_login_id|stripslashes}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$escrow_account[escrow_account].amount|stripslashes}</td>
					<td width="10%" class="bodytextblack" align="center">&nbsp;
					{if $escrow_account[escrow_account].payment_type == 1}Full
					{elseif $escrow_account[escrow_account].payment_type == 2}Partial
					{else}partial & Complete{/if}</td>
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$escrow_account[escrow_account].to_user_login_id|stripslashes}</td>
					
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$escrow_account[escrow_account].date}</td>
				{/section}
				{else}
				<tr><td class="successMsg" align="center">&nbsp;{$msg}</td></tr>
				{/if}					
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				
		 </table>
		</td>
	</tr>
	
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<input type="hidden" name="Action" />
	</form>
</table>