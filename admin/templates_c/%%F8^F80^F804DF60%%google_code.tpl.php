<?php /* Smarty version 2.6.26, created on 2012-08-23 10:28:06
         compiled from google_code.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Google Ad Code Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSiteConfig" action="<?php echo $this->_tpl_vars['A_Action']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Google Ad Code Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr><td height="5"></td></tr>
				<tr><td class="successMsg" align="center"><?php echo $this->_tpl_vars['succMessage']; ?>
</td></tr>
				<tr><td height="5"></td></tr>
			</table>		
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight" valign="top" style="width:40%">Google Adsense Code (Top: Size 300 X 250)</td>
					<td class="fieldlabelLeft">
						<textarea name="google_adsense" rows="3" cols="80" class="textbox"><?php echo $this->_tpl_vars['google_adsense']; ?>
</textarea>
					</td>
				</tr>				
				<tr>
					<td class="fieldlabelRight" valign="top" style="width:40%">Google Adsense Code (Bottom: Size 300 X 250)</td>
					<td class="fieldlabelLeft">
						<textarea name="google_adsense_125" rows="3" cols="80" class="textbox"><?php echo $this->_tpl_vars['google_adsense_125']; ?>
</textarea>
					</td>
				</tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Google Analytics Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">				
				<tr>
					<td class="fieldlabelRight" valign="top" style="width:40%">Enter Google Analytics Code Here</td>
					<td class="fieldlabelLeft">
						<textarea name="google_analytics_code" rows="3" cols="80" class="textbox"><?php echo $this->_tpl_vars['google_analytics_code']; ?>
</textarea>
					</td>
				</tr>
			</table>
		</td>	
	</tr>
	<tr>	
		<td valign="top">	
			<table border="0" cellpadding="1" cellspacing="2" width="95%" >				
				<tr><td class="divider" colspan="2"></td></tr>
				<tr>
					<td align="right" colspan="2">
						<input type="submit" name="Submit" value="Update" class="button" onclick="javascript: return Form_Submit(document.frmSiteConfig);">
						<input type="submit" name="Submit" value="Cancel" class="button">
					</td>
				</tr>
			</table>	
		</td>
	</tr>
	</form>
</table>