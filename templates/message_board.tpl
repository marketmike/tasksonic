<script language="javascript">
	var JS_English_Msg		 = '{$js}';
</script>
<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>				
					{if $smarty.session.User_Name == ''}
					<div class="note" style="text-align:center;padding:20px;">{$msg_board}</div>									
					{else}
					<form method="post" action="{$smarty.server.PHP_SELF}" name="frmmsgboard">
					<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Message Board For: {$title|stripslashes}</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					<strong>{$lang.Important1}</strong> {$lang.msg_board1} {$lang.msg_board2}.
					<div class="clear"></div>	
					</div>			
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Post Message To {if $smarty.session.User_Name == $project_creator}Community{else}{$project_creator}{/if}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_message_desc" class="textarea" cols="80" rows="7"></textarea>
						<span class="hint">Use a descriptive title<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Submit}" onclick="Javascript: return Check_Details(this.form);">{$lang.Button_Post}</button>
					</div>					
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>	
	<div class="page_bottom"></div>	
	<br /><br />
		
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">Messages</label>
					</div>
					</div>
					<div class="clear"></div>
								{if $Loop > 0 }
								{section name=msg loop=$Loop}
										<div id="message_wrapper" class="{cycle values='list_B style3, list_A style3'}">
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left"><strong>From: </strong>
												  {if $arr_msg[msg].sender_login_id == $project_creator}
													  <a href="#" onclick="Javascript : popup_window_link('task_owner_profile_{$arr_msg[msg].sender_login_id}.html')" class="footerlinkcommon2"> Task Owner {$arr_msg[msg].sender_login_id}</a>
												  {else}	
													  <a href="#" onclick="Javascript : popup_window_link('tasker_profile_{$arr_msg[msg].sender_login_id}.html')" class="footerlinkcommon2"> {$arr_msg[msg].sender_login_id}</a>
												  {/if}	
												</div>
												<div class="col_right"><strong>{$lang.Date_posted}: </strong>{$arr_msg[msg].dates}</div>
											<div class="clear"></div>
											</div>											
											<div class="clear"></div>										
											<div class="message_body">
													<strong>{$lang.Message}: </strong>
													{$arr_msg[msg].msg_dec}<br><br>
													<div class="clear"></div>
				
												<div class="reply">
											   {if $current_user != $arr_msg[msg].sender_login_id}
											   <a href=#  onClick="JavaScript: ReportViolation_Click(document.frmmsgboard,'{$arr_msg[msg].sender_login_id}','{$current_user}');"/>Report user</a>
											   {/if}
												</div>
												<div class="clear"></div>												
											</div>							
											</div>						
								{/section}				   
								<br /><br />
								<div class="buttons">
								<button type="submit" name="Submit" value="Close"  onclick="Javascript: window.close();">Close</button>
								</div>	

								{/if}
								{/if}
	
					<input type="hidden" name="Action"/>
					<input type="hidden" name="project_id" value="{$project_id}" />
					<input type="hidden" name="project_creator" value="{$project_creator}" />
					<input type="hidden" name="title" value="{$title}" />
					<input type="hidden" name="id" value="{$id}" />

					</form>
									<div class="clear"></div>
				<div id="more_link"></div>
			</div>
		</div>
	<div class="page_bottom"></div>
	<div class="clear"></div>
</div><!-- end .grid_8.alpha -->