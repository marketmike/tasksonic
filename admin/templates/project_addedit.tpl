<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Task Management [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmProList" action="{$A_Action}" method="post" enctype="multipart/form-data">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task Management [ {$Action} ] </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	   <td>&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center"><strong>{$Action} Task.</strong></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td height="205" align="center" valign="top">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td height="5"></td></tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" valign="top" >Task Title :</td>
				</tr>
				<tr>	
					<td class="fieldlabelRight2">
					<input type="text" name="title" class="textbox" value="{$title|stripslashes}"  size="60"/>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top">Task Description : </td>
				</tr>
				<tr>	
					<td class="fieldlabelRight2">	{$EN_Page_Editor}
<!--						<textarea name="desc" cols="100" rows="10" class="textbox">{$desc}</textarea>
-->					</td>
				</tr>
			</table>
	  </td>
	</tr>
	<tr>
		<td height="53" align="center" valign="top">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" valign="top" colspan="2">Categories: You can make up to 5 selections: </td>
				</tr>
				{assign var="col" value=2}
				{section name=prod loop=$Loop}
				{if $smarty.section.prod.iteration|mod:$col==1}
				<tr>
				{/if}
					<td valign="top" width="50%" align="left" class="fieldLabelLeft2">
					<input class="stdCheckBox" type="checkbox" name="cat_prod[]" id="cat_prod[]" value="{$catid[prod]}" {if $catid[prod]|in_array:$arr_categories}checked{/if} >
					&nbsp;{$catname[prod]}
					<span id="ExpandShow_{$smarty.section.prod.index}" style="visibility:visible;">
						(<a href="javascript: show_Resume('{$smarty.section.prod.index}')" class="actionlink">More Specific</a>)		</span>
					<span id="ExpandHide_{$smarty.section.prod.index}" style="visibility:hidden;display:none;">
						(<a href="javascript: hide_Resume('{$smarty.section.prod.index}')" class="actionlink">More Specific</a>)		</span>
					
						<span id="subcat_{$smarty.section.prod.index}" style="visibility:hidden;display:none;">
						<table width="85%" align="center">
							{foreach name=subcategory from=$sub_cat[prod] item=subcategory}
							<tr>
								<td class="bodytextblack"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$subcategory->cat_id}"  {if $subcategory->cat_id|in_array:$arr_categories}checked{/if} />{$subcategory->en_cat_name}</td>
							</tr>
							{/foreach}
						</table>
					  </span>		</td>
				{if $smarty.section.prod.iteration|mod:$col==0}	</tr>
				{/if}
				{/section}
			</table>
	  </td>
	</tr>
	<tr>
	   <td align="center" valign="top">
	      <table border="0" cellpadding="1" cellspacing="2" width="95%">
		     <tr>
				<td width="50%" class="fieldlabelRight2" valign="top">Upload files relevant to the project : </td>
				<td width="50%" class="fieldlabelRight2"  valign="top">Task Status:</td>
			 </tr>
			 <tr>
		 		<td width="50%" class="fieldlabelRight2">
					<input type="file" name="project_file_1" />
					<br />
				{if $project_file_1 != ''}				
					 {$imgpath}{$project_file_1}
                {/if}						
				</td>
		 		<td width="50%" class="fieldlabelRight2">
						<select name="project_status" class="textbox">
						  <option value="1" {if $status ==1}selected{/if}>Open</option>
						  <option value="2"{if $status ==2}selected{/if}>Awarded</option>
						  <option value="3"{if $status ==3}selected{/if}>Accepted</option>
						  <option value="4"{if $status ==4}selected{/if}>Closed</option>
						  <option value="5"{if $status ==5}selected{/if}>Marked Completed</option>
						  <option value="6"{if $status ==6}selected{/if}>Completed</option>
						  <option value="7"{if $status ==7}selected{/if}>Failed</option>						  
						</select>	
				</td>				
			</tr>	
			 <tr>
				<td class="fieldlabelRight2">
					 <input type="file" name="project_file_2" />
					 <br />
				{if $project_file_2 != ''}				
					 {$imgpath}{$project_file_2}
                {/if}						 
				</td>	 
				<td class="fieldlabelRight2">
					Days open for bidding :
				</td>				
			  </tr>	
			  <tr>
				<td class="fieldlabelRight2">
					<input type="file" name="project_file_3" />
					<br />
				  {if $project_file_3!= ''}				
						{$imgpath}{$project_file_3}
				  {/if}						
				</td>
				<td class="fieldlabelRight2">
						<select name="bidding" class="dropdownmediumext">
						  <option value="0">-----</option>
							{$Bidding_List}
						</select>
						<select name="bidding_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							{$Time_List}
						</select>						
				</td>					
			 </tr>

		  </table>
	   </td>
	</tr>
	<tr>
	  <td align="center" valign="top">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" width="50%"><strong>Budget Range :</strong></td>
					<td class="fieldlabelRight2" width="50%"><strong>Task Completion Date :</strong></td>
				</tr>
			    <tr>
					<td class="fieldlabelRight2" valign="top" width="50%">
						<select name="dev" class="textbox">
						  <option value="0">( Please choose budget )</option>
							{$Development_List}
						</select>
					</td>						
					<td class="fieldlabelRight2" valign="top" width="50%">
						<select name="completed_by" tabindex="7" class="dropdownmediumext">
						  <option value="0">-----</option>
							{$Completed_List}
						</select>
						<select name="completed_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							{$Time_List2}
						</select>					
					</td>
				</tr>
			</table>
	  </td>
	</tr>
	<tr>
	  <td align="center" valign="top">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" width="50%"><strong>Additional Options :</strong></td>
					<td class="fieldlabelRight2" width="50%"><strong>Task Location :</strong></td>
				</tr>
				<tr>
				    <td class="fieldlabelRight2" valign="top" width="50%">
					   <input type="checkbox" name="project_options2" value="1" {$option2}/ > &nbsp;
						   Allow only premium members to bid on my task.
					</td>
				    <td class="fieldlabelRight2" valign="top" width="50%">
				<select name="project_city" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your City-</option>
				{$City_List}
				</select>
					</td>					
				</tr>
				<tr>
				    <td class="fieldlabelRight2" valign="top" width="50%">
					   <input type="checkbox" name="premium_project" value="1" {$option3}/ > &nbsp;
						   Set Task As a Premium Task.
					</td>
				    <td class="fieldlabelRight2" valign="top" width="50%">
					 <input type="checkbox" name="clear_notices" value="1" / > &nbsp;
						   Clear notice intervals and Task close date.
					</td>					
				</tr>
			</table>
	  </td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="Submit" value="Update" class="button" onclick="javascript: Javascript: return Check_Details(this.form);">
			<input type="submit" name="Submit" value="Cancel" class="button">
		</td>
	</tr>
	<input type="hidden" name="Action" value="{$Action}" />
	<input type="hidden" name="project_id" value="{$project_id}" />
	<input type="hidden" name="image1" value="{$project_file_1}" />
	<input type="hidden" name="image2" value="{$project_file_2}" />
	<input type="hidden" name="image3" value="{$project_file_3}" />

	</form>
	</table>
