<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Experience Year Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmExper" action="{$smarty.section.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Experience Year Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="varnormal">
						Manage Experience Year. Add/Edit/Delete Experience Year.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmExper.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4" align="right"><a class="actionLink" href="{$smarty.server.PHP_SELF}?Action=Add"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0"></a>
					<br /><a href="Javascript: Order_Click()" class="actionLink">Manage Order</a>
					</td>
				</tr>
				<tr>
					<td width="3%" class="headTitle"></td>
					<td class="headTitle">Name </td>
					<td class="headTitle" width="31%">Action</td>
				</tr>
				{section name=year loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$experience_id[year]}"></td>
					<td width="28%" class="bodytextblack">&nbsp;{$experience_title[year]}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$experience_id[year]}');">&nbsp;&nbsp;
					  	<img src="{$Templates_Image}delete.gif"	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$experience_id[year]}');">&nbsp;&nbsp;</td>
				</tr>
				{sectionelse}
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="3" align="center" class="bodytextblack">No Year Experience inserted yet.</td>
				</tr>
				{/section}
			</table>
			{if $smarty.section.year.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click();">
					</td>
				</tr>
			</table>
			{/if}
						{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="year_expe_id" />
	</form>
</table>