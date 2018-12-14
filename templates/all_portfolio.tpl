{literal}
    <script type="text/javascript">
    $(function() {
        $('.portfolio a').lightBox();
    });
    </script>
{/literal}
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Find_Portfolio}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
				{if $Loop > 0}
					{section name=Portfolios loop=$Loop}
					<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
						<span class="title" style="text-transform:capitalize">
						{$user_login_id[Portfolios]}
						{if $location_1[Portfolios] != ''}
						from {$location[Portfolios]}
						{else}
						from {$location_2[Portfolios]}
						{/if}
						</span>
						<div style="float:right;margin-right:5px">
							<strong>{$lang.Rating}: </strong>
							{if $rating[Portfolios] == 0.00}
								{$lang.No_feedback}{else}
								<a href="{$user_login_id[Portfolios]}_tasker_feedback.html" class="footerlink">								
								<img src="{$Templates_Image}{$rating[Portfolios]|intval}.gif" width="120"></a>
							{/if}				
						</div>
						<div class="clear"></div>
						<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
						{foreach name=files_name from=$files[Portfolios] item=files_name}
						{if $smarty.foreach.files_name.total == 1}
							<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><a href="{$img_path}{$files_name->sample_file}" title="{$files_name->title} - {$files_name->description}"><img src="{$img_path}{$files_name->sample_file}" border="0" height="100" width="100" style="margin:0px" /></a></div>
						{else}
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}{$files_name->sample_file}" title="{$files_name->title} - {$files_name->description}"><img src="{$img_path}{$files_name->sample_file}" border="0" height="100" width="100" style="margin:0px" /></a></div>
						{/if}
						{/foreach}
						{if $smarty.foreach.files_name.total == 4}
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}{$files_name->sample_file}" border="0" height="100" width="100" style="margin:0px" /></a></div>
						{/if}
						{if $smarty.foreach.files_name.total == 3}
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						{/if}
						{if $smarty.foreach.files_name.total == 2}
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						{/if}
						{if $smarty.foreach.files_name.total == 1}
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="{$img_path}default-portfolio.png"><img src="{$img_path}default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						{/if}						
						<div class="clear"></div>
						<div style="width:578px;margin-top:10px;background:#fff">
						<div class="button-no" style="float:left;margin-left:2px;margin-right:6px;"><a href="tasker_profile_{$user_login_id[Portfolios]}.html" class="footerlinkcommon2">{$lang.Profile}</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="{$user_login_id[Portfolios]}_tasker_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="tasker_portfolio_{$user_login_id[Portfolios]}.html" class="footerlinkcommon2">{$lang.Portfolio}</a></div>
						<div class="button-no" style="float:left;margin-right:0px;"><a href="post_task_{$user_login_id[Portfolios]}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">Post Task To</a></div>	
						</div>					
						<div class="clear"></div>					
						</div>
					</div>
					<div class="clear"></div>				
					{/section}
					{else}
					<div style="margin:0 auto;text-align:center;padding:20px">
					<h3>No Tasker Portfolios Found For {$citycurrent}</h3>
					</div>
					{/if}
					</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->	