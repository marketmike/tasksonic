<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Account Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmCategory" action="{$A_Action}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Account Management </td>
					
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
						View Account Details.
					      <div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmCategory.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				
			</table>
			<br>
			<input type="hidden" name="cat_id" />
			<input type="hidden" name="status" />
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4"><strong>Total Amount In Wallet (All USERS) : $&nbsp;{$wallet_sum}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4"><strong>Total Earned By Site (All USERS) : $&nbsp;{$earn_sum}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>				
				<tr>
					<td colspan="4"><strong>Total Paid In Referrals (All USERS) : $&nbsp;{$referrals_paid}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>				
				<tr>
					<td colspan="4"><strong>Adjusted Site Earnings (All USERS) : $&nbsp;{$adjusted_earnings}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4"><strong>Earnings From VIP Memberships (VIP USERS) : $&nbsp;{$earn_mem}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4"><strong>Total Earnings COMM and VIP (ALL USERS) : $&nbsp;{$total_earnings}</strong></td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>				
				<tr>
					<td colspan="4">{$navigationLink}</td>
				</tr>
				<tr>
					<td class="headTitle">Name </td>
					<td class="headTitle">User Wallet</td>
					<td class="headTitle">Referrals Paid</td>
					<td class="headTitle">Site COMM Earnings</td>
					<td class="headTitle">Site VIP Earnings</td>					
					<td class="headTitle" width="31%">Action</td>
				</tr>
				{section name=Member_Account loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					
					<td width="20%" class="bodytextblack">&nbsp;{$membership_payment[Member_Account].user_login_id|stripslashes}</td>
					<td width="15%" class="bodytextblack">&nbsp;${$membership_payment[Member_Account].wallet_sum|stripslashes}</td>
					<td width="18%" class="bodytextblack">&nbsp;${$membership_payment[Member_Account].referrals_earned|stripslashes}</td>						
					<td width="22%" class="bodytextblack">&nbsp;${$membership_payment[Member_Account].earn_by_site|stripslashes}</td>
					<td width="22%" class="bodytextblack">&nbsp;${if $membership_payment[Member_Account].vip_earned}{$membership_payment[Member_Account].vip_earned|stripslashes}{else}0.00{/if}</td>					
					<td align="center"><a href="user_account.php?user_auth_id={$membership_payment[Member_Account].user_auth_id}" class=""><img src="{$Templates_Image}edit.gif" 	class="imgAction" title="View" border="0"></a>&nbsp;&nbsp;</td>
				</tr>
				{sectionelse}
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="3" align="center" class="bodytextblack">No category inserted yet.</td>
				</tr>
				{/section}
			</table>
			{if $smarty.section.prodCat.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$cat_parent_id}');">
					</td>
				</tr>
			</table>
			{/if}
						{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="cat_parent_id" />
	</form>
</table>