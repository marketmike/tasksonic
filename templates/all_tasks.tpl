<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$lang.Find_project}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
{if $rscntpro > 0}	
	{section name=ProList loop=$rscntpro}
	{if $view_project[ProList].premium_project == 1}
	<div id="all_tasks"  class="premium_task" >
	{else}
	<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
	{/if}
		<div class="img_holder">
			{if $view_project[ProList].premium_project == 1}
			<img src="{$Templates_Image}premium_project.gif" border="0" />
			{elseif $view_project[ProList].membership_id != 0}
			<img src="{$Templates_Image}vip_member.gif" border="0" />
			{else}&nbsp;{/if}
			{if $view_project[ProList].buyer_logo}
			<img src="{$path}thumb_{$view_project[ProList].buyer_logo}" height="90" width="90" class="profile_img"/>
			{else}
			<img src="{$path}thumb_default.jpg" height="90" width="90" class="profile_img"/>
			{/if}
			<div class="clear"></div>
			<div class="share_btns"><img src="images/facebook.png" width="24" /><img src="images/twitter.png" width="24" /><img src="images/emailicon.png" width="24" /></div>			
		</div>
		<div class="body_text"><span class="title"><a href="task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html" >{$view_project[ProList].title|stripslashes}</a></span>
		&nbsp;{if $view_project[ProList].urgent_project == 1} <strong><font color="#BA0403">({$lang.Urgent})</font></strong> {/if}
		<div class="clear"></div>
		<span class="description">
		<div class="desc_holder">{$view_project[ProList].dec|stripslashes|truncate:200:'..':true:false}</div>
		<strong>Bidding Ends On:</strong> {$view_project[ProList].project_days_open} at {$view_project[ProList].bidding_time}<br />
		<strong>Task To Be Complete by:</strong> {$view_project[ProList].completed_by} at {$view_project[ProList].completed_time}		
		</span>
		<div class="clear"></div>
		</div>
		<div class="more_button">
		Bids
		<div class="clear"></div>		
		{$view_project[ProList].bid}
			<div class="status">
			{if $view_project[ProList].status == 1}<img src="{$Templates_Image}bopen.png" border="0" />{/if}
			{if $view_project[ProList].status == 2}<img src="{$Templates_Image}bpre.png" border="0" />{/if}
			{if $view_project[ProList].status == 3}<img src="{$Templates_Image}bcancel.png" border="0" />{/if}
			{if $view_project[ProList].status == 5}<img src="{$Templates_Image}bcancel.png" border="0" />{/if}
			{if $view_project[ProList].status == 7}<img src="{$Templates_Image}bcancel.png" border="0" />{/if}
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
{$Page_Link}
{else}
{$lang.No_project_Text}		
{/if}
<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	  <div class="right-column-wrap">
	  <h1>Task Status Legend</h1>
			<img src="{$Templates_Image}bopen.png" align="bottom"/> {$lang.Open}
			<div class="clear"></div>		
			<img src="{$Templates_Image}bclose.png" align="absmiddle"/> {$lang.close}
			<div class="clear"></div>
			<img src="{$Templates_Image}bpre.png" align="absmiddle"/> {$lang.premium_project}
			<div class="clear"></div>
			<img src="{$Templates_Image}bcancel.png" align="absmiddle"/> {$lang.close_for_bid}
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
				