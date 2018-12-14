<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$smarty.session.User_Name}{$lang.Seller_Activites}</h1>
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
					<li class="current"><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
					<li><a href="make-deposit.html">Deposit</a><span></span></li>
					<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>	
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<form method="post" name="frmselleractivity" >
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><strong>{$lang.task_win_close}</strong></label>
						</div>
						</div>
						<div class="clear"></div>
						<div class="body_shim">						
							<table width="100%" border="0" style="margin-left:10px">
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								{if $Loop1 > 0}
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#D5D5D5" style="padding:5px">
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong>{$lang.My_Selling_Activity}</strong></td>
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong>{$lang.Description}</strong></td>
											</tr>
											{section name=seller_task_name loop=$Loop1}
											<tr class="{cycle values='list_A, list_B'}">
												<td align="left" class="bodytextblack" width="32%" height="20"  style="padding:5px" valign="top"><a href="task_{$aseller_win[seller_task_name].id}_{$aseller_win[seller_task_name].clear_title}.html" class="footerlinkcommon2">{$aseller_win[seller_task_name].project_Title|stripslashes}</a></td>
												<td align="center" class="bodytextblack"  style="padding:5px">
											{if $aseller_win[seller_task_name].project_status == 1}
												{$post_project[project_name].time_remaining} left for bidding!										
											{elseif $aseller_win[seller_task_name].project_status == 2}
												Task Awarded to {$post_project[project_name].project_post_to}
											{elseif $aseller_win[seller_task_name].project_status == 3}
					
											{if $aseller_win[seller_task_name].tasker_completed == 0}

											<div class="clear"></div>
											<div class="buttons" style="margin-right:75px;">
											<a href="mark-completed_{$aseller_win[seller_task_name].id}.html" >Mark Completed</a>
											</div>
											{else}
											Tasker Has Marked As Completed
											<div class="clear"></div>
											Awaiting Payment
											{/if}
											{elseif $aseller_win[seller_task_name].project_status == 4}
												Task Canceled bt Task Owner
											{elseif $aseller_win[seller_task_name].project_status == 5}
												Task Expiring - Bidding Frozen
											{elseif $aseller_win[seller_task_name].project_status == 6}
												Task Completed
											{elseif $aseller_win[seller_task_name].project_status == 7}
												Task Failed				
											{/if}								
												</td>
											</tr>
											{if $aseller_win[seller_task_name].project_status == 3}	
											<tr>
												<td style="border-bottom:1px dashed #ccc" align="center" colspan="2"><strong>Must Be Completed By: {$aseller_win[seller_task_name].completed_by} {$aseller_win[seller_task_name].completed_time}</strong></td>
											</tr>
											{/if}
											<tr>
												<td class="bodytextwhite" height="20" colspan="2"></td>
											</tr>											
											{/section}
										</table>
									</td>
								</tr>
								{else}
								<tr>
									<td colspan="2" class="bodytextblack" align="center"><strong>{$lang.No_recorded}</strong></td>	  
								</tr>
								{/if}
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
							</table>
						</div>					
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><strong>{$lang.Bid_Placed}</strong></label>
						</div>
						</div>
						<div class="clear"></div>
						<div class="body_shim">
							<table width="100%" border="0" style="margin-left:10px">
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								{if $Loop_bid > 0}
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#D5D5D5">
												<td class="bodytextwhite" align="center" width="32%" height="20"><span class="row_title"><strong>{$lang.My_Selling_Activity}</strong></td>
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong>{$lang.Description}</strong></td>
											</tr>
											{section name=seller_task_name1 loop=$Loop_bid}
											<tr class="{cycle values='list_A, list_B'}">
												<td align="left" class="bodytextblack" width="32%" height="20"><a href="task_{$aseller_bid[seller_task_name1].id}_{$aseller_bid[seller_task_name1].clear_title}.html" class="footerlinkcommon2">{$aseller_bid[seller_task_name1].project_Title|stripslashes}</a></td>
												<td align="center" class="bodytextblack">
												<!-- If a person awarded is viewing-->
												{if  $aseller_bid[seller_task_name1].project_post_to == $user}
													{if $aseller_bid[seller_task_name1].project_status == 2}<strong>{$lang.Awarded_you}</strong> &nbsp;<strong>( <a href="task_{$aseller_bid[seller_task_name1].id}_{$aseller_bid[seller_task_name1].clear_title}.html" class="footerlinkcommon2"> {$lang.Accept_Deny} </a>)</strong>{/if}
													{if $aseller_bid[seller_task_name1].project_status == 3}<strong>{$lang.task_win}</strong>{/if}
												<!-- If a person not awarded is viewing-->
												{elseif $aseller_bid[seller_task_name1].project_post_to != $user}
													{if $aseller_bid[seller_task_name1].project_status == 2}<strong>{$lang.Bid_Lost}</strong>{/if}
														{if $aseller_bid[seller_task_name1].project_status == 1}		
															{if $aseller_bid[seller_task_name1].bid_status == 0}
																<strong>{$lang.Your_bid_is_in_pending}</strong>
															{/if}
															{if $aseller_bid[seller_task_name1].bid_status == 1}
																<strong>{$lang.Bid_Placed}</strong>&nbsp;&nbsp;
																<strong>(<a href="JavaScript: Delete_Click('{$aseller_bid[seller_task_name1].bid_id}');" class="footerlinkcommon2" > {$lang.Cancel_Bid} </a>)</strong>
															{/if}
														{/if}
											
												{/if}
												</td>
											</tr>
										{/section}
										</table>
									</td>
								</tr>
								{else}
								<tr>
									<td colspan="2" class="bodytextblack" align="center"><strong>{$lang.No_recorded}</strong></td>	  
								</tr>
								{/if}
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
							</table>
							</div>
				<input name="bid_id" type="hidden" />
				<input type="hidden" name="Action" />
				</form>
			<div id="more_link"></div>
				<div class="clear"></div>		
				</div>
			</div>
			<div class="page_bottom"></div>
			</div><!-- end .grid_8.alpha -->
			<div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>			
			{include file="$T_Post"}
			{include file="$T_Location"}
			{include file="$T_Balance"}
			{include file="$T_Mytasks"}		
			{include file="$T_Map"}					
			<div class="clear"></div>	
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->