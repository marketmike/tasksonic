<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">  
	<h1>Pending Withdraws</h1>
	<div class="clear"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="request-withdraw.html">Withdraw Request</a><span></span></li>			
						<li class="current"><a href="pending-withdraw.html">Pending Withdraws</a><span></span></li>
						<li><a href="my-transactions.html">Transactions</a><span></span></li>		
						</ul>
						</div>
	<div class="clear"></div>	
	<div class="clear"></div>
		<div class="page_top"></div>
				<div class="page_content">
					<div class="page_content_white">
					<div class="clear"></div>
							<div class="title-links" style="width:100%;">
								<div class="form_page_text" style="text-align:center;">
									<label for="login-email-address">Pending Withdraws</label>
								</div>
							</div>
							<div class="clear"></div>
							{if $Loop1 > 0}
							<div class="field">						
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr class="header" bgcolor="#D5D5D5">
									<td class="bodytextwhite" align="center" width="10%" height="20"><strong>{$lang.Amount_Head}</strong></td>
									<td class="bodytextwhite" align="center" width="35%" ><strong>{$lang.Description}</strong></td>
									<td class="bodytextwhite" align="center" width="15%" ><strong>{$lang.Date}</strong></td>
									<td class="bodytextwhite" align="center" width="15%" ><strong>{$lang.Status}</strong></td>
								</tr>
								{section name=withdrawmoney loop=$Loop1}
									<tr class="{cycle values='list_A, list_B'}">
										<td align="center" class="bodytext" width="20%" height="20">{$awithdarw[withdrawmoney].trans_type}&nbsp;{$lang.Curreny}&nbsp;{$awithdarw[withdrawmoney].amount|string_format:"%.2f"}</td>
										<td align="center" class="bodytext" >{$awithdarw[withdrawmoney].description}</td>
										<td align="center" class="bodytext" >{$awithdarw[withdrawmoney].requested_date|date_format:'%B %d, %Y at %I:%M %p'}</td>
										<td align="center" class="bodytext" >{if $awithdarw[withdrawmoney].status == 0}{$lang.Requested}{else}{$lang.Completed}{/if}</td>
								   </tr>
								{/section}
							</table>
							</div>														
							{/if}
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