<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Task [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmProList" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center" colspan="2">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
			    <tr>
					<td width="19%" valign="top" class="fieldlabelRight1" align="left">project Title :</td>
					<td width="81%" valign="top" class="fieldlabelLeft">{$title|stripslashes}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">project Description :</td>
					<td class="fieldlabelLeft" valign="top">{$desc|wordwrap:100:"\n":true}</td>
				</tr>
			   <tr>
				  <td class="fieldlabelRight1" valign="top" align="left" colspan="2">Categories :</td>
			   </tr>
			  <tr>
			       <td colspan="3">
					  <table width="100%" border="0" cellpadding="0" cellspacing="0">
						{assign var="col" value=3}
						{section name=prod1 loop=$Loop}
						{if $smarty.section.prod1.iteration|mod:$col==1}
							<tr>
						{/if}
								<td width="25%" valign="top" class="fieldlabelRight1"><strong>{$catname1[prod1]}</strong></td>
						{if $smarty.section.prod1.iteration|mod:$col==0}
							</tr>
						{/if}
						{/section}
					</table>
				  </td>
			   </tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">Upload files relevant to the project :</td>
				</tr>
				{if $project_file_1}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">
						&nbsp;&nbsp;<a href="Javascript: Download_File('{$download_project_file_1}','project');" class="actionlink">{$project_file_1}</a>
					</td>
				</tr>
				{/if}	
				{if $project_file_2}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">
						&nbsp;&nbsp;<a href="Javascript: Download_File('{$download_project_file_2}','project');" class="actionlink">{$project_file_2}</a>
					</td> 
	           	</tr>
				{/if}
				{if $project_file_3}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">
						&nbsp;&nbsp;<a href="Javascript: Download_File('{$download_project_file_3}','project');" class="footerLink">{$project_file_3}</a>
					</td>
				</tr>	
				{/if}
				{if $project_file_1 == '' && $project_file_2 == '' && $project_file_3 == ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;No files are uploaded</td>
				</tr>
				{/if}	
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">Budget Range :</td>
					<td class="fieldlabelLeft" valign="top"> {$Bidding_List}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top"  align="left">Days open for bidding :</td>
					<td class="fieldlabelLeft" valign="top"> {$open_days}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">Additional Options:</td>
				</tr>
				{if $option1 != ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;{$option1}</td>
				</tr>
				{/if}
				{if $option2 != ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;{$option2}</td>
				</tr>
				{/if}
				{if $option3 != ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;{$option3}</td>
				</tr>
				{/if}
				{if $option4 != ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;{$option4}</td>
				</tr>
				{/if}
				{if $option1 == '' && $option2 == '' && $option3 == '' && $option4 == ''}
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="2">&nbsp;&nbsp;Simple project</td>
				</tr>
				{/if}
				{if $Loop_Edit > 0}
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">project Information changed:</td>
				</tr>
				<tr>
			       <td colspan="3">
					  <table width="100%" border="0" cellpadding="1" cellspacing="2">
					    <tr>
						    <td align="center" width="50%" class="fieldlabelRight2">Description</td>
							<td align="center" width="30%" class="fieldlabelRight2">filename</td>
							<td align="center" width="20%" class="fieldlabelRight2">edit_date</td>
						</tr> 
					    {section name=edit loop=$Loop_Edit}
					    <tr>
						    <td align="left" width="50%" class="fieldlabelRight2">{$arr_edit[edit].description|wordwrap:20:"\n":true}</td>
							<td align="center" width="30%" class="fieldlabelRight2">{if $arr_edit[edit].filename!= ''}{$arr_edit[edit].filename}{else}No file uploaded{/if}</td>
							<td align="center" width="20%" class="fieldlabelRight2">{$arr_edit[edit].edit_date}</td>
						</tr> 
						{sectionelse}
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
						    <td align="center" class="fieldlabelRight2" colspan="3">No changes in project information</td>
						</tr> 
						{/section}
					  </table>
				  </td>
			   </tr>
			   {/if}
			</table>	
			<input type="hidden" name="Action" value="{$Action}"/>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center"><input type="submit" name="Submit" value="Back" class="stdButton"></td>
	</tr>
	</form>
</table>