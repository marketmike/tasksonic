<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Task Search Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchproject" action="project_search_result.php" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task Search Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>   
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" width="30%">Premium Task</td>
					<td width="70%" class="fieldlabelRight2">
					<input type="checkbox" name="pre_project">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">VIP Task</td>
					<td width="70%" class="fieldlabelRight2">
					<input type="checkbox" name="vip_project">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Task Posted By : </td>
					<td width="70%" class="fieldlabelRight2">
					<input type="text" name="project_posted_by" class="textbox" size="40">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Task Title : </td>
					<td width="70%" class="fieldlabelRight2">
					<input type="text" name="project_title" class="textbox" size="100" maxLength="50">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Task Description : </td>
					<td width="70%" class="fieldlabelRight2">
					<textarea name="project_description" class="textbox" cols="120" rows="10"></textarea>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top" colspan="2">Categories : </td>
				</tr>
				<tr>
				    <td height="53" align="center" valign="top" colspan="2">
						<table border="0" cellpadding="1" cellspacing="2" width="100%">
							{assign var="col" value=2}
							{section name=prod loop=$Loop}
							{if $smarty.section.prod.iteration|mod:$col==1}
							<tr>
							{/if}
								<td valign="top" width="50%" align="left" class="fieldLabelLeft2">
									<input class="stdCheckBox" type="checkbox" name="cat_prod[]" id="cat_prod[]" value="{$catid[prod]}" {if $catid[prod]|in_array:$arr_categories}checked{/if} >
									&nbsp;{$catname[prod]}
									<span id="ExpandShow_{$smarty.section.prod.index}" style="visibility:visible;">
										(<a href="javascript: show_Resume('{$smarty.section.prod.index}')" class="actionlink">More Specific</a>)
									</span>
									<span id="ExpandHide_{$smarty.section.prod.index}" style="visibility:hidden;display:none;">
										(<a href="javascript: hide_Resume('{$smarty.section.prod.index}')" class="actionlink">More Specific</a>)
									</span>
									
									<span id="subcat_{$smarty.section.prod.index}" style="visibility:hidden;display:none;">
										<table width="85%" align="center" colspan="2">
										{foreach name=subcategory from=$sub_cat[prod] item=subcategory}
											<tr>
												<td class="fieldLabelLeft2">
													<input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$subcategory->cat_id}"  {if $subcategory->cat_id|in_array:$arr_categories}checked{/if} />{$subcategory->cat_name}
												</td>
											</tr>
										{/foreach}
										</table>
								   </span>	
								</td>
							{if $smarty.section.prod.iteration|mod:$col==0}
							</tr>
							{/if}
							{/section}
						</table>
					</td>
				</tr>
				<tr>
				    <td class="fieldlabelRight2" colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Budget Range : </td>
					<td width="70%" class="fieldlabelRight2">&nbsp;
						<select name="budget" class="textbox">
							<option value="0">( Please choose budget )</option>
							{$Development_List}
						</select> 	
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Days open for bidding : </td>
					<td width="70%" class="fieldlabelRight2">&nbsp;
						<select name="bidding_days" class="textbox">
						  <option value="0">-----</option>
							{$Bidding_List}
						</select>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Status Of Task : </td>
					<td width="70%" class="fieldlabelRight2">&nbsp;
						<select name="status_of_project" class="textbox">
							{$project_status_List}
						</select>
					</td>
				</tr>
				<tr>
				    <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
				    <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit" class="stdButton"></td>
				</tr>
			</table>
			<br>
		</td>
	</tr>
	</form>
</table>