<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Category "{$MAIN_CAT}" In {$citycurrent}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
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
					<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
					<tr>
						<td width="99%" class="">&nbsp;<strong>{$lang.Category_List} : </strong></td>
					</tr>
					<tr>
						<td class="">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								{assign var="col" value=3}
								{section name=cats loop=$Loop}
								{if $smarty.section.cats.iteration|mod:$col==1}
									<tr class="style3 tdheight">
								{/if}
										<td valign="top" width="25%" class="bodytextblack borders">
											&nbsp;<a href="category_{$arr_cat[cats].id}.html" class="article"><strong>{$arr_cat[cats].name}</strong></a>&nbsp;({$arr_cat[cats].total_projects})
										</td>
								{if $smarty.section.cats.iteration|mod:$col==0}
									</tr>
								{/if}
								{/section}
							</table>
						</td>	
					</tr>	
					<tr>
						<td>&nbsp;</td>
					</tr>
					</table>
					{/if}
				
				{if $rscntpro > 0}	
				{section name=ProList loop=$rscntpro}
				{if $view_project[ProList].premium_project == 1}
				<div id="all_tasks"  class="premium_task" >
				{else}
				<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
				{/if}
					<div class="img_holder">
						{if $view_project[ProList].buyer_logo}
						<img src="{$path}thumb_{$view_project[ProList].buyer_logo}" height="70" width="70" class="profile_img"/>
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
					<div class="body_text">
					<span class="title"><a href="task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html" >{$view_project[ProList].title|stripslashes}</a></span>
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
						<strong>Category:</strong> {$view_project[ProList].category} |
						<strong>Created:</strong> {$view_project[ProList].project_date}
					</div>
					<div class="clear"></div>
				</div>
			<div class="clear"></div>	
			{/section}
			<div><ul class="paginator">{$Page_Link}</ul></div>
			{else}
			<div class="body_shim" style="text-align:center">
			{$lang.No_project_Text}<br />
			<a href="category_list.php" class="footerlink" style="font-size:14px; margin-right:5px;">Back</a>
			<div class="clear"></div>			
			</div>
			<div class="clear"></div>			
			{/if}
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
			<div class="right-column-wrap">
			<h1>Task Categories</h1>
			<div style="margin:0 auto;width:240px">
			{assign var="col" value=3}
			{section name=CatList loop=$CatLoop}
			<div class="cat-col"><a href="category_{$arr_cat[CatList].id}.html" class="footerlinkcommon2" >{$arr_cat[CatList].desc|replace:'<P>':''|replace:'</P>':''}</a><br />({$arr_cat[CatList].total_projects})</div>
			{if $smarty.section.CatList.iteration|mod:$col==3}
			<div class="clear"></div>
			{/if}			
			{/section}
			</div>			
			<div class="clear"></div>			
			</div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->