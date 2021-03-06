<script language="javascript">
	var JS_Amount_withdarw		 = '{$lang.JS_Amount_withdarw}';
	var JS_Amount_no_withdarw	 = '{$lang.JS_Amount_no_withdarw}';
	var JS_Amount_gra_withdraw	 = 'Please enter an amount greater than ${$JS_WC_WITHDRAW_AMOUNT}';
	var JS_Valid_Mail	 		 = '{$lang.JS_Valid_Mail}';
	var JS_WC_WITHDRAW_AMOUNT	 = '{$JS_WC_WITHDRAW_AMOUNT}';

	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>Withdraw Request</h1>
	<div class="clear"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li class="current"><a href="request-withdraw.html">Withdraw Request</a><span></span></li>			
						<li><a href="pending-withdraw.html">Pending Withdraws</a><span></span></li>
						<li><a href="my-transactions.html">Transactions</a><span></span></li>		
						</ul>
						</div>
	<div class="clear"></div>	
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">	
				<form method="post" action="{$smarty.server.PHP_SELF}?Action=Next_Step1" name="frmWithdraw">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">{$lang.Withdraw}</label>
					</div>
				</div>
				<div class="clear"></div>
				{if $totalamount1 <= 0.00}
				<div class="note" style="text-align:center;padding:10px;">{$lang.no_balance}</div>
				{/if}				
				<div class="field username account_login" style="margin-bottom:20px;text-align:left;">
				To withdraw funds from your Task Sonic Wallet, you must have a PayPal or Moneybooker account. Use this form to withdraw funds from your Task Sonic account and transfer the funds to either your PayPal or Moneybooker account. Please note 
				associated fees for each withdraw listed along side the withdraw options. These fees are charged by the payment 
				provider and collected at time of withdraw. To request a withdraw, choose your 
				preferred method and complete the form below. Review your entries and then submit the withdraw request. <br><br><div style="text-align: center; font-weight: bold;">Please note the minimum request 
				for a withdraw is ${$JS_WC_WITHDRAW_AMOUNT}. <br></div><br>After submitting, you will receive notification by email confirming your request. To review 
				your pending request, visit the "<a href="pending-withdraw.html">Pending Withdraws</a>" page. withdraws are typically processed 
				in <span style="font-weight: bold;">7-10 business days</span>. Please do not submit more than one request per week. If you do not 
				have enough money in your Task Sonic account the withdraw request will be denied. <br><br>Upon submitting your withdraw request, the amount you requested is temporarily deducted from your Task Sonic Wallet.. You'll see 
				reference to this in your transaction history stating "<span style="font-weight: bold;">Withdraw Pending - Funds 
				Frozen</span>". You will receive an additional email once the withdraw has been fully processed. In the event we are unable to send the payment to your PayPal or Moneybooker account, the amount will be 
				returned to your Task Sonic Wallet.				
				</div>					
				<div class="clear"></div>
				{if $totalamount1 <= 0.00}
				<div class="note" style="text-align:center;padding:10px;">{$lang.no_balance}</div>
				{else}
				<div class="note" style="text-align:center;padding:10px;">
				{if $amount_msg}{$amount_msg}{/if}
				</div>				
				<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Payment Method</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr class="header" bgcolor="#D5D5D5">
									<td width="30%" class="bodytextwhite" height="20">&nbsp;<strong>{$lang.Payment_Method}</strong></td>
									<td width="20%" class="bodytextwhite"><strong>{$lang.Cost}</strong></td>
									<td class="bodytextwhite">&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="30%" class="bodytextblack" valign="top">
									<input type="radio" name="pay_mehtod" value="paypal" checked="checked" class="shorter" /> 
									{$lang.PayPal} 
									</td>				
									<td width="20%" class="bodytextblack" valign="top"> {$per_amount_deposit}% + {$fix_amount_deposit} {$lang.Curreny}</td>
									<td class="bodytextblack" valign="top" align="center"><img src="http://www.tasksonic.com/paypal-logo.jpg" BORDER="0"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="20%" class="bodytextblack" valign="top">
									<input type="radio" name="pay_mehtod" value="moneybooker"  class="shorter" />
									{$lang.Money_Booker} </td>
									<td width="20%" class="bodytextblack" valign="top"> {$per_amount_deposit}% + {$fix_amount_deposit} {$lang.Curreny}</td>
									<td class="bodytextblack" valign="top" align="center"><img src="http://www.tasksonic.com/moneybookers-logo.gif" BORDER="0"/></td>
								</tr>
							</table>
						<span class="hint" style="width:550px;">Select your withdraw methood</span>
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Withdraw Details</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
								<div class="field">
								<strong>{$lang.Your_Balance} : {$lang.Curreny}&nbsp;{$totalamount1}</strong>
								<div class="clear"></div>
								</div>	
								<div class="field">
								<strong>{$lang.Withdraw_Amount} : </strong><br />
									<input type="text" name="withdraw_amount" class="short"  /> <span style="height:40px;line-height:40px;font-size:24px;margin-left:10px;"><strong>{$lang.Curreny}</strong></span>
								<div class="clear"></div>
								</div>
								<div class="field">
								<strong>{$lang.PayPal_Email} : </strong><br />
								<input type="text" name="paypal_emil_add" value="{$email_add}" size="30"/>
									<span class="hint">Enter an amount to withdraw and provide the email address for the above selected account.<span class="hint-pointer">&nbsp;</span></span>
								<div class="clear"></div>
								</div>
				<div class="clear"></div>
				<div class="buttons">
				   <button type="submit" name="Submit" class="negative" value="Continue" onclick="javascript : return Check_Details(this.form);"> 
						Continue
				   </button>
				</div>
				<div class="clear"></div>
				<input type="hidden" name="amount" value="{$totalamount1}" />
				</form>
		{/if}
<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
		<div class="rail_spacer">&nbsp;</div>	
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->