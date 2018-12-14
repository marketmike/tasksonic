<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	FAQ Management				
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmFaq" action="{$smarty.section.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">FAQ Management </td>
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
						Manage FAQ. View/Update Status/Delete faqs.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmFaq.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<input type="hidden" name="cat_id" />
			<input type="hidden" name="status" />
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="5" align="right"><a class="actionLink" href="{$smarty.server.PHP_SELF}?Action=Add"><img src="{$Templates_Image}add.gif" class="imgAction" title="Add" border="0"></a>
					<br /><a href="Javascript: Order_Click()" class="actionLink">Manage Order</a>
					</td>
				</tr>
				<tr>
					<td width="3%" class="headTitle"></td>
					<td class="headTitle" width="60%">Question </td>
					<td class="headTitle" width="10%">Status </td>
					<td class="headTitle" width="10%">Order</td>
					<td class="headTitle" width="20%">Action</td>
					
				</tr>
				{section name=faq loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$arr_faq[faq].faq_id}"></td>
					<td class="bodytextblack">&nbsp;{$arr_faq[faq].faq_title}</td>
					<td class="bodytextblack">&nbsp;{$arr_faq[faq].status}</td>
					<td class="bodytextblack">&nbsp;{$arr_faq[faq].disp_order}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$arr_faq[faq].faq_id}');">&nbsp;&nbsp;
					  	<img src="{$Templates_Image}delete.gif"	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$arr_faq[faq].faq_id}');">&nbsp;&nbsp;</td>
				</tr>
				{sectionelse}
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="4" align="center" class="bodytextblack">No FAQ inserted yet.</td>
				</tr>
				{/section}
			</table>
			{if $smarty.section.faq.total > 1}
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
	<input type="hidden" name="faq_id" />
	</form>
</table>