<script language="javascript">
	var JS_EN_Slogan	 = '{$lang.JS_EN_Slogan}';
	var JS_EN_Desc		 = '{$lang.JS_EN_Desc}';
	var JS_Image			 = '{$lang.JS_Image}';
	var JS_Company_Logo		 = '{$lang.JS_Company_Logo}';	
	addLoadEvent(prepareInputsForHints);
</script>

<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Ln_En}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			{if $ERROR}
			<div class="message">{$ERROR}</div>
			{/if}
			<div class="clear"></div>
			<form method="post" action="{$smarty.server.PHP_SELF}" name="frmeditbuyer" enctype="multipart/form-data">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Introduction</label>
						</div>
					</div>
					<div class="clear"></div>
						<div class="field" style="margin-bottom:20px;">
						<span style="width:100%;text-align:center;">{$lang.Intro}</span>
						</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.EN_Slogan}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_buyers_slogan" value="{$en_buyers_slogan}"  type="text" tabindex="1" size="110" maxLength="50" />
						<span class="hint">Enter a slogan or phrase that summarizes your profile<span class="hint-pointer">&nbsp;</span></span>						
					<div class="clear"></div>
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.EN_Description}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_buyers_description" class="textarea" cols="90" rows="10">{$en_buyers_description}</textarea>
						<span class="hint">Enter a description of yourself or your business. (3000 character max)<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Company_logo}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input type="file" class="textbox" name="company_logo"><br />
					<span class="hint">Maximum 1 MB, jpg, jpeg, or png<span class="hint-pointer">&nbsp;</span></span>				
					  {if $seller_logo != ''}
					  <br />
					  <img src="{$path}thumb_{$seller_logo}" height="100" width="100"/>
					  <br />
					  <a href="Javascript: Delete_Image('{$User_Id}')" class="footerlinkcommon2" >{$lang.Remove}</a>
					  {/if}
					  {if $seller_logo == ''}
					  <br />					  
					  <img src="{$path}thumb_default.jpg" height="100" width="100"/>
					  <br />
					  {/if}
					</div>											
					
					<div class="clear"></div>
					<div class="field">
						<div class="buttons">
							<button type="submit" name="Submit" class="negative" value="{$lang.Submit}" onClick="Javascript: return Check_Details(this.form);">
							Save Profile
							</button>			
						</div>
					</div>
					<div class="clear"></div>
					<input type="hidden" name="Action" value="Edit">
					<input type="hidden" name="User_Id" value="{$User_Id}">
					<input type="hidden" name="img" value="{$seller_logo}"/>
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
		<div class="clear"></div>	
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->