<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Execution Time Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmExecution" action="{$smarty.server.PHP_SELF}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Execution Time Management </td>
					<td class="pagetitle" width="50%" background="{$Templates_Image}title_bg.gif">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="27%">
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td width="25%">
						<select name="category" style="width:200px;" size="10">
							{section name=Opt loop=$Loop}
								<option value="{$exe_id[Opt]}">{$exe_name[Opt]}</option>
							{/section}
						</select>
						<input type="hidden" name="display_order">
					</td>
					<td align="left">
						<img src="{$Templates_Image}top.gif" style="cursor:hand" border="0" onClick="JavaScript: UpDown_Click(-1);"><br><br>
						<img src="{$Templates_Image}bottom1.gif" style="cursor:hand" border="0" onClick="JavaScript: UpDown_Click(1);">
					</td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td>
						<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: Button_Click(this);"> &nbsp;&nbsp; 
						<input type="submit" name="Submit" value="Cancel" class="stdButton"> 					
						<input type="hidden" name="Action" value="{$ACTION}">
					</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<br><br>
			<br><br>
		</td>
	</tr>
	</form>
</table>