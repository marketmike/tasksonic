<script language="javascript">
	var JS_Email		 = '{$lang.JS_Email}';
	var JS_violation	 = '{$lang.JS_violation}';
	var JS_Person		 = '{$lang.JS_Person}';
	var JS_Url			 = '{$lang.JS_Url}';
	var JS_En_Violation	 = '{$lang.JS_En_Violation}';
	var JS_Url_Text		 = '{$lang.JS_Url_Text}';
</script>
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Report_Violation}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<form method="post" action="report-violation.html" name="frmViolation">
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">Report A Vioation</label>
				</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;">
				<span style="width:100%;text-align:center;">
				{$lang.Report_Violation_Text}
				</span>
				</div>
				<div class="clear"></div>				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Your_Name}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="your_name"  type="text" tabindex="1" value="{$User_Fullname}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Your_Email}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="your_email"  type="text" tabindex="2" value="{$User_Email}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>				
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Your_Username}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="your_username"  type="text" tabindex="3" value="{$User_Name}" size="25" readonly />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Violation}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
					<select name="violation_list" class="dropdownmediumext" tabindex="4">
					<option value="0" >(Please select violation)</option>
					{$violation_list}
					</select>
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Other_person_Username}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="other_person_name"  type="text" tabindex="5" size="25" />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.URL}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="url"  type="text" tabindex="6" size="25" />
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">{$lang.Violation_Details}</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<textarea name="en_violation_details" class="textarea" cols="70" rows="10"></textarea>
				<span class="hint">{$lang.Option}<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				<div class="clear"></div>
				<div class="buttons">
				<button type="submit" value="{$lang.Violation_Send}"  name="Submit"  onClick="javascript: return Check_Details_Violation(document.frmViolation);"  style='text-decoration:none;' class="negative">
				{$lang.Violation_Send}
				</button>
				</div>
				<input type="hidden" name="Action" value="Send">
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