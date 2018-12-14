<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Configurations
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSiteConfig" action="{$A_Action}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title.gif" height="25">Email Configurations</td>
				</tr>
			</table>
		</td>
	</tr>
	<TR>	
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr><td height="5"></td></tr>
				<tr><td class="successMsg" align="center">{$succMessage}</td></tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
			<tr>
					<td colspan="2" class="varnormal" align="center">
						Default Email Configuration
					</td>
				</tr>
							
		{foreach from=$ToolData item=Tool}    
		<tr class="{cycle values='list_A, list_B'}">
				<tr>
					<td class="fieldLabelLeft" valign="top" width="20%"><b>{$Tool->email_title}</b></td>
					<td class="fieldInputStyle">
					<input type="hidden" name="email_id[]" size="50" maxlength="120" value="{$Tool->email_id}"><br>
					</td>
				</tr>
			
				<tr>
					<td class="fieldLabelLeft" valign="top" width="20%">Email Address :</td>
					<td class="fieldInputStyle">
						<input type="text" name="email_adress[]" size="50" maxlength="120" value="{$Tool->email_adress}" class="textbox"><br>
					</td>
				</tr>
				
		</tr>
		{/foreach}
			<tr><td class="divider" colspan="2"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Update" class="stdButton" onclick="javascript: return Form_Submit(document.frmSiteConfig);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>