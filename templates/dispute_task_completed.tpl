<script language="javascript">
	var JS_tasker_completed	= 'Please mark the task as completed before submitting';
	addLoadEvent(prepareInputsForHints);	
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>Dispute On Task</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{$task_title}						
						</label>
					</div>
					</div>					
					{if $resolution_mode == 1 || $resolution_mode == 2}
						{if $resolution_mode == 1}
						<form method="post" action="{$smaty.server.PHP_SELF}">
							<div class="clear"></div>
							<div class="field">
							If the parties were able to resolve their differences, please be sure all payments to the Tasker are made before marking the task dispute resolved. In the case where the parties are unable to resolve within seven days, the Task Owner can update the status of the dispute to "Unable To Resolve". The "Unable To Resolve" selection will not be available until after the seven days have passed.  
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle;margin-top:5px;">
							<select name="task_owner_dispute" class="dropdownmedium" >
							<option value="1" {if $task_owner_dispute ==1}selected{/if}>Dispute</option>
							<option value="2" {if $task_owner_dispute ==2}selected{/if}>Resolved</option>
							{if $seconds_remaining_7_day <0}
							<option value="3" {if $task_owner_dispute ==3}selected{/if}>Unable To Resolve</option>
							{/if}							
							</select>
							<div class="buttons" style="margin-top:8px;margin-right:120px;">
							<button type="submit" name="Submit" value="update" onClick="Javascript: return Check_Details(this.form);">Update</button>
							</div>																					
							</div>
						<div class="clear"></div>	
						</div>
						
							<input type="hidden" name="project_id" value="{$project_id}" />
							<input type="hidden" name="posted_by" value="{$comment_posted_by}" />
							<input type="hidden" name="posted_to" value="{$comment_posted_to}" />						
							<input type="hidden" name="action" value="update" />	
						</form>
					<div class="title-links" style="width:100%;height:3px;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						&nbsp;						
						</label>
					</div>
					</div>						
						{/if}
						<div class="clear"></div>
						<div class="field">
						<h3>Resolution Board</h3>
						The Task Owner and Tasker are required to first try to settle the dispute together. Please use this feature to discuss and try to resolve your differences in viewpoint of the task. If after seven days the parties are not able to arrive at an agreement, the Task Owner will then update the status of the dispute to "Unable To Resolve", and a Task Sonic Associate will be assigned to review the task, private message discussions, and the discussion held in the dispute module in order to make a fair decision.
						<div class="clear"></div>	
						</div>						
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
							<div class="form_page_text" style="text-align:center;">
								<label for="login-email-address">Posted by: {$project_posted_by} on {$task_owner_dispute_date|date_format:"%B %e, %Y %I:%M %p"}</label>
							</div>
						</div>
						<div class="clear"></div>						
						<div class="field">						
						<strong>Dispute description: </strong>{$task_owner_dispute_reason}<br /><br />
						
						{if $Loop > 0}							  
							{section name=dispute loop=$Loop}						
							<div id="message_wrapper" class="{cycle values='list_B style3, list_A style3'}">
								<div class="clear"></div>
								<div class="message_row">
									<div class="col_left"><strong>From: </strong>
									{$view_disp[dispute].posted_by}
									</div>
									<div class="col_right"><strong>Posted: </strong>{$view_disp[dispute].date|date_format:"%B %e, %Y %I:%M %p"}</div>
								<div class="clear"></div>
								</div>											
								<div class="clear"></div>										
								<div class="message_body">
										<strong>Comment: </strong>
										{$view_disp[dispute].disp_comment}<br><br>
										<div class="clear"></div>												
								</div>
								<div class="clear"></div>											
							</div>
							<div class="clear"></div>							
							{/section}
						{else}
								<div>No comments yet</div>
						{/if}
						<form method="post" action="{$smaty.server.PHP_SELF}">						
						<div class="clear"></div>	
						</div>
						<div class="clear"></div>
						<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
								<label for="login-email-address">Add Your Comment</label>
							</div>
						</div>
						<div class="title-bottom"></div>
						<div class="clear"></div>
						<div class="field">
						<textarea name="disp_comment" title="" class="textarea" cols="50" rows="10" tabindex="3"></textarea>
						<span class="hint">Please discuss the disagreement!<span class="hint-pointer">&nbsp;</span></span>
						<div class="clear"></div>	
						</div>						
							<input type="hidden" name="project_id" value="{$project_id}" />
							<input type="hidden" name="posted_by" value="{$comment_posted_by}" />
							<input type="hidden" name="posted_to" value="{$comment_posted_to}" />								
							<input type="hidden" name="action" value="comment" />							
						<div class="buttons">
						<button type="submit" name="Submit" value="Comment" onClick="Javascript: return Check_Details(this.form);">Comment</button>
						</div>						
					{elseif $resolution_mode == 3}
					<div class="clear"></div>
					<div class="field">
					<center>
					<strong>{$resolve_status}</strong>
					<br /><br />{$task_link}
					</center>
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>					
					{elseif $resolution_mode == 0}
					<div class="clear"></div>
					<div class="field">
					<center>
					<strong>{$ERROR}</strong>
					<br /><br />{$task_link}
					</center>
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>															
					{else}
					<div class="clear"></div>
					<div class="field">
					Use this form to communicate to the tasker that you do not agree with their assessment of the task as completed and or the reimbursements submitted. After submitting the tasker and you will be required to attempt to resolve your differences in viewpoint. If after seven days the parties are unable to resolve, you will be given the opportunity to mark the dispute as "Unable to Resolve" and a Task Sonic associate will be selected to reveiw and make a decision.
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
							<select name="task_owner_dispute" class="dropdownmedium">
							<option value="0">Please Select</option>
							<option value="1" {if $task_owner_dispute ==1}selected{/if}>Dispute</option>							
							</select>
							<div class="clear"></div>
							<span class="hint">Check to acknowledge that the task has been completed.</span>														
							</div>
						<div class="clear"></div>	
						</div>
						<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
								<label for="login-email-address">Dispute Reason</label>
							</div>
						</div>
						<div class="title-bottom"></div>
						<div class="clear"></div>
						<div class="field">
						<textarea name="task_owner_dispute_reason" title="" class="textarea" cols="50" rows="10" tabindex="3">{$task_owner_dispute_reason}</textarea>
						<span class="hint">Please describe why you feel the taskers assessment of "Task Completed" is inaccurate. If you are disputing reimbursements, please be specific.<span class="hint-pointer">&nbsp;</span></span>
						<div class="clear"></div>	
						</div>						
							<input type="hidden" name="project_id" value="{$project_id}" />
							<input type="hidden" name="auth_id_of_post_to" value="{$auth_id_of_post_to}" />				
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
		<div class="rail_spacer">&nbsp;</div>	
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}		  
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->