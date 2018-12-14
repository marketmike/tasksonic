<script language="javascript">
	var JS_Amount		 	= '{$lang.JS_Amount}';
	var JS_Amount_gra	 	= '{$lang.JS_Amount_gra}';
	var JS_Amount_no	 	= '{$lang.JS_Amount_no}';
	var JS_WC_POST_DEPOSIT	= '{$JS_WC_POST_DEPOSIT}';
	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>{$lang.Deposit_Money}</h1>
	<div class="clearwspace"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
						<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
						<li class="current"><a href="make-deposit.html">Deposit</a><span></span></li>
						<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
						</ul>
						</div>
	<div class="clear"></div>	
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">{$lang.Deposit}</label>
					</div>
					</div>
					<div class="clear"></div>
					<div class="field username account_login" style="margin-bottom:20px;">
					<span style="width:100%;text-align:center;">{$lang.Intro}</span>
					</div>					
					<div class="clear"></div>
					<form method="post" action="{$smarty.server.PHP_SELF}?Action=Next_Step" name="frmPayPal">
					<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0" align="center">					
						<tr>
							<td height="20"></td>
						</tr>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr class="header" bgcolor="#D5D5D5">
										<td width="20%" class="bodytextwhite" height="20">&nbsp;<strong>{$lang.Payment_Method}</strong></td>
										<td width="20%" class="bodytextwhite"><strong>{$lang.Cost}</strong></td>
										<td class="bodytextwhite">&nbsp;</td>
									</tr>
									<tr>
										<td colspan="3">&nbsp;</td>
									</tr>
									{if $paypal_status == 1}
									<tr>
										<td width="20%" class="bodytextblack" valign="top">&nbsp;<input type="radio" name="pay_method" value="paypal" {if $paypal_status == 1}checked="checked"{/if}/> 
										{$lang.PayPal} / {$lang.Credit_Card}</td>
										<td width="20%" class="bodytextblack" valign="top"> {$per_amount}% + {$fix_amount} {$lang.Curreny}</td>
									</tr>
									<tr>
										<td class="bodytextblack" align="center" valign="top" colspan="2" ><img src="http://www.rollanet.org/images/paypal/paypal_mrb_banner.gif" BORDER="0" ALT="Effettua la registrazione a PayPal e inizia ad accettare pagamenti tramite carta di credito "/></td>
									</tr>
									{/if}									
									<tr>
										<td colspan="3">&nbsp;</td>
									</tr>
									{if $moneybooker_status == 1}
									<tr>
										<td width="20%" class="bodytextblack" valign="top">&nbsp;<input type="radio" name="pay_method" {if $paypal_status != 1 && $moneybooker_status == 1}checked="checked"{/if} value="moneybooker"/> 
										Moneybooker</td>
										<td width="20%" class="bodytextblack" valign="top"> {$money_booker_per_amount}% + {$money_booker_fix_amount} {$Curreny}</td>										
									</tr>
									<tr>
										<td class="bodytextblack" align="center" valign="top" colspan="2"  ><img src="{$Templates_Image}logo_moneybookers.gif" BORDER="0" ALT="Effettua la registrazione a PayPal e inizia ad accettare pagamenti tramite carta di credito "/></td>
									</tr>
									{/if}									
								</table>
							</td>
						</tr>
						<tr>
							<td height="15">&nbsp;</td>
						</tr>
						<tr>
							<td>
							{if $paypal_status == 1 || $moneybooker_status == 1}
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr class="header" bgcolor="#D5D5D5">
										<td height="25" class="bodytextwhite">&nbsp;<strong>{$lang.Deposit_Amount} : {$lang.Curreny}</strong>
									  <input type="text" name="amount" value="{$amt_short|replace:'-':''}" />&nbsp;(Minimum deposit amount ${$JS_WC_POST_DEPOSIT})									  
									  </td>
									</tr>
									
								</table>
							{/if}	
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</table>
					<input type="hidden" name="task_staged_id" value="{$staged_id}" />
					<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
						   <td width="49%" align="right" class="bodytextblack">
							{if $paypal_status == 1 || $moneybooker_status == 1}
							<div class="buttons">
							<button type="submit" name="Submit" class="negative" value="{$lang.Button_Ctn}" onclick="javascript : return Check_Details(this.form);">
							Continue
							</button>
							</div>
							{else}
							No Gateway Providers Configured
							{/if}
						   </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</table>
					</form>
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