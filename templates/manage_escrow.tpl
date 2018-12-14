<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">  
	<h1>Manage Escrow Payments</h1>
	<div class="clearwspace"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
						<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
						<li><a href="make-deposit.html">Deposit</a><span></span></li>
						<li class="current"><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
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
									<label for="login-email-address">{$lang.Escrow_Out}</label>
								</div>
							</div>
							<div class="clear"></div>
							<div class="field">	
							<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
								<tr class="header"  bgcolor="#D5D5D5">
									<td class="bodytextwhite" height="15" width="25%"><strong>&nbsp;Task Title</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;{$lang.User}</strong></td>
									<td class="bodytextwhite" height="15" width="30%"><strong>&nbsp;MILESTONE</strong></td>							
									<td class="bodytextwhite" height="15" width="10%"><strong>&nbsp;{$lang.Amount_Head}</strong></td>
									<td class="bodytextwhite" height="15" width="20%"><strong>&nbsp;Action</strong></td>
								</tr>
								{section name=escrowout loop=$Loop2}
								<tr class="{cycle values='list_B style3, list_A style3'}">
									<td class="bodytextblack" width="25%">&nbsp;<a href="task_{$aescrowout[escrowout].project_id}_{$aescrowout[escrowout].clean_title}.html" title="{$aescrowout[escrowout].task_title}">{$aescrowout[escrowout].task_title|truncate:20}</a></td>
									<td class="bodytextblack" width="15%">&nbsp;{$aescrowout[escrowout].to_user_login_id}</td>
									<td class="bodytextblack" width="30%">&nbsp;{$aescrowout[escrowout].milestone}</td>							
									<td class="bodytextblack" width="15%">{$lang.Curreny}&nbsp;{$aescrowout[escrowout].amount}</td>
									<td class="bodytextblack" width="15%"><a href="release_payment_{$aescrowout[escrowout].ep_id}.html" class="footerlinkcommon2">Release</a> </td>
								</tr>
								{sectionelse}
								<tr>
									<td class="bodytext" align="center" colspan="3">({$lang.Text}.)</td>
								</tr>
								{/section}
							</table>			

							<div class="clear"></div>
							</div>
							<div class="title-links" style="width:100%;">
								<div class="form_page_text" style="text-align:center;">
									<label for="login-email-address">{$lang.Escrow_In}</label>
								</div>
							</div>
							<div class="clear"></div>
						<div class="field">					
							<table width="99%" cellpadding="0" cellspacing="0" border="0" align="center">
								<tr class="header"  bgcolor="#D5D5D5">
									<td class="bodytextwhite" height="15" width="25%"><strong>&nbsp;Task Title</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;{$lang.User}</strong></td>
									<td class="bodytextwhite" height="15" width="30%"><strong>&nbsp;MILESTONE</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;{$lang.Amount_Head}</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;Action</strong></td>
								</tr>
								{section name=escrowin loop=$Loop3}
								<tr class="{cycle values='list_B style3, list_A style3'}">
									<td class="bodytextblack" width="25%">&nbsp;<a href="task_{$aescrowin[escrowin].project_id}_{$aescrowin[escrowin].clean_title}.html" title="{$aescrowin[escrowin].project_title}">{$aescrowin[escrowin].project_title|truncate:20}</a></td>
									<td class="bodytextblack" width="15%">&nbsp;{$aescrowin[escrowin].from_user_login_id}</td>
									<td class="bodytextblack" width="30%">&nbsp;{$aescrowin[escrowin].milestone}</td>							
									<td class="bodytextblack" width="15%">{$lang.Curreny}&nbsp;{$aescrowin[escrowin].amount}</td>
									<td class="bodytextblack" width="15%"><a href="cancel_payment_{$aescrowin[escrowin].ep_id}.html" class="footerlinkcommon2">Cancel</a> </td>
								</tr>
								{sectionelse}
								<tr>
									<td class="bodytext" align="center" colspan="3">({$lang.Text}.)</td>
								</tr>
								{/section}											
						  </table>
							<div class="clear"></div>				  
						</div>

	
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