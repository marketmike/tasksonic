<script language="javascript">
	var JS_Amount		   = '{$JS_Amount}';
	var JS_TAC_User		   = '{$JS_TAC_User}';
	var JS_Amount_Check    = '{$JS_Amount_Check}';
	var WC_ESCROW_PAYMENT  = '{$WC_ESCROW_PAYMENT}';
	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">  
	<h1>{$lang.Transfer_Money_Escrow}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
				<form method="post" action="{$smarty.server.PHP_SELF}" name="frmescrow">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address"><strong>{$lang.Balance} : {$lang.Curreny}&nbsp;{$totalamount1}</strong></label>
						</div>
					</div>
					<div class="clear"></div>				
				<div class="note" style="text-align:center;padding:20px;">{$lang.Escrow_Note}</div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><strong>{$lang.Fill_escrow}</strong></label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<h4> {$lang.Reason} :</h4>
						<div style="margin-bottom:20px;margin-top:20px"><input type="radio" name="payment" class="shorter" value="1" onclick="show_FullPay()" />&nbsp;{$lang.Full}</div>
						<div class="clear"></div>
						<div style="margin-bottom:20px;"><input type="radio" name="payment" class="shorter" value="2" onclick="show_PartialPay()">&nbsp;{$lang.Partial}</div>
						<div class="clear"></div>
						<div style="margin-bottom:20px;"><input type="radio" name="payment" class="shorter"  value="3" onclick="show_PartialCompletePay()" />&nbsp;{$lang.Partial_Complete}</div>
						<div class="clear"></div>
					<div class="clear"></div>
					</div>					
				
				<span id="fullpay" style="display:none;">
				<div class="field">
				<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center" >
					<tr class="header" bgcolor="#D5D5D5">
						<td height="22" class="bodytextwhite">&nbsp;<strong>{$lang.task_Post}</strong></td>
						<td>
							 <select name="project_list" class="dropdownmediumext" onchange="showHint(this.options[this.selectedIndex].value)">
								 <option value="0">{$lang.Choose_project}</option>
								 {$project_Listing_For_Full}
							 </select>
						<span class="hint">Select the task you are creating the escrow payment for<span class="hint-pointer">&nbsp;</span></span>	 
					  </td>
					</tr>

					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.TAC_username} : </strong></td>
						<td class="bodytextwhite"> <span id="txtHint"></span></td>
					</tr>
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.Amount_Head} : </strong></td>
						<td class="bodytextwhite"> {$lang.Curreny}<span id="txtHint_1"></span></td>
					</tr>
					<tr>
						<td class="bodytextblack">
						</td>
					</tr>
				</table>
				</div>
				</span>
				<span id="partialpay" style="display:none;">
				<div class="field">
				<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
					<tr class="header" bgcolor="#D5D5D5">
						<td height="22" class="bodytextwhite">&nbsp;<strong>{$lang.task_Post}</strong></td>
						<td>
							 <select name="project_listing" class="dropdownmediumext" onchange="showHint_Partial(this.options[this.selectedIndex].value)">
								 <option value="0">{$lang.Choose_project}</option>
								 {$project_Listing_For_Partial}
							 </select>
						<span class="hint">Select the task you are creating the escrow payment for<span class="hint-pointer">&nbsp;</span></span>	 
					  </td>
					</tr>
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>Milestone : </strong></td>
						<td class="bodytextwhite" align="left">
						<input type="text" name="milestone" id="milestone" style="width:200px;" />
						<span class="hint">Indicate a milestone for when the escrow payment will be released.</span>
						</td>
					</tr>					
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.TAC_username} : </strong></td>
						<td class="bodytextwhite"><span id="txtHint_2"></span><input type="hidden" name="max_amount" id="max_amount" />
						</td>
					</tr>
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.Amount_Head} : </strong></td>
						<td class="bodytextwhite" align="left">
						<span style="float:left;line-height:30px;padding-top:7px;margin-right:5px"><strong>{$lang.Curreny}</strong>&nbsp;</span>
						<input type="text" name="send_amount_partially" maxlength="50" style="width:150px;" />
						<span class="hint">Enter a partial payment amount as agreed upon with tasker.<span class="hint-pointer">&nbsp;</span></span>
						</td>
					</tr>
					<tr>
						<td class="bodytextblack">
						</td>
					</tr>
				</table>
				</div>
				</span>
				<span id="partialpay_Complete" style="display:none;">
				<div class="field">
				<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
					<tr class="header" bgcolor="#D5D5D5">
						<td height="22" class="bodytextwhite">&nbsp;<strong>{$lang.task_Post}</strong></td>
						<td>
							 <select name="project_lists" class="dropdownmediumext" onchange="showHint_Partial_Complete(this.options[this.selectedIndex].value)">
								 <option value="0">{$lang.Choose_project}</option>
								 {$project_Listing_For_Partial}
							 </select>
						<span class="hint">Select the task you are creating the escrow payment for<span class="hint-pointer">&nbsp;</span></span>	
					  </td>
					</tr>
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.TAC_username} : </strong></td>
						<td class="bodytextwhite"><span id="txtHint_3"></span></td>
					</tr>
					<tr class="header" bgcolor="#D5D5D5">
						<td height="20" class="bodytextwhite">&nbsp;<strong>{$lang.Remaining_Amount}: </strong></td>
						<td class="bodytextwhite"> {$lang.Curreny}&nbsp;<span id="txtHint_4"></span></td>
					</tr>
					<tr>
						<td class="bodytextblack">
						</td>
					</tr>
				</table>
				</div>
				</span>
				<div class="buttons">
				<button id="btnbg2" type="submit" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(this.form);">{$lang.Button_Submit}</button>
				</div>
				<input type="hidden" name="user_name" id="user_name"/>
				<input type="hidden" name="send_amount" id="send_amount"/>
				<input type="hidden" name="amount" value="{$totalamount1}" />
				<input type="hidden" name="type" id="type" />
				<input type="hidden" name="total_max_amount" id="total_max_amount" />
				<input type="hidden" name="remaing_amount" id="remaing_amount" />
				</form>
				<div class="clear"></div>
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