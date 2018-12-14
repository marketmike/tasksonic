<script language="javascript">
	var JS_en_slogan		 = '{$lang.JS_en_slogan}';
	var JS_Cate				 = '{$lang.JS_Cate}';
	var JS_Skill_1			 = '{$lang.JS_Skill_1}';
	var JS_Skill_Rate_1		 = '{$lang.JS_Skill_Rate_1}';
	var JS_Image			 = '{$lang.JS_Image}';
	var JS_Indus			 = '{$lang.JS_Indus}';
	var JS_Company_Logo		 = '{$lang.JS_Company_Logo}';
	var JS_Mother_Lang		 = '{$lang.JS_Mother_Lang}';
	var JS_Lang_Pairs		 = '{$lang.JS_Lang_Pairs}';
addLoadEvent(prepareInputsForHints);	
</script>			
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Edit_Seller}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			{if $ERROR}
			<div class="message">{$ERROR}</div>
			{/if}
			<div class="clear"></div>
			<form method="post" action="{$smarty.server.PHP_SELF}" name="frmeditSeller" enctype="multipart/form-data">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Introduction</label>
						</div>
					</div>
					<div class="clear"></div>
						<div class="field" style="margin-bottom:20px;">
						<span style="width:100%;text-align:center;">{$lang.Intro}</span>
						<div class="clear"></div>
						</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Slogan_En}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_seller_slogan" value="{$en_seller_slogan}"  type="text" tabindex="1" size="110" maxLength="50" />
						<span class="hint">{$lang.Slogan_Hint}<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Desc_En}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_seller_description" class="textarea" cols="90" rows="10">{$en_seller_description}</textarea>
						<span class="hint">{$lang.Desc_Hint}<span class="hint-pointer">&nbsp;</span></span>
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
					<div class="clear"></div>
					</div>							
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Rate_Per_Hour}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="rate_hour" class="dropdownshort">
							{$Hourly_Rates}
						</select>
						<span class="hint">{$lang.Rate_Note}<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>										
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Indu_Exp}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<h3>You can make up to 5 selections</h3>
						<table cellpadding="3" cellspacing="4" border="0" width="100%">
						{assign var="col" value=2}
						{section name=prod loop=$Loop}
						{if $smarty.section.prod.iteration|mod:$col==1}
							<tr>
						{/if}
								<td valign="top" width="33%" class="bodytext">
								<input class="shorter" type="checkbox" name="industry_id[]" id="industry_id[]" value="{$industry_id[prod]}" {if $industry_id[prod]|in_array:$arr_industry}checked{/if}>&nbsp;<span style="height:30px;line-height:35px;font-size:18px">{$industry_name[prod]}</span>
								</td>
						{if $smarty.section.prod.iteration|mod:$col==0}
							</tr>
						{/if}
						{/section}
						</table>
						<span class="hint">You can make up to 5 selections<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>									
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Skill Details</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field short">
					<h3>Examples: Plumbing Repair, Landscaping, Couponing</h3>
						<table cellpadding="3" cellspacing="4" border="0" width="98%">
							<tr>
								<td width="60%" class="bodytextblack"><strong>{$lang.Skill_Title}</strong></td>
								<td width="40%" class="bodytextblack"><strong>{$lang.Skill_Level}</strong></td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_1" type="text" size="30" value="{$skill_name_1}" class="short"></td>
								<td><select name="skill_rate_1" class="dropdownmini">
									<option>{$Skill_Level_1}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_1" value="{$skill_id_1}" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_2" type="text" size="30" value="{$skill_name_2}" class="short"></td>
								<td><select name="skill_rate_2" class="dropdownmini">
									<option>{$Skill_Level_2}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_2" value="{$skill_id_2}"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_3" type="text" size="30" value="{$skill_name_3}" class="short"></td>
								<td><select name="skill_rate_3" class="dropdownmini">
									<option>{$Skill_Level_3}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_3" value="{$skill_id_3}"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_4" type="text" size="30" value="{$skill_name_4}" class="short"></td>
								<td><select name="skill_rate_4" class="dropdownmini">
									<option>{$Skill_Level_4}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_4" value="{$skill_id_4}"/ >
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_5" type="text" size="30" value="{$skill_name_5}" class="short"></td>
								<td><select name="skill_rate_5" class="dropdownmini">
									<option>{$Skill_Level_5}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_5" value="{$skill_id_5}"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_6" type="text" size="30" value="{$skill_name_6}" class="short"></td>
								<td><select name="skill_rate_6" class="dropdownmini">
									<option>{$Skill_Level_6}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_6" value="{$skill_id_6}" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_7" type="text" size="30" value="{$skill_name_7}" class="short"></td>
								<td><select name="skill_rate_7" class="dropdownmini">
									<option>{$Skill_Level_7}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_7" value="{$skill_id_7}" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_8" type="text" size="30" value="{$skill_name_8}" class="short"></td>
								<td><select name="skill_rate_8" class="dropdownmini">
									<option>{$Skill_Level_8}</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_8" value="{$skill_id_8}" />
								</td>
							</tr>
						</table>
						<span class="hint">{$lang.Skill_Note_1}<BR>{$lang.Skill_Note_2}<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
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

