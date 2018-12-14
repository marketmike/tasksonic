<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Extend Task Due Dates</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>								
					<form method="post" action="extend_task_{$id}_{$url_title}.html" name="frmextendproject">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="intro">{$pro_title|stripslashes|truncate:60:'..':true:false}</label>
						</div>
					</div>
					<div class="clear"></div>
					{if $project_status ==1 && $bid_count == 0}					
					<div class="field" style="margin-bottom:10px;">
					<div class="note" style="text-align:center;padding:8px;">				
						 {if $succ_msg != ''} 
							{$succ_msg} {$bidding_days_extend_by} {$lang.days_bidding} and {$completed_days_extend_by} {$lang.days_complete}
							<br />
							<a href="{$return}">Return to task</a>
						{elseif $ERROR != ''}
							{$ERROR}
						{else}
						{$lang.Extend_Message}						
						{/if}
						 
					</div>
					<div class="clear"></div>
					</div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Extend_Task_Bidding_Date}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input name="project_days_open" value="{$project_days_open}" type="text" class="dropdownmediumext" READONLY />
						<select name="bidding_days" tabindex="7" class="dropdownspecial">
						  <option value="0">Extend By</option>
							{$extend_bidding_days}
						</select>						
						<span class="hint" style="width:550px;">Current Bidding End Date</span>
					<div class="clear"></div>	
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="completed_by">{$lang.Extend_Task_Completion_Date}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="project_days_open" value="{$completed_by}" type="text" class="dropdownmediumext" READONLY />
						<select name="complete_date" tabindex="7" class="dropdownspecial">
						  <option value="0">Extend By</option>
							{$extend_complete_date}
						</select>						
						<span class="hint" style="width:550px;">Current Task Completion Date</span>
					<div class="clear"></div>	
					</div>	

					<div class="clear"></div>
					<div class="button-no" style="margin:0 auto;margin-bottom:20px;text-align:center;width:400px;">						
					<button style="float:left" type="submit" class="regular" name="Submit" value="{$lang.Button_Submit}">Extend</button><button style="float:right" type="submit" class="regular" name="Cancel" value="{$lang.Button_Cancel}" onClick="Javascript: return cancel();" >Cancel</button>					
					<div class="clear"></div>
					</div>					
					<input type="hidden" name="Action" value="Extend">
					<input type="hidden" name="project_id" value="{$id}">
					<input type="hidden" name="project_days_open" value="{$hidden_project_days_open}">
					<input type="hidden" name="completed_by" value="{$hidden_completed_by}">
					<input type="hidden" name="project_posted_date" value="{$project_posted_date}">
					{else}
					<div class="field" style="margin-bottom:10px;">
					<div class="note" style="text-align:center;padding:8px;">				
					This task is not eligible to be extended as the status is no longer set to open and or the task has existing bids.
					<br />
					<a href="task_{$id}_{$url_title}.html">Return to task</a>
					</div>
					<div class="clear"></div>
					</div>					
					{/if} <!-- End bid count and status check-->
					</form>
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