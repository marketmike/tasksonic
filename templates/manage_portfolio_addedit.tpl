<script language="javascript">
	var JS_En_Title		 	 = '{$lang.JS_En_Title}';
	var JS_En_Desc			 = '{$lang.JS_En_Desc}';
	var JS_Image			 = '{$lang.JS_Image}';
	var JS_Image_Desc		 = '{$lang.JS_Image_Desc}';
	var JS_Cate				 = '{$lang.JS_Cate}';
	var JS_Cate_Max			 = '{$lang.JS_Cate_Max}';
	var JS_Image_Del		 = '{$lang.JS_Image_Del}';
	
	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>
		{if $flag == 1}
		{$lang.Add_Portfolio}
		{/if}	
		{if $flag == 0}
		{$lang.Update_Portfolio}
		{/if}	
	</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>


								<form method="post" action="{$smarty.server.PHP_SELF}" name="frmeditSeller" enctype="multipart/form-data">
								<div class="clear"></div>					
								<div class="title-links" style="width:100%;">
									<div class="form_page_text" style="text-align:center;">
										<label for="login-email-address">
											{if $flag == 1}
											{$lang.Add_Portfolio}
											{/if}	
											{if $flag == 0}
											{$lang.Update_Portfolio}
											{/if}										
										</label>
									</div>
								</div>								
								<div class="clear"></div>
								{if $ERROR}
								<div class="message" style="text-align:center;padding:10px;margin:10px;">{$ERROR}</div>
								<div class="clear"></div>
								{/if}
								<div class="field">
								Upload a portfolio example using this form. Add a title and description. Be sure to explain your portfolio example so Task Owners are clear on the type of task it represents.
								<div class="clear"></div>
								</div>								
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">{$lang.Title_En}</label>
									</div>
								</div>
								<div class="title-bottom"></div> 
								<div class="clear"></div>
								<div class="field">
									<input name="en_seller_title" value="{$en_seller_title}"  type="text" size="110" maxLength="50" />
								<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">{$lang.Description_En}</label>
									</div>
								</div>
								<div class="title-bottom"></div> 
								<div class="clear"></div>
								<div class="field">
									<textarea name="en_seller_description" class="textarea" cols="90" rows="10">{$en_seller_description}</textarea>
								<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">Portfolio Example Upload</label>
									</div>
								</div>
								<div class="title-bottom"></div> 
								<div class="clear"></div>
								<div class="field">
								<h3>Maximum File Size <strong>1 MB</strong></h3>
									<input type="file" name="sample_file" class="textbox"><br />
										{if $sample_file != NULL}
										<br />
										<div class="clear"></div>
										<img src="{$path}{$sample_file}" height="100" width="100"/>
										<br />
										<a href="Javascript: Delete_Image('{$User_Id}','{$pro_id}')" class="footerlink" >{$lang.Remove_Link}</a>
										{/if}
								<div class="clear"></div>		
								</div>
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">Categories</label>
									</div>
								</div>
								<div class="title-bottom"></div> 
								<div class="clear"></div>
								<div class="field">
								<h3>You can make up to 3 selections</h3>
									<table cellpadding="3" cellspacing="4" border="0" width="100%">
									{assign var="col" value=2}
									{section name=prod loop=$Loop}
									{if $smarty.section.prod.iteration|mod:$col==1}
										<tr>
									{/if}
											<td valign="top" width="33%" class="bodytext">
											<input class="shorter" type="checkbox" name="cat_prod[]" id="cat_prod[]" value="{$catid[prod]}" {if $catid[prod]|in_array:$arr_categories}checked{/if}>&nbsp;<span style="height:30px;line-height:35px;font-size:18px">{$catname[prod]}</span>
											</td>
									{if $smarty.section.prod.iteration|mod:$col==0}
										</tr>
									{/if}
									{/section}
									</table>
									<span class="hint">You can make up to 3 selections<span class="hint-pointer">&nbsp;</span></span>
								<div class="clear"></div>
								</div>								
								
								<div class="clear"></div>								
								<div class="field">
										<div class="buttons">
										<button type="submit" name="Submit" value="{$lang.Save_Portfolio}" onClick="Javascript: return Check_Details(this.form);">Submit</button>
										</div>
								</div>
								<div class="clear"></div>									

								<input type="hidden" name="Action" value="{$Action}">
								<input type="hidden" name="User_Id" value="{$User_Id}">
								<input type="hidden" name="pro_id" value="{$pro_id}"/>
								<input type="hidden" name="image" value="{$sample_file}" />
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