<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$user}'s Task Owner Feedback</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>					
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong>Feedback for {$user}</strong></label>			
				</div>
				</div>
				<div class="clear"></div>
							{if $Loop}
							{section name=rating loop=$Loop}
							<div id="all_tasks" style="margin:0 auto;padding:10px" class="{cycle values='list_B style3, list_A style3'}" >							
							<span class="title"><a href="task_{$arating[rating].project_id}_{$arating[rating].clean_title}.html" class="footerlink">{$arating[rating].project_title}</a></span>
							<div class="clear"></div>
							<img src="{$Templates_Image}{$arating[rating].rating|intval}.gif" width="120">
							<div class="clear"></div>							
							<strong>Rated on:</strong> {$arating[rating].date_time} | <strong>Rated by:</strong> <a href="tasker_profile_{$arating[rating].rating_by_user}.html" class="footerlink">{$arating[rating].rating_by_user}</a>
											 {if $arating[rating].count != ''} 
											   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">({$arating[rating].count})</a>
											 {else}
											   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">(0)</a>
											{/if}
							|
							<strong>Rating: </strong>{$arating[rating].rating|string_format:"%.2f"}	
							<div class="clear"></div>
							<strong>Comments: </strong>{$arating[rating].dec}
							<div class="clear"></div>
							</div>							
							{/section}
							{else}
							<div style="margin:0 auto;text-align:center;padding:20px;">{$Text1} <strong>{$user}</strong> {$Text2} </div>
							</tr>
							{/if}
						<div class="clear"></div>
						<div id="more_link"></div>
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>	
	  <div class="right-column-wrap">		  
	  <h1>Average Ratings</h1>
		{if $Loop}
		<div><strong>{$Total_Reviews}</strong><strong> :  {$Loop}</strong></div>
		<div class="clear"></div>		
		{else}
		<div><strong>{$Total_Reviews}</strong><strong> :  0</strong></div>
		<div class="clear"></div>		
		{/if}		
		<div><strong>{$Average_Rating} : </strong><img src="{$Templates_Image}{$ave_rating|intval}.gif" width="120"></div>
		<div class="clear"></div>
		<div>(<strong>{$ave_rating} out of 10</strong>)</div>
		<div class="clear"></div>
      </div><!--right-column-wrap-->
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}		  
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->