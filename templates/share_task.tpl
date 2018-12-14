<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>	
				<form method="post" action="{$smarty.server.PHP_SELF}" name="frmsendproject">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">{$lang.Send_task}</label>
						</div>
					</div>
					{if $message_sent}
					<div class="note" style="text-align:center;padding:20px;">Your message has been sent to {$friend}!</div>
					{/if}
					<div class="clear"></div>					
					<div class="clear"></div>
					<div class="field">
					Use this form to share the task "{$title}" with a friend.   
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Email}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input name="email_address" type="text" tabindex="1" size="40" />
					<div class="clear"></div>					
					<span class="hint">Enter your friends email address here</span>
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
						<textarea name="Comment" class="textarea" cols="80" rows="7"></textarea>
						<div class="clear"></div>
						<span class="hint">Include a personal note to tell your friend about this task.</span>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(this.form);">{$lang.Button_Submit}</button>
					</div>
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Button_Close}" onclick="Javascript: javascript:window.close();">{$lang.Button_Close}</button>
					</div>
					
					<input type="hidden" name="Action" value="Send_Mail" />
					<input type="hidden" name="project_id" value="{$pro_id}">
					</form>					
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>	
	<div class="page_bottom"></div>	
