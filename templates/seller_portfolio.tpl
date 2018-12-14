{literal}
    <script type="text/javascript">
    $(function() {
        $('.portfolio a').lightBox();
    });
    </script>
{/literal}
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$user_name}'s Portfolio</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
					<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
						<span class="title" style="text-transform:capitalize">
						{$user_name}
						</span>
						<div style="float:right;margin-right:5px">
							<strong>{$lang.Rating}: </strong>
							{if $rating == 0.00}
								{$lang.No_feedback}{else}
								<a href="{$user_name}_tasker_feedback.html" class="footerlink">								
								<img src="{$Templates_Image}{$rating|intval}.gif" width="120"></a>
							{/if}				
						</div>
						<div class="clear"></div>
						<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
						{if $Loop > 0}
							{section name=seller loop=$Loop}							
							<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><a href="{$img_path_port}{$iportfolio[seller].sample_file}" title="{$iportfolio[seller].title} - {$iportfolio[seller].desc}"><img src="{$img_path_port}{$iportfolio[seller].sample_file}" alt="{$iportfolio[seller].title}" title="{$iportfolio[seller].title}" border="0" height="100" width="100" style="margin:0px" /></a></div>
							{if $Loop == 5 || $Loop === 10 || $Loop == 15 || $Loop == 20 || $Loop == 25 || $Loop == 30}
							<div class="clear"></div>
							{/if}
							{/section}
						{else}
						<div style="margin:0 auto;text-align:center;padding:20px">
						<h3>No Tasker Portfolio Found</h3>
						</div>						
						{/if}						
						<div class="clear"></div>
						<div style="width:578px;margin-top:10px;background:#fff">
						<div class="button-no" style="float:left;margin-left:75px;margin-right:6px;"><a href="tasker_profile_{$user_name}.html" class="footerlinkcommon2">{$lang.Profile}</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="{$user_name}_tasker_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a></div>
						<div class="button-no" style="float:left;margin-right:0px;"><a href="post_task_{$user_name}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">Post Task To</a></div>	
						</div>					
						<div class="clear"></div>					
						</div>
					</div>
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