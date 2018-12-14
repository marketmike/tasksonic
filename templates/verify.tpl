<script language="javascript">
	var JS_Valid_Mail		 	 = 'Please enter a valid email address!';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>{if $verfiy_success ==1}Your email has been successfully verified.{elseif $show_form ==1}Resend Verification Email{else}Registration Success{/if}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{if $show_form ==1}Please Enter Your Email Address{else}You're Almost Done{/if}</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>

				{if $show_form ==1}
				<div class="message" style="text-align:left;padding:10px">
					If you were redirected to this page after attempting to log in, you must first complete the email verification process. Enter the email address you used when you registered with Task Sonic to resend the verification. You will need to click on the link in the email to verify your email address before logging into the site.
				</div>				
					<form method="post" action="{$smaty.server.PHP_SELF}" name="frmverify" id="frmverify">						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Email Address</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input name="verify_email" value="" type="text" maxlength="40" tabindex="1" size="50" />
					<div class="clear"></div>	
					</div>						
						<input type="hidden" name="action" value="send_verification" />				
					<div class="buttons">
					<button type="submit" name="Submit" value="send_verification" onClick="Javascript: return Check_Details(this.form);">Submit</button>
					</div>
				{elseif $verfiy_success ==1}
				<div class="message" style="text-align:center;margin-bottom:50px;padding:10px">
				Your email has been successfully verified.<br /><a href="#" onclick="popup('loginDiv')">Login Now!</a>	
				</div>
				{elseif $verified_check ==1}
				<div class="message" style="text-align:center;margin-bottom:50px;padding:10px">
				{$ERROR}<br /><a href="#" onclick="popup('loginDiv')">Login Now!</a>	
				</div>
				{else}
					<div class="message" style="text-align:center;margin-bottom:50px;padding:10px">{$confirm}</div>
				{/if}
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