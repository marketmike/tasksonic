<script language="javascript">
	var JS_Confirm_Password	 = '{$lang.JS_Confirm_Password}';
	var JS_Old_Password		 = '{$lang.JS_Old_Password}';
	var JS_New_Password		 = '{$lang.JS_New_Password}';
	var JS_Password_Short 		 = 'Password must be between 8 and 16 characters';	
	var JS_Check_Special_Cha2	 = '{$lang.JS_Check_Special_Cha2}';	
</script>			
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.change_pass_Page}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<form method="post" action="update-password.html" name="frmChangePass">			
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Update Your Password</label>
						</div>
					</div>
					<div class="clear"></div>
						<div class="field username account_login" style="margin-bottom:20px;">
						<span style="width:100%;text-align:center;">{$lang.Forgot_Comment}</span>
						</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Current_Password}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input type="password" name="old_password"  />
					<input type="hidden" name="old_pass_value" value="{$old_pass}">
					<span class="hint">Please enter your current password!<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.New_Password}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input type="password" name="new_password1"  onkeyup="passwordStrength(this.value)"  />
					<input type="hidden" name="old_pass_value" value="{$old_pass}" />
					<span class="hint">Please enter your desired password. Note that passwords containing both upper and lower case letters, (A-Z a-z) along with numeric combinations using 0-9, and the following permitted special characters _ ? + $ ! # ~ | make more secure passwords. Please use password strength meter to gauge your passwords strength. Passwords must be between 8 and 16 characters.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					<strong>Password strength</strong>
					<div id="passwordDescription">Password not entered</div>
					<div id="passwordStrength" class="strength0"></div>
					<div class="clear"></div>
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Repeat_Password}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">

					<input type="password" name="new_password2"  />
					<input type="hidden" name="old_pass_value" value="{$old_pass}">
					<span class="hint">Please re-enter your password. Please note that your entry must match the above entered password exactly.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>						

					<div class="buttons"  style="float:center;">						
					<button type="submit" class="regular" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(frmChangePass);">Save Password</button>
					</div>
					<input type="hidden" name="Action" value="{$Action}"> 
					<input type="hidden" name="User_Id" value="{$User_Id}">
					</form>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>			
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->