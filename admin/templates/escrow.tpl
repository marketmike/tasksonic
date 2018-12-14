<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Released Escrow Payments	
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
					<td class="pagetitle" width="49%" height="25">Released Escrow Payments</td>
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
					<td class="varnormal" colspan="6">
						Manage Task Sonic Escrow Payments
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmEscrow.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" class="bodytextblack"><strong>Total Released Escrow Payments  :  $&nbsp;{$released_amount}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Sender Name</td>
					<td class="headTitle">Task Name </td>
					<td class="headTitle">Amount</td>
					<td class="headTitle">Payment Type</td>
					<td class="headTitle">Tasker Name</td>
					<td class="headTitle">Date</td>
				</tr>
				{section name=escrow loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$escrow_payment[escrow].from_user_login_id}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$escrow_payment[escrow].project_title}</td>
					<td width="10%" class="bodytextblack" align="center">&nbsp;{$escrow_payment[escrow].amount}</td>
					<td width="15%" class="bodytextblack" align="center">
					&nbsp;
					{if $escrow_payment[escrow].payment_type == 1}
						Full
					{elseif $escrow_payment[escrow].payment_type == 2}
						Partial
					{else}
						Partial & Complete
					{/if}
					</td>
					<td width="15%" class="bodytextblack" align="center">&nbsp;{$escrow_payment[escrow].to_user_login_id}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$escrow_payment[escrow].date}</td>
				{/section}					
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				
		 </table>
		{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
		{/if}
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<input type="hidden" name="Action" />
	</form>
</table>