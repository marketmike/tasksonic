<script language="javascript">
	var JS_tasker_completed	= 'Please mark the task as completed before submitting';
	addLoadEvent(prepareInputsForHints);	
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>Mark Task Completed</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Mark Task Completed						
						</label>
					</div>
					</div>					
					{if $error == 1}
						<div class="clear"></div>
						<div class="field">
						You have already marked this task as completed!
						<div class="clear"></div>	
						</div>
						<div class="clear"></div>
					{else}
					<div class="clear"></div>
					<div class="field">
					Use this form to communicate that you have completed the task. You can not submit an expense greater than what the Task Owner budgeted. If you and the Task Owner have agreed on more than ${$max_expense_budget} in expenses and this has been documented in private messages between you and the Task Owner please ask the Task Owner to adjust their budget before submitting the task as completed. 
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>
						<form method="post" action="{$smaty.server.PHP_SELF}">
						<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
								<label for="login-email-address">Task Status</label>
							</div>
						</div>
						<div class="title-bottom"></div>
						<div class="clear"></div>
						<div class="field">
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="tasker_completed" value="1" tabindex="11" class="shorter" {$tasker_completed} /> <strong>I HAVE COMPLETED THE BELOW TASK</strong>
							<div class="clear"></div>
							<div style="text-align:center">{$task_title}</div>
							<span class="hint">Check to acknowledge that the task has been completed.</span>														
							</div>
						<div class="clear"></div>	
						</div>
						<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
								<label for="login-email-address">Additional Expenses</label>
							</div>
						</div>
						<div class="title-bottom"></div>
						<div class="clear"></div>
						<div class="field">
							<div style="float:left;margin-right:5px;font-size:24px;"><strong>$</strong></div><input name="tasker_reimburse" value="{$smarty.post.tasker_reimburse}" type="text" maxlength="50" tabindex="1" size="30" />
							<span class="hint">Only enter numberic values here, e.g. 19.00 or 20.43<span class="hint-pointer">&nbsp;</span></span>
						<div class="clear"></div>	
						</div>
						<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
								<label for="login-email-address">Additional Expenses Description</label>
							</div>
						</div>
						<div class="title-bottom"></div>
						<div class="clear"></div>
						<div class="field">
						<textarea name="tasker_reimburse_desc" title="" class="textarea" cols="50" rows="10" tabindex="3">{$smarty.post.tasker_reimburse_desc}</textarea>
						<span class="hint">Please describe the additional expenses noting that any expenses should have already been discussed with the Task Owner<span class="hint-pointer">&nbsp;</span></span>
						<div class="clear"></div>	
						</div>						
							<input type="hidden" name="project_id" value="{$project_id}" />
							<input type="hidden" name="auth_id_of_post_by" value="{$auth_id_of_post_by}" />
							<input type="hidden" name="max_expense_budget" value="{$max_expense_budget}" />					
						<div class="buttons">
						<button type="submit" name="Submit" value="Completed" onClick="Javascript: return Check_Details(this.form);">Completed</button>
						</div>
						{/if}																
						</form>
						<div class="clear"></div>		
					</div>
				</div>
			<div class="page_bottom"></div>
		</div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}		  
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->