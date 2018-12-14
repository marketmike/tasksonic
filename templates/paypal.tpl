<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>Pay With Paypal</h1>
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>									
					<table border="0"  width="100%" cellpadding="2">
						<tr>
							<td height="20"></td>
						</tr>
						<tr>
							<td align="center" class="successMsg">
								<strong>You are requesting a deposit in the amount of ${$requested_amount} into your Task Sonic account (wallet) via Paypal Payment Gateway. After including tax your final amount to be billed will be ${$final_total}.</strong>
							</td>
						</tr>
						<tr>
							<td height="20"></td>
						</tr>
					</table>		
					{if $sandbox_check == 1}
					<table border="0" width="100%"  cellpadding="2">
						<tr>
							<td align="center">
								<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="{$paypal_id}">
									<input type="hidden" name="item_name" value="{$item_name}">
									<input type="hidden" name="amount" value="{$final_total|string_format:'%.2f'}">
									<input type="hidden" name="userid" value="{$user_id}">
									<input type="hidden" name="username" value="{$user_name}">
									<input type="hidden" name="no_shipping" value="1">
									{if $task_staged_id}
									<input type="hidden" name="return" value="{$Site_Root}success.php?check_value={$user_id}&task_staged_id={$task_staged_id}">
									{else}									
									<input type="hidden" name="return" value="{$Site_Root}success.php?check_value={$user_id}">
									{/if}
									<input type="hidden" name="cancel_return" value="{$Site_Root}cancel.php">
									<input type="hidden" name="rm" value="2">				
									<input type="hidden" name="no_note" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="lc" value="US">
									<input type="hidden" name="bn" value="PP-BuyNowBF">
									<input type="hidden" name="page_style" value="TAC">
									<input type="hidden" name="notify_url" value="{$Site_Root}paypalipn.php?check_value={$user_id}&username={$user_name}&requested_amount={$requested_amount|string_format:'%.2f'}&final_total={$final_total|string_format:'%.2f'}&pay_method={$pay_method}">
									<input type="image" src="{$Templates_Image}img_paywithpaypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
								</form>
							</td>
						</tr>
					</table>
					<table border="0" width="100%"  cellpadding="2">
						<tr><td height="15"></td></tr>
						<tr>
							<td align="center"><img  src="https://www.paypal.com/en_GB/i/bnr/horizontal_solution_PP.gif" border="0" alt="Solution Graphics"></td>
						</tr>
					</table>
					{else}
					<table border="0" width="100%"  cellpadding="2">
						<tr>
							<td align="center">
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="{$paypal_id}">
									<input type="hidden" name="item_name" value="{$item_name}">
									<input type="hidden" name="amount" value="{$final_total|string_format:'%.2f'}">
									<input type="hidden" name="userid" value="{$user_id}">
									<input type="hidden" name="username" value="{$user_name}">
									<input type="hidden" name="no_shipping" value="1">
									{if $task_staged_id}
									<input type="hidden" name="return" value="{$Site_Root}success.php?check_value={$user_id}&task_staged_id={$task_staged_id}">
									{else}									
									<input type="hidden" name="return" value="{$Site_Root}success.php?check_value={$user_id}">
									{/if}
									<input type="hidden" name="cancel_return" value="{$Site_Root}cancel.php">
									<input type="hidden" name="rm" value="2">				
									<input type="hidden" name="no_note" value="1">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="lc" value="US">
									<input type="hidden" name="bn" value="PP-BuyNowBF">
									<input type="hidden" name="page_style" value="TAC">
									<input type="hidden" name="notify_url" value="{$Site_Root}paypalipn.php?check_value={$user_id}&username={$user_name}&amt={$final_total|string_format:'%.2f'}&pay_method={$pay_method}">
									<input type="image" src="{$Templates_Image}img_paywithpaypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
								</form>
							</td>
						</tr>
					</table>
					<table border="0" width="100%"  cellpadding="2">
						<tr>
							<td align="center"><img  src="https://www.paypal.com/en_GB/i/bnr/horizontal_solution_PP.gif" border="0" alt="Solution Graphics"></td>
						</tr>
					</table>
					{/if}
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->