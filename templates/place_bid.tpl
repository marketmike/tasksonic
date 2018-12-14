<script language="javascript">
	var min_bid_amount		 	 = '{$lang.min_bid_amount}';
	var JS_Bid_Amount			 = '{$lang.JS_Bid_Amount}';
	var JS_Confirm_Bid			 = '{$lang.JS_Confirm_Bid}';
	var JS_Days					 = '{$lang.JS_Days}';
	var JS_English				 = '{$lang.JS_English}';
	var JS_Days1				 = '{$lang.JS_Days1}';
	var JS_bid				 	 = '{$lang.JS_bid}';
	var JS_Bid1				 	 = '{$lang.JS_Bid1}';
	addLoadEvent(prepareInputsForHints);
</script>
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	{if $status!= 1}<h1>Bid On Tasks : {$project_title}</h1>{elseif $status!= 0}<h1>Update Bid - Tasks "{$project_title}"</h1>{/if}
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{if $status!= 1}Place A Bid{elseif $status!= 0}Update Your Bid{/if}</label>
				</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;">
				<span style="width:100%;text-align:center;">
				Use this form to {if $status!= 1}submit{else}update{/if} your bid for the task "{$project_title}". Be sure to provide comments for the Task Owner in  the Bids Details section.
				If you need more clarity on the task before bidding, use the messaging system to ask a question by clicking on {if !$smarty.session.User_Name}<a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong>{$lang.Message_Board}({$msgboardcnt})</strong></a>{else}<a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id={$project_id}&project_creator={$project_posted_by}&id=1&pop_up=true','','680','500','','true','true');" class="footerlinkcommon23"><strong>Ask A Question</strong></a>{/if} 
				</span>
				</div>					
				<div class="clear"></div>
				<form method="post" action="{$smarty.server.PHP_SELF}" name="frmBid" enctype="multipart/form-data">
				<div class="clear"></div>				
				{if $SuccMsg}
				<div class="note" style="text-align:center;padding:20px;">{$SuccMsg}</div>
				{/if}
				{if $premium_msg}
				<div class="note" style="text-align:center;padding:20px;">{$premium_msg}</div>
				{/if}
				{if $status!= 1}
				<div class="note" style="text-align:center;padding:20px;">{$msg}</div>
				{else}
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Bid_Amount}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input type="text" class="textbox" name="bid_amount" value="{$bid_amount}" size="3" />
				<span class="hint">{$lang.Note3}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">Task To Be Completed By</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<center><h3>{$completed_by} at {$completed_time}</h3></center>
				<div class="note" style="text-align:center;padding:10px;">
				This is the date the Task Owner indicated they need the tssk completed by. Please be certain you are able to complete the task by the date shown.
				</div>
				<input type="hidden" class="textbox" name="delivery_within" value="{$completed_by} at {$completed_time}" size="5" />
				<span class="hint">This is the date the Task Owner indicated they need the tssk completed by. Please be certain you are able to complete the task by the date shown.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">Bid Comments</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<textarea name="en_bid_desc" cols="90" rows="10" class="textarea">{$en_bid_desc}</textarea>
				<span class="hint">{$lang.Bid_Note}<span class="hint-pointer">&nbsp;</span></span>				
				<div class="clear"></div>	
				</div>
				
				<div class="note" style="text-align:center;padding:10px;">
				<a href="Javascript: View_Terms()" class="footerlinkcommon21"><strong>View Terms & Conditions</strong></a><br />
				{$lang.IMPORTANT}
				</div>				

				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Notification_Option}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<span style="line-height:35px"><input class="shorter" type="checkbox" name="notification_status" value="1" {$chechked}/>&nbsp;{$lang.Notify}</span>
				<div class="clear"></div>	
				</div>														
				<div class="buttons">
				<button type="submit" value="{$lang.Place_Bid}"  name="Submit"  onclick="javascript: return Check_Bidding(document.frmBid);"  style='text-decoration:none;' class="negative">
				{if $status!= 1}Place Bid{elseif $status!= 0}Update Bid{/if}
				</button>
				</div>
	
				{/if}
				<input type="hidden" name="project_id" value="{$project_id}" />
				<input type="hidden" name="amount" value="{$amount}" />
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