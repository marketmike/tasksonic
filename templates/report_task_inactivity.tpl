<script language="javascript">
	var JS_Email		 = '{$lang.JS_Email}';
	var JS_inactivity	 = '{$lang.JS_inactivity}';
	var JS_Person		 = '{$lang.JS_Person}';
	var JS_Url			 = '{$lang.JS_Url}';
	var JS_En_inactivity	 = '{$lang.JS_En_inactivity}';
	var JS_Url_Text		 = '{$lang.JS_Url_Text}';
</script>
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Report_Inactivity}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<form method="post" action="report-inactivity.html" name="frminactivity">
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">Report Task Inactivity</label>
				</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;">
				<span style="width:100%;text-align:center;">
				{$lang.Report_Inactivity_Text}
				</span>
				</div>
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.taskID}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="taskID"  type="text" value="{$project_id}" tabindex="6" size="25" />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>					
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.tasktitle}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="tasktitle"  type="text" value="{$task_title}" tabindex="6" size="25" />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>			
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Task_Owner}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="task_owner"  type="text" tabindex="1" value="{$project_posted_by}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Tasker}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="tasker"  type="text" tabindex="2" value="{$project_post_to}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>				
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Submitted_By}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="submitted_by"  type="text" tabindex="3" value="{if $User_Name == $project_posted_by}Task Owner{else}Tasker{/if}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="inactivity_list">{$lang.Inactivity_Type}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
					<select name="inactivity_list" class="dropdownmediumext" tabindex="4">
					<option value="0" >(Please select inactivity)</option>
					{$inactivity_list}
					</select>
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>

				<div class="clear"></div>
			
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Inactivity_Details}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<textarea name="en_inactivity_details" class="textarea" cols="70" rows="10"></textarea>
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="buttons">
				<button type="submit" value="{$lang.Inactivity_Send}"  name="Submit"  onClick="javascript: return Check_Details_inactivity(document.frminactivity);"  style='text-decoration:none;' class="negative">
				{$lang.Inactivity_Send}
				</button>
				</div>
				<input type="hidden" name="Action" value="Send">
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