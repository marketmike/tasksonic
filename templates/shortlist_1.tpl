{include file="$T_Buyer"}
<div id="list_head">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
							<span class="style9"><font color=black>{$project_title|stripslashes}</font></span>
						</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					
					<div style=" width:860px; clear:both;">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>

<!--<div class="find_head">-->
<!--<img alt="" title="" src="{$Templates_Image}img_buyer_activity.gif" style="margin:46px 0 0 20px;" />-->
	<!--<div class="find">{$lang.View_project}</div>
</div>-->

<!--<img alt="" title="" style="z-index:0;" src="{$Templates_Image}border_top.gif" />-->
<form name="frmshortlist" method="post" action="{$smarty.server.PHP_SELF}">
<div class="find_container">			
	<div>				
		<!--<img alt="" title="" style="margin:0 0 0 11px;" src="{$Templates_Image}border_white_top.gif" />		-->	
		<div class="el_white_row">			
			<div align="_center">							
				<table width="100%"  cellspacing="0" cellpadding="0" border="0">
					<tr><td height="5"></td></tr>
					<tr>										
						
						<td style="float:right;" class="bodytextblack" align="right">
						{if $smarty.session.User_Id != $user_id}
							{if $smarty.session.User_Name}							
								<input id="btnbg" type="button"  value="{$lang.Place_Bid}" onclick="javascript: return chk_user_1('{$smarty.session.User_Id}','place_bid_{$project_id}_{$clear_title}.html');" style="float:none;" class="login_txt style5"/>
								
							{else}
								<a href="login.php?page=place_bid_{$project_id}_{$clear_title}.html&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=214&width=471&modal=true" title="Login" class="thickbox bgfont"><input id="btnbg" type="button" class="login_txt style5" value="{$lang.Place_Bid}" _onclick="javascript: document.location = 'login.php?page=place_bid_{$project_id}_{$clear_title}.html&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=214&width=471&modal=true';" style="float:none;"/></a>
							{/if}								
						{else} 
							{if $project_status == 3}
								<strong>{$lang.Bid_Win_By} </strong><a href="tasker_profile_{$project_post_to}.html" class="footerlinkcommon2"><!--{$project_post_to}--></a>
							{elseif $project_status == 4}
								<strong>Task is closed</strong>
							{elseif $project_status == 6}
								<strong>Task is completed by </strong><a href="tasker_profile_{$project_post_to}.html" class="footerlinkcommon2">{$project_post_to}</a>
							{else}
								<a href="award_task_{$project_id}_{$clear_title}.html" class="footerlinkcommon2"><input id="btnbg"	 type="button" class="login_txt style5" value="{$lang.Award_project}" onclick="javascript: document.location = 'award_task_{$project_id}_{$clear_title}.html';" style="float:none;"/></a>
							{/if}
						{/if}												 						
						</td>												
					</tr>
					<tr><td height="5"></td></tr>
				</table>
				<table  cellspacing="0" cellpadding="0" border="0" align="center">														
					<tr>		
						<td  valign="top" height="30" class="bodytextblack"><strong>{$lang.task_Name} : </strong></td>
						<td  valign="top" class="bodytext">{$project_title|stripslashes}</td>
						<td rowspan="20" valign="top" >
						<div id="sidebar">
							<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" class="semihalf">
								 <tr>
									 <td class="bodytextblack1" align="center" bgcolor="#D5D5D5"> 
									 <font size="2"><strong>{$lang.Related_projects}</strong></font>
									 </td>
								 </tr>
								 {if $Related_Loop != ''}
								 {section name=related_project loop=$Related_Loop} 
								 {if $arr_related_project[related_project].project_id != $project_id}
								 <tr align="center" bgcolor="#F5F5F5" >
									 <td class="bodytextblack1" align="center" >
												  <ul><li><a href="project_{$arr_related_project[related_project].project_id}_{$arr_related_project[related_project].clear_title}.html" class="footerlinkcommon23">{$arr_related_project[related_project].project_title|stripslashes}</a></li> </ul>
									 </td>
								 </tr>
								 {/if} 	
								 {/section}
								 {else}
									<tr bgcolor="#F5F5F5">
										<td align="center" class="successMsg1">{$lang.No_Related}</td>
									</tr>
								 {/if}
								 <tr align="center" bgcolor="#F5F5F5">
									<td align="center">{$google_adsense_code_125}</td>
								</tr>
								 <!--<tr align="center" bgcolor="#F5F5F5">
									<td align="center">&nbsp;</td>
								</tr>-->
							</table>
						</div>	
						</td>						
					</tr>					
					<tr>			
						<td  valign="top" height="30" class="bodytextblack"><strong>{$lang.Status} : </strong></td>	
						<td  valign="top" class="bodytext">
						{if $project_status == 1}{$lang.Open_for_bidding}{/if}
						{if $project_status == 2}{$lang.Freezed}<strong>&nbsp;&nbsp;(Awarded to {$project_post_to})</strong>{/if}
						{if $project_status == 3}{$lang.Close_for_Bidding}<strong>&nbsp;&nbsp;(Bid win by {$project_post_to})</strong>{/if}
						{if $project_status == 4}{$lang.Closed_Manually}<strong>&nbsp;&nbsp;(By Buyer itself)</strong>{/if}
						{if $project_status == 5}{$lang.Closed}<strong>&nbsp;&nbsp;(Awarding to this project is left by {$project_posted_by})</strong>{/if}
						{if $project_status == 6}{$lang.Closed}<strong>&nbsp;&nbsp;(project is completed by {$project_post_to})</strong>{/if}
						{if $project_status == 7}{$lang.Closed}<strong>&nbsp;&nbsp;(Awarding to this project is left by {$project_posted_by})</strong>{/if}
						</td>
											
					</tr>																									
					<tr >			
						<td valign="top" height="30" class="bodytextblack"><strong>{$lang.Posted_by} : </strong></td>
						<td  valign="top" class="bodytext">
						{if $membership_id != 0}
					   		<img src="{$Templates_Image}vip_member.gif" border="0"/>
					  	{/if}
						<a href="task_owner_profile_{$project_posted_by}.html" target="_blank" class="footerlinkcommon2"><strong>{$project_posted_by}</strong></a>
						&nbsp;<a href="#" onclick="JavaScript: popupWindowURL('private_message.php?project_id={$project_id}&id=1&pop_up=true','','640','700','','true','true');" ><img src="{$Templates_Image}btn_pm.gif" border="0"/></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				     	{if $ave_rating == 0.00}
					     	({$lang.NO_Feddback})
					   	{else}	 
					   		<img src="{$Templates_Image}{$ave_rating|intval}.gif" width="120" style="float:none;">&nbsp;&nbsp;&nbsp;<a href="{$project_posted_by}_task_owner_feedback.html" class="link" >({$lang.reviews} reviews)</a>
					  	{/if}
						</td>
											
					</tr>				
					{if $premium_project == 1}
					<tr>			
						<td  valign="top" height="30" class="bodytextblack"><strong>{$lang.task_Stat} : </strong></td>	
						<td  valign="top" class="bodytext">{$lang.Premium_project}</td>
										
					</tr>					
					{/if}
					<tr>			
						<td  valign="top" height="30" class="bodytextblack" ><strong>{$lang.Description} : </strong></td>	
						<td valign="top" class="bodytext">{$project_description|stripslashes|wordwrap:50:"\n":true}</td>
											
					</tr>
					<tr >			
						<td  valign="top" height="30" class="bodytextblack"><strong>{$lang.Related_Files} : </strong></td>
						<td  valign="top" class="bodytext">
						{if $project_file_1}
							<a href="Javascript: Download_File('{$download_project_file_1}','project');" class="link">{$project_file_1}</a>
						{/if}
						{if $project_file_2}
						<BR>
							<a href="Javascript: Download_File('{$download_project_file_2}','project');" class="link">{$project_file_2}</a>
						{/if}
						{if $project_file_3}
						<BR>
						  <a href="Javascript: Download_File('{$download_project_file_3}','project');" class="link">{$project_file_3}</a>
						{/if}
						{if $project_file_1 == '' and $project_file_2 == '' and $project_file_3 == ''}
							{$lang.No_upload}
						{/if}
						</td>
											
					</tr>
					<tr>			
						<td  valign="top"height="30" class="bodytextblack"><strong>{$lang.Budget1} : </strong></td>	
						<td  valign="top" class="bodytext">{$project_budget}</td>
										
					</tr>
					<tr>			
						<td valign="top" nowrap="nowrap" class="bodytextblack"><strong>{$lang.Required_Skills} : </strong></td>	
						<td valign="top" height="30" class="bodytext">{$categories}</td>

									
					</tr>
					<tr >			
						<td valign="top" height="30" class="bodytextblack"><strong>{$lang.Posted_Date} : </strong></td>	
						<td  valign="top" class="bodytext">{$project_posted_date}</td>
										
					</tr>
					<tr>			
						<td  valign="top" nowrap="nowrap" height="30" class="bodytextblack"><strong>{$lang.Days_Of_Bidding} : </strong></td>	
						<td  valign="top" class="bodytext">
						{if $project_days_open < 0}
							{$lang.task_Closed_Bidding}
						{else}
							{$project_days_open} {$lang.Days_remaining} 
							{if $project_days_open == 1} 
								<font color="#FF0000">({$lang.Last_day_for_bidding})</font>
							{/if}
						{/if}
						</td>
											
					</tr>
					{if $additionalcnt > 0}
					<tr>			
						<td  valign="top" nowrap="nowrap" height="30" class="bodytextblack"><strong>{$lang.Additional_Information} : </strong></td>	
						<td valign="top" class="bodytext">
							<div>
							{section name=addinfo loop=$additionalcnt}
								<div class="bodytextblack" style="height:15px;"><strong>{$lang.Submitted_On}</strong>&nbsp;{$arr_additional[addinfo].Date_add}</div>
								{if $arr_additional[addinfo].filename}
								<div class="bodytextblack" style="height:15px;"><strong>{$lang.Additional_File} :</strong>&nbsp;<a href="Javascript: Download_File('{$arr_additional[addinfo].filename1}','project');" class="link">{$arr_additional[addinfo].filename}</a></div>
								{/if}
								<div class="bodytextblack" style="height:15px;">{$arr_additional[addinfo].Desc|stripslashes}</div>
								<div>&nbsp;</div>
							{/section}
							</div>												
						</td>
											
					</tr>
					{/if}					
					<tr>			
						<td  valign="top" height="30" class="bodytextblack"><strong>{$lang.Reminder} : </strong></td>	
						<td valign="top" class="bodytext">{$lang.Bid_Note1}</td>
										
					</tr>
					<tr class="bodytextblack">
						<td colspan="3" align="center" width="100%">
							<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
								<tr height="30" valign="top" bgcolor="#D5D5D5" >								<td width="15%" class="bodytextblack" align="left" >&nbsp;<a href="project_{$project_id}_{$clear_title}.html#bid_list" class="footerlinkcommon23"><strong>{$lang.Bids_Received} ({$count}) </strong></a></td>
									<td width="1%" class="bodytextblack" >&nbsp;</td>
									<td width="10%" class="bodytextblack">&nbsp;<a href="shortlist_{$project_id}_{$clear_title}.html#short_list" class="footerlinkcommon23"><strong>{$lang.Shortlist}({$Loop}) </strong></a></td>
									<td width="1%" class="bodytextblack">&nbsp;</td>
									<td width="15%" class="bodytextblack">&nbsp;<a href="decline_{$project_id}_{$clear_title}.html#decline_list" class="footerlinkcommon23"><strong>{$lang.Decline_Bid}({$declinecnt})</strong></a></td>
									<td width="23%" class="bodytextblack1">{$lang.Average_bid_amount}: {if $count != 0}<strong>{$lang.Curreny}{$Bid}</strong>{else}<strong>{$lang.Curreny}0.00</strong>{/if}</td>
									<td width="23%" class="bodytextblack1">{$lang.Average_delivery_time}: {if $count != 0}<strong>{$Time} {$lang.Day}</strong>{else}<strong>0 {$lang.Day}</strong>{/if}</td>
								</tr>
								<tr bgcolor="#D5D5D5">
									<td colspan="7" class="bodytextblack1" valign="bottom" align="left">&nbsp;
									
				
									
									<a href="post-new-task.html" class="footerlinkcommon23" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">
										<strong>{$lang.Posted_project}</strong>
									</a> 
									 | 
									 <a href="#bid_list" onclick="JavaScript: popupWindowURL('share_task.php?project_id={$project_id}&pop_up=true','','625','525','','true','true');" class="footerlinkcommon23">
										<strong>{$lang.SEND_TASK}</strong>
									</a>
									 | 
									 <a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id={$project_id}&project_creator={$project_posted_by}&id=1&pop_up=true','','640','600','','true','true');" class="footerlinkcommon23">
									 	<strong>{$lang.Message_Board}({$msgboardcnt})</strong>
									</a> 
									 | 
									 <a href="contact_{$project_posted_by}.html" class="footerlinkcommon23" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">
									 	<strong>{$lang.Contact} {$project_posted_by}</strong>
									</a>
									{if $project_posted_by == $smarty.session.User_Name}  
									|
									  <a href="republish_post_project_{$project_id}_{$clear_title}.html" class="footerlinkcommon23">
									 	<strong>{$lang.Republish_project}</strong>
									  </a>
									{/if}</td>
								</tr>
							<tr >
		<td colspan="7" height="1">&nbsp;</td>
	</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#F9FAFC">
		<td class="bodytext1" colspan="7" align="justify">
		<strong>{$lang.Remember}</strong>&nbsp;{$lang.Remember_Note} 
		</td>
	</tr>
	
					{if $project_allow_bid ==1}
					<tr class="{cycle values='list_B, list_A'} bodytextblack">			
						<td colspan="3" valign="top" class="bodytextblack"><strong><font color="#FF3300">{$lang.Vip}</font></strong></td>					
					</tr>
					{/if}
				</table>			
			</div>
		</div>	
			
	<!--	<img alt="" title="" style="margin:0 0 0 11px;" src="{$Templates_Image}border_white_bottom.gif" />-->
	
		<!--{if $Loop > 0}
		{cycle values=''}
		;-->
			<!--<img alt="" title="" style="margin:0 0 0 11px;" src="{$Templates_Image}border_white_top.gif" />-->
			<div class="el_white_row">			
				<div align="center">							
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr bgcolor="#D5D5D5">
							<td width="10%" class="bodytext" colspan="6">&nbsp;</td>
						</tr>
						{if $project_hide == 1}
							{section name=bid loop=$Loop}
							{if $smarty.session.User_Id == $user_id}
								{if $arr_Bid[bid].Premium_Member == 0}
								<tr class="{cycle values='list_A style3, list_B style3'}">
								{else}
								 <tr class="{cycle values='list_J styletr'}">
								{/if}
									<td align="center">									
										<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td  width="10%" valign="top"><a href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','640','700','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a></td>
												<td  width="34%" align="left" valign="top">
												<a href="tasker_profile_{$arr_Bid[bid].User_Name}.html" class="link" style="text-decoration:none; "><strong>{$arr_Bid[bid].User_Name}</strong></a>
												{if $arr_Bid[bid].Premium_Member == 0} 
												&nbsp;
												{else}
												&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
												{/if}
												</td>
												<td  width="13%" align="center" valign="top"><strong>{$arr_Bid[bid].Location}</strong></a>										
												</td>
												<td  width="10%" align="center" valign="top"><strong>{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</strong></td>
												<td  width="25%" align="center" valign="top">
												{if $arr_Bid[bid].rating == 0.00}
													<strong>{$lang.No_Feedback_Yet}</strong>
												{else}									 
													<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120" style="float:none;">&nbsp;&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link"><strong>({$arr_Bid[bid].reviews} reviews)</strong></a>
												{/if}
												</td>
												<td  width="10%" align="center"><strong>{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</strong></td>

											</tr>
											<tr>
											  <td  width="10%" align="left">
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Shortlist==0}
														<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '1');" class="link" style="text-decoration:none;"><strong>{$lang.De_Shortlist}</strong></a>
													{else}
														&nbsp;
													{/if}
												{else}
													&nbsp;
												{/if}	
												<br />
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Decline==1}
														<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','625','350','','true','true');" class="link" style="text-decoration:none; "><strong>{$lang.Decline_Bid}</strong></a>
													{/if}
												{else}
													&nbsp;
												{/if}												</td>
												<td  width="34%" align="left">&nbsp;</td>
												<td width="13%" align="center" valign="top">{$lang.location}</td>
												<td  width="10%" align="center" valign="top">{$lang.Bid_Amount}</td>
												<td width="25%" align="center" valign="top">{$lang.feedback}</td>
												<td  width="10%" align="center" valign="top" nowrap="nowrap">{$lang.Delivery_Time}</td>
											</tr>
											<tr>
												<td width="10%" align="left">&nbsp;</td>
												<td  colspan="5" align="left">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
											</tr>
											<tr>
												<td  width="10%">
												{if $project_post_to == $arr_Bid[bid].User_Name}
													 <img src="{$Templates_Image}winner.gif" border="0"/>
												{else}
													&nbsp;
												{/if}										
												</td>
												<td  colspan="5" align="left">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
											</tr>
											{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
												{if $project_status == 1}
												<tr>
													<td  colspan="6" align="left"><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');" class="link" ><strong>{$lang.Cancel_Bid}</strong></a></td>
												</tr>
												{/if}
											{/if}									
										</table>
									</td>
								</tr>
							{assign var="count_check" value="1"}
									
							{elseif $smarty.session.User_Id == $arr_Bid[bid].User_Id}
								{if $arr_Bid[bid].Premium_Member == 0}
									 <tr class="{cycle values='list_A style3, list_B style3'}">
								{else}
									 <tr class="{cycle values='list_J styletr'}">
								{/if}
									<td align="center">
										<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td  width="10%" valign="top"><a href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','640','700','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a></td>
												<td width="34%" align="left" valign="top">
												<a href="tasker_profile_{$arr_Bid[bid].User_Name}.html" class="link" style="text-decoration:none;"><strong>{$arr_Bid[bid].User_Name}</strong></a>
												{if $arr_Bid[bid].Premium_Member == 0} 
												&nbsp;
												{else}
												&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
												{/if}
												</td>
												<td  width="13%" align="center" valign="top"><strong>{$arr_Bid[bid].Location}</strong></a>										
												</td>
												<td  width="10%" align="center" valign="top"><strong>{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</strong></td>
												<td  width="25%" align="center" valign="top">
												{if $arr_Bid[bid].rating == 0.00}
													<strong>{$lang.No_Feedback_Yet}</strong>
												{else}									 
													<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120" style="float:none;">&nbsp;&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link">({$arr_Bid[bid].reviews} reviews)</a>
												{/if}
												</td>
												<td  width="10%" align="center" valign="top" nowrap="nowrap"><strong>{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</strong></td>
											</tr>
											<tr>
											  <td  width="10%" align="left">
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Shortlist==0}
														<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '1');" class="link" style="text-decoration:none; "><strong>{$lang.De_Shortlist}</strong></a>
													{else}
														&nbsp;
													{/if}
												{else}
													&nbsp;
												{/if}	
												<br />
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Decline==1}
														<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','625','350','','true','true');" class="link" style="text-decoration:none; "><strong>{$lang.Decline_Bid}</strong></a>
													{/if}
												{else}
													&nbsp;
												{/if}												</td>
												<td width="34%" align="left">&nbsp;</td>
												<td  width="13%" align="center" valign="top">{$lang.location}</td>
												<td  width="10%" align="center" valign="top">{$lang.Bid_Amount}</td>
												<td  width="25%" align="center" valign="top">{$lang.feedback}</td>
												<td  width="10%" align="center" valign="top" nowrap="nowrap">{$lang.Delivery_Time}</td>
											</tr>
											<tr>
												<td width="10%" align="left">&nbsp;</td>
												<td  colspan="5" align="left">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
											</tr>
											<tr>
												<td  width="10%">
												{if $project_post_to == $arr_Bid[bid].User_Name}
													 <img src="{$Templates_Image}winner.gif" border="0"/>
												{else}
													&nbsp;
												{/if}										
												</td>
												<td  colspan="5" align="left">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
											</tr>
											{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
												{if $project_status == 1}
												<tr>
													<td  colspan="6" align="left"><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');" class="link" ><strong>{$lang.Cancel_Bid}</strong></a></td>
												</tr>
												{/if}
											{/if}
										</table>									
									</td>
								</tr>
							{assign var="count_check" value="1"}
									{/if}  <!-- Main If Part-->
							{/section}
							{if $count_check != 1}
							<tr>
								<td  align="center"><font color="#FF3300">{$lang.Bid_hide}</font></td>
							</tr>
							{/if}
						{else}
							{section name=bid loop=$Loop}
								{if $arr_Bid[bid].Premium_Member == 0}
								 <tr class="{cycle values='list_A style3, list_B style3'}">
								{else}
								<tr class="{cycle values='list_J styletr'}">
								{/if}
									<td align="center">									
										<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td  width="10%" valign="top"><a href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','640','700','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a></td>
												<td width="34%" align="left" valign="top">
												<a href="tasker_profile_{$arr_Bid[bid].User_Name}.html" target="_blank" class="link" style="text-decoration:none; "><strong>{$arr_Bid[bid].User_Name}</strong></a>
												{if $arr_Bid[bid].Premium_Member == 0} 
												&nbsp;
												{else}
												&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
												{/if}
												</td>
												<td  width="13%" align="center" valign="top"><strong>{$arr_Bid[bid].Location}</strong></a>										
												</td>
												<td  width="10%" align="center" valign="top"><strong>{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</strong></td>
												<td width="25%" align="center" valign="top">
												{if $arr_Bid[bid].rating == 0.00}
													<strong>{$lang.No_Feedback_Yet}</strong>
												{else}									 
													<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120" style="float:none;">&nbsp;&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link"><strong>({$arr_Bid[bid].reviews} reviews)</strong></a>
												{/if}
												</td>
												<td  width="10%" align="center" valign="top"><strong>{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</strong></td>
											</tr>
											<tr>
											<td  width="10%" align="left">
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Shortlist==0}
														<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '1');" class="link" style="text-decoration:none;"><strong>{$lang.De_Shortlist}</strong></a>
													{else}
														&nbsp;
													{/if}
												{else}
													&nbsp;
												{/if}	
												<br />
												{if $smarty.session.User_Id == $user_id}
													{if $arr_Bid[bid].Bid_Decline==1}
														<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','625','350','','true','true');" class="link" style="text-decoration:none; "><strong>{$lang.Decline_Bid}</strong></a>
													{/if}
												{else}
													&nbsp;
												{/if}												</td>
												<td  width="34%" align="left">&nbsp;</td>
												<td  width="13%" align="center" valign="top">{$lang.location}</td>
												<td  width="10%" align="center" valign="top">{$lang.Bid_Amount}</td>
												<td  width="25%" align="center" valign="top">{$lang.feedback}</td>
												<td  width="10%" align="center" valign="top" nowrap="nowrap">{$lang.Delivery_Time}</td>
											</tr>
											<tr>
											<td  width="10%" align="left">&nbsp;</td>
											<td  colspan="5" align="left">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
										</tr>
										<tr>
											<td  width="10%" >
											{if $project_post_to == $arr_Bid[bid].User_Name}
												 <img src="{$Templates_Image}winner.gif" border="0"/>
											{else}
												&nbsp;
											{/if}										
											</td>
											<td  colspan="5" align="left">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
										</tr>
										{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
											{if $project_status == 1}
											<tr>
												<td  colspan="6" align="left"><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');" class="link" ><strong>{$lang.Cancel_Bid}</strong></a></td>
											</tr>
											{/if}
										{/if}
										</table>
									</td>
								</tr>
							{/section}
						{/if}	
					</table>
				</div>
			</div>
		{/if}	</div>
</div>
<input type="hidden" name="Action" />
<input type="hidden" name="project_id" value="{$project_id}" />
<input type="hidden" name="status" />
<input type="hidden" name="bid_id" />
</form>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
</div>
					
	<div id="more_link">
		
	</div>
</div>
<!--<img alt="" title="" src="{$Templates_Image}border_bottom.gif" />-->