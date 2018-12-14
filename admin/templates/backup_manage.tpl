<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Database  Management			
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmDB" action="{$A_Action}" method="post" enctype="multipart/form-data">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%"  height="25">Database  Management </td>
					<td class="pagetitle" width="50%" >&nbsp;</td>
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
				  Manage your website static contents.&nbsp;<b>Backup/Restore Database.</b></td>
			  </tr>
					<tr><td>&nbsp;</td></tr>
				{if $succMessage}
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				{/if}
				<tr><td >&nbsp;</td></tr>
					<!--<tr>
					<td class="successMsg" align="center">Database Upload:<input type="file" class="stdButton" name="fileField" value="{$fileField}"/><td>
					</tr>
					<tr>
					<td align="center"><input type="submit" name="Submit" value="Restore" class="stdButton" ><td>
					</tr>-->
					
					<td colspan="15" align="right">
					<input type="submit" name="Submit" value="Backup" class="stdButton" >

					</td>
				</tr>
		  </table>
			
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
			<tr>
					<td class="headTitle" width="4%">&nbsp;</td>
					<td class="headTitle" width="27%">File Name </td>
					<td class="headTitle" width="32%">Action</td>
			  </tr>
				{section name=listing loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td><input class="stdCheckBox" type="checkbox" name="chk_no[]" value="{$List[listing]}"></td>
					<td width="27%" class="bodytextblack" align="center">{$List[listing]}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Download" onClick="JavaScript: Backup_Click('{$List[listing]}');">
						<!--<img src="{$Templates_Image}edit.gif" class="imgAction" title="Restore" onClick="JavaScript: Restore_Click('{$List[listing]}');">&nbsp;-->
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$List[listing]}');">&nbsp;
					</td>
			  </tr>
				{/section}
		  </table>
			{if $smarty.section.listing.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['chk_no[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['chk_no[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
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
			<input type="hidden" name="Action">
			<input type="hidden" name="filename" />
			<input type="hidden" name="article_order" />
			<input type="hidden" name="status" />
			<input type="hidden" name="filrestore" value="{$filrestore}" />
		</td>
	</tr>
	</form>
</table>