<script language="javascript">
	var JS_User_ID				 = '{$lang.JS_User_ID}';
	var JS_Fname 				 = '{$lang.JS_Fname}';
	var JS_Lname				 = '{$lang.JS_Lname}';
	var JS_Passwd 				 = '{$lang.JS_Passwd}';
	var JS_Password_Short 		 = 'Password must be between 8 and 16 characters';
	var JS_Re_Passwd			 = '{$lang.JS_Re_Passwd}';
	var JS_Confirm 				 = '{$lang.JS_Confirm}';
	var JS_City					 = '{$lang.JS_City}';
	var JS_Valid_Mail		 	 = '{$lang.JS_Valid_Mail}';
	var JS_Terms				 = '{$lang.JS_Terms}';
	var JS_Country				 = '{$lang.JS_Country}';
	var JS_Check_User_Login		 = '{$lang.JS_Check_User_Login}';
	var JS_Check_User_Lenght	 = '{$lang.JS_Check_User_Lenght}';
	var JS_Check_Special_Cha	 = '{$lang.JS_Check_Special_Cha}';
	var JS_Role					 = '{$lang.JS_Role}';
	var JS_Areas				 = '{$lang.JS_Areas}';
	var JS_Address				 = '{$lang.JS_Address}';
	var JS_Zipcode				 = '{$lang.JS_Zipcode}';
	var JS_Phone 		 		 = 'Please provide a 10 digit phone number';
	var JS_Valid_Phone           = 'Please provide a 10 digit phone number';
	var JS_Phone1 	 	 = 'The phone number is not a valid US format, e.g. (555) 555-5555 or 555-555-5555';
	var JS_Mobile 		 = 'The mobile phone number is not a valid US format, e.g. (555) 555-5555 or 555-555-5555';
	var JS_Check_Role    = ' You must select at least one reason for "How may we serve you?"';
	addLoadEvent(prepareInputsForHints);	


