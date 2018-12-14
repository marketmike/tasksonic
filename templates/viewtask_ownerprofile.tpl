<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$user}'s Task Owner Profile</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong>{$user}'s Task Owner Profile</strong></label>
				</div>
				</div>
				<div class="clear"></div>			
				{if $user_name == 1}<div class="note" style="text-align:center;padding:20px;">{$view_buyer_msg}</div>{/if}
				{if $user_name == 0}
				<div class="clear"></div>
				<div class="task_owner_wrapper" style="margin:0px;background:#fff;padding:10px;height:100%;">
				<h3>{$Slogan}</h3>
				<div class="clear"></div>
				<div class="task_owner_imag_wrap" style="float:left;width:135px;">
				{if $fb_img}
				<div align="center">{$fb_img}</div>
				{elseif $buyer_logo != ''}
				<div align="center"><img src="{$path}thumb_{$buyer_logo}" border="0" width="125"/></div>
				{else}
				<div align="center"><img src="{$path}thumb-default.png" border="0" width="125"/></div>
				{/if}
				<div class="clear"></div>
				</div>
						<div class="task_owner_info" style="float:left;margin-left:20px;width:425px;">
								<div id="column" class="left" style="width:200px;">
									<strong>{$lang.Location}</strong>
									<div class="clear"></div>
									{$Location1}
									<div class="clear"></div>
										{if $fb_verfy == 1 || $email_verfy == 1 || $address_verfy == 1 || $human_verfy == 1 || $background_verfy == 1}
										<div style="line-height:30px;font-weight:bold;margin-top:10px;">
										<span style="float:left;margin-right:5px;height:30px">Trusted and Verified</span>
										<div class="clear"></div>
										{if $fb_verfy == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Facebook Verified" title="Facebook Verified" />{/if}
										{if $email_verfy == 1}<img src="images/email-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Email Verified" title="Email Verified" />{/if}							
										{if $address_verfy == 1}<img src="images/address-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Address Verified" title="Address Verified" />{/if}
										{if $human_verfy == 1}<img src="images/phone-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Human Verified" title="Human Verified" />{/if}
										{if $background_verfy == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:30px;height:30px" alt="Background Checked" title="Background Checked" />{/if}	
										</div>
										<div class="clear"></div>
										{else}
										<div style="line-height:30px;font-weight:bold;margin-top:10px;margin-bottom:10px;">
										Task Owner has not completed any verification methods as of yet! 
										</div>
										<div class="clear"></div>
										{/if}
								<div style="text-transform:capitalize;font-weight:bold;margin-top:10px;"><a target="_blank" href="{$Site_Root}task_owner_profile_{$user}.html" class="footerlinkcommon23">Profile Permalink</a></div>		
								<div class="clear"></div>
								</div>
								<div id="column" class="right">				
									<div class="clear"></div>
									<div style="margin:0px;background-color:#D3D3D3">						
										{if $Loop}
										<strong>Feedback Summary</strong> | <a href="{$user}_task_owner_feedback.html" class="footerlinkcommon23"> <strong>View All</strong></a>
										<div class="clear"></div>
										{section name=rating loop=$Loop}		
										<div style="background:#fff;padding:5px">
										{$arating[rating].project_title}</a>
										<div class="clear"></div>
										<img src="{$Templates_Image}{$arating[rating].rating|intval}.gif" width="120">
										<div class="clear"></div>
										Rated on: {$arating[rating].date_time}
										<div class="clear"></div>
										Rated by: <a href="tasker_profile_{$arating[rating].rating_by_user}.html" class="footerlink">{$arating[rating].rating_by_user}</a>
										<div class="clear"></div>
										Ratings: 
										{if $arating[rating].averating != ''} 
										   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">({$arating[rating].averating})</a>
										 {else}
										   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">(0)</a>
										{/if} 
										<div class="clear"></div>
										Rating: {$arating[rating].rating|string_format:"%.2f"}
										<div class="clear"></div>
										Comments: {$arating[rating].dec|truncate:30:""}
										<div class="clear"></div>
										</div>					
										{/section}
										{else}
										<div style="margin:0 auto;text-align:center;">No Feedback Yet</div>					
										{/if}
									</div>
								</div>
								<div class="clear"></div>	
							</div>
						<div class="clear"></div>
					<div class="row">
					{if $Desc != ''}
					<strong>{$lang.Description1}:</strong> {$Desc|wordwrap:135:"\n":true}
					{else}
					<strong>{$lang.Description1}:</strong> {$lang.Msg_Desc}
					{/if}
					</div>				
				</div>
			{/if}	
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
	<br />			
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>				
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{$user}'s Open Tasks for {$citycurrent}</label>
				</div>
				</div>
				<div class="clear"></div>					
					{if $TaskLoop > 0}	
						{section name=ProList loop=$TaskLoop}
						{if $view_project[ProList].premium_project == 1}
						<div id="all_tasks"  class="premium_task" >
						{else}
						<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
						{/if}
							<div class="img_holder">
								{if $view_project[ProList].fb_profile_img}
								{$view_project[ProList].fb_profile_img}
								{elseif $view_project[ProList].buyer_logo_task}
								<img src="{$path}thumb_{$view_project[ProList].buyer_logo_task}" height="70" width="70" class="profile_img"/>
								{else}
								<img src="{$path}thumb_default.jpg" height="70" width="70" class="profile_img"/>
								{/if}
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								{literal}
								<a href="" onclick="fb_share('',{'name':'Check out this new task ({/literal}{$view_project[ProList].title|stripslashes}{literal}) on {/literal}{$Site_Title}{literal}!','href':'{/literal}{$Site_URL}{literal}/task_{/literal}{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}{literal}.html','description':'{/literal}{$view_project[ProList].dec|stripslashes|truncate:200}{literal}'},null);return false;">			
								{/literal}
								<img src="images/facebook.png" width="24" />
								</a>
								<a href="http://twitter.com/share?url={$Site_URL|urlencode}/task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html&text=Check out the task ''{$view_project[ProList].title|stripslashes}'' on {$Site_URL}&related=tasksonic" target="_blank">
								<img src="images/twitter.png" width="24" />
								</a>
								<a href="{$Site_URL}/invite.php">
								<img src="images/emailicon.png" width="24" />
								</a>
								<div class="clear"></div>
								</div>
							<div class="clear"></div>			
							<div class="premium_urgent">
							{if $view_project[ProList].urgent_project == 1}<img src="{$Templates_Image}urgent.png" border="0" style="vertical-align:middle" />{/if}
							{if $view_project[ProList].premium_project == 1}
							&nbsp;<img src="{$Templates_Image}premium_small.png" border="0" style="vertical-align:middle" />
							{elseif $view_project[ProList].membership_id != 0}
							&nbsp;<img src="{$Templates_Image}vip_small.png" border="0" style="vertical-align:middle" />
							{/if}
							<div class="clear"></div>
							</div>		
							</div>
							<div class="body_text"><span class="title"><a href="task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html" >{$view_project[ProList].title|stripslashes}</a></span>
							<div class="clear"></div>		
							<span class="description">
							<div class="desc_holder">{$view_project[ProList].dec|stripslashes|truncate:200:'..':true:false}</div>
							<div style="background:#fff;padding-left:5px;">
							<strong>Bidding Ends On:</strong> {$view_project[ProList].project_days_open} at {$view_project[ProList].bidding_time}<br />
							<strong>Task To Be Complete by:</strong> {$view_project[ProList].completed_by} at {$view_project[ProList].completed_time}
							</div>		
							</span>
							<div class="clear"></div>
							</div>
							<div class="more_button">
							Bids
							<div class="clear"></div>
							{$view_project[ProList].bid}
								<div class="status">
								{if $view_project[ProList].status == 1}Bidding Open{/if}
								{if $view_project[ProList].status == 2}Task Awarded{/if}
								{if $view_project[ProList].status == 3}Task Underway{/if}
								{if $view_project[ProList].status == 4}Task Cancelled{/if}
								{if $view_project[ProList].status == 5}Bidding Ended{/if}
								{if $view_project[ProList].status == 6}Task Complete{/if}
								{if $view_project[ProList].status == 7}Task Expired{/if}			
								</div>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<strong>Posted by:</strong>  <span class="user">{$view_project[ProList].project_posted_by}</span>
								<strong>Average Bid:</strong>  
								{if $view_project[ProList].bid == 0}
								{$lang_common.Curreny}&nbsp;0.00 |
								{else}
								{$lang_common.Curreny}&nbsp;{$view_project[ProList].Ave_Bid1} |
								{/if}
								<strong>Created:</strong> {$view_project[ProList].project_date}
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>	
						{/section}
						<div><ul class="paginator">{$Page_Link}</ul></div>
						{else}									
						<div class="clear"></div>
						<div class="field">
						There are currently no new and open task for this Task Owner. Check back frequently to see new tasks posted by {$user}!
						</div>						
					{/if}
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
				{include file="$T_Map"}									
			<div class="clear"></div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->