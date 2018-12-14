<script language="javascript">
	var JS_en			 = '{$lang.JS_en}';
	var JS_en_desc		 = '{$lang.JS_en_desc}';	

	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
			<h1>{$lang.Contact_Title}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>

					<!-- form tag strt here -->
					<form method="post" action="contact_us.html" name="frmcontact" enctype="multipart/form-data">					
					
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Introduction</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field username account_login" style="margin-bottom:20px;">
					<span style="width:100%;text-align:center;">{$lang.Msg}</span>
					<div class="clear"></div>
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Contact_Subject}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="contact_subject" type="text" maxlength="50" size="107" />
						<span class="hint">{$lang.Contact_Subject_Hint}<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Reason}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="contact_reason" class="dropdownmediumext">
								{$Contact_List}
							</select>
						<span class="hint">Please select a contact reason.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Contact_Body}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="contact_message" class="textarea" cols="88" rows="10"></textarea>
						<span class="hint">{$lang.Contact_Body_Hint}<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Send_Copy}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
							<div style="float:left;margin-right:10px;width:260px;line-height:40px;">
							<input class="shorter" type="checkbox" name="contact_copy" id="contact_copy" />&nbsp;<strong>{$lang.Send_Copy_Hint}</strong>								
							</div>					
					<div class="clear"></div>	
					</div>						
					<div class="clear"></div>
					<div class="field">
							<div class="buttons">
							<button type="submit" name="Submit" value="{$lang.Submit1}" onClick="Javascript: return Check_Details(this.form);" >{$lang.Submit1}</button>
							</div>
					</div>									
					<input type="hidden" name="Action" value="{$Action}">
					<input type="hidden" name="User_Id" value="{$User_Id}">
					<input type="hidden" name="user_name" value="{$User_Name}">
					<input type="hidden" name="user_email" value="{$User_Email}">					
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
