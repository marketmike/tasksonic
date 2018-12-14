<div class="grid_12 push_12 alpha omega content_body">
	 
   <div class="grid_8 alpha">   
	<h1>Completed Tasks For {$citycurrent}</h1>
	<div class="clear"></div>			
        <div class="welcome_hdr">
			<div class="welcome_wrapper">
			<div class="clear"></div>
				<div class="col-left"><h1>Welcome {$smarty.session.User_Name}</h1>
				{$marketing_content}</div>
				<div class="col-right">{include file="$T_Balance_Right"}</div>					
			</div>
		</div>
<div class="clearwspace"></div>		
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="latest-open-tasks.html">Latest Tasks</a><span></span></li>			
					<li><a href="latest-online-tasks.html">Online Tasks</a><span></span></li>
					<li><a href="task-categories.html">By Category</a><span></span></li>
					<li class="current"><a href="completed-tasks.html">Completed</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>				
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;;margin-bottom:10px">
						<label for="intro">
							<img src="{$Templates_Image}premium_small.png" align="bottom" style="height:20px"/> Premium Task
							&nbsp;&nbsp;&nbsp;	
							<img src="{$Templates_Image}urgent.png" align="absmiddle" style="height:20px"/> Urgent Task
							&nbsp;&nbsp;&nbsp;	
						</label>
					</div>
				</div>
				<div class="clear"></div>			
{if $Loop > 0}	
	{section name=ProList loop=$Loop}
	{if $view_project[ProList].premium_project == 1}
	<div id="all_tasks"  class="premium_task" >
	{else}
	<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
	{/if}
		<div class="img_holder">
			{if $view_project[ProList].fb_profile_img}
			{$view_project[ProList].fb_profile_img}
			{elseif $view_project[ProList].buyer_logo}
			<img src="{$path}thumb_{$view_project[ProList].buyer_logo}" height="70" width="70" class="profile_img"/>
			{else}
			<img src="{$path}thumb_default.jpg" height="70" width="70" class="profile_img"/>
			{/if}
			<div class="clear"></div>
			<div class="share_btns" style="margin-top:5px;">
			<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]={$view_project[ProList].title}&amp;p[summary]={$view_project[ProList].summary}&amp;p[url]={$view_project[ProList].url}%3Finvitation_id={$smarty.session.User_Id}&amp;&p[images][0]={$view_project[ProList].image}>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img src="images/facebook.png" width="24" /></a>		
			<a onClick="window.open('http://twitter.com/share?url={$Site_URL|urlencode}/task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html%3Finvitation_id={$smarty.session.User_Id}&text=Check out the task {$view_project[ProList].title|stripslashes} on {$Site_URL}&related=tasksoni', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
			<img src="images/twitter.png" width="24" />
			</a>
			<a href="{$Site_URL}/share_earn.html">
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
		<div class="body_text"><span class="title"><a href="task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html" >{$view_project[ProList].title1|stripslashes}</a></span>
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
			{if $view_project[ProList].status == 5}Marked Completed{/if}
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
<div style="margin:0 auto;text-align:center;padding:20px">
<h3>{$lang.No_project_Text} {$citycurrent}</h3>
</div>	
{/if}
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
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
				