<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Transaction_History}</h1>
	<div class="clear"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="request-withdraw.html">Withdraw Request</a><span></span></li>			
						<li><a href="pending-withdraw.html">Pending Withdraws</a><span></span></li>
						<li class="current"><a href="my-transactions.html">Transactions</a><span></span></li>		
						</ul>
						</div>
	<div class="clear"></div>	
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Transaction History</label>
					</div>
				</div>
				<div class="clear"></div>				
					<form name="frmtrans" method="post">
					<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr class="header" bgcolor="#D5D5D5">
							<td class="bodytextwhite" align="center" width="10%" height="20"><strong>{$lang.Amount}</strong></td>
							<td class="bodytextwhite" align="center" width="70%" ><strong>{$lang.Description}</strong></td>
							<td class="bodytextwhite" align="center" width="20%" ><strong>{$lang.Date}</strong></td>
						</tr>
						{if $Loop != ''}
						{section name=trac loop=$Loop}
						<tr class="{cycle values='list_A, list_B'}">
							<td align="center" class="bodytextblack" width="10%" height="30">{$atraction[trac].trans_type}{$Curreny}&nbsp;{$atraction[trac].amount|string_format:"%.2f"}</td>
							<td align="left" class="bodytextblack" width="70%">{$atraction[trac].description}</td>
							<td align="center" class="bodytextblack" width="20%" >{$atraction[trac].trans_date}</td>
					   </tr>
						<tr>
							<td colspan="3" height="10"></td>
					   </tr>					   
						{/section}
						{else}
						<tr>
							<td>&nbsp;</td>
						</tr>	
						<tr>
							<td width="50%" align="center" class="bodytext" colspan="3">
								{$msg}		
							</td>
						</tr>
						{/if}
						<tr>
							<td>&nbsp;</td>
						</tr>	
					</table>
					<div><ul class="paginator">{$Page_Link}</ul></div>	
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