<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$lang.Withdraw_Money}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
						<form method="post" action="{$smarty.server.PHP_SELF}" name="frmWithdrawconfirm">
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Confirm & Submit</label>
						</div>
						</div>
						<div class="clear"></div>
						<div class="field" style="margin-bottom:20px;">				
									<table cellpadding="3" cellspacing="4" border="0" width="79%">
										<tr>
											<td width="40%" class="bodytextblack"><strong>{$lang.PayPal_Email1}: </strong></td>
											<td width="60%" class="bodytextblack">{$paypal_add}</td>
										</tr>
										<tr>
											<td class="bodytextblack"><strong>{$lang.Withdraw_Amount} : </strong></td>
											<td class="bodytextblack">${$with_amount}</td>
										</tr>
										<tr>
											<td class="bodytextblack"><strong>{$lang.Fee_Taken}: </strong></td>
											<td class="bodytextblack">${$total}</td>
										</tr>
										<tr>
											<td class="bodytextblack"><strong>{$lang.Amount_Received}: </strong></td>
											<td class="bodytextblack">${$rec_amount}</td>
										</tr>
								  </table>
								</td>
							</tr>
						</table>
						<div class="clear"></div>
						</div>
						<div class="field">
						<div class="buttons">
						<button id="btnbg" type="submit" name="Submit" value="{$lang.Button_Back}" class="login_txt style5">{$lang.Button_Back}</button>
						</div>
						<div class="buttons">
						<button id="btnbg" type="submit" name="Submit" value="{$lang.Button_Submit}" class="login_txt style5">{$lang.Button_Submit}</button>
						</div>
						<div class="clear"></div>
						</div>
						<input type="hidden" name="total" value="{$total}">
						<input type="hidden" name="rec_amount" value="{$rec_amount}">
						<input type="hidden" name="paypal_email" value="{$paypal_add}">
						<input type="hidden" name="requested_date" value="{$requested_date}">
						<input type="hidden" name="etimate_date1" value="{$etimate_date1}">
						<input type="hidden" name="etimate_date2" value="{$etimate_date2}">
						</form>
						<div class="clear"></div>
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
						