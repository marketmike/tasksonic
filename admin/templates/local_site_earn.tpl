{if $flag == 0}
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Local Site Earn  Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmLocalEarn" action="{$A_Action}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Local Site Earn  Management</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="95%" >
				<tr>
					<td align="center" class="varnormal">Country : &nbsp;&nbsp;&nbsp;
					<select name="country" style="width:145px;" class="textbox">
						{$Country_List}
					</select>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="95%">
				<tr>
					<td align="center" class="varnormal">Search : &nbsp;&nbsp;&nbsp;
						<select name="month" class="textbox" tabindex="5">
						{$Month}
						</select>
						&nbsp;&nbsp;&nbsp;
						<select name="year" class="textbox" tabindex="5">
						{$Year}
						</select>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<tr>
	    <td align="center"><input type="submit" name="Submit" value="Search" class="stdButton" onclick="JavaScript: return Search(start_date.value,end_date.value);" /></td>
	</tr>
	<tr>
	    <td colspan="2">&nbsp;</td>
	</tr>
	<input type="hidden" name="Action" />
	</form>
</table>
{/if}
{if $flag == 1}
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">{$SITE_TYPE} Site Earn Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<tr>
	    <td class="headTitle2"><strong>Total = <span class="fieldlabelLeft">$</span>&nbsp;{$total|string_format:"%.2f"}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</td>
	</tr>
	<tr>
	    <td height="21">&nbsp;</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="3">
						<span id="Deposite_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Deposite()" class="actionlink"><strong> Deposite Money (Paypal)</strong></a>						</span>
						<span id="Deposite_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Deposite()" class="actionlink"><strong>From Deposite Money (Paypal)</strong></a>						</span>					</td>	
				</tr>
			 </table> 	
 		 	<span id="Deposite_Hide_Details" style="visibility:hidden;display:none;">
			 <table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Member Name</td>
					<td class="headTitle">Deposited Amount</td>
					<td class="headTitle">Paid Amount</td>
					<td class="headTitle">Site Earning</td>
				</tr>
				{section name=earn5 loop=$Loop5}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="23%" class="bodytextblack" align="center">&nbsp;{$earn_deposite[earn5].user_login_id}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_deposite[earn5].deposited_money}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_deposite[earn5].paid_money}</td>
					<td class="bodytextblack" align="center">$&nbsp;{$earn_deposite[earn5].earning}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3">&nbsp;</td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_deposite != ''}$&nbsp;{$sum_deposite|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		  </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<!-- Deposit money at moneybboker -->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="3">
						<span id="Deposite_Show_Money" style="visibility:visible;">
						<a href="javascript: show_Deposite_Money()" class="actionlink"><strong>From Deposite Money (Moneybooker)</strong></a>
						</span>
						<span id="Deposite_Hide_Money" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Deposite_Money()" class="actionlink"><strong>From Deposite Money (Moneybooker)</strong></a>
						</span>
					</td>	
				</tr>
			 </table> 	
 		 	<span id="Deposite_Hide_Money_Details" style="visibility:hidden;display:none;">
			 <table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Member Name</td>
					<td class="headTitle">Deposited Amount</td>
					<td class="headTitle">Paid Amount</td>
					<td class="headTitle">Site Earning</td>
				</tr>
				{section name=earn5_money loop=$Loop5_money}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="23%" class="bodytextblack" align="center">&nbsp;{$earn_deposite_money[earn5_money].user_login_id}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_deposite_money[earn5_money].deposited_money}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_deposite_money[earn5_money].paid_money}</td>
					<td class="bodytextblack" align="center">$&nbsp;{$earn_deposite_money[earn5_money].earning}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3">&nbsp;</td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_deposite_money != ''}$&nbsp;{$sum_deposite_money|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		  </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<!--Commision Form projects -->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="3">
						<span id="Commision_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From projects Commision</strong></a>
						</span>
						<span id="Commision_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Commision()" class="actionlink"><strong>From projects Commision</strong></a>
						</span>
					</td>	
				</tr>
			 </table> 	
 		 	<span id="Commision_Hide_Details" style="visibility:hidden;display:none;">
			 <table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">project Name</td>
					<td class="headTitle">Buyer Commision</td>
					<td class="headTitle">Seller Commision</td>
				</tr>
				{section name=earn6 loop=$Loop6}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="31%" class="bodytextblack" align="center">&nbsp;{$earn_comm[earn6].project_title}</td>
					<td width="31%" class="bodytextblack" align="center">{if $earn_comm[earn6].buyer_comm != ''}$&nbsp;{$earn_comm[earn6].buyer_comm}{else}$&nbsp;0.00{/if}</td>
					<td width="31%" class="bodytextblack" align="center">{if $earn_comm[earn6].seller_comm != ''}$&nbsp;{$earn_comm[earn6].seller_comm}{else}$&nbsp;0.00{/if}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="1">&nbsp;</td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_buyer != ''}$&nbsp;{$sum_buyer|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_seller != ''}$&nbsp;{$sum_seller|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
				<tr>
				    <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="2">&nbsp;</td>
					<td width="28%" class="headTitle1" align="right"><strong>Total = {if $sum_seller != ''}$&nbsp;{$total_comm|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		  </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>

	<!--Membership -->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="3">
						<span id="Member_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Member()" class="actionlink"><strong> Membership</strong></a>						</span>
						<span id="Member_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Member()" class="actionlink"><strong>From Membership</strong></a>						</span>					</td>	
				</tr>
			 </table> 	
 		 	<span id="Member_Hide_Details" style="visibility:hidden;display:none;">
			 <table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Member Name</td>
					<td class="headTitle">MemberShip Name</td>
					<td class="headTitle">MemberShip Fees</td>

				</tr>
				{section name=earn loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="31%" class="bodytextblack" align="center">&nbsp;{$earn_membership[earn].member_name}</td>
					<td width="31%" class="bodytextblack" align="center">&nbsp;{$earn_membership[earn].membership_name}</td>
					<td width="31%" class="bodytextblack" align="center">{if $earn_membership[earn].membership_fees != ''}$&nbsp;{$earn_membership[earn].membership_fees|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</td>
				</tr>					
				{/section}
				<tr>
				    <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="2">&nbsp;</td>
					<td width="28%" class="headTitle1" align="right"><strong>Total = {if $sum != ''}$&nbsp;{$sum|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		  </table>
		  </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
<!--	if flag_paypal == 1
-->
	<!--Withdraw Money -->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="4">
						<span id="Withdraw_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Withdraw()" class="actionlink"><strong> Withdraw Money (Paypal)</strong></a>						</span>
						<span id="Withdraw_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Withdraw()" class="actionlink"><strong>From Withdraw Money (Paypal)</strong></a>						</span>					</td>
				</tr>
			</table>
			<span id="Withdraw_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Member Name</td>
					<td class="headTitle">Requested Amount</td>
					<td class="headTitle">Paid Amount</td>
					<td class="headTitle">Site Earning</td>
				</tr>
				{section name=earn1 loop=$Loop1}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="23%" class="bodytextblack" align="center">&nbsp;{$earn_withdraw[earn1].user_name}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_withdraw[earn1].requested_amount}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_withdraw[earn1].paied_amount}</td>
					<td class="bodytextblack" align="center">{if $earn_withdraw[earn1].amount != ''}$&nbsp;{$earn_withdraw[earn1].amount|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3">&nbsp;</td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_withdraw != ''}$&nbsp;{$sum_withdraw|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		 </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
<!--	/if
	if flag_moneybooker == 1-->

	<!--Withdraw Money (Money Booker)-->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="4">
						<span id="Withdraw_Show_Money" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Withdraw_Money()" class="actionlink"><strong> Withdraw Money (Moneybooker)</strong></a>						</span>
						<span id="Withdraw_Hide_Money" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Withdraw_Money()" class="actionlink"><strong>From Withdraw Money (Moneybooker)</strong></a>						</span>					</td>
				</tr>
			</table>
			<span id="Withdraw_Hide_Money_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">Member Name</td>
					<td class="headTitle">Requested Amount</td>
					<td class="headTitle">Paid Amount</td>
					<td class="headTitle">Site Earning</td>
				</tr>
				{section name=earn_money loop=$Loop_Money}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="23%" class="bodytextblack" align="center">&nbsp;{$earn_withdraw_money[earn_money].user_name}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_withdraw_money[earn_money].requested_amount}</td>
					<td width="23%" class="bodytextblack" align="center">$&nbsp;{$earn_withdraw_money[earn_money].paied_amount}</td>
					<td class="bodytextblack" align="center">{if $earn_withdraw_money[earn_money].amount != ''}$&nbsp;{$earn_withdraw_money[earn_money].amount|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</td>
				</tr>			
				{/section}
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3">&nbsp;</td>
					<td class="headTitle1" align="right"><strong>Total = {if $sum_withdraw_moneybooker != ''}$&nbsp;{$sum_withdraw_moneybooker|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		 </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
<!--	/if
-->	<!--Cancel project -->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="3">
						<span id="Cancel_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Cancel()" class="actionlink"><strong> Cancel project</strong></a>						</span>
						<span id="Cancel_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Cancel()" class="actionlink"><strong>From Cancel project</strong></a>						</span>					</td>	
				</tr>
			</table>
			<span id="Cancel_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">project Name</td>
					<td class="headTitle">Porject Posted Date</td>
					<td class="headTitle">project Fees</td>
				</tr>
				{section name=earn2 loop=$Loop2}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="31%" class="bodytextblack" align="center">&nbsp;{$earn_cancel[earn2].project_title}</td>
					<td width="31%" class="bodytextblack" align="center">&nbsp;{$earn_cancel[earn2].project_posted_date}</td>
					<td width="31%" class="bodytextblack" align="center">$&nbsp;{if $earn_cancel[earn2].Fees!=''} {$earn_cancel[earn2].Fees} {else} 0.00{/if}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="2">&nbsp;</td>
					<td width="28%" class="headTitle1" align="right"><strong>Total = {if $sum_cancel != ''}$&nbsp;{$sum_cancel|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
    		 </table>
		 </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<!--Premium project-->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="4">
						<span id="Premium_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Premium()" class="actionlink"><strong> Premium project</strong></a>						</span>
						<span id="Premium_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Premium()" class="actionlink"><strong>From Premium project</strong></a>						</span>					</td>	
				</tr>
			</table>
			<span id="Premium_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">	
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">project Name</td>
					<td class="headTitle">Porject Posted Date</td>
					<td class="headTitle">project Status</td>
					<td class="headTitle">project Fees</td>
				</tr>
				{section name=earn3 loop=$Loop3}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$earn_premium[earn3].project_title}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$earn_premium[earn3].project_posted_date}</td>
					<td width="28%" class="bodytextblack" align="center">
					&nbsp;
					{if $earn_premium[earn3].project_status == 1}Open{/if}
					{if $earn_premium[earn3].project_status == 2}{$langFreezed}<strong>&nbsp;&nbsp;(Awarded to {$project_post_to})</strong>{/if}
					{if $earn_premium[earn3].project_status == 3}{$Close_for_Bidding}<strong>&nbsp;&nbsp;(Task Accepted by {$project_post_to})</strong>{/if}
					{if $earn_premium[earn3].project_status == 4}{$Closed_Manually}<strong>&nbsp;&nbsp;(By Buyer)</strong>{/if}
					{if $earn_premium[earn3].project_status == 5}{$Closed}&nbsp;&nbsp;<strong>Bidding Has Expired</strong>{/if} <!--This status allows bids already placed to be selected but does not allow bidding -->
					{if $earn_premium[earn3].project_status == 6}{$Completed}&nbsp;&nbsp;<strong>Task Completiong Date Expired</strong>{/if} <!--Not used yet but I will plan to tie to completed date if that makes sense -->
					{if $earn_premium[earn3].project_status == 7}{$Closed}&nbsp;&nbsp;<strong>Failed To Be Awarded</strong>{/if} <!--This status actually closes the project -->					
					</td>
					<td class="bodytextblack" align="center">{if $earn_premium[earn3].Fees != ''}$&nbsp;{$earn_premium[earn3].Fees|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</td>
				</tr>
				{/section}
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr >
					<td align="center" colspan="3">&nbsp;</td>
					<td width="28%" class="headTitle1" align="right"><strong>Total = {if $sum_premium != ''}$&nbsp;{$sum_premium|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		 </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
	<!--Uegent project-->
	<tr>
	   <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack" colspan="4">
						<span id="Urgent_Show" style="visibility:visible;">
						<a href="javascript: show_Commision()" class="actionlink"><strong>From</strong></a><a href="javascript: show_Urgent()" class="actionlink"><strong> Urgent project</strong></a>						</span>
						<span id="Urgent_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Urgent()" class="actionlink"><strong>From Urgent project</strong></a>						</span>					</td>	
				</tr>
			</table>
			<span id="Urgent_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="headTitle">project Name</td>
					<td class="headTitle">Porject Posted Date</td>
					<td class="headTitle">project Status</td>
					<td class="headTitle">project Fees</td>
				</tr>
				{section name=earn4 loop=$Loop4}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$earn_urgent[earn4].project_title}</td>
					<td width="28%" class="bodytextblack" align="center">&nbsp;{$earn_urgent[earn4].project_posted_date}</td>
					<td width="28%" class="bodytextblack" align="center">
					&nbsp;
					{if $earn_urgent[earn4].project_status == 1}
					    Open
					{elseif $earn_urgent[earn4].project_status == 2}
					    Forze
					{elseif $earn_urgent[earn4].project_status == 3}
					    project Assign
					{elseif $earn_urgent[earn4].project_status == 4}
					    project closed manually by buyer
					{elseif $earn_urgent[earn4].project_status == 5}	
					    Can't Take Action
					{else}
					    closed
					{/if}	
					</td>
					<td class="bodytextblack" align="center">{if $earn_urgent[earn4].Fees != ''}$&nbsp;{$earn_urgent[earn4].Fees|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</td>
				</tr>
				{/section}				
				<tr>
				    <td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3">&nbsp;</td>
					<td width="28%" class="headTitle1" align="right"><strong>Total = {if $sum_urgent != ''}$&nbsp;{$sum_urgent|string_format:"%.2f"}{else}$&nbsp;0.00{/if}</strong></td>
				</tr>
		 </table>
		 </span>
	  </td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
</table>
{/if}