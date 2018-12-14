<script language="javascript">
	var JS_Comment	 = '{$lang.JS_Comment}';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
<div class="grid_8 alpha"> 
	<h1>
	{if $user_type == task_owner}
	Rate {$Site_Title_Absolute} Task Owner {$user}
	{else}
	Rate {$Site_Title_Absolute} Tasker {$user}
	{/if}
	</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<form action="{$smaty.server.PHP_SELF}" method="post" name="frmrating">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">{$lang.Feedback_Note} {$user}</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
						Now that the task is completed, please be sure to rate and provide feedback for {$user}
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Rating}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="rating" class="dropdownmediumext">
						{$rating_List}
						</select>
						<span class="hint">({$lang.Rating_Note})<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>					
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Comment}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<textarea name="en_comm" class="textarea" cols="50" rows="10"></textarea>
					<span class="hint">({$lang.Comment_Note})<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>						
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Button_Rate}" onClick="Javascript: return Check_Details(this.form);">Rate User</button>
					</div>
					<input type="hidden" name="to" value="{$user}" />
					<input type="hidden" name="project_id" value="{$project_id}" />
					<input type="hidden" name="user_type" value="{$user_type}" />
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
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}				
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->