</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>EDIT ACCOUNT INFO</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">			
			<div class="clear"></div>
				<form method="post" action="{$smarty.server.PHP_SELF}" name="frmSignup" id="frmSignup">
				<input type="hidden" name="Action" value="Edit">				
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">Update Your Profile</label>
					</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;height:40px;text-align:center;">
				<div style="margin:0 auto;text-align:center;">Use this form to update your profile</div>
				<div class="clear"></div>				
				</div>								
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Password}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field" style="text-align:center;background:#F0E68C;padding:5px;height:20px;">
				<a href="update-password.html" class="footerlink">{$lang.change_pass_Page}</a>
				<span class="hint" style="text-align:center;margin:0 auto;">Click link to change your password.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.First_Name}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input id="mem_fname" name="mem_fname" value="{$mem_fname}" type="text" tabindex="4" size="25" />	
				<span class="hint">Update your first name here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Last_Name}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input id="mem_lname" name="mem_lname" value="{$mem_lname}" type="text" tabindex="5" size="25" />
				<span class="hint">Update your last name here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>					
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Phone}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="mem_phone" value="{$mem_phone}" type="text" tabindex="7" size="25" />
				<input name="mem_phone_orig" value="{$mem_phone}" type="hidden" />
				<span class="hint">Update your phone number here, e.g.(555) 555-5555 or 555-555-5555<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				
					
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Mobile}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="mem_mobile" value="{$mem_mobile}" type="text" tabindex="8" size="25" />
				<span class="hint">Update your mobile phone number here, e.g. (555) 555-5555 or 555-555-5555<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Fax}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="mem_fax_no" value="{$mem_fax_no}" type="text" tabindex="8" size="25" />
				<span class="hint">Update your fax phone number here, e.g. (555) 555-5555<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Your Location</label>
					</div>
				</div>
				<div class="clear"></div>
					<div class="field username account_login" style="margin-bottom:20px;text-align:left">
					<span style="width:auto;text-align:left;">{$lang.Location_Note}</span>
					</div>	
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Address}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="mem_address" value="{$mem_address}" type="text" tabindex="9" size="25" />
				<span class="hint">Update your address here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.City}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_city" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your City-</option>
				{$City_List}
				</select>				
				<span class="hint">{$lang.City_Message}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>		

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.State_Province}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_state" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your State-</option>
				{$State_List}
				</select>
				<span class="hint">{$lang.State_Message}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Zip_Code}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">				
				<input name="mem_zipcode" value="{$mem_zipcode}" type="text" tabindex="11" size="25" />
				<span class="hint">{$lang.Zip_Message}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Country}</label>
					</div>
				</div>				
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_country" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your Country-</option>
				{$Country_List}
				</select>	
				<span class="hint">Please select your country from the available countries currently served.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Email_Address}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>				
				<div class="field" style="text-align:center;background:#F0E68C;padding:5px;height:20px;">
				{$mem_email}
				<span class="hint" style="text-align:center;margin:0 auto;">Email Address On File<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				<div class="clear"></div>

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Select_Your_Role}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<div class="clear"></div>
				<span>{$lang.Role_Message}</span>
				<div class="clear"></div>			
				<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" name="check_buyer" class="shorter" value="1" tabindex="15" {if $mem_as_buyer == 1}checked{/if} />&nbsp;&nbsp;&nbsp;{$lang.Select_Buyer_Role}</div>
				<div class="clear"></div>				
				<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" name="check_seller" value="1" class="shorter" tabindex="16" {if $mem_as_seller == 1}checked{/if} />&nbsp;&nbsp;&nbsp;{$lang.Select_Seller_Role}</div>
				<div class="clear"></div>				
				</div>					
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">{$lang.Areas}</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<strong>Select between 1 and 5</strong>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				{assign var="col" value=2}
				{section name=prod loop=$Loop}
				{if $smarty.section.prod.iteration|mod:$col==1}
				<tr>
				{/if}
					<td valign="top" width="25%" class="style3">
					<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" class="shorter" name="cat_prod[]" value="{$catid[prod]}" {if $catid[prod]|in_array:$checked_cat}checked{/if} />&nbsp;{$catname[prod]}</div>
					</td>
				{if $smarty.section.prod.iteration|mod:$col==0}
				</tr>
				{/if}
				{/section}
				</table>
				<span class="hint">Please select your interest and or expertise<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">Email Notifications</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="radio" class="shorter" name="project_notices" value="1" {if $option1}checked{/if}/>{$lang.task_Notices1}</div>
				<div class="clear"></div>			
				<div style="line-height:40px;vertical-align:middle"><input type="radio" class="shorter" name="project_notices" value="2" {if $option2}checked{/if}/>{$lang.task_Notices2}</div>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="radio" name="project_notices" class="shorter" value="3" {if $option3}checked{/if}/>{$lang.task_Notices4}</div>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="checkbox" class="shorter" name="check" value="1" {if $checked}checked{/if}>{$lang.Notify} {$lang.Options1} or {$lang.Options2}</div>					
				<span class="hint">Please select options for notification by email<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="checkbox" class="shorter" name="newsletter" value="1" {if $newsletter}checked{/if}>Subscribe to Newsletter</div>					
				<span class="hint">Receive important updates and tips from Task Sonic<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>					
				</div>				

				{if $fbid}
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">Publish To Facebook</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field" style="line-height:24px;">
				<div style="line-height:40px;vertical-align:middle"><input type="checkbox" class="shorter" name="fb_publish" value="1" {if $fb_publish}checked{/if}> Publish my post and activity to my Facebook wall</div>
				<span class="hint">Publish your tasks and activity automatically to your facebook wall.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				</div>				
				{/if}

				
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">Today Is {$date1|date_format:"%A, %B %e, %Y"}</label>
					</div>
				</div>
				<div class="clear"></div>
				<div class="buttons" style="margin-top:20px;">				
				<button type="submit" class="regular" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(frmSignup);">
				Update
				</button>
				</div>
				<div class="clear"></div>				
			</form>			
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
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->	