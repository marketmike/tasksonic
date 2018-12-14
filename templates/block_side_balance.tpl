<div class="right-column-wrap">
<h3>My Account Activity</h3>
<div style="float:left;margin-left:5px;width:135px;" >
		<div><strong>Wallet: </strong>{$lang_common.Curreny}{$Total_Amount}</div>
		<div class="clear"></div>
		<div><a href="make-deposit.html" class="footerlinkcommon21">Deposit Money</a></div>
		<div class="clear"></div>
		<div><a href="create-escrow-payment.html" class="footerlinkcommon21">Escrow Payment</a>&nbsp;<a href="page_7.html" class="footerlinkcommon21">{$lang.New_Escrow_Payment1_question}</a></div>
		<div class="clear"></div>
		<div><a href="request-withdraw.html" class="footerlinkcommon21">Withdrawl Money</a></div>
		<div class="clear"></div>
</div>
<img src="{$Templates_Image}activity_symbol.png" border="0" style="float:left;margin-left:10px;width:125px;" />	
<div style="float:left;margin-left:5px;width:270px;" >
		<h3>Last Transaction</h3>
		<div class="clear"></div>
		<div><strong>Amount ({$lang_common.Curreny}) : {$last_trans_type}&nbsp;{$last_amount|string_format:"%.2f"}</strong></div>
		<div class="clear"></div>
		{if $Total_Amount > 0.00}
		<div><strong>Description :</strong> {$last_desc|stripslashes}</div>
		<div class="clear"></div>
		<div>Date : {$last_date} </div>
		<div class="clear"></div>
		{/if}
	<div class="buttons-tall" style="margin-top:10px;">
	<a href="{$Site_URL}/my-transactions.html">View All</a>
	</div>
</div>
<div class="clear"></div>
</div><!--right-column-wrap-->
