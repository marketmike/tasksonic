<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td> 
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr height="23" bgcolor="#D5D5D5">
					<td class="bodytextblack1" height="15" width="30%">&nbsp;{$lang.Balance} : {$lang_common.Curreny}&nbsp;{$Total_Amount}&nbsp;|</td>
					<!--td align="center" class="bodytextblack">|</td-->
					<td class="bodytextblack1" width="23%"><a href="make-deposit.html" class="footerlinkcommon23">&nbsp;{$lang.Deposit_Money}</a>&nbsp;|</td>
					<!--td align="center" class="bodytextblack">|</td-->
					<td class="bodytextblack1" width="27%"><a href="create-escrow-payment.html" class="footerlinkcommon23">&nbsp;{$lang.New_Escrow_Payment1}</a><a href="page_7.html" class="footerlinkcommon23">{$lang.New_Escrow_Payment1_question}</a></td>
					<td align="center" class="bodytextblack1">|</td>
					<td class="bodytextblack1"><a href="request-withdraw.html" class="footerlinkcommon23">&nbsp;{$lang.Withdraw_Money}</a></td>
				</tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td> 
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr height="5"></tr>
				<tr>
					<td width="100%" class="bodytext">&nbsp;&nbsp;<strong>{$lang.Last_Transaction}</strong></td>
				</tr>
				<tr height="5"></tr>
				<tr>
					<td class="bodytext">&nbsp;&nbsp;{$lang.Amount} ({$lang_common.Curreny}) : {$last_trans_type}&nbsp;{$last_amount|string_format:"%.2f"} </td>
				</tr>
				<tr height="5"></tr>
				{if $Total_Amount > 0.00}
				<tr>
					<td class="bodytext">&nbsp;&nbsp;{$lang.Description} : {$last_desc|stripslashes}</td>
				</tr>
				<tr height="5"></tr>
				<tr>
					<td class="bodytext">&nbsp;&nbsp;Date : {$last_date} </td>
				</tr>
				{/if}
				<tr height="5"></tr>
				<tr>
					<td class="bodytextblack">&nbsp;&nbsp;<a href="my-transactions.html" class="footerlink">View All</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
