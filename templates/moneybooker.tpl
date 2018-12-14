<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>Pay With Money Booker</h1>
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>		
					 <table border="0" width="80%"  cellpadding="2" align="center">
						<tr>
							<td><strong>You are requesting a deposit in the amount of ${$requested_amount} into your Task Sonic account (wallet) via Moneybookers. After including tax your final amount to be billed will be ${$final_total}.</strong></td>
						</tr>
						<tr>
							<td align="center">
								<form action="https://www.moneybookers.com/app/payment.pl" method="post">
									<input type="hidden" name="pay_to_email" value="{$moenybooker_id}">
									<input type="hidden" name="return_url" value="{$Site_Root}success_moneybooker.php?check_value={$user_id}">
									<input type="hidden" name="cancel_url" value="{$Site_Root}cancel_moneybooker.php">
									<input type="hidden" name="language" value="EN">
									<input type="hidden" name="merchant_fields" value="check_value">
									<input type="hidden" name="field 1" value="{$user_id}">
									<input type="hidden" name="amount" value="{$final_total|string_format:'%.2f'}">
									<input type="hidden" name="currency" value="USD">
									<input type="hidden" name="detail1_description" value="{$item_name}">
									<input type="hidden" name="detail1_text" value="{$item_name}">
									<div class="clear"></div>
									<div class="buttons"  style="margin:0 auto;margin-top:50px;text-align:center">
									<button type="submit" class="regular"  id="btnbg"  name="Submit" value="{$lang.Button_Submit}">Pay Now</button>
									</div>							
			
								</form>
							</td>
						</tr>
					</table>
					<table border="0" width="100%"  cellpadding="2">
					<tr><td height="15"></td></tr>
					<tr>
					<td align="center"><img src="{$Templates_Image}logo_moneybookers.gif" BORDER="0" ALT="Moneybookers "/></td>
					</tr>
					</table>				
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="right-column-wrap">
		<h1>Something Here</h1>
	</div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->