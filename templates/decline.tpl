<!--template used on task.php shortlist.php and decline.php-->
{php}
// select the timezone for your countdown
$timezone = 'US/Eastern';
//$timezone = 'US/Pacific';
//$timezone = 'US/Central';
$client_timezone = putenv("TZ=$timezone");
{/php}		
{literal}
<SCRIPT language="JavaScript">
function countdown_clock(year, month, day, hour, minute, format)
         {
         //I chose a div as the container for the timer, but
         //it can be an input tag inside a form, or anything
         //who's displayed content can be changed through
         //client-side scripting.
         html_code = '<div id="countdown"></div>';
         
         document.write(html_code);
         
         countdown(year, month, day, hour, minute, format);                
         }
         
function countdown(year, month, day, hour, minute, format)
         {
         Today = new Date();
         Todays_Year = Today.getFullYear() - 2000;
         Todays_Month = Today.getMonth();                  
         
         //Convert both today's date and the target date into miliseconds.                           
         Todays_Date = (new Date(Todays_Year, Todays_Month, Today.getDate(), 
                                 Today.getHours(), Today.getMinutes(), Today.getSeconds())).getTime();                                 
         Target_Date = (new Date(year, month - 1, day, hour, minute, 00)).getTime();                  
         
         //Find their difference, and convert that into seconds.                  
         Time_Left = Math.round((Target_Date - Todays_Date) / 1000);
         
         if(Time_Left < 0)
            Time_Left = 0;
         
         var innerHTML = '';
         
         switch(format)
               {
               case 0:
                    //The simplest way to display the time left.
                    innerHTML = Time_Left + ' seconds';
                    break;
               case 1:
                    //More datailed.
                    days = Math.floor(Time_Left / (60 * 60 * 24));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.floor(Time_Left / (60 * 60));
                    Time_Left %= (60 * 60);
                    minutes = Math.floor(Time_Left / 60);
                    Time_Left %= 60;
                    seconds = Time_Left;
                    
                    dps = 's'; hps = 's'; mps = 's'; sps = 's';
                    //ps is short for plural suffix.
                    if(days == 1) dps ='';
                    if(hours == 1) hps ='';
                    if(minutes == 1) mps ='';
                    if(seconds == 1) sps ='';
                    
                    innerHTML = days + ' day' + dps + ' ';
                    innerHTML += hours + ' hour' + hps + ' ';
                    innerHTML += minutes + ' minute' + mps + ' and ';
                    innerHTML += seconds + ' second' + sps;
					innerHTML += ' left for bidding!';
                    break;
               default: 
                    innerHTML = Time_Left + ' seconds';
               }                   
                    
            document.getElementById('countdown').innerHTML = innerHTML;     
               
         //Recursive call, keeps the clock ticking.
         setTimeout('countdown(' + year + ',' + month + ',' + day + ',' + hour + ',' + minute + ',' + format + ');', 1000);
         }
