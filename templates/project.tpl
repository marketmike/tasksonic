 <form name="frmproject" method="post" action="{$smarty.server.PHP_SELF}">
  <div id="cols2-top"></div>
    <div id="cols2" class="box">
    
        <!-- Blog -->
        <div id="col-left">

            <div class="title">
                <span class="f-right">
					{if $smarty.session.User_Id != $user_id}
						<div class="buttons">
						{if $project_days_open < 0}
							<a href="place_bid_{$project_id}_{$clear_title}.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative" disabled="disabled">
							<img src="templates/images/tick.png" alt=""/> 
							Expired
							</a>
						{else}
							{if !$smarty.session.User_Name}
								<a onclick="popup('popUpDiv')" href=#>
								<img src="templates/images/tick.png" alt=""/> 
								Place Bid
								</a>
							{else}
								<a href="place_bid_{$project_id}_{$clear_title}.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
								<img src="templates/images/tick.png" alt=""/> 
								Place Bid
								</a>
							{/if}
						{/if}						
						</div>
					{else}
						<div class="buttons">
						{if $project_days_open < 0}					
							<a href="award_task_{$project_id}_{$clear_title}.html"   style='text-decoration:none;' class="negative" disabled="disabled">
							<img src="templates/images/tick.png" alt=""/> 
							Expired
							</a>
						{else}
							{if !$smarty.session.User_Name}
								<a onclick="popup('popUpDiv')" href=#>
								<img src="templates/images/tick.png" alt=""/> 
								Award task
								</a>
							{else}						
								<a href="award_task_{$project_id}_{$clear_title}.html"   style='text-decoration:none;' class="negative">
								<img src="templates/images/tick.png" alt=""/> 
								Award task
								</a>
							{/if}							
						{/if}						
						</div>					
					{/if}
				</span>
                <h4>{$project_title|stripslashes}</h4>
            </div> <!-- /title -->


			<table cellpadding="3" cellspacing="4" border="1" width="100%">
				<tr>
					<td width="25%" class="bodytextblack" align="left"><strong>{$lang.task_Name} : </strong></td>
					<td  class="bodytext" align="left">{$project_title|stripslashes}</td>
				</tr>
				<tr>
					<td width="25%" class="bodytextblack" align="left"><strong>{$lang.Status} : </strong></td>
					<td class="bodytext" colspan="2" align="left">
						{if $project_days_open < 0}
						{$lang.Bid_period_expired}
						{else}
						{if $project_status == 1}{$lang.Open_for_bidding}{/if}
						{if $project_status == 2}{$langFreezed}<strong>&nbsp;&nbsp;(Awarded to {$project_post_to})</strong>{/if}
						{if $project_status == 3}{$Close_for_Bidding}<strong>&nbsp;&nbsp;(Bid awarded to {$project_post_to})</strong>{/if}
						{if $project_status == 4}{$Closed_Manually}<strong>&nbsp;&nbsp;(By Buyer)</strong>{/if}
						{if $project_status == 5}{$Closed}<strong>&nbsp;&nbsp;(Awarding to this Consultation  is left by {$project_posted_by})</strong>{/if}
						{if $project_status == 7}{$Closed}<strong>&nbsp;&nbsp;(Awarding to this Consultation  is left by {$project_posted_by})</strong>{/if}
						{/if}
					</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Posted_by} : </strong></td>
				    <td class="bodytext" colspan="2" valign="top" align="left">
					  {if $membership_id != 0}
					   <img src="{$Templates_Image}vip_member.gif" border="0"/>
					  {/if}
						{if !$smarty.session.User_Name}
							<a onclick="popup('popUpDiv')" href=#>{$project_posted_by}</a>
						{else}
							<a href="task_owner_profile_{$project_posted_by}.html" target="_blank" class="footerlinkcommon2">{$project_posted_by}</a>
						{/if}
						{if !$smarty.session.User_Name}
							&nbsp;<a onclick="popup('popUpDiv')" href=#><img src="{$Templates_Image}btn_pm.gif" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{else}
						&nbsp;<a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message.php?project_id={$project_id}&id=1&pop_up=true','','600','500','','true','true');" {if $project_days_open < 0}disabled="disabled" {/if}><img src="{$Templates_Image}btn_pm.gif" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{/if} 
				     {if $ave_rating == 0.00}
					     ({$lang.NO_Feddback})
					   {else}	 
					   <img src="{$Templates_Image}{$ave_rating|intval}.gif" width="120">&nbsp;&nbsp;&nbsp;{if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlink">({$lang.reviews} reviews)</a>{else}<a href="{$project_posted_by}_task_owner_feedback.html" class="footerlink">({$lang.reviews} reviews)</a>{/if}
					  {/if}					  
					  </td>
				</tr>
				{if $premium_project == 1}
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.task_Stat} : </strong></td>
					<td class="bodytextblack" align="left" colspan="2">{$lang.Premium_project}</td>
				</tr>
				{/if}
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Description} : </strong></td>
					<td class="bodytext" align="left" colspan="2">{$project_description|wordwrap:50:"\n":true}</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>Location : </strong></td>
					<td class="bodytext" align="left" colspan="2">{$project_location|wordwrap:50:"\n":true}</td>
				</tr>
				<tr>
					<td valign="top" class="bodytextblack" align="left"><strong>{$lang.Related_Files} : </strong></td>
				    <td class="bodytext" align="left" colspan="2">
					{if $project_file_1}
						<a href="Javascript: Download_File('{$download_project_file_1}','project');" class="footerlinkcommon2">{$project_file_1}</a>
					{/if}
					{if $project_file_2}
					<BR>
						<a href="Javascript: Download_File('{$download_project_file_2}','project');" class="footerlinkcommon2">{$project_file_2}</a>
					{/if}
					{if $project_file_3}
					<BR>
					  <a href="Javascript: Download_File('{$download_project_file_3}','project');" class="footerlinkcommon2">{$project_file_3}</a>
					{/if}
					{if $project_file_1 == '' and $project_file_2 == '' and $project_file_3 == ''}
						{$lang.No_upload}
					{/if}					</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Budget1} : </strong></td>
					<td class="bodytext" align="left" colspan="2">{$project_budget}</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Required_Skills} : </strong></td>
					<td class="bodytext" align="left" colspan="2">{$categories}</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Posted_Date} : </strong></td>
					<td class="bodytext" align="left" colspan="2">{$project_posted_date}</td>
				</tr>
				<tr>
					<td class="bodytextblack" valign="top" align="left"><strong>{$lang.Days_Of_Bidding}: </strong></td>
					<td class="bodytext" align="left" colspan="2">
					{if $project_days_open < 0}
						{$lang.task_Closed_Bidding}
					{else}
						{$project_days_open} {$lang.Days_remaining} 
							{if $project_days_open == 1} 
								<font color="#FF0000">({$lang.Last_day_for_bidding})</font>
							{/if}
					{/if}</td>
				</tr>
				{if $additionalcnt > 0}
				<tr>
					<td class="bodytextblack" valign="top" colspan="3"><strong>{$lang.Additional_Information} : </strong></td>
				</tr>
				{section name=addinfo loop=$additionalcnt}
				<tr>
					<td class="bodytext" colspan="3"><strong>{$lang.Submitted_On}</strong>&nbsp;{$arr_additional[addinfo].Date_add}</td>
				</tr>
				{if $arr_additional[addinfo].filename}
				<tr>
					<td align="justify" class="bodytextblack" colspan="3"><strong>{$lang.Additional_File} :</strong>&nbsp;<a href="Javascript: Download_File('{$arr_additional[addinfo].filename1}','project');" class="footerlinkcommon2">{$arr_additional[addinfo].filename}</a></td>
				</tr>
				{/if}
				<tr>	
					<td class="bodytext" colspan="3">{$arr_additional[addinfo].Desc}</td>
				</tr>
				{/section}
				{/if}
		  </table>
	     </div> <!-- /col-left -->

        <hr class="noscreen" />

        <!-- Testimonials -->
        <div id="col-right">
        
            <h4><span>{$lang.Related_projects}</span></h4>

            <div class="box">
                      
	     <table width="200" align="center" cellpadding="0" cellspacing="0">
			 
			 {if $Related_Loop != ''}
			 {section name=related_project loop=$Related_Loop} 
			 <tr align="left" >
				 <td class="bodytextblack1" align="left">
										   
						 {if $arr_related_project[related_project].project_id != $project_id}
						 	  <ul style="margin-left:15px;"><li><a href="project_{$arr_related_project[related_project].project_id}_{$arr_related_project[related_project].clear_title}.html" class="footerlinkcommon23">{$arr_related_project[related_project].project_title|stripslashes}</a></li> </ul>
						 {/if} 	
				 </td>
			 </tr>
			 {/section}
			 {else}
			 	<tr>
					<td align="center" class="successMsg1">{$lang.No_Related}</td>
    			</tr>
			 {/if}
			 <tr align="left">
			 	<td align="left"><br> <h4><span>Map</span></h4>
				<br>
				 <img src=http://maps.google.com/staticmap?center={$project_latitude},{$project_longitude}&zoom=11&size=200x145&maptype=mobile&key=ABQIAAAArPJXFLLqXfV_819iGq0_BxQEFVX_bANe1r8Knizs6E1QF6U9whQnOMaPRK_njjvKuySuHvLfKAeCGw&sensor=false>
				<br>{$project_location} <!--{$project_latitude} {$project_longitude}-->
				</td>
			</tr>
		</table>
	     
	        
            </div> <!-- /box -->

							
        </div> <!-- /col-right -->
    
    </div> <!-- /cols2 -->
    <div id="cols2-bottom"></div>

    <hr class="noscreen" />
				
	     
	     
	     
	  </td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td colspan="7" class="bodytextblack" valign="top"><strong>{$lang.Reminder}: </strong>{$lang.Bid_Note1}</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr height="30" valign="top" bgcolor="#D5D5D5">
		<td width="15%" class="bodytextblack1">&nbsp;<a href="project_{$project_id}_{$clear_title}.html#bid_list" class="footerlinkcommon23"><strong>{$lang.Bids_Received} ({$count}) </strong></a></td>
		<td width="1%" class="bodytextblack1">&nbsp;</td>
		<td width="10%" class="bodytextblack1">&nbsp;<a href="shortlist_{$project_id}_{$clear_title}.html#short_list" class="footerlinkcommon23"><strong>{$lang.Shortlist}({$shortlistcnt}) </strong></a></td>
		<td width="1%" class="bodytextblack1">&nbsp;</td>
		<td width="15%" class="bodytextblack1">&nbsp;<a href="decline_{$project_id}_{$clear_title}.html#decline_list" class="footerlinkcommon23"><strong>{$lang.Decline_Bid}({$declinecnt})</strong></a></td>
		<td width="23%" class="bodytextblack1">&nbsp;{$lang.Average_bid_amount}: {if $count != 0}<strong>{$lang.Curreny}{$Bid}</strong>{else}<strong>{$lang.Curreny}0.00</strong>{/if}</td>
		<td width="23%" class="bodytextblack1">{$lang.Average_delivery_time}: {if $count != 0}<strong>{$Time} {$lang.Day}</strong>{else}<strong>0 {$lang.Day}</strong>{/if}</td>
	</tr>
	<tr bgcolor="#D5D5D5">
		<td colspan="7" class="bodytextblack1">&nbsp;
			{if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong>{$lang.Posted_project}</strong></a>{else}<a href="post-new-task.html" class="footerlinkcommon23" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');"><strong>{$lang.Posted_project}</strong></a>{/if}
			| {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong>{$lang.SEND_TASK}</strong></a>{else}<a href="#bid_list" onclick="JavaScript: popupWindowURL('share_task.php?project_id={$project_id}&pop_up=true','','900','500','','true','true');" class="footerlinkcommon23"><strong>{$lang.SEND_TASK}</strong></a>{/if} 
			|  {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong>{$lang.Message_Board}({$msgboardcnt})</strong></a>{else}<a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id={$project_id}&project_creator={$project_posted_by}&id=1&pop_up=true','','600','500','','true','true');" class="footerlinkcommon23"><strong>{$lang.Message_Board}({$msgboardcnt})</strong></a>{/if} 
			|  {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong>{$lang.Contact} {$project_posted_by}</strong></a>{else}<a href="contact_{$project_posted_by}.html" class="footerlinkcommon23" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');"><strong>{$lang.Contact} {$project_posted_by}</strong></a>{/if}
			{if $project_posted_by == $smarty.session.User_Name}|  <a href="republish_post_project_{$project_id}_{$clear_title}.html" class="footerlinkcommon23"><strong>{$lang.Republish_project}</strong></a>{/if}
		</td>
	</tr>
	<tr>
		<td colspan="7" height="1">&nbsp;</td>
	</tr>
	<tr bgcolor="#F9FAFC" >
		<td class="bodytext1" colspan="7" align="justify" >
		<strong>{$lang.Remember}</strong>&nbsp;{$lang.Remember_Note} 
		</td>
	</tr>
	<tr bgcolor="#F9FAFC">
	   <td colspan="7">&nbsp;</td>
	</tr>
	{if $project_allow_bid ==1}
	<tr bgcolor="#F9FAFC">
		<td colspan="7" class="bodytextblack1" valign="top" align="center"><strong><font size="3">{$lang.Vip}</font></strong></td>
	</tr>
	{/if}
</table>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr bgcolor="#D5D5D5">
		<td width="10%" class="bodytext" colspan="6">&nbsp;</td>
	</tr>
	{if $project_hide == 1}
		{section name=bid loop=$Loop}
			 {if $smarty.session.User_Id == $user_id}
				 {if $arr_Bid[bid].Premium_Member == 0}
					<tr class="{cycle values='list_A style3, list_B style3'}">
				   {else}
					<!--<tr class="{cycle values='list_J style3'}">-->
					<tr class="{cycle values='list_J styletr'}">
				   {/if}	
					<td colspan="6">
						<table cellpadding="1" cellspacing="1" border="0" width="100%">
							<tr>
								<td width="10%" align="center" valign="top" ><a href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','600','500','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a>
								</td>
								
								<td width="34%">
								<a href="tasker_profile_{$arr_Bid[bid].User_Name}.html">{$arr_Bid[bid].User_Name}</a>
								{if $arr_Bid[bid].Premium_Member == 0} 
								&nbsp;
								{else}
								&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
								{/if}
								</td>
								<td width="13%">{$arr_Bid[bid].Location}</td>
								<td width="10%">{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</td>
								<td width="25%">
								{if $arr_Bid[bid].rating == 0.00}
								No Feedback yet
								{else}									 
								<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120"><br />&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link">({$arr_Bid[bid].reviews} reviews)</a>
								{/if}
								</td>
								<td width="10%">{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</td>
							</tr>
							<tr>
							  <td align="center">
									{if $smarty.session.User_Id == $user_id}
										{if $arr_Bid[bid].Bid_Shortlist==1}
											<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '0');" class="link">{$lang.Shortlist}</a>
										{else}
											
										{/if}
									{else}
										{$lang.Shortlist}
									{/if}	
									<br />
									{if $smarty.session.User_Id == $user_id}
										{if $arr_Bid[bid].Bid_Decline==1}
											<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','500','300','','true','true');" class="link">{$lang.Decline_Bid}</a>
										{/if}
									{else}{$lang.Decline_Bid}{/if}							  </td>
								<td width="34%" valign="top">&nbsp;</td>
								<td width="13%" valign="top">{$lang.location}</td>
								<td width="10%" valign="top">{$lang.Bid_Amount}</td>
								<td width="25%" valign="top">{$lang.feedback}</td>
								<td width="15%" valign="top">{$lang.Delivery_Time}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td colspan="5">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
							</tr>
							<tr>
								 <td align="center">
									{if $project_post_to == $arr_Bid[bid].User_Name}
											 <img src="{$Templates_Image}winner.gif" border="0"/>
									{else}&nbsp;
									{/if}</td>
								<td colspan="5">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
							</tr>
							{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
							   {if $project_status == 1}
									<tr>
										<td colspan="6" align="left" valign="top">
										 <strong><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');"  >{$lang.Cancel_Bid}</a></strong> &nbsp;&nbsp;
										</td>
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
					<td colspan="6">
						<table cellpadding="1" cellspacing="1" border="0" width="100%">
							<tr>
								<td width="10%" align="center" valign="top"><a  href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','600','500','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a>
								</td>
								
								<td width="34%"><a href="tasker_profile_{$arr_Bid[bid].User_Name}.html">{$arr_Bid[bid].User_Name}</a>
								{if $arr_Bid[bid].Premium_Member == 0}
								&nbsp;
								{else}
								&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
								{/if}
								</td>
								<td width="13%">{$arr_Bid[bid].Location}</td>
								<td width="10%">{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</td>
								
								<td width="25%">
								{if $arr_Bid[bid].rating == 0.00}
									No Feedback yet
								{else}									 
									<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120"><br />&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link">({$arr_Bid[bid].reviews} reviews)</a>
								{/if}
								</td>
								<td width="15%">{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</td>
							</tr>
							<tr>
							  <td align="center">
									{if $smarty.session.User_Id == $user_id}
										{if $arr_Bid[bid].Bid_Shortlist==1}
											<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '0');" class="link">{$lang.Shortlist}</a>
										{else}
											{$lang.Shortlist}
										{/if}
									{else}
										{$lang.Shortlist}
									{/if}	
									<br />
									{if $smarty.session.User_Id == $user_id}
										{if $arr_Bid[bid].Bid_Decline==1}
											<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','500','300','','true','true');" class="link">{$lang.Decline_Bid}</a>
										{/if}
									{else}
										{$lang.Decline_Bid}
									{/if}							  </td>
								<td width="34%" valign="top">&nbsp;</td>
								<td width="13%" valign="top">{$lang.location}</td>
								<td width="10%" valign="top">{$lang.Bid_Amount}</td>
								<td width="25%" valign="top">{$lang.feedback}</td>
								<td width="15%" valign="top">{$lang.Delivery_Time}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td colspan="6" >{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
							</tr>
							<tr>
								 <td align="center">
									{if $project_post_to == $arr_Bid[bid].User_Name}
											 <img src="{$Templates_Image}winner.gif" border="0"/>
									{else}&nbsp;
									{/if}</td>
								<td colspan="6">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
							</tr>
							{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
								{if $project_status == 1}
								<tr>
									<td colspan="6" align="left" valign="top">
									 <strong><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');" class="link">{$lang.Cancel_Bid}</a></strong> &nbsp;&nbsp;
									</td>
								</tr>
								{/if}
							{/if}	
						</table>
					</td>
				</tr>
				{assign var="count_check" value="1"}
				{/if}		
		{/section}
	{if $count_check != 1}
				<tr>
					<td width="10%" align="center">{$lang.Bid_hide}</td>
				</tr>
	{/if}
	{else}
	<a name="bid_list"></a>
		{section name=bid loop=$Loop}
		 {if $arr_Bid[bid].Premium_Member == 0}
					<tr class="{cycle values='list_A style3, list_B style3'}">
				   {else}
					<tr class="{cycle values='list_J styletr'}">
				   {/if}	
			<td colspan="6">
				<table cellpadding="1" cellspacing="1" border="0" width="100%">
					<tr>
						<td width="10%" align="center" valign="top"><a  href="#bid_list" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','600','500','','true','true');"><img src="{$Templates_Image}btn_pm.gif" border="0" align="middle"/></a></td>
						
						<td width="34%" ><a href="tasker_profile_{$arr_Bid[bid].User_Name}.html" target="_blank" class="link">{$arr_Bid[bid].User_Name}</a>
						{if $arr_Bid[bid].Premium_Member == 0}
						&nbsp;
						{else}
						&nbsp;&nbsp;<img src="{$Templates_Image}vip_member.gif" border="0"/>
						{/if}
						</td>
						<td width="13%">{$arr_Bid[bid].Location}</td>
						<td width="10%">{$lang_common.Curreny}&nbsp;{$arr_Bid[bid].Bid_Amount}</td>
						
						<td width="25%">
						{if $arr_Bid[bid].rating == 0.00}
							No Feedback yet
						{else}
							<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120"><br />
							&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="link">({$arr_Bid[bid].reviews} reviews)</a>
						{/if}	
					  </td>
						<td width="15%" >{$arr_Bid[bid].Delivery_Time}&nbsp;{$lang.Day}</td>
					</tr>
					<tr>
					   <td align="center">
							{if $smarty.session.User_Id == $user_id}
								{if $arr_Bid[bid].Bid_Shortlist==1}
									<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '0');" class="link">{$lang.Shortlist}</a>
								{else}
									{$lang.Shortlist}
								{/if}
							{else}
								{$lang.Shortlist}
							{/if}	
								<br />
							{if $smarty.session.User_Id == $user_id}
								{if $arr_Bid[bid].Bid_Decline==1 }
									<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','500','300','','true','true');">{$lang.Decline_Bid}</a>
								{/if}
							{else}
								{$lang.Decline_Bid}
							{/if}					  </td>
						<td width="34%" valign="top">&nbsp;</td>
						<td width="13%" valign="top">{$lang.location}</td>
						<td width="10%" valign="top">{$lang.Bid_Amount}</td>
						<td width="25%" valign="top">{$lang.feedback}</td>
						<td width="15%" valign="top">{$lang.Delivery_Time}</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="5">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</td>
					</tr>
					<tr>
						<td align="center">
								{if $project_post_to == $arr_Bid[bid].User_Name}
										 <img src="{$Templates_Image}winner.gif" border="0"/>
								{else}&nbsp;
								{/if}
					  </td>
						<td colspan="5">{$lang.Bid_Time} : {$arr_Bid[bid].Bid_Time}</td>
					</tr>
					{if $smarty.session.User_Id == $arr_Bid[bid].User_Id}
						{if $project_status == 1}
						<tr>
							<td colspan="6" align="left" valign="top">
							 <strong><a href="JavaScript: Delete_Click('{$arr_Bid[bid].bid_id}');" >{$lang.Cancel_Bid}</a></strong>
							</td>
						</tr>
						{/if}
					{/if}	
				</table>
			</td>
		</tr>
		{/section}
	{/if}
</table>
<input type="hidden" name="Action" />
<input type="hidden" name="project_id" value="{$project_id}" />
<input type="hidden" name="status" />
<input type="hidden" name="bid_id" />
</form>

					
	
