<!-- Private Messages Inbox, linked from account page and shows aggregation of PMs--> 
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Private_Messages} Inbox</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{$lang.Private_Messages} Inbox						
						</label>
					</div>
					</div>
							<div class="clear"></div>
							<div class="field">
							Use Your Private Messages Inbox to get a snapshot of the messages you have received. Older messages can be deleted after a task has been completed, failed, or cancelled.
							<div class="clear"></div>	
							</div>					
						<form name="frmaccout" method="post" action="{$smarty.server.PHP_SELF}" >
						<div class="clear"></div>
						
						<div class="body_shim">
						{if $Loop > 0 }
										{section name=msg_name loop=$Loop}
										<div id="message_wrapper" class="{cycle values='list_B style3, list_A style3'}">
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left_short">{if $arr_msg_rece[msg_name].allow_delete == 1}<input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$arr_msg_rece[msg_name].id}">{else}<strong>X</strong>{/if}</div>						
												<div class="col_right"><strong>{$lang.task}: </strong><a href="task_{$arr_msg_rece[msg_name].project_id}_{$arr_msg_rece[msg_name].clear_title|stripslashes}.html" class="footerlinkcommon2">{$arr_msg_rece[msg_name].Project_Title}</a></div>																					
											<div class="clear"></div>
											</div>
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left"><strong>{$lang.From}: </strong><a href="tasker_profile_{$arr_msg_rece[msg_name].Form}.html" class="footerlinkcommon2">{$arr_msg_rece[msg_name].Form}</a></div>
												<div class="col_right"><strong>{$lang.Date}: </strong>{$arr_msg_rece[msg_name].date}</div>
											<div class="clear"></div>
											</div>											
											<div class="clear"></div>										
												<div class="message_body">
													<strong>{$lang.Message}: </strong>
													{$arr_msg_rece[msg_name].Project_Description|truncate:120:"...":true}
												<div class="clear"></div>
												<div class="reply">
													{if $arr_msg_rece[msg_name].project_posted_by == $arr_msg_rece[msg_name].Form}
													<a href="#" onclick="JavaScript: popupWindowURL('private_message.php?project_id={$arr_msg_rece[msg_name].project_id}&id=4&bid_user={$arr_msg_rece[msg_name].Form}&pop_up=true','','600','500','','true','true');" class="footerlinkcommon2">Read/Reply</a>
													{else}
													<a href="#" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id={$arr_msg_rece[msg_name].project_id}&id=4&bid_user={$arr_msg_rece[msg_name].Form}&pop_up=true','','600','500','','true','true');" class="footerlinkcommon2">Read/Reply</a>
													{/if}												
												
												</div>
												<div class="clear"></div>												
												</div>
											<div class="clear"></div>											
										</div><!-- message_wrapper-->
										 {/section}	
										{if $smarty.section.msg_name.total > 0}
										<div class="clear"></div>
										<div class="message_trash">
										<img src="{$Templates_Image}arrow_ltr.gif">
										<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('cat_prod[]'), true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="footerlinkcommon2">Check All</a> / 
										<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('cat_prod[]'), false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="footerlinkcommon2">Uncheck All</a>  &nbsp;&nbsp;					
										{$With_selected} <img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click();" /> 
										</div>
									{/if}
									<div><ul class="paginator">{$Page_Link}</ul></div>

					{else}
								<table width="100%" border="0" align="center"  cellpadding="0" cellspacing="0">	
									<tr><td height="6"></td></tr>
									 <tr><td height="6"></td></tr>
									<tr>
										<td align="center" class="successMsg">{$lang.Msg}</td>
									</tr>
									<tr><td height="6"></td></tr>
									 <tr><td height="6"></td></tr>
								</table>
					{/if}
							<input type="hidden" name="Action"/>
						<div class="clear"></div>
					</div><!-- body shim-->
					<div class="clear"></div>
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