</SCRIPT>
{/literal} 
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$project_title|stripslashes}</h1>
	<h5>posted on {$project_posted_date} by {$project_posted_by}</h5>
	<h3 style="color:red;"><strong><center>
		{if $project_status == 2}
			Task Awarded to {$project_post_to}
		{elseif $project_status == 3}
			Task Accepted and Underway
		{elseif $project_status == 4}
			Task Canceled bt Task Owner
		{elseif $project_status == 5}
			Task Marked Completed By Tasker 
		{elseif $project_status == 6}
			Task Completed
		{elseif $project_status == 7}
			Task Failed		
		{elseif $project_status == 1 && $bid_status == 0}
			{$lang.task_Closed_Bidding}
		{elseif $project_status == 1 && $bid_status == 1}
			<script type="text/javascript">countdown_clock({$year}, {$month}, {$day}, {$hour}, {$min}, 1);</script>		
		{/if}
	</center></strong>
	</h3>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			{if $project_status == 5 && $smarty.session.User_Id == $user_id}<div style="background:#FFFF66;padding:5px;text-align:center;height:auto;font-weight:bold;">{if $tasker_reimburse >0}The Tasker has marked the task completed. Please create an escrow payment for the amount of ${$tasker_reimburse} to cover additional charges incurred by the tasker, e.g. paying for dog food, dry cleaning pickup. Details on these charges were highlighted in the email you received from the Tasker when they marked the Task as completed. You have three days to create the remaining escrow payment and release all escrow payments to the Tasker or to dispute task completion or the additional charges should you disagree with their assessment.{else}The Tasker has marked the task completed. You have three days to release the escrow payment to the Tasker or to dispute task completion should you disagree with their assessment of the task.{/if}</div>{/if}
			 <form name="frmproject" method="post" action="{$smarty.server.PHP_SELF}">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">{$project_title|stripslashes}</label>
					</div>
					</div>					
				<div class="clear"></div>
					<div class="body_shim">
						<div class="title" style="margin-top:10px;margin:5px">
							<div class="f-right" style="text-align:center">
							<div class="clear"></div>
								{if $smarty.session.User_Id != $user_id}
									<div class="button-no">
									{if $project_status == 2}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Awarded
										</a>
									{elseif $project_status == 3}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Accepted
										</a>
									{elseif $project_status == 4}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Canceled
										</a>
									{elseif $project_status == 5}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Tasker Done
										</a>
									{elseif $project_status == 6}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Completed
										</a>
									{elseif $project_status == 7}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									{elseif $project_status == 1 && $bid_status == 0}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									{elseif $project_status == 1 && $bid_status == 1}
											{if $task_owner_vip != 1 && $project_allow_bid ==1}
												<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
												VIP BIDS ONLY
												</a>												
											{elseif $Tasker}
												<a href="place_bid_{$project_id}_{$clear_title}.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
												Update Bid
												</a>
											{else}
												<a href="place_bid_{$project_id}_{$clear_title}.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
												Place Bid
												</a>											
											{/if}
									{/if}									
									</div>
								{else}
									<div class="button-no">
									{if $project_status == 2}
										<a href="reaward_task.php?id={$project_id}"  style='text-decoration:none;' class="negative">
										Re-Award
										</a>
									{elseif $project_status == 3}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Accepted
										</a>
									{elseif $project_status == 4}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Canceled
										</a>
									{elseif $project_status == 5}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Tasker Done
										</a>
									{elseif $project_status == 6}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Completed
										</a>
									{elseif $project_status == 7}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									{elseif $project_status == 1 && $bid_status == 0}
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									{elseif $project_status == 1 && $bid_status == 1}
										{if !$smarty.session.User_Name}
											<a onclick="popup('popUpDiv')" href=#>
											Award task
											</a>
										{else}
											{if $Loop > 0}										
											<a href="award_task_{$project_id}_{$clear_title}.html"   style='text-decoration:none;' class="negative">
											Award task
											</a>
											{/if}
										{/if}
									{/if}
									</div>
								{/if}
							{if $premium_project == 1}
							<div class="clear"></div>
							<div style="margin:0 auto;text-align:center"><img src="{$Templates_Image}premium_large.png" border="0" style="vertical-align:middle" /></div>
							<div class="clear"></div>
							{/if}								
							</div>
						<div style="width:410px;">{$project_description|wordwrap:1000:"\n":true}</div>
						</div><!-- /award button -->
						<div class="clear"></div>
						<div class="deadlines_wrapper"><div class="deadlines-left"><strong>Confirm Tasker by:</strong><br />{$project_days_left} at {$bidding_time}</div> <div class="deadlines-right"><strong>Complete Task by:</strong><br />{$completed_by} at {$completed_time}</div><div class="clear"></div></div>					
						<div class="clear"></div>
						</div><!--end body shim--> 
						<div class="clear"></div>


					{if $additionalcnt > 0}
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">	
					<label for="login-email-address">{$lang.Additional_Information}</label>
					</div>
					</div>
					
					<div class="clear"></div>
										
					<div class="field">
					{section name=addinfo loop=$additionalcnt}
					<div><strong>{$lang.Submitted_On}</strong>&nbsp;{$arr_additional[addinfo].Date_add}</div>
					{if $arr_additional[addinfo].filename}
					<div class="clear"></div>
					<div><strong>{$lang.Additional_File} :</strong>&nbsp;<a href="Javascript: Download_File('{$arr_additional[addinfo].filename1}','project');" class="footerlinkcommon2">{$arr_additional[addinfo].filename}</a></div>
					{/if}
					<div class="clear"></div>
					<div>{$arr_additional[addinfo].Desc}</div>
					{/section}
					<div class="clear"></div>
					</div>
					<div class="clear"></div>															
					{/if}												
							
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Task Owner Information</label>
						</div>
						</div>
						
						<div class="clear"></div>
						<div class="field">
							<span class="f-right">						
							{if !$smarty.session.User_Name}
							<div class="buttons">
							<a onclick="popup('popUpDiv')" href=#>Message</a>
							</div>
							{elseif $task_owner_vip != 1 && $project_allow_bid ==1}

							{else}
							{if $smarty.session.User_Id != $user_id	}<div class="buttons"><a href="#" class="footerlinkcommon2" {if $bid_status == 0}onclick="return(false);" disabled="disabled" {else}onclick="JavaScript: popupWindowURL('private_message.php?project_id={$project_id}&id=1&pop_up=true','','600','500','','true','true');" {/if}>Message</a></div>{/if}
							{/if}
							<div class="clear"></div>
							{if $fb_verfy == 1 || $email_verfy == 1 || $address_verfy == 1 || $human_verfy == 1 || $background_verfy == 1}
							<div style="right;line-height:25px;font-weight:bold;">
							<span style="float:left;margin-right:5px;height:25px">Trusted and Verified</span>
							<div class="clear"></div>
							{if $fb_verfy == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" />{/if}
							{if $email_verfy == 1}<img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" />{/if}							
							{if $address_verfy == 1}<img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" />{/if}
							{if $human_verfy == 1}<img src="images/phone--verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" />{/if}
							{if $background_verfy == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" />{/if}	
							<div class="clear"></div>
							</div>
							{/if}							
							</span>						
								{if $membership_id != 0}
								<img src="{$Templates_Image}vip_large.png" border="0"/>
								<div class="clear"></div>
								{/if}
								<strong>Task Owner: </strong>
								{if !$smarty.session.User_Name}
								<a onclick="popup('popUpDiv')" href=#>{$project_posted_by}</a>
								{else}
								<a href="task_owner_profile_{$project_posted_by}.html" class="footerlinkcommon2">{$project_posted_by}</a>
								{/if}
								<div><strong>Location : </strong>{if $project_post_to == $smarty.session.User_Name}{$project_location|wordwrap:1000:"\n":true}<br />{/if}{$project_city|wordwrap:1000:"\n":true}</div>						
								<strong>Feedback/Rating: </strong>									
								{if $ave_rating == 0.00}
								({$lang.NO_Feddback})
								{else}	 
								<img src="{$Templates_Image}{$ave_rating|intval}.gif" width="120">&nbsp;&nbsp;&nbsp;{if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlink">({$lang.Reviews})</a>{else}<a href="{$project_posted_by}_task_owner_feedback.html" class="footerlink">({$lang.Reviews})</a>{/if}
								<div class="clear"></div>
								{/if}
								<div class="share_btns" style="margin-top:5px;width:150px;border:1px solid #ccc;background-color:#efeeee;padding-right:5px;padding-left:5px;">
								<strong>Share With Friends</strong>
								<div class="clear"></div>
								<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]={$title}&amp;p[summary]={$summary}&amp;p[url]={$url}%3Finvitation_id={$smarty.session.User_Id}&amp;&p[images][0]={$image}', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img src="images/facebook.png" width="30" /></a>&nbsp;&nbsp;
								<a onClick="window.open('http://twitter.com/share?url={$Site_URL|urlencode}/task_{$project_id}_{$clear_title|stripslashes}.html%3Finvitation_id={$smarty.session.User_Id}&text=Check out the task - {$project_title|stripslashes} - on {$Site_URL}&related=tasksonic', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">				
								<img src="images/twitter.png" width="30" /></a>&nbsp;&nbsp;
								<a href="{$Site_URL}/share_earn.html">
								<img src="images/emailicon.png" width="30" /></a>&nbsp;
								<div class="clear"></div>
								</div>							
						<div class="clear"></div>
						</div>	
						
						{if $project_file_1 != '' || $project_file_2 != '' || $project_file_3 != ''}
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">{$lang.Related_Files}</label>
						</div>
						</div>
						
						<div class="clear"></div>
						<div class="field">
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
						<div class="clear"></div>
						</div>
						{/if}						
						<div class="clear"></div>
						<input type="hidden" name="Action" />
						<input type="hidden" name="project_id" value="{$project_id}" />
						<input type="hidden" name="status" />
						<input type="hidden" name="bid_id" />
					<div class="clear"></div>
					<div class="body_shim">					
					<div class="bid_reminder"><strong>{$lang.Reminder}</strong>:&nbsp;{$lang.Bid_Note1}</div>					
					<div class="clear"></div>					
					</div><!--end body shim-->					
					<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;font-size:14px">
						<label for="login-email-address">
						{if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong>{$lang.Posted_project}</strong></a>{else}<a href="copy_task_{$project_id}_{$clear_title}.html" class="taskfootermenuelink" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');"><strong>{$lang.Posted_project}</strong></a>{/if}
						| {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong>{$lang.SEND_TASK}</strong></a>{else}<a href="#bid_list" onclick="JavaScript: popupWindowURL('share_task.php?task_id={$project_id}&pop_up=true','','650','500','','true','true');" class="taskfootermenuelink"><strong>{$lang.SEND_TASK}</strong></a>{/if} 
						|  {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong>{$lang.Message_Board}({$msgboardcnt})</strong></a>{else}<a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id={$project_id}&project_creator={$project_posted_by}&id=1&pop_up=true','','645','500','','true','true');" class="taskfootermenuelink"><strong>{$lang.Message_Board}({$msgboardcnt})</strong></a>{/if} 
						{if $project_posted_by == $smarty.session.User_Name}|  <a href="republish_task_{$project_id}_{$clear_title}.html" class="taskfootermenuelink"><strong>{$lang.Republish_project}</strong></a>{/if}						
						</label>
					</div>
					</div>					
				<div class="clear"></div>				
			<div id="more_link"></div>
		</form>
		</div>
	</div>
	<div class="page_bottom"></div>
	<div class="clear" style="height:40px;">&nbsp;</div>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Bids On "{$project_title|stripslashes}</label>
						</div>
					</div>			
				<div class="clear"></div>
					{if $project_status == 2}
						<div class="bid_closed">Task Awarded to {$project_post_to}</div>
						<div class="clear"></div>
					{elseif $project_status == 3}
						<div class="bid_closed">Task Accepted and Underway</div>
						<div class="clear"></div>
					{elseif $project_status == 4}
						<div class="bid_closed">Task Canceled bt Task Owner</div>
						<div class="clear"></div>
					{elseif $project_status == 5}
						<div class="bid_closed">Task Marked Completed By Tasker</div>
						<div class="clear"></div>
					{elseif $project_status == 6}
						<div class="bid_closed">Task Completed</div>
						<div class="clear"></div>
					{elseif $project_status == 7}
						<div class="bid_closed">Task Failed</div>
						<div class="clear"></div>		
					{elseif $project_status == 1 && $bid_status == 0}
						<div class="bid_closed">{$lang.task_Closed_Bidding} and received ({$count}) bids</div>
						<div class="clear"></div>
					{elseif $project_status == 1 && $bid_status == 1}
						<div class="bid_closed">Bidding Underway - ({$count}) bids received</div>
						<div class="clear"></div>		
					{/if}				
	
					<!-- All Bids Shown to Task Owner But Current User Can Only See Their Bid -->														
					{if $smarty.session.User_Id == $user_id} <!--If the task owner is viewing-->
						{section name=bid loop=$Loop}
						{if $arr_Bid[bid].Premium_Member == 1}
						<div id="all_bids"  class="premium_task" >
						{else}
						<div id="all_bids" class="{cycle values='list_B style3, list_A style3'}" >
						{/if}
							<div class="img_holder">
								<a href="tasker_profile_{$arr_Bid[bid].User_Name}.html"  class="link">{$arr_Bid[bid].User_Name}</a>
								{if $arr_Bid[bid].fb_profile_img}
								{$arr_Bid[bid].fb_profile_img}
								{elseif $arr_Bid[bid].buyer_logo}
								<img src="{$path}thumb_{$arr_Bid[bid].buyer_logo}" height="70" width="70" class="profile_img"/>
								{else}
								<img src="{$path}thumb_default.jpg" height="70" width="70" class="profile_img"/>
								{/if}
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								{if $arr_Bid[bid].Premium_Member == 1}
								<img src="{$Templates_Image}vip_small.png" border="0"/>
								{/if}			
								<div class="clear"></div>
								</div>
							<div class="clear"></div>			
							<div class="premium_urgent">
							{$arr_Bid[bid].Location}
							<div class="clear"></div>
							</div>		
							</div>
							<div class="body_text"><span class="title">{$lang_common.Curreny}{$arr_Bid[bid].Bid_Amount} to complete by {$arr_Bid[bid].Delivery_Time}.</span> <span>Posted on {$arr_Bid[bid].Bid_Time|date_format %l:%M %p}</span>
							<div class="clear"></div>		
							<span class="description">
							<div class="desc_holder">{$arr_Bid[bid].Bid_Desc|wordwrap:100:"\n":true}</div>
							<div style="background:#fff;padding-left:5px;">
								{if $arr_Bid[bid].rating == 0.00}
								No Feedback yet
								{else}
								<img src="{$Templates_Image}{$arr_Bid[bid].rating|intval}.gif" width="120">&nbsp;<a href="{$arr_Bid[bid].User_Name}_tasker_feedback.html" class="">({$arr_Bid[bid].reviews} reviews)</a>
								{/if}
								<div class="clear"></div>
								{if $arr_Bid[bid].fb_verfy == 1 || $arr_Bid[bid].email_verfy == 1 || $arr_Bid[bid].address_verfy == 1 || $arr_Bid[bid].human_verfy == 1 || $arr_Bid[bid].background_verfy == 1}
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								{if $arr_Bid[bid].fb_verfy == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" />{/if}
								{if $arr_Bid[bid].email_verfy == 1}<img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" />{/if}							
								{if $arr_Bid[bid].address_verfy == 1}<img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" />{/if}
								{if $arr_Bid[bid].human_verfy == 1}<img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" />{/if}
								{if $arr_Bid[bid].background_verfy == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" />{/if}	
								</div>
								<div class="clear"></div>
								{/if}
							</div>		
							</span>
							<div class="clear"></div>
							</div>
							<div class="more_button">
									{if $project_post_to == $arr_Bid[bid].User_Name}
									<img src="{$Templates_Image}winner.gif" border="0"/>
									{/if}
									<div class="clear"></div>
									{if $project_post_to == $arr_Bid[bid].User_Name}
									{if $project_status != 6}									
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','645','500','','true','true');">Message</a></div>
									{/if}
									{else}
									<div id="button_award"><a href="#" class="footerlinkcommon2" {if $bid_status == 0}disabled="disabled" onclick="return(false);"{else}onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$project_id}&id=1&bid_user={$arr_Bid[bid].User_Name}&pop_up=true','','645','500','','true','true');" {/if}>Message</a></div>									
									{/if}
									<div class="clear"></div>
											<div id="button_award">
											{if $project_status == 1}					
											<a href="award_task_{$project_id}_{$clear_title}.html"   style='text-decoration:none;' class="negative">
											Award
											</a>										
											{elseif $project_status == 2}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											{if $project_post_to == $arr_Bid[bid].User_Name}Winner</span>{else}Awarded{/if}
											</a>
											{elseif $project_status == 3}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
												{if $project_post_to == $arr_Bid[bid].User_Name}Winner</span>{else}Accepted{/if}
											</a>
											{elseif $project_status == 4}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Closed
											</a>											
											{elseif $project_status == 5}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
											Tasker Done
											</a>												
											{elseif $project_status == 6}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Completed
											</a>
											{elseif $project_status == 7}					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Failed
											</a>												
											{/if}						
											</div>
											{if $project_status == 6 && $project_post_to == $arr_Bid[bid].User_Name}
											<div id="button_award">
												<a href="rate-tasker.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
												Feedback
												</a>
											</div>
											{/if}											
									<div class="clear"></div>			
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								{if $arr_Bid[bid].Bid_Shortlist==1}
								<a href="JavaScript: ToggleStatus_Click('{$arr_Bid[bid].bid_id}', '0');" class="">{$lang.Shortlist}</a>
								{/if}
								{if $arr_Bid[bid].Bid_Shortlist==1 && $arr_Bid[bid].Bid_Decline==1}
								&nbsp;|&nbsp;
								{/if}
								{if $arr_Bid[bid].Bid_Decline==1 }
								<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id={$arr_Bid[bid].bid_id}&provider_name={$arr_Bid[bid].User_Name}&project_id={$project_id}&id=1&pop_up=true','','645','450','','true','true');">{$lang.Decline_Bid}</a>
								{/if}
								{if $arr_Bid[bid].Bid_Decline==0}
								<a href="JavaScript: ToggleStatus_Undo_Click('{$arr_Bid[bid].bid_id}', '1');" class=""><strong>Reinstate</strong></a>
								{/if}								

							</div>
							<div class="clear"></div>
						</div>
					<div class="clear"></div>

						
					
					{/section}	
					<!-- End if Task Owner Viewing -->			
					{else}					
					<!-- If logged in user equals the id of a bid show bid for current logged in user-->	
					{if $Tasker}
						<div id="all_bids" class="{cycle values='list_B style3, list_A style3'}" >
							<div class="img_holder">
								<a href="tasker_profile_{$Tasker}.html" class="link">{$Tasker}</a>
								{if $fb_profile_img_tasker}
								{$fb_profile_img_tasker}
								{elseif $buyer_logo}								
								<img src="{$path}thumb_{$buyer_logo}" height="70" width="70" class="profile_img"/>
								{else}
								<img src="{$path}thumb_default.jpg" height="70" width="70" class="profile_img"/>
								{/if}
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								{if $Premium_Member == 1}
								<img src="{$Templates_Image}vip_small.png" border="0"/>
								{/if}			
								<div class="clear"></div>
								</div>
							<div class="clear"></div>			
							<div class="premium_urgent">
							{$Location}
							<div class="clear"></div>
							</div>		
							</div>
							<div class="body_text"><span class="title">{$lang_common.Curreny}{$Bid_Amount} to complete by {$Delivery_Time}.</span> <span>Posted on {$Bid_Time|date_format:'%B %d, %Y at %I:%M %p'}</span>
							<div class="clear"></div>		
							<span class="description">
							<div class="desc_holder">{$Bid_Desc|wordwrap:100:"\n":true}</div>
							<div style="background:#fff;padding-left:5px;">
								{if $rating == 0.00}
								No Feedback yet
								{else}
								<img src="{$Templates_Image}{$rating|intval}.gif" width="120">&nbsp;<a href="{$Tasker}_tasker_feedback.html" class="">({$reviews} reviews)</a>
								{/if}
								<div class="clear"></div>
								{if $fb_verfy_tasker == 1 || $email_verfy_tasker == 1 || $address_verfy_tasker == 1 || $human_verfy_tasker == 1 || $background_verfy_tasker == 1}
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								{if $fb_verfy_tasker == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" />{/if}
								{if $email_verfy_tasker == 1}<img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" />{/if}							
								{if $address_verfy_tasker == 1}<img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" />{/if}
								{if $human_verfy_tasker == 1}<img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" />{/if}
								{if $background_verfy_tasker == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" />{/if}	
								<div class="clear"></div>
								</div>
								{/if}
							</div>		
							</span>
							<div class="clear"></div>
							</div>
								<div class="more_button">
									{if $project_post_to == $Tasker}
									<img src="{$Templates_Image}winner.gif" border="0"/>
									{/if}
									<div class="clear"></div>		
									{if $project_post_to == $Tasker && $project_status != 6}
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message.php?project_id={$project_id}&id=1&pop_up=true','','645','500','','true','true');">Message</a></div>
									{else}
									{if $project_status == 1}									
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message.php?project_id={$project_id}&id=1&pop_up=true','','645','500','','true','true');">Message</a></div>
									{/if}
									{/if}
									<div id="button_award">
						
									{if $project_status == 1}
									<a href="place_bid_{$project_id}_{$clear_title}.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
									Update Bid
									</a>										
									{elseif $project_status == 2}
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Awarded
									</a>
									{elseif $project_status == 3}
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Accepted
									</a>
									{elseif $project_status == 5}
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Tasker Done
									</a>									
									{/if}
									</div>
									{if $project_status == 6 && $project_post_to == $Tasker}
									<div id="button_award">
										<a href="rate-task-owner.html"  onClick="Javascript: return chk_user('{$smarty.session.User_Id}');" style='text-decoration:none;' class="negative">
										Feedback
										</a>
									</div>
									{/if}								
									<div class="clear"></div>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<!-- Accept Task Awarding-->	
								{if $project_status == 2 &&  $project_post_to == $Tasker}								
								{if $error == 1}
								{$lang.Accept_project_Err}
								{else}
								<form method="post" action="{$Site_URL}/accept_task.php?id={$project_id}">								
								<select name="accept_deny" style="width:70px; border:1px solid #bcbcbc; margin-top:4px;">
								{$Accept_Deny}
								</select>
								<input type="hidden" name="project_id" value="{$project_id}" />
								<input type="hidden" name="auth_id_of_post_by" value="{$user_id}" />
								<input type="hidden" name="bid_id" value="{$arr_Bid[bid].bid_id}" />
								<input id="btnbg" type="submit" name="Submit" value="{$lang.Accept_Submit}" class="login_txt style5" />	
								</form>
								{/if}
								{/if}
								<!-- End Accept Task Awarding-->								
							</div>
							<div class="clear"></div>
						</div>
					{else}
					<div class="note">You have not bid on this Task as of yet!</div>
					{/if}	
					<div class="clear"></div>
					{/if}	
					{if $count > 0}						
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">{$lang.Bid_hide}</label>
					</div>
					</div>
					<div class="clear"></div>	
					{/if}	
						<!-- End if hide bids-->					
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>				
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
			<div class="right-column-wrap-top">
			<h3>Task Control Panel</h3>		
				<strong>Task {$lang.Status} : </strong>
					{if $project_status == 2}
						Task Awarded to {$project_post_to}
					{elseif $project_status == 3}
						Task Accepted and Underway
					{elseif $project_status == 4}
						Task Canceled bt Task Owner
					{elseif $project_status == 5}
						Task Marked Completed By Tasker
					{elseif $project_status == 6}
						Task Completed
					{elseif $project_status == 7}
						Task Failed		
					{elseif $project_status == 1 && $bid_status == 0}
						{$lang.task_Closed_Bidding}
					{elseif $project_status == 1 && $bid_status == 1}
						{$time_remaining} left for bidding as of last page load!		
					{/if}					
				<div class="clear" style="height:3px;">&nbsp;</div>
				<strong>Category: </strong>{$categories}
				<div class="clear" style="height:3px;">&nbsp;</div>
				{if $smarty.session.User_Name == $project_post_to || $smarty.session.User_Name == $project_posted_by}
				{if $project_status != 1 && $project_status != 2}				
				<div style="padding:3px;border:1px solid #000">
				<strong>Escrow For Task</strong>
				<table>
				<tr>
					<td class="bodytextblack" width="55%"><strong>Milestone</strong></td>
					<td class="bodytextblack" width="23%"><strong>Amount</strong></td>
					<td class="bodytextblack" width="17%"><strong>Action</strong></td>					
				</tr>
				{foreach name=esc_in from=$Task_Escrow_List item=esc_in}
				<tr class="{cycle values='list_A style3, list_B style3'}">
					<td class="bodytextblack" width="55%">&nbsp;{$esc_in->milestone}</td>
					<td class="bodytextblack" width="23%">{$lang.Curreny}{$esc_in->amount}</td>
					{if $smarty.session.User_Name == $project_post_to}
					<td class="bodytextblack" width="17%"><a href="cancel_payment_{$esc_in->ep_id}.html" class="footerlink">Cancel</a></td>
					{elseif $smarty.session.User_Name == $project_posted_by}
					<td class="bodytextblack" width="17%">{if $project_status == 5}<a href="release_payment_{$esc_in->ep_id}.html" class="footerlinkcommon2">Release</a>{else}Pending Completion{/if}</td>
					{/if}					
				</tr>
				{foreachelse}
				<tr>
					<td class="bodytext" align="center" colspan="3">{if $smarty.session.User_Name == $project_posted_by}Please create an Escrow payment so the Tasker can begin the task!{/if}{if $smarty.session.User_Name == $project_post_to}(No Escrow Payments Pending. Do not start the task until the Task Owner has created an escrow payment in the amount of your bid!){/if}</td>
				</tr>
				{/foreach}
				</table>
				</div>				
				{/if}
				{/if}
			
				
				{if $count == 0}
				{if $project_status == 1 || $project_status == 2}
				{if $smarty.session.User_Id == $user_id}
				<div class="button-no" style="margin-left:70px;"><a href="extend_task_{$project_id}_{$clear_title}.html" class="footerlinkcommon2"><strong>Extend Time</strong></a></div>
				{/if}
				{/if}
				{/if}
				{if $smarty.session.User_Id == $user_id}
				{if $project_status == 3}<br /><div class="button-no" style="margin-left:70px;"><a href="/create-escrow-payment.html" class="footerlinkcommon2"><strong>Escrow Payment</strong></a></div>{/if}
				{if $project_status == 5 && $tasker_reimburse >0}<br /><div class="button-no" style="margin-left:70px;"><a href="/create-escrow-payment.html" class="footerlinkcommon2"><strong>Escrow Payment</strong></a></div>{/if}
				<div class="clear"></div>
				{/if}				
				{if $smarty.session.User_Name == $project_post_to && $project_status == 3}<br /><div class="button-no" style="margin-left:70px;"><a href="mark-completed_{$project_id}.html" >Mark Completed</a></div>{/if}
				{if $smarty.session.User_Name == $project_posted_by && $project_status == 5 && $task_owner_dispute ==0}<br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_{$project_id}.html" >Dispute Completed</a></div>{/if}
				{if $smarty.session.User_Name == $project_posted_by && $project_status == 5 && $task_owner_dispute !=0}<br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_{$project_id}.html" >Resolution Board</a></div>{/if}					
				{if $smarty.session.User_Name == $project_post_to && $project_status == 5 && $task_owner_dispute !=0}<br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_{$project_id}.html" >Resolution Board</a></div>{/if}	
				{if $smarty.session.User_Name == $project_posted_by && $project_status == 1}<br /><div class="button-no" style="margin-left:70px;"><a href="close_task_{$project_id}_{$clear_title}.html" class="footerlinkcommon2">Close</a></div>{/if}	
				{if $smarty.session.User_Name == $project_posted_by && $project_status == 2}<br /><div class="button-no" style="margin-left:70px;"><a href="close_task_{$project_id}_{$clear_title}.html" class="footerlinkcommon2">Close</a></div>{/if}					
				{if $smarty.session.User_Name == $project_posted_by && $project_status == 6}
				<div class="button-no" style="margin-left:70px;margin-top:20px;">
				<a href="rating_user.php?project_id={$project_id}&User_type=tasker&to={$project_post_to}" class="footerlinkcommon2">Post Feedback</a>
				</div>
				{/if}
				{if $smarty.session.User_Name == $project_post_to && $project_status == 6}
				<div class="button-no" style="margin-left:70px;margin-top:20px;">
				<a href="rating_user.php?project_id={$project_id}&User_type=task_owner&to={$project_posted_by}" class="footerlinkcommon2">Post Feedback</a>
				</div>
				{/if}
				<div class="clear"></div>				
			</div>			
			<div class="right-column-wrap">	
			<h3>Bid Details</h3>			
				<strong>{$lang.Bids_Received} ({$count}) </strong></a>
				<div class="clear"></div>
				{if $smarty.session.User_Id == $user_id}
				<a href="shortlist_{$project_id}_{$clear_title}.html#short_list" class="footerlinkcommon23"><strong>{$lang.Shortlist}({$shortlistcnt}) </strong></a>
				<div class="clear"></div>
				<a href="decline_{$project_id}_{$clear_title}.html#decline_list" class="footerlinkcommon23"><strong>{$lang.Decline_Bid}({$declinecnt})</strong></a>
				<div class="clear"></div>
				{/if}
				<strong>{$lang.Average_bid_amount}:</strong> {if $count != 0}<strong>{$lang.Curreny}{$Bid}</strong>{else}<strong>{$lang.Curreny}0.00</strong>{/if}
				<div class="clear"></div>
			</div>		
			<div class="right-column-wrap">
				<h3>Important</h3>			
				<strong>{$lang.Remember}</strong>&nbsp;{$lang.Remember_Note} 
				<div class="clear"></div>
				{if $project_allow_bid ==1}
				<strong><font size="3">{$lang.Vip}</font></strong>
				<div class="clear"></div>
				{/if}
			</div>			
			<div class="right-column-wrap">
				<h3>Task Location</h3>			
				 <img src="http://maps.google.com/maps/api/staticmap?center={$project_latitude},{$project_longitude}&zoom=11&size=280x195&maptype=normal&markers=color:blue%7Clabel:S%7C{$project_latitude},{$project_longitude}&mobile=true&sensor=false">
					<br>{$project_city}
			</div>
			<div class="right-column-wrap">
			<h3>{$lang.Related_projects}</h3>		
					{if $Related_Loop > 1}
					 {section name=related_project loop=$Related_Loop} 							   
								 {if $arr_related_project[related_project].project_id != $project_id}
									  <ul style="margin-left:15px;"><li><a href="task_{$arr_related_project[related_project].project_id}_{$arr_related_project[related_project].clear_title}.html" class="footerlinkcommon23">{$arr_related_project[related_project].project_title|stripslashes}</a></li> </ul>
								 {/if} 	
					 {/section}
					 {else}
					{$lang.No_Related}
					 {/if}
			</div>				
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
<div class="clear"></div>				
