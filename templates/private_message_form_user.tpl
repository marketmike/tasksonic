<!-- Private Messages Pop Up For Tasker Owner To Communicate with Tasker--> 
<script language="javascript">
	var JS_English_Msg		 = 'Message Text Required';
</script>

<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<form method="post" action="{$smarty.server.PHP_SELF}" name="frmprivatemsg" enctype="multipart/form-data">
					{if $smarty.session.User_Name == ''}
								<div class="note" style="text-align:center;padding:20px;">{$lang.Private_Message1}</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="{$lang.Button_Close}" onclick="javascript : window.close();"/>					
					{else}
					
						{if $smarty.session.User_Name == $bid_user}
								<div class="note" style="text-align:center;padding:20px;">{$lang.Private_Message}</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="{$lang.Button_Close}" onclick="javascript : window.close();"/>
						{else}
								{if $smarty.session.User_Name != $project_creator}
								<div class="note" style="text-align:center;padding:20px;">Only the task owner can send a private message to {$lang.bid_user}<</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="{$lang.Button_Close}" onclick="javascript : window.close();"/>
								{else}
								<div class="clear"></div>
								<div class="title-links" style="width:100%;">
									<div class="form_page_text" style="text-align:center;">
										<label for="login-email-address">{$Site_Title} Task "{$title}"</label>
									</div>
								</div>
								<div class="clear"></div>					
								<div class="field">
								<div class="message_title">{$lang.Msg_Between} {$project_creator} {$lang.And} {$bid_user}</div>
								<div class="clear"></div>
								{if $project_status == 3}
								Now that the task has been awarded to {$user_name}, {$project_creator} and {$user_name} should use the Private Message system to stay in touch throughout the completion process.<br /><br />While we encourage you to use the Private Messaging system for all communication, we do realize that alternate means of communication can at times be more effective for certain types of tasks. Exchanging contact information for this purpose is permitted as needed to complete the task.
								{else}
								{$lang.Important2}
								{/if}
								<div class="clear"></div>	
								</div>			
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">Post Message To {$bid_user}</label>
									</div>
								</div>
								<div class="title-bottom"></div>
								<div class="clear"></div>
								<div class="field">
									<textarea name="en_message_desc" class="textarea" cols="60" rows="7"></textarea>					
								<div class="clear"></div>	
								</div>						
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">{$lang.Attached_document}</label>
									</div>
								</div>
								<div class="title-bottom"></div>
								<div class="clear"></div>
								<div class="field">
									<input type="file" name="attch_file">					
								<div class="clear"></div>	
								</div>	
								<div class="clear"></div>
								<div class="buttons">
								<button type="submit" name="Submit" value="{$lang.Button_Post}" onclick="Javascript: return Check_Details(this.form);">{$lang.Button_Post}</button>
								</div>								
							<div class="clear"></div>	
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>	
				<div class="page_bottom"></div>	
				<br /><br />
			{if $Loop > 0 }	
			<div class="clear"></div>
			<div class="page_top"></div>
					<div class="page_content">
						<div class="page_content_white">
							<div class="clear"></div>
							<div class="title-links" style="width:100%;">
								<div class="form_page_text" style="text-align:center;">
									<label for="login-email-address">{$lang.Msg_Between} {$project_creator} {$lang.And} {$bid_user}</label>
								</div>
							</div>
							<div class="clear"></div>				
									{section name=privatemsg loop=$Loop}
										<div id="message_wrapper" class="{cycle values='list_B style3, list_A style3'}">
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left"><strong>From: </strong>
												  {if $arr_private_msg[privatemsg].sender_login_id == $project_creator}
													  <a href="#" onclick="Javascript : popup_window_link('task_owner_profile_{$arr_private_msg[privatemsg].sender_login_id}.html')" class="footerlinkcommon2"> {$arr_private_msg[privatemsg].sender_login_id}</a>
												  {else}	
													  <a href="#" onclick="Javascript : popup_window_link('tasker_profile_{$arr_private_msg[privatemsg].sender_login_id}.html')" class="footerlinkcommon2"> {$arr_private_msg[privatemsg].sender_login_id}</a>
												  {/if}	
												</div>
												<div class="col_right"><strong>{$lang.Date_posted}: </strong>{$arr_private_msg[privatemsg].date}</div>
											<div class="clear"></div>
											</div>											
											<div class="clear"></div>										
											<div class="message_body">
													<strong>{$lang.Message}: </strong>
													{$arr_private_msg[privatemsg].msg_dec}<br><br>
													<div class="clear"></div>
				
												<div class="reply">
												{if $arr_private_msg[privatemsg].sender_login_id != $project_creator}
												<a href=#  onClick="JavaScript: ReportViolation_Click(document.frmprivatemsg,'{$arr_private_msg[privatemsg].sender_login_id}','{$project_creator}');"/>Report user</a>
												{/if}
												</div>
												<div class="clear"></div>												
											</div>
												<div class="clear"></div>
												{if $arr_private_msg[privatemsg].file1}
													<div class="message_row">
													<div class="col_left_full"><strong>Attachment : </strong><a href="Javascript: Download_File('{$arr_private_msg[privatemsg].file}','Private_Message');" class="footerlinkcommon2"> {$arr_private_msg[privatemsg].file1}</a></div>
													<div class="clear"></div>
													</div>
													<div class="clear"></div>
												{/if}																			
											</div>
											<br />
											<div class="clear"></div>												
										{/section}				
										<div class="clear"></div>						
									{/if}
								{/if}
							{/if}	
						{/if}
						<input type="hidden" name="Action"/>
						<input type="hidden" name="project_id" value="{$project_id}" />
						<input type="hidden" name="project_creator" value="{$project_creator}" />
						<input type="hidden" name="title" value="{$title}" />
						<input type="hidden" name="bid_user" value="{$bid_user}" />
						<input type="hidden" name="id" value="{$id}" />
						</form>
						<div class="clear"></div>
						</div>
					</div>
				<div class="page_bottom"></div>			
</div><!-- end .grid_8.alpha -->